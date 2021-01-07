<?php

Breadcrumbs::for('admin.wholesalers.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.wholesalers.manage'), route('admin.wholesalers.index'));
});

Breadcrumbs::for('admin.wholesalers.create', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('labels.backend.wholesalers.create'), route('admin.wholesalers.create'));
});

Breadcrumbs::for('admin.wholesalers.edit', function ($trail) {
    $trail->parent('admin.dashboard');
});