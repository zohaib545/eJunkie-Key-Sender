@extends('theme.master')
@section('page_title', 'Bundles')
@section('page_heading', 'Bundles')
@section('page_subheading', 'BunchKeys Bundles')

@section('page_styles')
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Bundles</li>
</ol>
@stop()

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Bundles</h3>
        <div class="box-tools">
            <a href="{{url('bundles/create')}}" class="btn btn-primary">
                Add New Bundle <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Sold</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bundles as $bundle)
                <tr>
                    <td>{{$bundle->id}}</td>
                    <td>{{$bundle->name}}</td>
                    <td>{{$bundle->bundles_sold}}</td>
                    <td>{{$bundle->created_at}}</td>
                    <td class="fit">
                        <a href="{{url('bundles/'.$bundle->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <form action="" method="post" class="d-inline-block delete-form">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$bundle->id}}">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@stop()

@section('page_scripts')
<script src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $('#datatable').DataTable();
</script>
@stop()