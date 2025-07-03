<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Livewire\ObjetivosDesarrolloSostenible;
use App\Livewire\Facultades;
use App\Livewire\Estudiantes;
use App\Livewire\Docentes;
use App\Livewire\Proyectos;
use App\Livewire\Noticias;
use App\Livewire\NoticiasForm;
use App\Models\Noticias as NoticiaModel;
use App\Http\Controllers\NoticiasUploadController;
use App\Livewire\Documentos;
use App\Http\Controllers\ResponsabilidadSocialController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rutas para nuevas oficinas y vistas con controladores para mostrar noticias y documentos
Route::get('/proyeccion-social', [\App\Http\Controllers\ProyeccionSocialController::class, 'index'])->name('proyeccion.social');
Route::get('/seguimiento-egresado', [\App\Http\Controllers\SeguimientoEgresadoController::class, 'index'])->name('seguimiento.egresado');
Route::get('/extension-universitaria', [\App\Http\Controllers\ExtensionUniversitariaController::class, 'index'])->name('extension.universitaria');


// Vista informativa de Responsabilidad Social
// Route::get('/responsabilidad-social', function () {
//     return view('responsabilidad-social');
// })->name('responsabilidad.social');
Route::get('/responsabilidad-social', [ResponsabilidadSocialController::class, 'index'])
    ->name('responsabilidad.social');

// vista del dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/overview-1', [DashboardController::class, 'overview1'])->name('overview1');
    Route::get('/overview-2', [DashboardController::class, 'overview2'])->name('overview2');
});
// Temporal: para pruebas con vistas de ejemplo
// Mejorado: Se añade protección con middleware 'auth' para evitar acceso no autorizado a vistas administrativas
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/users', 'dashboard.users')->name('users.index');
    Route::view('/roles', 'dashboard.roles')->name('roles.index');
});

Route::get('/objetivos-desarrollo-sostenible', ObjetivosDesarrolloSostenible::class)
    ->name('objetivos-desarrollo-sostenible');

Route::get('/facultades', Facultades::class)
    ->name('facultades');

Route::get('/estudiantes', Estudiantes::class)
    ->name('estudiantes');

Route::get('/docentes', Docentes::class)
    ->name('docentes');

Route::get('/proyectos', Proyectos::class)
    ->name('proyectos');

// Rutas individuales para cada sección de Noticias y Documentos (para el menú lateral)
// Gestión Responsabilidad Social
Route::get('/noticias', Noticias::class)->name('noticias');
Route::get('/documentos', Documentos::class)->name('documentos');

// Seguimiento y Certificación al Egresado
Route::get('/noticias-egresado', Noticias::class)->name('noticias.egresado');
Route::get('/documentos-egresado', Documentos::class)->name('documentos.egresado');

// Gestión Proyección Social
Route::get('/noticias-gestion', Noticias::class)->name('noticias.gestion');
Route::get('/documentos-gestion', Documentos::class)->name('documentos.gestion');

// Extensión Universitaria
Route::get('/noticias-extension', Noticias::class)->name('noticias.extension');
Route::get('/documentos-extension', Documentos::class)->name('documentos.extension');
Route::get('/noticias/create', function () {
    return view('noticias.form', ['modo' => 'create']);
})->name('noticias.create');
Route::get('/noticias/{id}/edit', function($id) {
    return view('noticias.form', ['modo' => 'edit', 'id' => $id]);
})->name('noticias.edit');
Route::get('/noticias/{id}', function($id) {
    // Mejorado: Validación del parámetro $id para evitar posibles ataques de inyección o acceso indebido
    if (!is_numeric($id) || intval($id) != $id) {
        abort(404); // Si el id no es un entero válido, retorna 404
    }
    return app(\App\Http\Controllers\NoticiaController::class)->show($id);
})->name('noticias.show');
Route::post('/noticias/upload', [NoticiasUploadController::class, 'upload'])->name('noticias.upload');
require __DIR__.'/ckeditor_upload.php';

Route::get('/documentos', Documentos::class)
->name('documentos');