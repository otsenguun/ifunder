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

Route::get('/', 'HomeController@welcome');
Route::get('/picture', 'HomeController@picture');
Route::get('/about-show', 'HomeController@about');
Route::get('/startup-show', 'HomeController@startup');
Route::get('/investor-show', 'HomeController@investor');
Route::get('/partners-show', 'HomeController@partner');
Route::get('/more/event-show', 'HomeController@showevent');
Route::get('/more/article-show', 'HomeController@showarticle');
Route::get('/faq/startup', 'HomeController@faqstartup');
Route::get('/faq/angel', 'HomeController@faqangel');
Route::get('/faq/partner', 'HomeController@faqpartner');
//user email activation
Route::get('/activate/{email}/{activationCode}','ActivationController@active');
//forgot password

Route::get('/forget/password','StartupController@forgetPassword');
Route::post('/forget/password/post','StartupController@forgetPostPassword');

Route::get('/reset/{email}/{resetCode}','StartupController@resetPassword');
Route::post('/reset/{email}/{resetCode}','StartupController@resetPostPassword');

Route::group(['middleware'=> 'startup'],function (){
    //login
    Route::get('/startup','StartupController@index');
    Route::get('/login','LoginController@login');
    Route::post('/login','LoginController@postLogin');
    Route::get('/startup/profile/edit/{id}','StartupController@profileEdit');
    Route::post('/startup/profile/update','StartupController@profileUpdate');
    Route::get('/startup/profile/addproject','StartupController@ProjectShow');
    Route::post('/startup/profile/addproject/update','StartupController@ProjectUpdate');
    Route::get('/startup/profile/project/show','StartupController@ProjectView');
    
    Route::get('/startup/project/edit/{id}','StartupController@ProjectEdit');
    Route::post('/startup/project/change','StartupController@ProjectChange');
    
    Route::delete('/startup/project/delete/{id}','StartupController@ProjectDelete');
});

Route::group(['middleware'=> 'angel'],function (){
    //login
    Route::get('/angel','AngelController@index');
    Route::get('/login','LoginController@login');
    Route::post('/login','LoginController@postLogin');
    Route::get('/angel/profile/edit/{id}','AngelController@profileEdit');
    Route::post('/angel/profile/update','StartupController@sprofileUpdate');
    Route::get('/angel/profile/addproject','AngelController@ProjectShow');
    Route::post('/angel/profile/addproject/update','StartupController@sProjectUpdate');
    Route::get('/angel/profile/project/show','AngelController@ProjectView');
    
    Route::get('/angel/project/edit/{id}','AngelController@ProjectEdit');
    Route::post('/angel/project/change','StartupController@sProjectChange');

    Route::delete('/angel/project/delete/{id}','AngelController@ProjectDelete');
});

Route::get('profile-select','LoginController@profile');


Route::get('/login','LoginController@login');
Route::post('/login','LoginController@postLogin');

Route::get('/register/startup','RegisterController@registerStartUp');
Route::post('/register/startup','RegisterController@postRegisterStartUp');

Route::get('/register/investor','RegisterController@registerInvestor');
Route::post('/register/investor','RegisterController@postRegisterInvestor');

Route::post('/logout','LoginController@logout');
Route::get('/register/select','LoginController@select');
Route::group(['middleware' => 'admin'],function (){
    Route::get('/admin','AdminController@index');
    Route::get('/admin/users/show','AdminController@usersShow');
    Route::get('/admin/users/show-angel','AdminController@angelsShow');
    Route::delete('/admin/users/delete/{id}','AdminController@deleteUser');
    
    Route::get('/admin/projects/show','AdminController@projectShow');
    Route::delete('/admin/project/delete/{id}','AdminController@deleteProject');
    Route::get('/admin/projects/view/{id}','AdminController@projectView');
    
    Route::post('/admin/user/success/add/{id}','AdminController@userSuccess');
    Route::post('/admin/user/success/update/{id}','AdminController@userSuccess1');
    Route::get('/admin/investment/show','AdminController@investmentShow');
    Route::get('/admin/investment/view/{id}','AdminController@investmentView');
    Route::delete('/admin/investment/delete/{id}','AdminController@deleteInvestment');

    Route::post('/admin/user/investor/success/add/{id}','AdminController@userSuccessInvestor');
    Route::post('/admin/user/investor/success/update/{id}','AdminController@userSuccessInvestor1');
    //location
    Route::get('/admin/location/show','AdminprojectController@showLocation');
    Route::get('/admin/location/add','AdminprojectController@addLocation');
    Route::get('/admin/location/edit','AdminprojectController@editLocation');
    Route::post('/admin/location/update','AdminprojectController@updateLocation');
    Route::post('/admin/location/delete','AdminprojectController@deleteLocation');
    //capital
    Route::get('/admin/capital/show','AdminprojectController@showCap');
    Route::get('/admin/capital/add','AdminprojectController@addCap');
    Route::get('/admin/capital/edit','AdminprojectController@editCap');
    Route::post('/admin/capital/update','AdminprojectController@updateCap');
    Route::post('/admin/capital/delete','AdminprojectController@deleteCap');
    //status
    Route::get('/admin/status/show','AdminprojectController@showStatus');
    Route::get('/admin/status/add','AdminprojectController@addStatus');
    Route::get('/admin/status/edit','AdminprojectController@editStatus');
    Route::post('/admin/status/update','AdminprojectController@updateStatus');
    Route::post('/admin/status/delete','AdminprojectController@deleteStatus');
    //sector
    Route::get('/admin/sector/show','AdminprojectController@showSector');
    Route::get('/admin/sector/add','AdminprojectController@addSector');
    Route::get('/admin/sector/edit','AdminprojectController@editSector');
    Route::post('/admin/sector/update','AdminprojectController@updateSector');
    Route::post('/admin/sector/delete','AdminprojectController@deleteSector');
    //invest
    Route::get('/admin/invest/show','AdminprojectController@showInvest');
    Route::get('/admin/invest/add','AdminprojectController@addInvest');
    Route::get('/admin/invest/edit/{id}','AdminprojectController@editInvest');
    Route::post('/admin/invest/update','AdminprojectController@updateInvest');
    Route::post('/admin/invest/delete/{id}','AdminprojectController@deleteInvest');
    //event
    Route::get('/admin/event/show','ArticleController@eventShow');
    Route::get('/admin/event/add','ArticleController@eventAdd');
    Route::post('/admin/event/post','ArticleController@eventPost');
    Route::get('/admin/event/edit/{id}','ArticleController@eventEdit');
    Route::post('/admin/event/update','ArticleController@eventUpdate');
    Route::delete('/admin/event/delete/{id}','ArticleController@eventDelete');
    //article
    Route::get('/admin/article/show','ArticleController@show');
    Route::get('/admin/article/add','ArticleController@add');
    Route::post('/admin/article/post','ArticleController@post');
    Route::get('/admin/article/edit/{id}','ArticleController@edit');
    Route::post('/admin/article/update','ArticleController@update');
    Route::delete('/admin/article/delete/{id}','ArticleController@delete');
    //partners
    Route::get('/admin/partners/show','PartnerController@show');
    Route::get('/admin/partners/add','PartnerController@add');
    Route::post('/admin/partners/post','PartnerController@post');
    Route::get('/admin/partners/edit/{id}','PartnerController@edit');
    Route::post('/admin/partners/update','PartnerController@update');
    Route::delete('/admin/partners/delete/{id}','PartnerController@delete');
});
Route::get('/readmore/{id}','ArticleController@eventMore');

Route::get('/readmore1/{id}','ArticleController@articleMore');
