<?php
use App\Models\User;
use App\Models\Letter;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Letter\NodeController;
use App\Http\Controllers\Letter\RouteController;
use App\Http\Controllers\Letter\LetterController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Letter\LetterTypeController;
use App\Http\Controllers\Letter\LetterMovementController;

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
    return view('home.index');
});


Route::get('/check', [HomeController::class, 'check'])->name('home.check');
Route::post('/status', [HomeController::class, 'status'])->name('home.status');

Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->hasRole('admin')) {
        $letterCount = Letter::all()->count();
        $userCount = User::all()->count();
        return view('dashboard', compact('userCount', 'letterCount'));
    } else {
        return view('/home.index');
    }
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function () {

    Route::get('/', [IndexController::class, 'index'])->name('index');


    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');


    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');

    Route::resource('/users',UserController::class);
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/permission', [UserController::class, 'permission'])->name('users.permission');


    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');

    Route::post('/users/{user}/permission/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permission/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

    Route::resource('/departments', DepartmentController::class);




});


Route::middleware(['auth', 'role:admin'])->name('letter.')->prefix('letter')->group(function () {


    // Letter and letter_Route Routes
    Route::resource('letter', LetterController::class);
    Route::resource('letter-types', LetterTypeController::class);
    Route::resource('predefined-routes', RouteController::class);
    Route::resource('nodes', NodeController::class);

    // Route for printing the letter information or rejecting
    Route::get('/letters/{letter}/print', [ LetterController::class,'printLetter' ])->name('letter.print');
    Route::get('letter/{letter}/status',[ LetterController::class,'status'])->name('letter.status');

    // Route for letter movement /letter-movements
     Route::resource('letter-movements', LetterMovementController::class);

    // for other standard actions
     Route::resource('letter-movements', LetterMovementController::class)->except(['create', 'edit']);
    // Define a custom route for recording letter movements
     Route::get('letter-movements/{letter}/record-movement', [ LetterMovementController::class,'createMovement'])->name('letter-movements.add');
     Route::post('letter-movements/{letter}/{destinationNode}', [ LetterMovementController::class,'recordMovement'])->name('letter-movements.record');
});










Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
