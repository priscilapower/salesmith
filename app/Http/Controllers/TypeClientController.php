<?php

namespace App\Http\Controllers;

use App\TypeClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TypeClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeClient = TypeClient::all();
        return response($typeClient);
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
            $typeClient = TypeClient::create($request->all());
            return response(['pool' => $typeClient, 'message' => trans('messages.success.store', ['value' => 'TypeClient']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.store', ['value' => 'TypeClient']));
            return response(['message' => trans('messages.error.store', ['value' => 'TypeClient']), 'status' => 'error']);
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
            $typeClient = TypeClient::find($id);

            return response($typeClient);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.find', ['value' => 'TypeClient']));
            return response(['message' => trans('messages.error.find', ['value' => 'TypeClient']), 'status' => 'error']);
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
            $typeClient = TypeClient::find($id)->update($request->all());

            return response(['pool' => $typeClient, 'message' => trans('messages.success.update', ['value' => 'TypeClient']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.update', ['value' => 'TypeClient']));
            return response(['message' => trans('messages.error.update', ['value' => 'TypeClient']), 'status' => 'error']);
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
            TypeClient::destroy($id);

            return response(['message' => trans('messages.success.destroy', ['value' => 'TypeClient']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.destroy', ['value' => 'TypeClient']));
            return response(['message' => trans('messages.error.destroy', ['value' => 'TypeClient']), 'status' => 'error']);
        }
    }
}
