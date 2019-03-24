<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return response($client);
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
            $client = Client::create($request->all());
            return response(['pool' => $client, 'message' => trans('messages.success.store', ['value' => 'Client']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.store', ['value' => 'Client']));
            return response(['message' => trans('messages.error.store', ['value' => 'Client']), 'status' => 'error']);
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
            $client = Client::find($id);

            return response($client);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.find', ['value' => 'Client']));
            return response(['message' => trans('messages.error.find', ['value' => 'Client']), 'status' => 'error']);
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
            $client = Client::find($id)->update($request->all());

            return response(['pool' => $client, 'message' => trans('messages.success.update', ['value' => 'Client']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.update', ['value' => 'Client']));
            return response(['message' => trans('messages.error.update', ['value' => 'Client']), 'status' => 'error']);
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
            Client::destroy($id);

            return response(['message' => trans('messages.success.destroy', ['value' => 'Client']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.destroy', ['value' => 'Client']));
            return response(['message' => trans('messages.error.destroy', ['value' => 'Client']), 'status' => 'error']);
        }
    }
}
