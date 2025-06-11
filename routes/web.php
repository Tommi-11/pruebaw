<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\RSUController;
use App\Http\Controllers\SeguimientoEgresadoController;
use App\Http\Controllers\ProyeccionSocialController;
use App\Http\Controllers\ExtensionUniversitariaController;
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

// Rutas para nuevas oficinas y vistas
Route::view('/proyeccion-social', 'proyeccion-social')->name('proyeccion.social');
Route::view('/seguimiento-egresado', 'seguimiento-egresado')->name('seguimiento.egresado');
Route::view('/extension-universitaria', 'extension-universitaria')->name('extension.universitaria');

// Vista informativa de Responsabilidad Social
Route::get('/responsabilidad-social', function () {
    return view('responsabilidad-social');
})->name('responsabilidad.social');

// vista del dashboard
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/overview-1', [DashboardController::class, 'overview1'])->name('overview1');
    Route::get('/overview-2', [DashboardController::class, 'overview2'])->name('overview2');
});

// Proteger rutas de usuarios y roles solo para autenticados
Route::middleware(['auth'])->group(function () {
    Route::view('/users', 'dashboard.users')->name('users.index');
    Route::view('/roles', 'dashboard.roles')->name('roles.index');
});

// Rutas para asignar roles y permisos (solo admin)
Route::middleware(['auth', 'can:edit users'])->group(function () {
    Route::post('/users/{user}/assign-role', [UserRoleController::class, 'assignRole'])->name('users.assignRole');
    Route::post('/users/{user}/assign-permission', [UserRoleController::class, 'assignPermission'])->name('users.assignPermission');
});

// Rutas CRUD para las áreas principales (protegidas por auth y roles según corresponda)
Route::middleware(['auth'])->group(function () {
    // RSU
    Route::resource('rsu', RSUController::class);
    // Seguimiento y Certificación al Egresado
    Route::resource('seguimiento', SeguimientoEgresadoController::class);
    // Proyección Social
    Route::resource('proyeccion', ProyeccionSocialController::class);
    // Extensión Universitaria
    Route::resource('extension', ExtensionUniversitariaController::class);
});