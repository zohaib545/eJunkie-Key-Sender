@extends('theme.master')
@section('page_title', 'Downloads')
@section('page_heading', 'Downloads')
@section('page_subheading', 'BunchKeys Downloads')

@section('page_styles')
@stop()

@section('breadcrumbs')
<ol class="breadcrumb">
    <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Downloads</li>
</ol>
@stop()

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Download Unused Codes</h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('downloads/game-keys')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="game" class="control-label">Game <span class="text-danger">*</span></label>
                        <select name="game" id="game" required class="form-control">
                            <option value="">Please Select</option>
                            @foreach($games as $game)
                            <option value="{{$game->id}}">{{$game->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Download Customer Emails</h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('downloads/emails')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="bundle" class="control-label">Bundle <span class="text-danger">*</span></label>
                        <select name="bundle" id="bundle" required class="form-control">
                            <option value="">Please Select</option>
                            @foreach($bundles as $bundle)
                            <option value="{{$bundle->id}}">{{$bundle->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Download Keys</h3>
            </div>
            <!-- /.box-header -->
            <form action="{{url('downloads/game-keys-limited')}}" method="POST">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="game" class="control-label">Game <span class="text-danger">*</span></label>
                        <select name="game" id="game" required class="form-control">
                            <option value="">Please Select</option>
                            @foreach($games as $game)
                            <option value="{{$game->id}}">{{$game->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity" class="control-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div>
            </form>
        </div>
        <!-- /.box -->
    </div>
</div>

@stop()

@section('page_scripts')
@stop()