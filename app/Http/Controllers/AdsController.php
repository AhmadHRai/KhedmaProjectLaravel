<?php

namespace App\Http\Controllers;

use App\ads;
use App\File;
use Illuminate\Http\Request;

class AdsController extends Controller
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
        $namepage  = 'Ads';
        $adss = Ads::where('type' , '<=' , 2)->orderBy('orders', 'desc')->orderBy('created_at', 'desc')->paginate(50);
        return view('dsadmin.ads.index', compact('adss','namepage'));
    }
    // abute
    public function indexabute()
    {
        $namepage  = 'About Us';
        $adss = Ads::where('type' , 3)->orderBy('orders', 'desc')->orderBy('created_at', 'desc')->paginate(50);
        return view('dsadmin.ads.index', compact('adss','namepage'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fromUrl = '/dsadmin/ads';
        $namepage  = 'Add';$urls  = '/dsadmin/ads';
        return view('dsadmin.ads.create', compact('fromUrl','namepage','urls'));
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
            'title'          => 'required',
            'body'           => 'required',
            'img_path'       ,
            'oldpath'       ,
            'orders'         ,
            'type'           => 'required'
        ]);

        if($request->hasFile('img_path')){
            $file = $request->file('img_path');
            $storeImg = new File();
            $filenameimg = $storeImg->storeImg($file);
        }else{
            $filenameimg = $request->oldpath;
        }
        $ads = new Ads();
        $ads->title         = $request->title;
        $ads->body          = $request->body;
        $ads->img_path          = $filenameimg;
        $ads->orders        = $request->orders;
        $ads->type          = $request->type;
        $ads->status        = $request ->has('status') ? 1 : 0;
        $ads->user_id       = auth()->user()->id;
        $ads->save();

        if ($request->type == 3) {
            return redirect('/dsadmin/ads/abute' )->with('status','OK');
        } else {
            return redirect('/dsadmin/ads' )->with('status','OK');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show(ads $ads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fromUrl = '/dsadmin/ads/' . $id;
        $namepage  = 'Edit';$urls  = '/dsadmin/ads';
        $ads = Ads::find($id);
        return view('dsadmin.ads.create', compact('fromUrl','namepage','urls','ads'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title'          => 'required',
            'body'           => 'required',
            'img_path'       ,
            'oldpath'       ,
            'orders'         ,
            'type'           => 'required'
        ]);

        if($request->hasFile('img_path')){
            $file = $request->file('img_path');
            $storeImg = new File();
            $filenameimg = $storeImg->storeImg($file);
        }else{
            $filenameimg = $request->oldpath;
        }
        $ads = Ads::find($id);
        $ads->title         = $request->title;
        $ads->body          = $request->body;
        $ads->img_path      = $filenameimg;
        $ads->orders        = $request->orders;
        $ads->type          = $request->type;
        $ads->status        = $request ->has('status') ? 1 : 0;
        $ads->save();

        if ($request->type == 3) {
            return redirect('/dsadmin/ads/abute' )->with('status','OK');
        } else {
            return redirect('/dsadmin/ads' )->with('status','OK');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ads = Ads::find($id);
        $ads->delete();
        return back()->with('status', 'تم الحذف');
    }
}
