@extends('theme.master')
@section('page_title', 'Packages')
@section('page_heading', 'Packages')
@section('page_subheading', 'BunchKeys Packages')

@section('page_styles')
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('packages')}}"><i class="fa fa-cubes"></i> Packages</a></li>
    <li class="active">Edit</li>
</ol>
@stop()

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Edit Package</h3>
    </div>
    <!-- /.box-header -->
    <form action="{{url('packages')}}" method="POST">
        @csrf
        @method('PUT')
        <div class="box-body">
            <div class="form-group">
                <label for="bundle" class="control-label">Bundle <span class="text-danger">*</span></label>
                <select name="bundle" id="bundle" required class="form-control">
                    <option value="">Please Select</option>
                    @foreach($bundles as $bundle)
                    <option value="{{$bundle->id}}" selected="{{$package->bundle_id == $bundle->id? 'selected': 'false'}}">{{$bundle->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="quantity" class="control-label">Quantity <span class="text-danger">*</span></label>
                <input type="number" name="quantity" class="form-control" required value="{{$package->quantity}}">
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{url('packages')}}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-info pull-right">Submit</button>
        </div>
        <input type="hidden" name="id" value="{{$package->id}}">
    </form>
</div>
<!-- /.box -->
@stop()

@section('page_scripts')
@stop()