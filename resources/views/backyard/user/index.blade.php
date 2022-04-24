<?php
use Illuminate\Support\Facades\Auth;
// dd(Auth::user()->getPermissionsViaRoles(), Auth::user()->getAllPermissions(), Auth::user()->can([$routePrefix."destroy"]));
$isPrivilege = Auth::user()->can([
    $routePrefix."create",
    $routePrefix."edit",
    $routePrefix."destroy"
]);
?>

@extends('template.backyard')

@section('page-header')
<?php printf('%s', ucwords($modelName)) ?>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('backyard.home')}}">Home</a></li>
<li class="breadcrumb-item active"><?php printf('%s', ucwords($modelName)) ?>-Index</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped" id="<?=$modelName?>-table" width="100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <?php if($isPrivilege):?>
                            <th class="text-right">
                                <?php if(Auth::user()->can($routePrefix."create")): ?>
                                <a href="<?= route($routePrefix."create")?>" title="Create" class="btn btn-sm btn-success">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <?php endif; ?>
                            </th>
                        <?php endif;?>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js-inline-data')
window['_userIndexData'] = <?= json_encode([
    'routeIndexData' => route($routePrefix.'index.data'),
    'routeDestroyData' => route($routePrefix.'destroy', 999),
    'isPrivilege' => $isPrivilege,
])?>;
@endsection

@section('js-include')
<script src="<?= asset('js/backyard/user/index.js') ?>"></script>
@endsection