<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavtestController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SurahtafsirController;
use App\Http\Controllers\TimingtafsirController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SclassController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TeacherboardController;
use App\Http\Controllers\StudentboardController;
use App\Http\Controllers\OptiontowController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\UserController ;
use App\Http\Controllers\QuestionController ;
use App\Http\Controllers\ChapterController ;
// use App\Http\Controllers\EmailController;
//new
use App\Http\Controllers\BookController ;
// use App\Http\Controllers\newcontroller\OptionController ;
use App\Http\Controllers\ReadyoptController ;
//new


// use App\Http\Controllers\FrontpageController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\RegistrationController;
// use App\Http\Controllers\LoginController;

// use App\Http\Controllers\Exam\QuizController;
// use App\Http\Controllers\Exam\QuestionController;
// use App\Http\Controllers\Exam\ResultController;
// use App\Http\Controllers\Exam\AnotherQuizController;
// use App\Http\Controllers\Exam\ExamController;
// use App\Http\Controllers\Exam\OptionController;
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

Route::post('/sendemail',[CartController::Class,'sendemail']);

// Route::get('/nav', function () {
//     return view('back-end.navlist.index');

// });
// exam start

// Route::get('/',[FrontpageController::Class,'index']);
// Route::get('/infra',[AdminController::Class,'index']);
// Route::group(['middleware'=>'visitor'],function(){
// 	Route::get('/register',[RegistrationController::Class,'signup']);
// Route::post('/register',[RegistrationController::Class,'store']);
// Route::get('/login',[LoginController::Class,'login']);
// Route::post('/login',[LoginController::Class,'postLogin']);
// });
  
  // Route::get('/logout',[LoginController::Class,'logout']);
//exam
// Route::get('/quiz_status/{id}',[QuizController::Class,'status']);
// Route::get('/exam-start/{id}', [ExamController::Class,'exam']);
// Route::post('/exams',[ExamController::Class,'examPost']);
// Route::get('/MyExamResult', [ExamController::Class,'examResult']);
// Route::get('/profile',[ExamController::Class,'examResult']);
// Route::get('/exmResults',[ResultController::Class,'viewResult']);
// Route::get('/MyExamDetails/{id}',[ExamController::Class,'ResultDetails']); 
// // exam end


Route::get('/', [IndexController::class, 'index']);
Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::get('/subname/{id}', [IndexController::class, 'subindex'])->name('second.nav');
Route::get('/publication', [IndexController::class, 'publication'])->name('publication');
Route::get('/about-us', [IndexController::class, 'about']);
// card route 
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::post('sendemail',[CartController::class,'sendemail']);
// admin route
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
 Route::get('/quiz/{id}', [AnotherQuizController::Class, 'index']);


Route::middleware(['admin'])->group(function () {
Route::get('dashboard', [SurahtafsirController::class, 'index'])->name('dashboard');
Route::resource('navlist', NavtestController::class);
Route::put('editcategory/{id}', [NavtestController::class, 'editcategory']);
Route::resource('surahtafsir', SurahtafsirController::class);
Route::resource('tafsirtiming', TimingtafsirController::class);
Route::resource('publish', PublicationController::class);
Route::resource('notification', NotificationController::Class);
Route::resource('carousel', CarouselController::Class);
Route::resource('user', UserController::Class);

});

Route::middleware(['teacher'])->group(function () {
Route::get('teacherboard', [TeacherboardController::class, 'index'])->name('teacherboard');
// Route::resource('quizes', QuizController::Class);
// Route::resource('questions', QuestionController::Class);
// Route::resource('option', OptionController::Class);
// Route::resource('optiontwo', OptiontowController::Class);
// Route::get('/quize/addquestion/{id}',[QuizController::Class,'AddQuestion']);
// Route::resource('addclass', SclassController::class);
// Route::resource('topic', TopicController::class);

});
Route::middleware(['student'])->group(function () {
  Route::get('studentboard', [StudentboardController::class, 'index'])->name('studentboard');
  
  
});

//new

Route::get('exam/{id}', [BookController::class,'exam'])->name('exam');
Route::get('examlanding', [BookController::class,'examlanding'])->name('examlanding');
Route::post('examcheck', [BookController::class,'examcheck'])->name('examcheck');
Route::post('createBookFromModal', [BookController::class,'createBookFromModal']);
Route::post('createChapterFromModal', [BookController::class,'createChapterFromModal']);
Route::post('createTopicFromModal', [BookController::class,'createTopicFromModal']);
Route::resource('book', BookController::class);
Route::resource('option', OptionController::class);
// Route::get('/create-exam', [ReadyoptController::class,'index'])->name('create-exam');
Route::post('/allstore', [ReadyoptController::class,'allstore'])->name('allstore');
// Route::post('qstore', [ReadyoptController::class,'qstore']);

Route::get('dropdown',[ReadyoptController::class, 'index']);
Route::get('getBook',[ReadyoptController::class, 'getBook'])->name('getBook');
Route::get('getTopic',[ReadyoptController::class, 'getTopic'])->name('getTopic');

Route::get('questionChange', [QuestionController::class, 'index'])->name('questionChange');
Route::get('RechangeQuestionTable', [QuestionController::class, 'getStudents'])->name('RechangeQuestionTable');


//new
 Route::resource('question', QuestionController::class);

Route::get('bookIndex', [BookController::class, 'index']);
Route::post('delete-book', [BookController::class, 'destroy']);

Route::get('chapterIndex', [ChapterController::class, 'index']);
Route::post('delete-chapter', [ChapterController::class, 'destroy']);

Route::get('topicIndex', [TopicController::class, 'index']);
Route::post('delete-topic', [TopicController::class, 'destroy']);

Route::get('ajax-datatable-crud', [QuestionController::class, 'index']);
Route::get('ajax-datatable-crud', [QuestionController::class, 'index']);
Route::post('add-update-book', [QuestionController::class, 'store']);
Route::post('edit-book', [QuestionController::class, 'edit']);
Route::post('delete-question', [QuestionController::class, 'destroy']);



});