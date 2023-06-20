<?php

namespace App\Http\Controllers;

use App\Mainsettings;
use Illuminate\Http\Request;

class MainsettingsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mainsettings  $mainsettings
     * @return \Illuminate\Http\Response
     */
    public function show(Mainsettings $mainsettings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mainsettings  $mainsettings
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $namepage  = 'الإعدادات الرئيسية / التعديل';$urls  = '/dsadmin/mainsetting/edit';
        $mainsetting = Mainsettings::find(1);
        return view('dsadmin.mainsettings.edit', compact('namepage','urls','mainsetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mainsettings  $mainsettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'          => 'required',
            'phone'         => 'required|max:11',
            'phone2'        => 'max:11',
            'email'         => 'required|max:500',
            'description'   => 'required',
            'keywords'      => 'required',
            'address'       => 'required|max:500',
            'address2'      => 'max:500'
        ]);
        $mainsetting = Mainsettings::find($id);
        $mainsetting->name          = $request->name;
        $mainsetting->phone         = $request->phone;
        $mainsetting->phone2        = $request->phone2;
        $mainsetting->email         = $request->email;
        $mainsetting->description   = $request->description;
        $mainsetting->keywords      = $request->keywords;
        $mainsetting->address       = $request->address;
        $mainsetting->address2      = $request->address2;
        $mainsetting->save();
        return back()->with('status', 'تم التعديل');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mainsettings  $mainsettings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mainsettings $mainsettings)
    {
        //
    }
}
