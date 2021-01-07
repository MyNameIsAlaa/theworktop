<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});


Breadcrumbs::for('supplier.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('supplier.dashboard'));
});


Breadcrumbs::for('supplier.quotes', function ($trail) {
    $trail->push(__('strings.backend.quotes.title'), route('supplier.quotes'));
});

Breadcrumbs::for('supplier.viewQuote', function ($trail) {
    $trail->push(__('strings.backend.quotes.title'), route('supplier.quotes'));
});



require __DIR__ . '/auth.php';
require __DIR__ . '/admin/wholesalers.php';
require __DIR__ . '/admin/catalogs.php';
require __DIR__ . '/admin/slobs.php';
require __DIR__ . '/log-viewer.php';
