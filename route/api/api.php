<?php

use think\facade\Route;

/**
 * index    =>      blog                GET
 * create   =>      blog/create         GET
 * save     =>      blog                POST
 * read     =>      blog/:id            GET
 * edit     =>      blog/:id/edit       GET
 * update   =>      blog/:id            PUT
 * delete   =>      blog/:id            DELETE
 */
Route::resource(':version/banner', ':version.Banner')->only(['read']);
Route::resource(':version/theme', ':version.Theme')->only(['index', 'read']);
Route::resource(':version/category', ':version.Category')->only(['index']);
Route::get(':version/product/by_category', ':version.Product/by_category');
Route::get(':version/product/recent', ':version.Product/recent');
