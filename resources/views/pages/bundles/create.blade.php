@extends('theme.master')
@section('page_title', 'Bundles')
@section('page_heading', 'Bundles')
@section('page_subheading', 'BunchKeys Bundles')

@section('page_styles')
<link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('bundles')}}"><i class="fa fa-archive"></i> Bundles</a></li>
    <li class="active">Create</li>
</ol>
@stop()

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Add Bundle</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{url('bundles')}}" method="POST">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label for="name" class="control-label">Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="games[]" class="control-label">Games</label>
                <select multiple type="text" name="games[]" class="form-control select2" data-placeholder="Select Games" required>
                    @foreach($games as $game)
                    <option value="{{$game->id}}">{{$game->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="reset" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
    </form>
</div>
<!-- /.box -->
@stop()

@section('page_scripts')
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script>
    $('.select2').select2()
</script>
@stop()