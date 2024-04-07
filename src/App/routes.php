<?php

use App\Controllers\QuizController;
use Framework\Router;
use Framework\View;

/*
|--------------------------------------------------------------------------
| Routes
|--------------------------------------------------------------------------
|
| Ovdje možemo registrirati rute za aplikaciju.
| 
| Prvi argument Router::get i Router::post je url kojeg želimo registrirati
| Drugi argument je ili funkcija koju želimo pokrenuti kad se ruta posjeti,
| ili array [ImeControllera::class, 'imeFunkcijeUControlleru'].
| 
| Možemo postaviti dinamičke parametre sa :imeParametara. Parametri se šalju
| u funkciju redosljedom kojim su ispisani.
|
*/



Router::get('/test', function () {
    return View::render('testView');
});

Router::get('/test/:parametar', function ($parametar) {
    echo "<h1>$parametar</h1>";
});

Router::get('/', [QuizController::class, 'index']);
Router::get('/quiz/create', [QuizController::class, 'createForm']);
Router::get('/quiz/edit/:id', [QuizController::class, 'editForm']);
Router::get('/quiz/result/:id', [QuizController::class, 'result']);
Router::get('/quiz/:id', [QuizController::class, 'show']);
Router::get('/404', function () {
    View::render('404');
});

Router::post('/quiz/create', [QuizController::class, 'create']);
Router::post('/quiz/edit/:id', [QuizController::class, 'edit']);
Router::post('/quiz/delete/:id', [QuizController::class, 'delete']);
