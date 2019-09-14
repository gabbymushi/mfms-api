<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heir;

class HeirController extends Controller
{
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
        $model = new Heir();
        $model->first_name = $request->input('first_name');
        $model->middle_name = $request->input('middle_name');
        $model->last_name = $request->input('last_name');
        $model->gender = $request->input('gender');
        $model->birthday = $request->input('birthday');
        $model->phone_no = $request->input('phone_no');
        $model->phone_no_2 = $request->input('phone_no_2');
        $model->email = $request->input('email');
        $model->address = $request->input('address');
        $model->residence = $request->input('residence');
        $model->member_id = $request->input('member_id');
        $model->business = $request->input('business');
        $model->relation = $request->input('relation');
        $model->save();
        return $model;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
