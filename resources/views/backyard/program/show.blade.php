@extends('template.backyard')

@section('page-header')
<?php printf('%s', ucwords($modelName)); ?>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('backyard.home')}}">Home</a></li>
<li class="breadcrumb-item active"><?php printf('%s', ucwords($modelName)) ?>-Detil Data</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12 col-sm-12">
        <h2>{{$model->title}}</h2>
    </div>
    <div class="container">
        <div class="row mb-3">
            @if(isset($model->materi_path))
            <div class="col-xs-6 col-md-6 col-sm-6">
                <a href="{{$model->materi_path}}" class="btn btn-primary">Download Contoh Materi</a>
            </div>
            @else
            <div class="col-xs-6 col-md-6 col-sm-6">
                <h4>Belum ada file contoh materi</h4>
            </div>
            @endif
            @if(isset($model->schedule_path))
            <div class="col-xs-6 col-md-6 col-sm-6">
                <a href="{{$model->schedule_path}}" class="btn btn-primary">Download Contoh Materi</a>
            </div>
            @else
            <div class="col-xs-6 col-md-6 col-sm-6">
                <h4>Belum ada file jadwal kelas</h4>
            </div>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-md-12 col-sm-12">
        <img src="{{$model->thumb_img}}" alt="thumbnail" width="300px">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!!$model->description!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-6 col-sm-2">
        <a class="btn btn-primary" href="{{ URL::previous() }}" style="width:100%">Back</a>
    </div>
</div>
@endsection