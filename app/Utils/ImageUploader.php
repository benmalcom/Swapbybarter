<?php

/**
 * Created by PhpStorm.
 * User: ben
 * Date: 18/08/2017
 * Time: 5:31 PM
 */

namespace App\Utils;

use Intervention\Image\ImageManagerStatic as Image;
use Storage;
use App\Models\ItemImage;
use Uuid;

class ImageUploader
{
    const IMAGE_HEIGHT =  600;
    const IMAGE_WIDTH =  500;

    public function __construct()
    {
    }


    public function uploadItemImages(array $files)
    {
        $result = [];
        if(!empty($files))
        {
            foreach ($files as $file)
            {
                if(substr($file->getMimeType(), 0, 5) == 'image') {
                    $ext = $file->getClientOriginalExtension();
                    $file_name = Uuid::generate(1).".".$ext;
                    $s3 = Storage::disk();
                    $file_path = 'items/'.$file_name;
                    $image = Image::make($file)->resize(self::IMAGE_WIDTH, self::IMAGE_HEIGHT)->stream();
                    $boolean = $s3->put($file_path, $image->__toString());
                    if($boolean){
                        $image_url = $s3->url($file_path);
                        $item_image = new ItemImage();
                        $item_image->key = $file_path;
                        $item_image->url = $image_url;
                        array_push($result,$item_image);
                    }

                }
            }

        }

        return $result;
    }
}