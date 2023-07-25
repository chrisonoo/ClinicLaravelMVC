<?php

    use App\Http\Controllers\DoctorsController;
    use App\Http\Controllers\DoctorsDashboardController;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | contains the "web" middleware group. Now create something great!
    |
    */

    Route::get('/', function ()
    {
        return view('index');
    })->name('home');
    Route::get('/doctors/', [DoctorsController::class, 'index']);
    Route::get('/doctors/search/', [DoctorsController::class, 'search'])->name('search');

    Route::get('/dashboard/', function ()
    {
        return view('dashboard');
    })
        ->middleware(['auth'])
        ->name('dashboard');
    Route::get('/dashboard/doctors/', [DoctorsDashboardController::class, 'index'])
        ->middleware(['auth'])
        ->name('dashboard-doctors');

    Route::get('/dashboard/doctors/edit/{id}/', [DoctorsDashboardController::class, 'edit'])
        ->middleware(['auth'])
        ->name('dashboard-doctors-edit');
    Route::post('/dashboard/doctors/update/{id}/', [DoctorsDashboardController::class, 'update'])
        ->middleware(['auth']);

    Route::get('/dashboard/doctors/delete/{id}/', [DoctorsDashboardController::class, 'delete'])
        ->middleware(['auth']);
    Route::get('/dashboard/doctors/deleted', [DoctorsDashboardController::class, 'showDeleted'])
        ->middleware(['auth'])
        ->name('dashboard-doctors-deleted');
    Route::get('/dashboard/doctors/undelete/{id}/', [DoctorsDashboardController::class, 'undelete'])
        ->middleware(['auth']);

    Route::get('/dashboard/doctors/new/', [DoctorsDashboardController::class, 'new'])
        ->middleware(['auth'])
        ->name('dashboard-doctors-new');
    Route::post('/dashboard/doctors/create/', [DoctorsDashboardController::class, 'create'])
        ->middleware(['auth']);

    require __DIR__ . '/auth.php';
