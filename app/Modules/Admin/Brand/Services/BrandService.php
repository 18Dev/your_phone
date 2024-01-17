<?php

namespace App\Modules\Admin\Brand\Services;

use App\Modules\Admin\Brand\Interfaces\BrandInterface;
use App\Modules\Admin\Brand\Models\Brand;
use App\Modules\Media\Interfaces\MediaInterface;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * @BrandService
 */
class BrandService extends BaseService implements BrandInterface
{
    protected $media;

    /**
     * @param Brand $brand
     * @param MediaInterface $media
     */
    public function __construct(Brand $brand, MediaInterface $media)
    {
        $this->model = $brand;
        $this->media = $media;
    }

    /**
     * @param $request
     *
     * @return mixed
     */
    public function search($request)
    {
        return $this->model::search($request)->paginate(PAGE_RECORD);
    }

    /**
     * @param $request
     * @param $brand
     *
     * @return Brand|false|null
     */
    public function handle($request, $brand = null)
    {
        // Data request model fillable
        $dataRequest = $request->only($this->model->getFillable());

        DB::beginTransaction();
        try {
            // If the brand does not exist, create a new one, otherwise update
            $brand = empty($brand) ? $this->create($dataRequest) : $this->updateModel($brand, $dataRequest);
            // Upload avatar
            $this->uploadAvatar($brand, $request, $brand);

            DB::commit();
            return $brand;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error: {$e->getMessage()} \n--Line: {$e->getLine()}");
        }

        return false;
    }

    public function delete($brand)
    {
        DB::beginTransaction();
        try {
            $brand->delete();
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error: {$e->getMessage()} \n--Line: {$e->getLine()}");
        }

        return false;
    }

    /**
     * @param $update
     * @param $request
     * @param $model
     *
     * @return bool
     */
    private function uploadAvatar($update, $request, $model): bool
    {
        if ($update) {
            if ($request->hasFile('avatar')) {
                $media = $this->media->upload($request->file('avatar'), FILESYSTEM_DISK_MEDIA,'brand');
            }
            if (!empty($media) && $model->hasMedia(TAG_AVATAR)) {
                $this->media->deleteExistingFile($model->getMedia(TAG_AVATAR)->first());
            }
            empty($media) ?: $model->syncMedia($media, TAG_AVATAR);

            return true;
        }

        return false;
    }
}
