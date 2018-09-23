@extends('theme.master')
@section('page_title', 'Game Keys')
@section('page_heading', 'Game Keys')
@section('page_subheading', 'Add Game Keys')

@section('page_styles')
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('games')}}"><i class="fa fa-gamepad"></i> Games</a></li>
    <li><a href="{{url('games/'.$game->id.'/keys')}}"><i class="fa fa-key"></i> Keys</a></li>
    <li class="active">Upload</li>
</ol>
@stop()

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Add Keys</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{url('keys')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="keys" class="control-label">Keys File <span class="text-danger">*</span></label>
                <input type="file" name="keys" class="form-control" accept="text/plain" required>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
        <input type="hidden" name="game_id" value="{{$game->id}}">
    </form>
</div>
<!-- /.box -->
@stop()

@section('page_scripts')
@stop()