<?php

namespace App\Http\Controllers;

use App\Type_job;
use App\File;
use Illuminate\Http\Request;

class TypeJobController extends Controller
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
        $namepage  = 'Jops';
        $type_jobs = Type_job::paginate(50);
        return view('dsadmin.type_jobs.index', compact('type_jobs','namepage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fromUrl = '/dsadmin/type_jobs';
        $namepage  = 'Add';$urls  = '/dsadmin/type_jobs';
        return view('dsadmin.type_jobs.create', compact('fromUrl','namepage','urls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('path')){
            $file = $request->file('path');
            $storeImg = new File();
            $filenameimg = $storeImg->storeImg($file);
        }else{
            $filenameimg = $request->oldpath;
        }
        $type_job = new Type_job();
        $type_job->name         = $request->name;
        $type_job->path     = $filenameimg;
        $type_job->save();

        return redirect('/dsadmin/type_jobs' )->with('status','OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type_job  $type_job
     * @return \Illuminate\Http\Response
     */
    public function show(Type_job $type_job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type_job  $type_job
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fromUrl = '/dsadmin/type_jobs/' . $id;
        $namepage  = 'Edit';$urls  = '/dsadmin/type_jobs';
        $type_job = Type_job::find($id);
        return view('dsadmin.type_jobs.create', compact('fromUrl','namepage','urls','type_job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type_job  $type_job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if($request->hasFile('path')){
            $file = $request->file('path');
            $storeImg = new File();
            $filenameimg = $storeImg->storeImg($file);
        }else{
            $filenameimg = $request->oldpath;
        }
        $type_job = Type_job::find($id);
        $type_job->name         = $request->name;
        $type_job->path      = $filenameimg;
        $type_job->save();

        return redirect('/dsadmin/type_jobs' )->with('status','OK');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type_job  $type_job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_job = Type_job::find($id);
        $type_job->delete();
        return back()->with('status', 'تم الحذف');
    }
}
