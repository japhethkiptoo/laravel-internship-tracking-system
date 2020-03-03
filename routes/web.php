<?php

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


Route::get('/', 'student\HomeController@index')->name('home');



//student
Route::group(['prefix'=>'student'],function(){
    
    //password
	Route::get('/change/password','Auth\StudentResetPasswordController@showResetForm')
	       ->name('/update.password');
    Route::post('/reset/password','Auth\StudentResetPasswordController@postreset')
           ->name('reset.password');

	//firm
	Route::resource('/firm','student\FirmController');

	//field
	Route::resource('/field','student\FieldworkController');
	Route::get('/all','student\FieldworkController@allTasks')->name('all.tasks');
	Route::get('/task/{id}','student\FieldworkController@show')->name('task');
	Route::post('/edit/task','student\FieldworkController@update')->name('edit.task');

	//profile
	Route::resource('profile','student\ProfileController');

	//notifcations
	
});



//lecturer
Route::group(['prefix'=>'lecturer'], function(){
	//dashbaord
	Route::get('/','Lecturer\BaseController@index')->name('lec.dashboard');
	
	//login
	Route::get('login','Lecturer\AuthController@loginForm')->name('lec.login');
	Route::post('login','Lecturer\AuthController@login')->name('lec.login');

	//register
	Route::get('register','Lecturer\AuthController@registerForm')->name('lec.register');
	Route::post('register','Lecturer\AuthController@register')->name('lec.register');

	//logout
	Route::post('logout','Lecturer\AuthController@logout')->name('lec.logout');

	//courses
	Route::get('/courses','CourseController@index')->name('courses');
	Route::get('/course/{id}','CourseController@show')->name('course');
	Route::post('/add/course','CourseController@store')->name('add.course');
	Route::post('/add/level/{id}','CourseController@addClass')->name('add.level');

	//attach
	Route::get('/class/{id}','CourseController@attachForm')->name('attach.view');
	Route::post('/attach/{id}','CourseController@attach')->name('attach');

	//lecturer
	Route::get('/lecturers','LecturerController@index')->name('lecturers');
	Route::get('/lecturer/{id}','LecturerController@lecturer')->name('lecturer');
	Route::post('/add/lecturer','LecturerController@addLecturer')->name('add.lecturer');


	Route::post('/assign/{id}','LecturerController@assignLec')->name('assign.lec');

	Route::get('/course/levels/{id}','CourseController@getLevels')->name('course.levels');
	Route::get('/course/levels/{id}/all','CourseController@getAllLevels')->name('course.levels.all');

	Route::get('/myassigned','LecturerController@assigned')->name('myassigned');

	//students
	Route::get('/students','StudentController@students')->name('students');
	Route::get('/mystudents/{level?}','LecturerController@myStudents')->name('mystudents');

	Route::get('/student/{id}','LecturerController@student')->name('student');
	Route::get('/student/{id}/assessment','LecturerController@studentAssessment')->name('student.assessment');

	//notifications
	Route::get('/all/notifications','LecturerController@notifications')->name('notifications.lec');
	Route::get('/read/notification/{id}','LecturerController@readNotification')->name('notification.read');

	//student crud
	Route::get('/add/student',function(){
      return view('lecturer.content.addstudent');
	})->name('add.student.form')->middleware('auth:lec');
	Route::post('/add/student','StudentController@newStudent')->name('add.student')->middleware('auth:lec');

});


//supervisor

Route::group(['prefix'=>'supervisor'], function(){

	//dashboard
	Route::get('/','Supervisor\BaseController@index')->name('sup.dashboard');

	//login
	Route::get('login','Supervisor\CredentialsController@loginForm')->name('sup.login');
	Route::post('login','Supervisor\CredentialsController@login')->name('sup.login');

	//logout
	Route::post('logout','Supervisor\CredentialsController@logout')->name('sup.logout');

	//students
	Route::get('students','Supervisor\BaseController@myStudents')->name('sup.students');
	Route::get('student/{id}','Supervisor\BaseController@student')->name('sup.student');

	//notifications
	Route::get('/notifications',function(){
      return view('supervisor.notifications',['notifications'=>
      	Auth::guard('sup')->user()->notifications,'single'=>false]);
	})->name('sup.notifications');

	Route::get('/notifications/{id}',function($id){
       $n = Auth::guard('sup')->user()->notifications()->find($id);
       if($n->read_at == null){
         $n->markAsRead();
       }
       
      return view('supervisor.notifications',['notifications'=>
      	$n,'single'=>true]);
	})->name('sup.one.notifications');

	Route::get('/confirm/{week}/{student}/week','Supervisor\BaseController@confirmWeek')->name('confirm.week');

	//assess
	Route::get('/assess/{id}','Supervisor\BaseController@assessmentform')->name('sup.assessment');
	Route::post('/assess/{id}','Supervisor\BaseController@assessment')->name('sup.assessment');

});


//courses

Route::group(['prefix'=>'course'],function(){

	//attach
	Route::post('/attach','AttachController@attachSet')->name('attach.set');
});