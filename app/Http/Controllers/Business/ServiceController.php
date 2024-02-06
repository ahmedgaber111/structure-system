<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    public function index()
    {
        $business = Business::where('user_id',Auth::id())->first();
        $services = services::where('business_id',$business->id)->paginate(10);
        return response()->json($services);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'price' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $business = Business::where('user_id',Auth::id())->first();
        $service = new services();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->business_id = $business->id;
        $service->save();
        return response()->json('service is added');
    }

    public function update($id, Request $request)
    {
        $service = services::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'price' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->save();
        return response()->json('service is updated');
    }

    public function destroy($id)
    {
        $service = services::findOrFail($id);
        $service->delete();
        return response()->json('service is deleted');
    }

}