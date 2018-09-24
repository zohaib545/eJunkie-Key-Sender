@extends('theme.master')
@section('page_title', 'Profile')
@section('page_heading', 'Profile')
@section('page_subheading', 'BunchKeys Profile')

@section('page_styles')
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Profile</li>
</ol>
@stop()

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Profile</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{url('profile')}}" method="POST">
        @csrf
        <div class="box-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="form-group">
                <label for="name" class="control-label">Name <span class="text-danger">*</span></label>
                <input value="{{Auth::user()->name}}" type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" placeholder="(Unchanged)">
            </div>
            <div class="form-group">
                <label for="password_confirmation" class="control-label">Confirm Password <span class="text-danger">*</span></label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="(Unchanged)">
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="/" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
    </form>
</div>
<!-- /.box -->
@stop()

@section('page_scripts')
@stop()
