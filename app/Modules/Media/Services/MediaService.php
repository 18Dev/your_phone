<?php

namespace App\Modules\Media\Services;

use Exception;
use App\Modules\Media\Interfaces\MediaInterface;
use Plank\Mediable\Exceptions\MediaUploadException;
use Plank\Mediable\HandlesMediaUploadExceptions;
use Plank\Mediable\MediaUploader;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @MediaService
 */
class MediaService implements MediaInterface
{
    use HandlesMediaUploadExceptions;

    protected MediaUploader $mediaUploader;

    /**
     * MediaService constructor.
     *
     * @param MediaUploader $mediaUploader
     */
    public function __construct(MediaUploader $mediaUploader)
    {
        $this->mediaUploader = $mediaUploader;
    }

    /**
     * @param $file
     * @param $disk
     * @param $directory
     *
     * @return \Plank\Mediable\Media
     * @throws Exception
     */
    public function upload($file, $disk = 'public', $directory = null)
    {
        try {
            return $this->mediaUploader
                ->fromSource($file)
                ->toDestination($disk, $directory)
                ->useFilename(Str::random(40) . time())
                ->upload();
        } catch (MediaUploadException $e) {
            throw $this->transformMediaUploadException($e);
        }
    }

    /**
     * @param $media
     * @param bool $is_first
     *
     * @return void
     */
    public function deleteExistingFile($media, bool $is_first = true)
    {
        if (!$is_first && $media) {
            foreach ($media as $value) {
                $value->delete();
                Storage::disk($value->disk)->delete($value->getDiskPath());
            }
        } else if($media) {
            $media->delete();
            Storage::disk($media->disk)->delete($media->getDiskPath());
        }
    }
}
