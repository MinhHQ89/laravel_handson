<?php

use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Route with NewsController, view and blade template
Route::get('/news', [NewsController::class, 'index']);

// Database connection test route
Route::get('/db-test', function () {
    try {
        \DB::connection()->getPdo();           // データベースからPDOオブジェクトを試して取得します（MySQL接続のテスト）
        return 'MySQL connection successful!'; // 接続に成功した場合、通知を返します
    } catch (\Exception $e) {                  // データベース接続に失敗した場合、エラーをキャッチします
        return 'Connection failed: ' . $e->getMessage(); // 詳細なエラー通知を返します
    }
});

// Route to test fetching columns and data from 'news' table
Route::get('/test-news', function () {
    $columns = \Schema::getColumnListing('news');
    $data = \DB::table('news')->get();

    return response()->json([
        'columns' => $columns,
        'data' => $data
    ]);
});

// Admin route protected by 'checklogin' middleware
Route::get('/admin', function () {
    return view('admin.index');
})->middleware('checklogin');

// Validation route to show form
Route::get('/admin/create', [PostController::class, 'showform']);
Route::post('/admin/create', [PostController::class, 'validationform']);

// Route to truncate 'news' table
Route::get('/truncate-news', function () {
    \DB::table('news')->truncate();
    return "Table news truncated";
});

// CRUD
Route::get('/admin/news/create', [AdminNewsController::class, 'create'])->name('admin.news.create');
Route::post('/admin/news/store', [AdminNewsController::class, 'store'])->name('admin.news.store');
Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
Route::get('/admin/news/{id}', [AdminNewsController::class, 'show'])->name('admin.news.show');
Route::get('/admin/news/edit/{id}', [AdminNewsController::class, 'edit'])->name('admin.news.edit');
Route::patch('/admin/news/update/{id}', [AdminNewsController::class, 'update'])->name('admin.news.update');
Route::delete('/admin/news/delete/{id}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy');
