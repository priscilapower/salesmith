<?php

namespace App\Http\Controllers;

use App\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pools = Pool::all();
        return response($pools);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $pool = Pool::create($request->all());
            return response(['pool' => $pool, 'message' => trans('messages.success.store', ['value' => 'Pool']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.store', ['value' => 'Pool']));
            return response(['message' => trans('messages.error.store', ['value' => 'Pool']), 'status' => 'error']);
        }
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
            $pool = Pool::find($id);

            return response($pool);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.find', ['value' => 'Pool']));
            return response(['message' => trans('messages.error.find', ['value' => 'Pool']), 'status' => 'error']);
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
            $pool = Pool::find($id)->update($request->all());
            return response(['pool' => $pool, 'message' => trans('messages.success.update', ['value' => 'Pool']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.update', ['value' => 'Pool']), ['message' => $e->getMessage()]);
            return response(['message' => trans('messages.error.update', ['value' => 'Pool']), 'status' => 'error']);
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
            Pool::destroy($id);

            return response(['message' => trans('messages.success.destroy', ['value' => 'Pool']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.destroy', ['value' => 'Pool']));
            return response(['message' => trans('messages.error.destroy', ['value' => 'Pool']), 'status' => 'error']);
        }
    }
}
