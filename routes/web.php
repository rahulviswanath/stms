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

//licence
Route::get('/licence', 'LoginController@licence')->name('licence');
Route::get('/under-construction', 'LoginController@underConstruction')->name('under-construction');

Route::group(['middleware' => 'is.guest'], function() {
    Route::get('/', 'LoginController@publicHome')->name('public-home');
    //user validity expired
    Route::get('/user/expired', 'LoginController@userExpired')->name('user-expired');

    Route::get('/login', 'LoginController@login')->name('login');
    Route::post('/login/action', 'LoginController@loginAction')->name('login-action');
});
Route::group(['middleware' => 'auth.check'], function () {
    //common routes
    Route::get('/dashboard', 'LoginController@dashboard')->name('dashboard');
    Route::get('/my/profile', 'UserController@profileView')->name('user-profile');
    Route::get('/my/profile/edit', 'UserController@editProfile')->name('profile-edit');
    Route::post('/my/profile/update/action', 'UserController@updateProfile')->name('profile-update-action');
    Route::get('/lockscreen', 'LoginController@lockscreen')->name('lockscreen');
    Route::get('/logout', 'LoginController@logout')->name('logout-action');
    Route::get('/error/404', 'LoginController@invalidUrl')->name('invalid-url');
    Route::get('/error/500', 'LoginController@serverError')->name('server-error');

    //general timetable views
    Route::get('/timetable/teacher', 'TimetableController@teacherLevel')->name('timetable-teacher');
    Route::get('/timetable/student', 'TimetableController@studentLevel')->name('timetable-student');
    //substituted timetable
    Route::get('/substitution/temp/timetable', 'SubstitutionController@substitutedTimetable')->name('substituted-timetable');

    //superadmin routes
    Route::group(['middleware' => ['user.role:0,,']], function () {
        Route::get('/user/register', 'UserController@register')->name('user-register');
        Route::post('/user/register/action', 'UserController@registerAction')->name('user-register-action');
        Route::get('/user/list', 'UserController@userList')->name('user-list');
    });

    //admin routes
    Route::group(['middleware' => ['user.role:0,1,']], function () {
        //subject
        Route::get('/subject/register', 'SubjectController@register')->name('subject-register');
        Route::post('/subject/register/action', 'SubjectController@registerAction')->name('subject-register-action');
        Route::get('/subject/list', 'SubjectController@subjectList')->name('subject-list');
        Route::get('/subject/details/{id}', 'SubjectController@details')->name('subject-details');
        Route::get('/subject/edit/{id}', 'SubjectController@editSubject')->name('subject-edit');
        Route::post('/subject/edit/action', 'SubjectController@editSubjectAction')->name('subject-edit-action');
        Route::post('/subject/delete/{id}', 'SubjectController@deleteSubject')->name('subject-delete');

        //teacher
        Route::get('/teacher/register', 'TeacherController@register')->name('teacher-register');
        Route::post('/teacher/register/action', 'TeacherController@registerAction')->name('teacher-register-action');
        Route::get('/teacher/list', 'TeacherController@teacherList')->name('teacher-list');
        Route::get('/teacher/edit/{id}', 'TeacherController@editTeacher')->name('teacher-edit');
        Route::post('/teacher/edit/action', 'TeacherController@editTeacherAction')->name('teacher-edit-action');
        Route::post('/teacher/delete/{id}', 'TeacherController@deleteTeacher')->name('teacher-delete');

        //student
        Route::get('/student/register', 'StudentController@register')->name('student-register');
        Route::post('/student/register/action', 'StudentController@registerAction')->name('student-register-action');
        Route::get('/student/list', 'StudentController@studentList')->name('student-list');
        Route::get('/student/edit/{id}', 'StudentController@editStudent')->name('student-edit');
        Route::post('/student/edit/action', 'StudentController@editStudentAction')->name('student-edit-action');
        Route::post('/student/delete/{id}', 'StudentController@deleteStudent')->name('student-delete');

        //class
        Route::get('/classroom/register', 'ClassRoomController@register')->name('class-room-register');
        Route::post('/classroom/register/action', 'ClassRoomController@registerAction')->name('class-room-register-action');
        Route::get('/classroom/list', 'ClassRoomController@classRoomList')->name('class-room-list');
        Route::get('/classroom/combinationList/{id}', 'ClassRoomController@combinationList')->name('class-room-combination-list');
        Route::get('/get/subjects/standard/{id}', 'ClassRoomController@getSubjectsByStandard')->name('get-subjects-by-standard');
        Route::get('/classroom/edit/{id}', 'ClassRoomController@editClassroom')->name('class-room-edit');
        Route::post('/classroom/edit/action', 'ClassRoomController@editClassroomAction')->name('class-room-edit-action');
        Route::get('/classroom/delete/{id}', 'ClassRoomController@deleteClassroom')->name('class-room-delete');

        //timetable settings
        Route::get('/timetable/settings', 'SettingsController@settings')->name('timetable-settings');
        Route::post('/timetable/settings/action', 'SettingsController@settingsAction')->name('timetable-settings-action');
        //time settings
        Route::post('/timetable/time/settings/action', 'SettingsController@timeSettingsAction')->name('timetable-time-settings-action');

        //timetable
        Route::post('/timetable/generate/action', 'TimetableController@generateTimetableAction')->name('timetable-generation-action');
        
        //substitution - leave
        Route::get('/substitution/leave/register', 'LeaveController@leaveRegister')->name('substitution-leave-register');
        Route::post('/substitution/leave/register/action', 'LeaveController@leaveRegisterAction')->name('teacher-leave-register-action');
        Route::post('/substitution/leave/deletion', 'LeaveController@leaveDeletion')->name('substitution-leave-deletion');

        //substitution
        Route::get('/substitution/register', 'SubstitutionController@substitution')->name('substitution-register');
        Route::post('/substitution/register/action', 'SubstitutionController@substitutionAction')->name('substitution-register-action');
    });
});