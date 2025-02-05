<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Admin Site Router
 */
if(function_exists('admin_prefix')) {
    $prefix = admin_prefix();

    Route::middleware(['web','auth', 'admin'])
    ->name('admin.site')
    ->prefix($prefix.'/site')->group(function () {

            Route::get('/widget', [
                \Jiny\Widgets\Http\Controllers\Admin\AdminWidget::class,
                "index"]);

            Route::get('/widget/type', [
                \Jiny\Widgets\Http\Controllers\Admin\AdminWidgetType::class,
                "index"]);

    });
}

