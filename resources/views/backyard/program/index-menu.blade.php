<?php

?>

@if($model->isPublicNo())
@can($routePrefix.'public.yes')
<a class="btn btn-sm btn-success btn-index-menu" title="Publikasi" href="<?= route($routePrefix.'public.yes', $model->id) ?>">
    <i class="far fa-eye"></i>
</a>
@endcan
@endif

@if($model->isPublicYes())
@can($routePrefix.'public.no')
<a class="btn btn-sm btn-danger btn-index-menu" title="Tidak dipublikasi" href="<?= route($routePrefix.'public.no', $model->id) ?>">
    <i class="far fa-eye-slash"></i>
</a>
@endcan
@endif

@can($routePrefix.'edit')
<a class="btn btn-sm btn-warning btn-index-menu" title="Edit" href="<?= route($routePrefix.'edit', $model->id) ?>">
    <i class="fas fa-edit"></i>
</a>
@endcan

@can($routePrefix.'destroy')
<button data-id="<?= $model->id ?>" class="btn btn-sm btn-danger btn-destroy btn-index-menu" title="Delete">
    <i class="fas fa-trash"></i>
</button>
@endcan