<?php

use SimaoCoutinho\Admin\Controllers\AdminController;

Route::get('calculator', function(){
    echo 'Hello from the calculator package!';
});

Route::get('add/{a}/{b}', [AdminController::class, "add"]);
Route::get('subtract/{a}/{b}', 'Devdojo\Calculator\CalculatorController@subtract');
