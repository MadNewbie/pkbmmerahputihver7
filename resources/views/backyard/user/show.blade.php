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
    <div class="col-xs-12 col-md-4 col-sm-12">
        <div class="form-group">
            <strong>Name: </strong>
            {{ $user->name }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-4 col-sm-12">
        <div class="form-group">
            <strong>Username: </strong>
            {{ $user->username }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-4 col-sm-12">
        <div class="form-group">
            <strong>Email: </strong>
            {{ $user->email }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <strong>Roles:</strong>
            @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                <label class="badge badge-success">{{ $v }}</label>
                @endforeach
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-xs-6 col-sm-2">
        <a class="btn btn-primary" href="{{ URL::previous() }}" style="width:100%">Back</a>
    </div>
</div>
@endsection