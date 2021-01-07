<?php

Breadcrumbs::for('admin.catalogs.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.catalogs.manage'), route('admin.catalogs.index'));
});

Breadcrumbs::for('admin.catalogs.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.catalogs.create'), route('admin.catalogs.create'));
});

Breadcrumbs::for('admin.catalogs.edit', function ($trail) {
    $trail->parent('admin.dashboard');
});