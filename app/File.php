<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Image;
use Storage;
class File extends Model
{
    // public function node()
    // {
    //     return $this->belongsTo('App\node');
    // }
    protected $guarded = [];
    public function phototable(){
        return $this->morphTo();
    }
    // path_img
    public function storeImg($file)
    {
                $ext = $file->getClientOriginalExtension();
                $filenameimg = 'img' . '_' . time() . '.' . $ext;
                $file->storeAs('public/images',$filenameimg);
                //تعديل الصور
                $file->storeAs('public/thumbnails', $filenameimg);
                // $thumbnailPath = 'storage/thumbnails/'.$filenameimg;
                // Image::make($thumbnailPath)->resize(350,null, function($constraint){
                //     $constraint->aspectRatio();
                // })->save($thumbnailPath); 

                return $filenameimg;  
                
    }
    public function storeImg2($file)
    {
                $ext = $file->getClientOriginalExtension();
                $filenameimg = 'img2' . '_' . time() . '.' . $ext;
                $file->storeAs('public/images',$filenameimg);
                //تعديل الصور
                $file->storeAs('public/thumbnails', $filenameimg);
                // $thumbnailPath = 'storage/thumbnails/'.$filenameimg;
                // Image::make($thumbnailPath)->resize(350,null, function($constraint){
                //     $constraint->aspectRatio();
                // })->save($thumbnailPath); 

                return $filenameimg;  
                
    }
// path_img end
}
