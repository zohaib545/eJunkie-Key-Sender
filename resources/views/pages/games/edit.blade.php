@extends('theme.master')
@section('page_title', 'Games')
@section('page_heading', 'Games')
@section('page_subheading', 'BunchKeys Games')

@section('page_styles')
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('games')}}"><i class="fa fa-gamepad"></i> Games</a></li>
    <li class="active">Edit</li>
</ol>
@stop()

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Game</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{url('games')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label for="name" class="control-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" required value="{{$game->name}}">
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{url('games')}}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
        <input type="hidden" name="id" value="{{$game->id}}">
    </form>
</div>
<!-- /.box -->
@stop()

@section('page_scripts')
@stop()