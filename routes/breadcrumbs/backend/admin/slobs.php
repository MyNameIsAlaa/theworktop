<?php

Breadcrumbs::for('admin.slobs.index', function ($trail) {
    $trail->parent('admin.catalogs.index');
});

Breadcrumbs::for('admin.slobs.create', function ($trail) {
    $trail->parent('admin.slobs.index');
});

Breadcrumbs::for('admin.slobs.edit', function ($trail) {
    $trail->parent('admin.slobs.index');
});