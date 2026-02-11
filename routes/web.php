<?php

use Illuminate\Support\Facades\Input;
use App\Models\User;



Route::group(['namespace' => 'Pages'],function() {

    Route::get('/article', 'HomeController@index');
    Route::get('post/{post?}', 'PostsController@post')->name('post');
    Route::get('post/tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('post/category/{category}', 'HomeController@category')->name('category');

//    Route::get('/blog', 'PagesController@getBlog');
//    Route::get('/event', 'PagesController@getEvent');
//    Route::get('/news', 'PagesController@getNews');
//    Route::get('/faculty', 'PagesController@getFaculty');
//    Route::get('/contact', 'PagesController@getContact');
//
//    Route::post('/messages', 'MessagesController@getMessages');
//    Route::post('/contact/submit', 'MessagesController@submit');

});

//User Routes

Route::group(['namespace' => 'User'],function() {

    // Pages Routes...
    Route::resource('/','Users\UserController');
    Route::delete('/{user}','Users\UserController@destroy')->name('destroy');

//    Route::get('users/{users}','Users\UserController@index');

//    Route::get('/','Users\UserController@index')->name('show');
//    Route::get('/','Users\UserController@index')->name('store');
//    Route::put('/','Users\UserController@update')->name('update');
//    Route::delete('/{}','Users\UserController@destroy')->name('destroy');
////    Route::get('/','Users\UserController@edit')->name('index.edit');

    Route::post('/profile/{user}','Users\ProfileController@store')->name('profile.store');
    Route::get('/profile/{user}','Users\ProfileController@index')->name('profile.index');
    Route::get('/profile/{user}/destroy','Users\ProfileController@destroy')->name('profile.destroy');
    Route::post('/profile/','Users\ProfileController@background_upload_image')->name('profile.background.upload');
    Route::post('/profile/overview','Users\ProfileController@updateOverview')->name('profile.overview');
    Route::post('/profile/experience','Users\ProfileController@updateExperience')->name('profile.experience');
    Route::post('/profile/education','Users\ProfileController@updateEducation')->name('profile.education');
    Route::post('/comment', [App\Http\Controllers\User\Users\CommentController::class, 'store'])->name('comment.store');
    Route::post('/profile/location','Users\ProfileController@updateLocation')->name('profile.location');
    Route::post('/profile/skills','Users\ProfileController@updateSkills')->name('profile.skills');





    Route::get('/chat', 'Users\ChatController@index');
    Route::get('/contacts', 'Users\ContactsController@get');
    Route::get('/conversation/{id}', 'Users\ContactsController@getMessagesFor');
    Route::post('/conversation/send', 'Users\ContactsController@send');


    //search form function
    Route::post('/search',function () {
        $search = request('search');
        if($search != " ") {
            $user = User::where('username', 'LIKE', '%' .$search. '%')
            ->orWhere('email', 'LIKE' , '%' .$search. '%')
            ->get();
            if (count($user) > 0) {
                return view('users.index')->withDetails($user)->withQuery($search);
            }
        }
         return view('users.index')->withMessage('Result not found. Try to search again');
    });
    Route::get('/search',function (){
        return redirect('/');
    });
    //end



//    Route::get('users/','Users\UserController@index');
//    Route::get('users/edit','Users\UserController@update');
//    Route::get('users/destroy','Users\UserController@destroy');
//    Route::get('users/edit','Users\UserController@edit');
//    Route::resource('users/profile','Profile\ProfileController');


    // Authentication Routes...
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');

    // Logout Routes...
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::post('logout', 'Auth\LoginController@logout');

    // Registration Routes...
    Route::get('/register', 'Auth\RegisterController@showRegisterForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

//    // Password Reset Routes...
//    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
//    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
//    Route::post('password/reset', 'Auth\PasswordController@reset');



//    Route::get('post','PostController@index')->name('post');
    //Route::get('/email', function () {
//    return new NewUserWelcomeMail();
//});
    Route::post('follow/{user}', 'FollowsController@store');
//
//    Route::get('/', 'PostsController@index');
//    Route::get('/p/create', 'PostsController@create');
//    Route::post('/p', 'PostsController@store');
////Route::get('/p/{post}', 'PostsController@show');
//
//    Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
//    Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');
//    Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');


});

//Admin Routes

Route::group(['namespace' => 'Admin'],function() {
    //view admin home
    Route::get('admin', 'HomeController@index')->name('admin');

    Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Auth\LoginController@Login');
    Route::post('admin/login', 'Auth\LoginController@logout')->name('admin.logout');

//    Route::get('admin/signup', 'PagesController@getContact');
    //view admin settings
//    Route::get('admin/blog', 'PagesController@getBlog');
//    Route::get('admin/users', 'PagesController@getUsers');

    Route::get('changeStatus', 'PostController@changeStatus');

    Route::resource('admin/user','UserController');
    Route::resource('admin/permission','PermissionController');
    Route::resource('admin/post','PostController');
    Route::resource('admin/tag','TagController');
    Route::resource('admin/category','CategoryController');
    Route::resource('admin/role','RoleController');
});



