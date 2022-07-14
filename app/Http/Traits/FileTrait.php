<?php

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\Models\File;
use Intervention\Image\Facades\Image;

trait FileTrait {
    public function uploadFile(Request $request, $fieldname = 'uploadFiles', $directory = 'uploads', $thumb = false) {
        $result = [];

        if($request->hasFile($fieldname)) {
            foreach($request->file($fieldname) as $file) {
                $salt = time();
                $name = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $size = $file->getSize();

                $path = $file->store($directory, 'public');

                /* $make_image = Image::make(storage_path('app/public/' . $path));
                $make_image->orientate();
                $make_image->save(storage_path('app/public/' . $path)); */

                $make_thumbnail = Image::make($file);
                $make_thumbnail->resize(580, null, function($constraint) {
                    $constraint->aspectRatio();
                });

                if($thumb) {
                    $thumbnail_path = public_path('storage/uploads/thumbnails/' . $salt . $name);
                    $make_thumbnail->save($thumbnail_path);

                    $result[$name] = [
                        'name' => $name,
                        'extension' => $extension,
                        'size' => $size,
                        'path' => $path,
                        'thumbnail' => $directory . '/thumbnails/' . $salt . $name
                    ];
                } else {
                    $result[$name] = [
                        'name' => $name,
                        'extension' => $extension,
                        'size' => $size,
                        'path' => $path,
                        'thumbnail' => null
                    ];
                }

                //array_push($result, $path);
            }
        } else {
            return back()
                ->with('error', 'Nebyl vybrán žádnej soubor.');
        }

        return $result;
    }
}
