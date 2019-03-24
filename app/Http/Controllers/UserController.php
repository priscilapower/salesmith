<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $user = User::find($id);

            return response($user);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.find', ['value' => 'User']));
            return response(['message' => trans('messages.error.find', ['value' => 'User']), 'status' => 'error']);
        }
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
        try {
            $user = User::find($id)->update($request->all());

            return response(['pool' => $user, 'message' => trans('messages.success.update', ['value' => 'User']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.update', ['value' => 'User']));
            return response(['message' => trans('messages.error.update', ['value' => 'User']), 'status' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            User::destroy($id);

            return response(['message' => trans('messages.success.destroy', ['value' => 'User']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.destroy', ['value' => 'User']));
            return response(['message' => trans('messages.error.destroy', ['value' => 'User']), 'status' => 'error']);
        }
    }
}
