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
Route::resource(':version/banner', ':version.Banner');
