<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Type_job;
use App\File;
use App\ads;
use App\Work_user;
use Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class ApiAuthController extends Controller
{

            // تسجيل الدخول الى السرفر وجلب البيانات المستخدمين
            // http://p15khedma.test:8090/api/userlogin
            // http://p15khedma.looooon.com/api/userlogin
            public function userlogin(Request $request)
            {
                if (auth()->attempt(['email' => $request->input('email'),
                'password' => $request->input('password')
                ])) {
                    // if($request->status == 1){

                    $user = auth()->user();
                    $user->remember_token = Str::random(60);
                    $user->save();
                    $data = User::find(auth()->user()->id);

                    $datas =  $data->toJson();
                    
                    return [
                        'id'                => $data->id,
                        'name'              => $data->name,
                        'email'             => $data->email,
                        'phone'             => $data->phone,
                        'address'           => $data->address,
                        'path'              => $data->path,
                        'path_card'         => $data->path_card,
                        'type_job_id'       => $data->type_job_id,
                        'rating'            => $user->rating,
                        'booking'           => $user->booking,
                        'role'              => $data->role,
                        'status'            => $data->status,
                        'remember_token'    => $data->remember_token
                    ];

                    // $token = $data->remember_token;
                    // return 
                    // response()->json([
                    //     'usre' => $data,
                    //     'remember_token' => $token
                    // ]);
                    // }
                    // return '';
                }
                return '';
            }


             //ارسال بيانات العمال
            //  http://p15khedma.looooon.com/api/userindex/1
            public function userindex($id)
            {
                    $data = User::where('role' , '=' , 2)->where('type_job_id' , $id)->orderBy('created_at', 'desc')->get();
                    $datas =  $data->toJson();
                    return $data;
            }
            //  http://p15khedma.looooon.com/api/userindex2/
            public function userindex2()
            {
                $data = User::all();
                $datas =  $data->toJson();
                return $data;
            }

            //ارسال بيانات الوطائف
            //  http://p15khedma.looooon.com/api/type_jobindex
            public function type_jobindex()
            {
                $data = Type_job::all();
                $datas =  $data->toJson();
                return $data;
            }

            // انشاء المستخدم
            // http://p15khedma.looooon.com/api/userstore
            public function userstore(Request $request)
            {
                
                if($request->hasFile('path')){
                    $file = $request->file('path');
                    $storeImg = new File();
                    $filenameimg = $storeImg->storeImg($file);
                }else{
                    $filenameimg = 'img_1663512690.png';
                }
                // path_card
                if($request->hasFile('path_card')){
                    $file = $request->file('path_card');
                    $storeImg = new File();
                    $filenameimg2 = $storeImg->storeImg2($file);
                }else{
                    $filenameimg2 = 'img_card_1663512690.png';
                }

                $user = new User();
                $user->name                 = $request->name;
                $user->email                = $request->email;
                $user->email_verified_at    = '2022-01-08 00:00:00';
                $user->password             = Hash::make($request['password']);
                $user->phone                = $request->phone;
                $user->address              = $request->address;
                $user->path                 = $filenameimg;
                $user->path_card            = $filenameimg2;
                $user->status               = 1;
                $user->user_id              = 1;
                
                if($request->type_job_id !=""){
                    $user->type_job_id      = $request->type_job_id;
                }else{
                    $user->type_job_id      = 0;
                }

                $user->rating               = 0;
                $user->booking              = 0;

                if($request->role !=""){
                    $user->role             = $request->role;
                }else{
                    $user->role             = 3;
                }

                $user->remember_token       = Str::random(60);
                $user->save();

                return [
                    'id'                => $user->id,
                    'name'              => $user->name,
                    'email'             => $user->email,
                    'phone'             => $user->phone,
                    'address'           => $user->address,
                    'path'              => $user->path,
                    'path_card'         => $user->path_card,
                    'type_job_id'       => $user->type_job_id,
                    'rating'            => $user->rating,
                    'booking'           => $user->booking,
                    'role'              => $user->role,
                    'remember_token'    => $user->remember_token
                ];


            }

            // طلب بيانات المستخدم لتعديل والعرض
            // http://p15khedma.looooon.com/api/useredit/10
            public function useredit($id)
            {
                    $data = User::find($id);
                    $datas =  $data->toJson();
                    return $data;
            }

            // حفظ تعديل بيانات المستخدم
            // http://p15khedma.looooon.com/api/userupdate/10
            public function userupdate(Request $request ,$id)
            {

                $user = User::find($id);
                $user->name                 = $request->name;
                $user->email                = $request->email;
                if($request->password!=""){
                    $password     = Hash::make($request['password']);
                $user->password             = $password;
                }
                $user->phone                = $request->phone;
                $user->address              = $request->address;
                if($request->hasFile('path')){
                    $file = $request->file('path');
                    $storeImg = new File();
                    $filenameimg = $storeImg->storeImg($file);
                $user->path                 = $filenameimg;
                }
                if($request->hasFile('path_card')){
                    $file = $request->file('path_card');
                    $storeImg = new File();
                    $path_card2 = $storeImg->storeImg2($file);
                $user->path_card             = $path_card2;
                }
                $user->booking              = $request->booking;
                $user->save();

                return [
                    'id'                => $user->id,
                    'name'              => $user->name,
                    'email'             => $user->email,
                    'phone'             => $user->phone,
                    'address'           => $user->address,
                    'path'              => $user->path,
                    'path_card'         => $user->path_card,
                    'booking'           => $user->booking,
                    'remember_token'    => $user->remember_token
                ];
            }

            // البوم عرض الصور
            // http://p15khedma.looooon.com/api/adsindex/
            public function adsindex()
            {
                    $data = Ads::where('type' , '<=' , 2)->get();
                    $datas =  $data->toJson();
                    return $data;
            }


            public function logout()
            {
                    // auth()->user()->remember_token()->delete();
                    return response()->josn(['msg' => "ok"]);
            }
            // الحجز
            // http://p15khedma.looooon.com/api/booking/10
            public function booking(Request $request ,$id)
            {
                $user = User::find($id);
                $user->booking              = $request->booking;
                $user->save();
                return $user->booking;
            }
            // التقييم
            // http://p15khedma.looooon.com/api/rating/10
            public function rating(Request $request ,$id)
            {
                $user                   = User::find($id);
                $data                   = $user->rating + $request->rating;
                $user->rating           = $data;
                $user->save();
                return $user->rating;
            }
            // اعمال العمال
            //  http://p15khedma.looooon.com/api/work_usersindex/
            // عند استقبال البيانات يتم فحص 2 ip
            public function work_usersindex()
            {
                $data = Work_user::all();
                $datas =  $data->toJson();
                return $data;
            }
            // اعمال العمال اضافة
            //  http://p15khedma.looooon.com/api/work_users/
            public function work_users(Request $request)
            {
                // dd($request);
                $work_user = new Work_user();
                $work_user->title                 = $request->title;
                $work_user->price                 = $request->price;
                $work_user->date_start            = $request->date_start;
                $work_user->date_end              = $request->date_end;
                $work_user->status                = 0;
                $work_user->user_id_w             = $request->user_id_w;
                $work_user->user_id_c             = $request->user_id_c;
                $work_user->save();

                $user = User::find($request->user_id_w);
                $user->booking              = 1;
                $user->save();

                return $work_user;
            }
            // الموافقة على العمل
            // http://p15khedma.looooon.com/api/work_status/1
            public function work_status(Request $request ,$id)
            {
                $data = Work_user::find($id);
                $data->status              = $request->status;
                $data->save();
                return $data->status;
            }


}
