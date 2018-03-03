<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

trait PhotoTools
{
    protected function ftpAddress()
    {
        return env('CDN_URL', 'https://i1.wp.com/votepen.tk/');
    }

    /**
     * Downloads the image from the external link and stores into the defined direcory( could be ftp, local...).
     *
     * [@param](https://votepen.com/@param)  (string) external url
     * [@param](https://votepen.com/@param)  (string) directory the file should be uploaded to
     * [@return](https://votepen.com/@return) (string) the path of uploaded file
     */
    protected function downloadImg($url, $folder = 'submissions/link')
    {
        $filename = time().str_random(7).'.jpg';
        $image = Image::make($url);

        if ($image->filesize() > 300000) { // 300kb
            $image->encode('jpg', 60);
        } else {
            $image->encode('jpg', 90);
        }

        Storage::put($folder.'/'.$filename, $image);

        return $this->ftpAddress().$folder.'/'.$filename;
    }

    /**
     * Creates and saves a thumbnail for the sent photo and stores into the defined direcory( could be ftp, local...).
     *
     * [@param](https://votepen.com/@param)  request('img')
     * [@param](https://votepen.com/@param)  (int) width of the thumbnail
     * [@param](https://votepen.com/@param)  (int) height of the thumbnail
     * [@param](https://votepen.com/@param)  (string) directory the file should be uploaded to
     * [@return](https://votepen.com/@return) (string) the path of uploaded file
     */
    protected function createThumbnail($url, $width, $height, $folder = 'submissions/img/thumbs')
    {
        $filename = time().str_random(7).'.jpg';
        $image = Image::make($url);

        if ($image->width() > 1200) {
            if ($width == null || $height == null) {
                $image = $image->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                $image = $image->resize($width, $height);
            }
        }

        $image->encode();
        Storage::put($folder.'/'.$filename, $image);

        return $this->ftpAddress().$folder.'/'.$filename;
    }
}
