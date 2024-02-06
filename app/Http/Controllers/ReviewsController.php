<?php

namespace App\Http\Controllers;

use App\Models\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewsController extends Controller
{
    public function index()
    {
        $reviews = reviews::paginate(10);
        return response()->json($reviews);
    }

    public function business_review($id)
    {
        $reviews = reviews::where('business_id',$id)->paginate(10);
        return response()->json($reviews);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'review' => 'required',
            'stars' => 'required',
            'business_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $review = new reviews();
        $review->review = $request->review;
        $review->stars = $request->stars;
        $review->business_id = $request->business_id;
        $review->user_id = Auth::id();
        $review->save();
        return response()->json('review is added');
    }

    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'review' => 'required',
            'stars' => 'required',
            'business_id'=>'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $review = reviews::findOrFail($id);
        $review->review = $request->review;
        $review->stars = $request->stars;
        $review->business_id = $request->business_id;
        $review->user_id = Auth::id();
        $review->save();
        return response()->json('review is updated');
    }
    
    public function destroy($id)
    {
        $review = reviews::findOrFail($id);
        $review->delete();
        return response()->json('review is deleted');
    }
}