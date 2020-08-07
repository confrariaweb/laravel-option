<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Option\Controllers')
    ->group(function () {

        Route::name('options.')
            ->prefix('options')
            ->group(function () {

                Route::name('groups.')
                    ->prefix('groups')
                    ->group(function () {
                        Route::get('trashed', 'OptionGroupController@trashed')->name('trashed');
                    });
                Route::resource('groups', 'OptionGroupController');

                Route::get('trashed', 'OptionController@trashed')->name('trashed');

            });

        Route::resource('options', 'OptionController');

    });
