@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Business</h4> 
        </div>
        <div class="card-body">
            <form action="{{ route('business-update',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group">
                    <div class="col-sm-10">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$business->name}}">
                    </div>
                </div>
                    <div class="form-group">
                    <div class="col-sm-10">
                        <label>{{$user->name}}</label>
                        <input type="text" class="form-control" name="user_id" value="{{$user->id}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <label>Opening Hours</label>
                        <input type="text" class="form-control" name="opening_hours" value="{{$business->opening_hours}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </form>
            </div>        
    </div>
@endsection