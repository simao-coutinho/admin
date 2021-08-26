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

Route::post("confirmSeoUrl", function (\Illuminate\Http\Request $request) {
    $url_alias = trim($request->input('url_alias'));

    if (empty($url_alias)) {
        return response()->json(['status' => false, "msg" => "O campo vazio invalida a Url Amigável"]);
    }
    if(preg_match('/^[a-z][-a-z0-9]*$/', $url_alias)){
        if (SeoUrl::whereUrl($url_alias)->exists()) {
            return response()->json(['status' => false, "msg" => "Esta Url Amigável já existe"]);
        } else {
            return response()->json(['status' => true]);
        }
    } else {
        return response()->json(['status' => false, "msg" => "Esta Url Amigável não é válida"]);
    }
})->name('confirmSeoUrl');


