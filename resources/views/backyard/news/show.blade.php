@extends('template.backyard')

@section('page-header')
<?php printf('%s', ucwords($modelName)) ?>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('backyard.home')}}">Home</a></li>
<li class="breadcrumb-item active"><?php printf('%s', ucwords($modelName)) ?>-Detil Data</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-12 col-sm-12">
        <h2>{{$news->title}}</h2>
    </div>
    <div class="col-xs-12 col-md-12 col-sm-12">
        <img src="{{$news->thumb_img}}" alt="thumbnail">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        {!!$news->content!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-6 col-sm-2">
        <a class="btn btn-primary" href="{{ URL::previous() }}" style="width:100%">Back</a>
    </div>
</div>
@endsection