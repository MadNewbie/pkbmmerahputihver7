@extends('template.backyard')

@section('page-header')
<?php printf('%s', ucwords($modelName)) ?>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('backyard.home')}}">Home</a></li>
<li class="breadcrumb-item active"><?php printf('%s', ucwords($modelName)) ?>-Ubah</a></li>
@endsection

@section('content')
{!! Form::model($user, ['route' => [$routePrefix.'update', $role->id], 'method' => 'PATCH']) !!}
    @include($routePrefix.'_form')
{!! Form::close() !!}
@endsection