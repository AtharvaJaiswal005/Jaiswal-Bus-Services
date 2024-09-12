@extends('layouts.user-main')

@section('content')

<html>
<div class="card col-md-3">
    <div class="card-header">
        <h1>{{Auth::user()->username}}'s avatar</h1>
    </div>
    <div class="card-body">
        <img id="lund"src="<?php echo Auth::user()->avatar; ?>" alt="" style="width:150px; hieght:auto float:left; border-radius:50%; margin-right:25px">
        <hr>
        <form enctype="multipart/form-data" action="{{ route('avatar_com') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group row-md-3">
                    <input  type="file" name="avatar" id="avatar" placeholder="avatar" style="" required>
                </div>                  
                <div class="form-group row-md-2">
                    <button class="btn btn-primary btn-block " type="submit">Update Avatar</button>
                </div>
            </div>
        </form>
    </div>
</div>
</html>

@endsection