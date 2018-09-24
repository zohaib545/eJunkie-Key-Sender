@extends('theme.master')
@section('page_title', 'Purchases')
@section('page_heading', 'Purchases')
@section('page_subheading', 'BunchKeys Purchases')

@section('page_styles')
<link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Purchases</li>
</ol>
@stop()

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Purchases</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="datatable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Bundle Name</th>
                    <th>Amount</th>
                    <th>Transaction ID</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($purchases as $purchase)
                <tr>
                    <td>{{$purchase->first_name}}</td>
                    <td>{{$purchase->last_name}}</td>
                    <td>{{$purchase->email}}</td>
                    <td>{{$purchase->bundle_name}}</td>
                    <td>{{$purchase->amount}}</td>
                    <td>{{$purchase->transaction_id}}</td>
                    <td>{{$purchase->created_at}}</td>
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