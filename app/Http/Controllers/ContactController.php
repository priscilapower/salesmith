<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact = Contact::all();
        return response($contact);
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
            $contact = Contact::create($request->all());
            return response(['pool' => $contact, 'message' => trans('messages.success.store', ['value' => 'Contact']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.store', ['value' => 'Contact']));
            return response(['message' => trans('messages.error.store', ['value' => 'Contact']), 'status' => 'error']);
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
            $contact = Contact::find($id);

            return response($contact);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.find', ['value' => 'Contact']));
            return response(['message' => trans('messages.error.find', ['value' => 'Contact']), 'status' => 'error']);
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
            $contact = Contact::find($id)->update($request->all());

            return response(['pool' => $contact, 'message' => trans('messages.success.update', ['value' => 'Contact']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.update', ['value' => 'Contact']));
            return response(['message' => trans('messages.error.update', ['value' => 'Contact']), 'status' => 'error']);
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
            Contact::destroy($id);

            return response(['message' => trans('messages.success.destroy', ['value' => 'Contact']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.destroy', ['value' => 'Contact']));
            return response(['message' => trans('messages.error.destroy', ['value' => 'Contact']), 'status' => 'error']);
        }
    }
}
