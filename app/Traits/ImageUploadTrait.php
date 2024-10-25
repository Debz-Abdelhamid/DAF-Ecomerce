<?php 
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait{

    public function UploadImage(Request $request, $inputName, $path, $disk='public' )
    {
        if($request->hasFile($inputName))
        {
            $image = $request->file($inputName)->store($path, $disk);

            return $image;
        }

        return null;
    }


    public function UploadMultipleImage(Request $request, $inputName, $path, $disk='public' )
    {
        $Imagepaths = [];
        if($request->hasFile($inputName))
        {

            foreach( $request->file($inputName) as $image){

                $Imagepaths[] = $image->store($path, $disk);

            }

            return $Imagepaths;
        }

        return null;
    }



    public function UpdateImage(Request $request, $inputName, $path, $oldPath =null, $disk='public')
    {
        if($request->hasFile($inputName))
        {
            if($oldPath && Storage::disk($disk)->exists($oldPath))
            {
                Storage::disk($disk)->delete($oldPath);
            }

            $image = $request->file($inputName)->store($path, $disk);

            return $image;
        }

        return $oldPath;
    }

    /** Handle Delete Image */
    public function DeleteImage($path=null, $disk='public')
    {
        if($path && Storage::disk($disk)->exists($path))
        {
            Storage::disk($disk)->delete($path);
        }
    }
    
}