<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes

    Route::crud('country', 'CountryCrudController');
    Route::crud('state', 'StateCrudController');
    Route::crud('city', 'CityCrudController');
    Route::crud('section', 'SectionCrudController');
    Route::crud('place', 'PlaceCrudController');
//    Route::crud('branch-group', 'BranchGroupCrudController');
    Route::crud('advertisement', 'AdvertisementCrudController');
    Route::crud('place-ad', 'PlaceAdCrudController');
    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response')->name('charts.weekly-users.index');
    Route::crud('section-ad', 'SectionAdCrudController');
}); // this should be the absolute last line of this file