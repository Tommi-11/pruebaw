<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Models\Noticia;
use App\Http\Controllers\ContactoController;
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
// Temporal: para pruebas con vistas de ejemplo
Route::view('/users', 'dashboard.users')->name('users.index');
Route::view('/roles', 'dashboard.roles')->name('roles.index');

// Ejemplo de protección de rutas solo para administradores
Route::middleware(['auth', 'role:Administrador'])->group(function () {
    // Aquí van las rutas exclusivas para administradores
    // Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('usuarios', App\Http\Controllers\UserController::class);
    Route::get('/admin/usuarios', function () {
        return view('admin.usuarios');
    })->name('admin.usuarios');

    Route::get('/noticias/gestionar', function () {
        return view('noticias.gestionar');
    })->name('noticias.gestionar');
});

// Ejemplo de protección de rutas para varios roles
Route::middleware(['auth', 'role:Administrador,Encargado de Área'])->group(function () {
    // Rutas para administradores y encargados de área
    Route::get('/documentos/gestionar', function () {
        return view('documentos.gestionar');
    })->name('documentos.gestionar');
    Route::get('/documentos/descargar/{documento}', [App\Http\Controllers\DocumentoController::class, 'download'])->name('documentos.download');
});

// Ruta pública para mostrar la lista de noticias
Route::get('/noticias', function () {
    $noticias = Noticia::orderByDesc('fecha_publicacion')->get();
    return view('noticias.public', compact('noticias'));
})->name('noticias.public');

// Rutas para el formulario de contacto
Route::post('/contacto/enviar', [ContactoController::class, 'enviar'])->name('contacto.enviar');
Route::get('/contacto', function () {
    return view('contacto.public');
})->name('contacto.public');