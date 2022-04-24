@extends('template.backyard')

@section('page-header')
<?php printf('%s', ucwords($modelName)) ?>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('backyard.home')}}">Home</a></li>
<li class="breadcrumb-item active"><?php printf('%s', ucwords($modelName)) ?>-Tambah</a></li>
@endsection

@section('content')
{!! Form::open(['route' => $routePrefix.'store', 'method' => 'POST']) !!}
    @include('backyard.role._form')
{!! Form::close() !!}
@endsection