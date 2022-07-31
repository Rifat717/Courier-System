<?php



/*==============================Backend part=============================*/


/*Route::get('/', function () {
    return view('frontend');
    //echo("This is front Page");
});*/

//User Types Route
Route::resource('usertype','UserTypeController');
Route::get('all/user/type','UserTypeController@getAllUserType')->name('all.UserType');


//User Info Route
Route::resource('userinfo','UserInfoController');
Route::get('all/user/info','UserInfoController@getAllUserInfo')->name('all.UserInfo');

//Login & LogOut Route
Route::post('/user-login','UserInfoController@userLoginProcess');
Route::get('/login','UserInfoController@login');
Route::get('/logout','UserInfoController@logout');

//Admin Dashboard Route
Route::get('/admin','UserInfoController@admin');


//Area Info Route
Route::resource('areainfo','AreaInfoController');
Route::get('all/area/info','AreaInfoController@getAllAreaInfo')->name('all.AreaInfo');


//Product Type Route
Route::resource('producttype','ProductTypeController');
Route::get('all/product/type','ProductTypeController@getAllProductType')->name('all.ProductType');


//Product Category Route
Route::resource('productcategory','ProductCategoryController');
Route::get('all/product/category','ProductCategoryController@getAllProductCategory')->name('all.ProductCategory');


//Product Info Route
Route::resource('productinfo','ProductInfoController');
Route::get('all/product/info','ProductInfoController@getAllProductInfo')->name('all.ProductInfo');


//Parsell Info Route
Route::resource('parsellinfo','PersellInfoController');
Route::get('all/parsell/info','PersellInfoController@getAllParsellInfo')->name('all.ParsellInfo');




/*=================================Frontend Part=================================*/

Route::get('/', function () {
    return view('frontend');
    //echo("This is front Page");
});




/*=================================Marchant Part=================================*/

Route::get('/marchant', 'MarchantController@dashboard');
//Route::get('/parcel', 'MarchantController@parcelPage');

Route::get('/marchant-reg', 'MarchantController@marchantReg');
Route::post('/marchant-login', 'MarchantController@marchantLogin');

Route::post('/marchant-registration','MarchantController@marchantRegistration');
Route::get('/marchant-logout','MarchantController@marchantLogout');


Route::resource('marchantparcel','MarchantController');
Route::get('all/marchant/parsell','MarchantController@getMarchantAllParsellInfo')->name('all.MarchantParsell');


/*===============================Rider Part=======================================*/
Route::get('/rider', 'RiderController@rider_Login');
Route::get('/rider-dashboard', 'RiderController@riderDashboard');
Route::post('/rider-login', 'RiderController@riderLoginProcess');

Route::get('/rider-logout','RiderController@riderLogout');

Route::resource('riderparcel','RiderController');
Route::get('all/rider/pending/parsell','RiderController@getRiderPendingParcel')->name('all.RiderPendingParcel');

Route::get('riderAssigned','RiderController@riderAssigned');

