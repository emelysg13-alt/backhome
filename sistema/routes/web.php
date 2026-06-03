<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeguimientoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AnimalController;



//ADMINISTRADOR

Route::resource(
'usuarios',
UsuarioController::class
);

Route::get(
'/animales',
[AnimalController::class,'index']
)->name('animales.index');

Route::get('/reportes', function () {
    return view('reportes.index');
})->name('reportes.index');


//SEGUIMIENTOS

Route::get('/', [SeguimientoController::class,'index']);

Route::get('/crear', [SeguimientoController::class,'create']);

Route::post('/guardar', [SeguimientoController::class,'store']);

Route::delete('/eliminar/{id}', [SeguimientoController::class,'destroy']);

Route::get('/historial/{id}', [SeguimientoController::class,'historial']);


/*Route::get('/', function () {
    return view('welcome');
});
*/

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::get('/cliente/dashboard', function () {

    return view('cliente.dashboard');

})->middleware('auth');


Route::get('/admin/dashboard', function () {

    return view('admin/dashboard');

})->middleware('auth');

Route::middleware(['auth', 'cliente'])->group(function () {
    
    Route::get('/cliente/dashboard', function () {
        return view('cliente.dashboard');
    })->name('cliente.dashboard');

    // Más adelante aquí irán las rutas para:
    // - Crear seguimiento de mascota perdida
    // - Ver historial de reportes
    // - Actualizar información del animal

});



Route::middleware(['auth', 'admin'])->group(function () {
    
    Route::get('/admin/dashboard', function () {
        return view('admin/dashboard');
    })->name('admin.dashboard');

    Route::resource('usuarios', UsuarioController::class);

    Route::get('/animales', [AnimalController::class,'index'])
        ->name('animales.index');

    Route::get('/reportes', function () {
        return view('reportes.index');
    })->name('reportes.index');

});