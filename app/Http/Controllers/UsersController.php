<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\User;
use JWTFactory;
use JWTAuth;
use Validator;
use Response;
use App\Models\Employee;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($group_id)
    {
        $members = Member::where('group_id',$group_id)->get();
        return response()->json($members);
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
//        $validator = Validator::make($request->all(), [
//            'name' => 'required|string|max:191',
//            'email' => 'required|string|email|max:255',
//            'password'=> 'required'
//        ]);
//        if ($validator->fails()) {
//            return response()->json($validator->errors());
//        }
        $user = new User([
            'name' => $request->input('first_name'),
            'email' => $request->input('email'),
            'password' => bcrypt(strtoupper($request->input('last_name'))),
            'user_type' => 'member',
            'group_id' => $request->input('group_id')

        ]);
        $user->save();
        $this->storeMemberDetails($user->user_id,$request);
       // return response()->json('Successfully added');
        //$user = User::first();
        //$token = JWTAuth::fromUser($user);

        return Response::json($user->user_id);
    }
private function storeMemberDetails($user_id,$request){
    $model = new Member();
    $model->first_name = $request->input('first_name');
    $model->middle_name = $request->input('middle_name');
    $model->last_name = $request->input('last_name');
    $model->gender = $request->input('gender');
    $model->birthday = $request->input('birthday');
    $model->user_id = $user_id;
    $model->phone_no = $request->input('phone_no');
    $model->phone_no_2 = $request->input('phone_no_2');
    $model->email = $request->input('email');
    $model->address = $request->input('address');
    $model->residence = $request->input('residence');
    $model->profile_picture = $request->input('profile_picture');
    $model->group_id = $request->input('group_id');
    $model->save();

}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($member_id)
    {
        $member = Member::where(['member_id' => $member_id])->get();
        return Response::json($member);
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
