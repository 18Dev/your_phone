<?php

namespace App\Modules\Admin\Brand\Traits;

use Illuminate\Support\Collection;

/**
 * @AttributeTrait
 */
trait AttributeTrait
{
    /**
     * @return Collection
     */
    public function getStatusActionAttribute()
    {
        $data = collect();
        switch ($this->status) {
            case STOP_SELLING:
                $data->msg = __('Stop selling');
                $data->color_text_msg = 'text-danger';
                $data->bg_btn = 'bg-00FF66';
                $data->text_btn = __('On sale');
                $data->status = ON_SALE;
                break;
            case ON_SALE:
                $data->msg = __('On sale');
                $data->color_text_msg = 'text-success';
                $data->bg_btn = 'btn-warning';
                $data->text_btn = __('Stop selling');
                $data->status = STOP_SELLING;
                break;
        }

        return $data;
    }

    /**
     * @return string
     */
    protected function getAvatarAttribute()
    {
        // If an avatar exists get the avatar link otherwise get the default avatar link
        return optional($this->getMedia(TAG_AVATAR)->first())->getUrl() ?? asset(NO_IMAGE);
    }
}
