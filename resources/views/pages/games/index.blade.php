@extends('theme.master')
@section('page_title', 'Games')
@section('page_heading', 'Games')
@section('page_subheading', 'BunchKeys Games')

@section('page_styles')
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Games</li>
</ol>
@stop()

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Games</h3>
        <div class="box-tools">
            <a href="{{url('games/create')}}" class="btn btn-primary">
                Add New Game <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Total Keys</th>
                    <th>Unused Keys</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($games as $game_key => $game)
                <tr>
                    <td>{{$game->name}}</td>
                    <td>{{$game->keys_count != null? $game->keys_count->count: 0}}</td>
                    <td>{{$game->unused_keys_count != null? $game->unused_keys_count->count: 0}}</td>
                    <td>{{$game->created_at}}</td>
                    <td class="fit">
                        <a href="{{url('games/'.$game->id.'/keys')}}" class="btn btn-primary">Manage Keys</a>
                        <a href="{{url('games/'.$game->id.'/edit')}}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>
                        <form action="" method="post" class="d-inline-block delete-form">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$game->id}}">
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