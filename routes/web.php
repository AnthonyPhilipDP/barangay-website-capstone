<?php

use App\Models\User;
use App\Mail\ComplainantMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\PostsControllers\NewsController;
use App\Http\Controllers\PostsControllers\EventsController;
use App\Http\Controllers\BarangayControllers\PrintController;
use App\Http\Controllers\PostsControllers\BusinessController;
use App\Http\Controllers\PostsControllers\ProjectsController;
use App\Http\Controllers\BarangayControllers\ClearanceController;

use App\Http\Controllers\BarangayControllers\IndigencyController;
use App\Http\Controllers\PostsControllers\AchievementsController;
use App\Http\Controllers\BarangayControllers\ComplaintsController;
use App\Http\Controllers\PostsControllers\AnnouncementsController;
use App\Http\Controllers\PostsControllers\EstablishmentsController;
use App\Http\Controllers\BarangayControllers\BusinessClearanceController;
use App\Http\Controllers\BarangayControllers\ResidencyCertificateController;

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

// Route::get('/', function () {
//     return view('pages.homepage');
// });

Route::get('/', [HomeController::class, 'homepage'])
->name('pages.homepage1');

Route::get('/index', [HomeController::class, 'homepage'])
->name('pages.homepage1');

Route::get('/users', [HomeController::class, 'showUserlist'])
->name('admin.userlist');

Route::get('/about', [HomeController::class, 'about'])
->name('pages.about');

Route::get('/requests', [RequestsController::class, 'pendingrequests'])
->name('requestdocs.requests');

Route::get('/businesspromotions', [RequestsController::class, 'pendingbusiness'])
->name('requestdocs.businesspromotions');

Route::get('/establishmentpromotions', [RequestsController::class, 'pendingestablishment'])
->name('requestdocs.establishmentpromotions');

Route::get('/myrequests', [RequestsController::class, 'myrequests'])
->name('requestdocs.myrequests');

Route::get('/mypromotions', [RequestsController::class, 'mypromotions'])
->name('requestdocs.mypromotions');

Auth::routes(['verify' => true]);

Route::get('/admin/home', [HomeController::class, 'adminHome'])
->name('admin.admin.home')->middleware('admin');

Route::get('/home', [HomeController::class, 'residentHome'])
->name('resident.home');

Route::resources(['complaints'=> ComplaintsController::class]);
//Notify the resident about their complaint.
Route::patch('/notifyUser/{id}', [ComplaintsController::class, 'notifyUser'])
->name('admin.complaints.index');
Route::patch('/complaints/solved/{id}', [ComplaintsController::class, 'solved'])
->name('admin.complaints.solved.index');
Route::patch('/businessclearance/{id}', [BusinessClearanceController::class, 'done'])
->name('requestdocs.businessclearance.index');
Route::patch('/clearance/{id}', [ClearanceController::class, 'done'])
->name('requestdocs.clearance.index');
Route::patch('/indigency/{id}', [IndigencyController::class, 'done'])
->name('requestdocs.indigency.index');
Route::patch('/residency/{id}', [ResidencyCertificateController::class, 'done'])
->name('requestdocs.residency.index');
Route::patch('/businesses/{id}', [BusinessController::class, 'pending'])
->name('posts.businesses.index');
Route::patch('/establishments/{id}', [EstablishmentsController::class, 'pending'])
->name('posts.establishments.index');
Route::resources(['residency'=> ResidencyCertificateController::class]);
Route::resources(['businessclearance'=> BusinessClearanceController::class]);
Route::resources(['indigency'=> IndigencyController::class]);
Route::resources(['clearance'=> ClearanceController::class]);
Route::resources(['announcements'=> AnnouncementsController::class]);
Route::resources(['businesses'=> BusinessController::class]);
Route::resources(['establishments'=> EstablishmentsController::class]);
Route::resources(['events'=> EventsController::class]);
Route::resources(['projects'=> ProjectsController::class]);
Route::resources(['achievements'=> AchievementsController::class]);
Route::resources(['news'=> NewsController::class]);
Route::resource('slider', SliderController::class);
//Print routes
Route::get('/residency/{id}/print/', [PrintController::class, 'residencyPrint'])
->name('requestdocs.print.residency');
Route::get('/clearance/{id}/print/', [PrintController::class, 'clearancePrint'])
->name('requestdocs.print.clearance');
Route::get('/businessclearance/{id}/print/', [PrintController::class, 'businessclearancePrint'])
->name('requestdocs.print.businessclearance');
Route::get('/indigency/{id}/print/', [PrintController::class, 'indigencyPrint'])
->name('requestdocs.print.indigency');

Route::get('/change-password', [ChangePasswordController::class, 'index'])
->name('changePassword');
Route::post('/change-password', [ChangePasswordController::class, 'store'])
->name('change.password');

//Notify the resident about their document requests.
Route::patch('/mailresidency/{id}', [ResidencyCertificateController::class, 'mailResidency'])
->name('requestdocs.residency.show');
Route::patch('/mailindigency/{id}', [IndigencyController::class, 'mailIndigency'])
->name('requestdocs.indigency.show');
Route::patch('/mailclearance/{id}', [ClearanceController::class, 'mailClearance'])
->name('requestdocs.clearance.show');
Route::patch('/mailbusinessclearance/{id}', [BusinessClearanceController::class, 'mailBusinessClearance'])
->name('requestdocs.businessclearance.show');