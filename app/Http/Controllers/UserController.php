<?php

namespace App\Http\Controllers;
use App\User;
use App\File;
use App\Work_user;
use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
          public function __construct()
          {
              $this->middleware(['auth','verified'])->except('logout');
          }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $namepage  = 'Users';
            $users = User::where('role' , '=' , 1)->orderBy('created_at', 'desc')->paginate(50);
            return view('dsadmin.users.index', compact('users','namepage'));
    }
    public function indexw()
    {
            $namepage  = 'Users';
            $users = User::where('role' , '=' , 2)->orderBy('created_at', 'desc')->paginate(50);
            return view('dsadmin.users.index', compact('users','namepage'));
    }
    public function indexc()
    {
            $namepage  = 'Users';
            $users = User::where('role' , '=' , 3)->orderBy('created_at', 'desc')->paginate(50);
            return view('dsadmin.users.index', compact('users','namepage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $fromUrl = '/dsadmin/user';
            $namepage  = 'اضافة';$urls  = '/dsadmin/user';
            return view('dsadmin.users.create', compact('fromUrl','namepage','urls'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255|unique:users',
            'email'         => 'required|email|max:200|unique:users',
            'password'      => 'required|max:200|min:8',
            'cpassword'     => 'required|max:200',
            'path'          => 'image|mimes:svg,jpeg,bmp,png,jpg,gif,ico|max:9999|min:1',
            'phone'         => 'max:200',
            'address'       => 'max:200',
            'role'          => 'max:200',
            'status'        => 'max:200'
        ]);
        if($request->password==$request->cpassword){
            if($request->hasFile('path')){
                $file = $request->file('path');
                $storeImg = new File();
                $filenameimg = $storeImg->storeImg($file);
            }else{
                $filenameimg = '';
            }
            $user = new User();
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->password     = Hash::make($request['password']);
            $user->path         = $filenameimg;
            $user->phone        = $request->phone;
            $user->address      = $request->address;
            $user->remember_token = Str::random(60);
            $user->status       = $request ->has('status') ? 1 : 0;
            $user->email_verified_at         = '2022-01-08 00:00:00';
            $user->role         = $request->role;
            $user->user_id      = auth()->user()->id;
            $user->save();
            
            // $user->createToknen('User')->planTextToken;

            if($user->role == 1){    return redirect('/dsadmin/user' )->with('status','OK');   };
            if($user->role == 2){    return redirect('/dsadmin/user/indexw' )->with('status','OK');   };
            if($user->role == 3){    return redirect('/dsadmin/user/indexc' )->with('status','OK');   };
        }
        else
        {
            return back()->with('errors2','كلمة المرور غير متطابقة');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $namepage  = 'Show';
        $users = Work_user::where('user_id_w' , $id)->orWhere('user_id_c' , $id)->orderBy('id', 'desc')->paginate(50);
        return view('dsadmin.users.show', compact('users','namepage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $user = User::find($id);
            $fromUrl = '/dsadmin/user/' . $user->id;
            $namepage  = 'Edit';$urls  = '/dsadmin/user';
            return view('dsadmin.users.create', compact('user','fromUrl','namepage','urls'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'email'         => 'required|email|max:200',
            'oldpassword'   => 'required|max:200|min:8',
            'password'      ,
            'cpassword'     ,
            'path'          => 'image|mimes:svg,jpeg,bmp,png,jpg,gif,ico|max:9999|min:1',
            'oldpath'       => 'max:255',
            'phone'         => 'max:200',
            'address'       => 'max:200',
            'role'          => 'max:200',
            'status'        => 'max:200'
        ]);
        $path = $request->oldpath;
        if($request->hasFile('path') && $request->password==$request->cpassword){
                if (Storage::delete('public/images/' . $path) && Storage::delete('public/thumbnails/' . $path)) {
                    $file = $request->file('path');
                    $storeImg = new File();
                    $filenameimg = $storeImg->storeImg($file);
                } else {
                    $file = $request->file('path');
                    $storeImg = new File();
                    $filenameimg = $storeImg->storeImg($file);
                }
            
        }else{
            $filenameimg = $request->oldpath;
        }

        if($request->password!=""){
            if($request->password==$request->cpassword){
                $user = User::find($id);
                $user->name         = $request->name;
                $user->email        = $request->email;
                $user->password     = Hash::make($request['password']);
                $user->path         = $filenameimg;
                $user->phone        = $request->phone;
                $user->address      = $request->address;
                $user->status       = $request ->has('status') ? 1 : 0;
                $user->role         = $request->role;
                $user->save();

                if($user->role == 1){    return redirect('/dsadmin/user' )->with('status','OK');   };
                if($user->role == 2){    return redirect('/dsadmin/user/indexw' )->with('status','OK');   };
                if($user->role == 3){    return redirect('/dsadmin/user/indexc' )->with('status','OK');   };
            }
            else
            {
                return back()->with('errors2','كلمة المرور غير متطابقة');
            }
        }
        else{
            $user = User::find($id);
            $user->name         = $request->name;
            $user->email        = $request->email;
            $user->password     = $request->oldpassword;
            $user->path         = $filenameimg;
            $user->phone        = $request->phone;
            $user->address      = $request->address;
            $user->status       = $request ->has('status') ? 1 : 0;
            $user->role         = $request->role;
            $user->save();

            if($user->role == 1){    return redirect('/dsadmin/user' )->with('status','OK');   };
            if($user->role == 2){    return redirect('/dsadmin/user/indexw' )->with('status','OK');   };
            if($user->role == 3){    return redirect('/dsadmin/user/indexc' )->with('status','OK');   };
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $user = User::find($id);
            $user->delete();
            return redirect('/dsadmin/user')->with('errors2','تم الحذف');
    }

}
