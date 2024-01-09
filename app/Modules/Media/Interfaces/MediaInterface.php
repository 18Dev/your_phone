<?php

namespace App\Modules\Media\Interfaces;

/**
 * @MediaInterface
 */
interface MediaInterface
{
    /**
     * @param $file
     * @param $disk
     * @param $directory
     */
    public function upload($file, $disk = null, $directory = null);

    /**
     * @param $media
     * @param bool $is_first
     */
    public function deleteExistingFile($media, bool $is_first = true);
}
