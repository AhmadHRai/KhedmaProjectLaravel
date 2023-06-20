<?php

namespace App\Http\Controllers;

use App\Msg;
use Illuminate\Http\Request;

class MsgController extends Controller
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
        $namepage  = 'Msg';
        $msgs = Msg::orderBy('created_at', 'desc')->paginate(50);
        return view('dsadmin.msgs.index', compact('msgs','namepage'));
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
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $msg = Msg::find($id);
        $msg->cases      = 0;
        $msg->save();
        $msg = Msg::find($id);
        // dd($msg);
        return view('dsadmin.msgs.show', compact('msg'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function edit(Msg $msg)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Msg $msg)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Msg  $msg
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $msg = Msg::find($id);
        $msg->delete();
        return back()->with('status', 'تم الحذف');
    }
}
