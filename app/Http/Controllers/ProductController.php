<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return response($product);
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
            $product = Product::create($request->all());
            return response(['pool' => $product, 'message' => trans('messages.success.store', ['value' => 'Product']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.store', ['value' => 'Product']));
            return response(['message' => trans('messages.error.store', ['value' => 'Product']), 'status' => 'error']);
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
            $product = Product::find($id);

            return response($product);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.find', ['value' => 'Product']));
            return response(['message' => trans('messages.error.find', ['value' => 'Product']), 'status' => 'error']);
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
            $product = Product::find($id)->update($request->all());

            return response(['pool' => $product, 'message' => trans('messages.success.update', ['value' => 'Product']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.update', ['value' => 'Product']));
            return response(['message' => trans('messages.error.update', ['value' => 'Product']), 'status' => 'error']);
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
            Product::destroy($id);

            return response(['message' => trans('messages.success.destroy', ['value' => 'Product']), 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error(trans('messages.error.destroy', ['value' => 'Product']));
            return response(['message' => trans('messages.error.destroy', ['value' => 'Product']), 'status' => 'error']);
        }
    }
}
