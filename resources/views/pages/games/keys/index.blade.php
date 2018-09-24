@extends('theme.master')
@section('page_title', 'Games')
@section('page_heading', $game->name.' Keys')
@section('page_subheading', 'BunchKeys Game Keys')

@section('page_styles')
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="{{url('games')}}"><i class="fa fa-gamepad"></i> Games</a></li>
    <li class="active">Keys</li>
</ol>
@stop()

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">{{$game->name.' Keys'}}</h3>
        <div class="box-tools">
            <a href="{{url('games/'.$game->id.'/keys/upload')}}" class="btn btn-primary">
                Upload Game Keys <i class="fa fa-upload"></i>
            </a>
            <form action="{{url('games/'.$game->id.'/keys/all')}}" class="d-inline-block delete-form" method="post">
                @method('DELETE')
                @csrf
                <input type="hidden" name="id" value="{{$game->id}}">
                <button type="submit" class="btn btn-danger">Delete All Keys</button>
            </form>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Key</th>
                    <th>Is Used</th>
                    <th class="fit">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($game_keys as $key => $game_key)
                <tr>
                    <td>{{$game_key->key}}</td>
                    <td>
                        @if(!$game_key->is_used)
                        <small class="label bg-green">no</small>
                        @else
                        <small class="label bg-red">yes</small>
                        @endif
                    </td>
                    <td>
                        <form action="" method="post" class="d-inline-block delete-form">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$game_key->id}}">
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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