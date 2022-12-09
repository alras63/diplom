<?php

use App\Models\Courses;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();
Route::get('/', function () {
    $courses = Courses::all();
    return view('welcome', ['courses' => $courses]);
    // return view('kadr.index');
})->name('/');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/checkQR/{uniq}', [App\Http\Controllers\HomeController::class, 'checkQr'])->name('checkQr');
Route::get('/sendNap', [App\Http\Controllers\HomeController::class, 'sendNap'])->name('sendNap');
Route::get('/sendOtziv', [App\Http\Controllers\HomeController::class, 'sendOtziv'])->name('sendOtziv');
Route::any('/competentions', [App\Http\Controllers\CompetentionsController::class, 'index'])->name('competentions');
Route::any('/competentions/addusercomp', [App\Http\Controllers\CompetentionsController::class, 'addusercomp'])->name('addusercomp');
Route::any('/competentions/resume', [App\Http\Controllers\CompetentionsController::class, 'getresume'])->name('getresume');
Route::any('/resume', [App\Http\Controllers\CompetentionsController::class, 'resume'])->name('resume');
Route::any('/cyk', [App\Http\Controllers\CompetentionsController::class, 'cyk'])->name('cyk');
// Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'index'])->name('profile');

Route::prefix('profile')->group(function () {
    Route::get('', 'App\Http\Controllers\User\ProfileController@index')->name('profile');
    Route::get('active', 'App\Http\Controllers\User\ProfileController@index')->name('profile.active');
    Route::get('requests', 'App\Http\Controllers\User\ProfileController@requests')->name('profile.requests');
    Route::get('activities', 'App\Http\Controllers\User\ProfileController@activities')->name('profile.activities');
    Route::get('help', 'App\Http\Controllers\User\ProfileController@help')->name('profile.help');
    Route::get('competentions', 'App\Http\Controllers\User\ProfileController@competentions')->name('profile.competentions');
    Route::get('resume', 'App\Http\Controllers\User\ProfileController@resume')->name('profile.resume');
    Route::get('sled', 'App\Http\Controllers\User\ProfileController@help')->name('profile.sled');
});

Route::prefix('platform')->group(function () {
    Route::get('{course_id}', 'App\Http\Controllers\User\PlatformController@index')->name('platform');
    Route::get('{course_id}/{module_id}', 'App\Http\Controllers\User\PlatformController@module')->name('platform.module');
    Route::get('{course_id}/{module_id}/{lesson_id}', 'App\Http\Controllers\User\PlatformController@lesson')->name('platform.lesson');
    Route::get('{course_id}/{module_id}/{lesson_id}/{practice_id}', 'App\Http\Controllers\User\PlatformController@practice')->name('platform.practice');
    Route::post('{course_id}/{module_id}/{lesson_id}/{practice_id}/save', 'App\Http\Controllers\User\PlatformController@practicesave')->name('platform.practicesave');
    Route::post('{course_id}/{module_id}/{lesson_id}/save', 'App\Http\Controllers\User\PlatformController@lessonsave')->name('platform.lessonsave');
});

Route::prefix('request')->group(function () {
    Route::get('new', 'App\Http\Controllers\User\RequestController@index')->name('request.new');
});

Route::prefix('activity')->group(function () {
    Route::get('{activity_id}/new', 'App\Http\Controllers\Activity\RequestController@new')->name('activity.new');
    Route::post('newInsert', 'App\Http\Controllers\Activity\RequestController@newInsert')->name('activity.newInsert');
    Route::get('/profile/{uniq}', 'App\Http\Controllers\Activity\RequestController@lk')->name('activity.lk');
});

Route::prefix('course')->group(function () {
    Route::get('/', 'App\Http\Controllers\CourseController@list')->name('course.list');
    Route::get('{course_id}/page', 'App\Http\Controllers\CourseController@index')->name('course.page');
    Route::get('{course_id}/order', 'App\Http\Controllers\CourseController@order')->name('course.order');
    Route::get('{course_id}/orderRegister', 'App\Http\Controllers\CourseController@orderRegister')->name('course.orderRegister');
    Route::post('newInsertCourse', 'App\Http\Controllers\CourseController@newInsertCourse')->name('course.newInsertCourse');
    Route::post('filter', 'App\Http\Controllers\CourseController@filter')->name('course.filter');
});

Route::get('give-role-user', function (){
    $user = App\User::find(2);
    if(! $user->hasRole('super-admin')) {
        $user->assignRole('super-admin');
    }
});


/*  [
    'pattern' => 'platform/<id:>/<lesson_id:>',
    'route' => 'platform/index',
    'defaults' => ['id' => 1, 'lesson_id'=>null],
],

[
    'pattern' => 'platform/<id:>/<lesson_id:>/complete',
    'route' => 'platform/complete',
],

[
    'pattern' => 'platform/<id:>/test/<test_id:>',
    'route' => 'platform/test',
    'defaults' => ['id' => 1, 'test_id'=>null],
],

[
    'pattern' => 'platform/<id:>/practic/<practic_id:>',
    'route' => 'platform/practic',
    'defaults' => ['id' => 1, 'practic_id'=>null],
],

*/
