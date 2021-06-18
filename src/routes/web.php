<?php

use SimaoCoutinho\Admin\Controllers\AdminController;

Route::get('artisan-migrate', function () {
    $migrator = app('migrator');
    $db = $migrator->resolveConnection(null);
    $migrations = $migrator->getMigrationFiles('../database/migrations');
    $migrator->requireFiles($migrations);
    $queries = [];
    $queriesRaw = '';

    foreach ($migrations as $migration) {
        $migration_name = $migration;
        $migration_name = str_replace('.php', '', $migration_name);
        $migration = $migrator->resolve($migration_name);

        $sqlArray = array_column($db->pretend(function () use ($migration) {
            $migration->up();
        }), 'query');

        $queries[] = [
            'name' => $migration_name,
            'queries' => $sqlArray

        ];

        foreach ($sqlArray as $sql) {
            $queriesRaw .= $sql . ";";
        }
    }

    return response()->json(['migrations' => $queries, 'rawQuery' => $queriesRaw]);
});

Route::group(['middleware' => 'web', 'prefix' => 'admin'], function () {
    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', [AdminController::class, "languages"])->name('admin.languages');
        Route::get('/add', [AdminController::class, "addLanguage"])->name('admin.addLanguage');
        Route::get('/edit/{id}', [AdminController::class, "editLanguage"])->name('admin.editLanguage');
        Route::post('/update', [AdminController::class, "updateLanguage"])->name('admin.updateLanguage');
        Route::post('/delete', [AdminController::class, "deleteLanguage"])->name('admin.deleteLanguage');
    });
});
