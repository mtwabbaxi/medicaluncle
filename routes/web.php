<?php

Auth::routes();
Route::get('/', function(){
    $products = App\Product::orderBy('id','DESC')->limit(8)->get();
    $category_id = App\Category::where('name','Covid 19 Supplies')->first()->id;
    $cproducts = App\Product::where('category_id',$category_id)->orderBy('id','DESC')->limit(4)->get();
    return view('index',compact('products','cproducts'));
});
Route::get('/home', 'HomeController@index')->name('home');

// without auth
Route::get('shop','IndexController@shop');
Route::get('product/{id}','IndexController@productDetail');
Route::get('category/{id}','IndexController@categoryDetail');
Route::post('products','IndexController@searchProduct');
Route::get('about','IndexController@about');
Route::get('contact','IndexController@contact');
Route::get('blogs','IndexController@blogs');
Route::get('blog/{id}','IndexController@blogDetail');

// seller routes

Route::get('seller/dashboard','SellerController@index')->middleware('auth','seller');
Route::get('seller/profile','SellerController@profile')->middleware('auth','seller');
Route::post('seller/profile','SellerController@insertProfile')->middleware('auth','seller');

Route::get('seller/products','ProductController@products')->middleware('auth','seller');
Route::get('seller/products/add','ProductController@add')->middleware('auth','seller');
Route::post('seller/products/add','ProductController@insert')->middleware('auth');
Route::get('seller/products/update/{id}','ProductController@updateProduct')->middleware('auth','seller');
Route::post('seller/products/update/{id}','ProductController@updateInsertProduct')->middleware('auth','seller');
Route::get('seller/products/delete/{id}','ProductController@deleteProduct')->middleware('auth','seller');

Route::get('seller/products/used','ProductController@used')->middleware('auth','seller');
Route::get('seller/products/used/add','ProductController@addUsed')->middleware('auth','seller');
Route::post('seller/products/used/add','ProductController@insertUsed')->middleware('auth','seller');

Route::get('seller/products/inventory','ProductController@inventory')->middleware('auth','seller');

Route::get('seller/catalogs','CatalogController@catalogs')->middleware('auth','seller');
Route::get('seller/catalogs/add','CatalogController@add')->middleware('auth','seller');
Route::post('seller/catalogs/add','CatalogController@insert')->middleware('auth','seller');
Route::get('seller/catalogs/delete/{id}','CatalogController@delete')->middleware('auth','seller');

Route::get('seller/buyer-requests','SellerController@buyerRequests')->middleware('auth','seller');

Route::get('seller/pending-orders','SellerController@pendingOrders')->middleware('auth');
Route::get('seller/pending-orders/{id}/products','SellerController@pendingOrderProducts')->middleware('auth','seller');
Route::post('seller/pending-orders/{id}/{prod}/deliever','SellerController@markAsSent')->middleware('auth','seller');

Route::get('seller/complete-orders','SellerController@completedOrders')->middleware('auth','seller');
Route::get('seller/complete-orders/{id}/products','SellerController@completedOrderProducts')->middleware('auth','seller');

Route::get('seller/history','SellerController@history')->middleware('auth','seller');

// Admin Routes

Route::get('admin/profile', 'AdminController@profile')->middleware('auth');
Route::post('admin/profile', 'AdminController@profileUpdate')->middleware('auth');
Route::get('admin/change-password', 'AdminController@changePassword')->middleware('auth');
Route::post('admin/change-password', 'AdminController@changePasswordUpdate')->middleware('auth');

Route::get('admin/sellers', 'AdminController@sellers')->middleware('auth','admin');
Route::get('admin/products', 'AdminController@products')->middleware('auth','admin');
Route::get('admin/products/add', 'AdminController@addProduct')->middleware('auth','admin');

Route::get('admin/catalogs', 'AdminController@catalogs')->middleware('auth','admin');
Route::get('admin/catalogs/add', 'AdminController@addCatalog')->middleware('auth','admin');

Route::get('admin/buyers', 'AdminController@buyers')->middleware('auth','admin');

Route::get('admin/orders', 'AdminController@orders')->middleware('auth','admin');
Route::get('admin/orders/{status}', 'AdminController@statusOrders')->middleware('auth','admin');
Route::get('admin/orders/{orderId}/products', 'AdminController@ordersProducts')->middleware('auth','admin');
Route::get('admin/order/{orderId}/{prodId}/{prodStatus}', 'AdminController@updateOrderProductStatus')->middleware('auth','admin');

Route::get('admin/products/category','ProductController@categories')->middleware('auth','admin');
Route::get('admin/products/category/add','ProductController@addCategory')->middleware('auth','admin');
Route::post('admin/products/category/add','ProductController@insertCategory')->middleware('auth','admin');
Route::get('admin/products/category/delete/{id}','ProductController@deleteCategory')->middleware('auth','admin');

Route::get('admin/blogs', 'AdminController@blogs')->middleware('auth','admin');
Route::get('admin/blogs/add', 'AdminController@addBlog')->middleware('auth','admin');
Route::post('admin/blogs/add', 'AdminController@insertBlog')->middleware('auth','admin');
Route::get('admin/blogs/view/{id}', 'AdminController@viewBlog')->middleware('auth','admin');
Route::get('admin/blogs/delete/{id}', 'AdminController@deleteBlog')->middleware('auth','admin');

// Buyer Routes

Route::get('buyer/dashboard','CustomerController@index')->middleware('auth','customer');
Route::get('buyer/products','CustomerController@products')->middleware('auth','customer');
Route::get('buyer/products/{id}','ProductController@productDetail')->middleware('auth','customer');
Route::get('buyer/catalogs','CustomerController@catalogs')->middleware('auth','customer');

Route::get('buyer/vendors-lists','CustomerController@vendorLists')->middleware('auth','customer');
Route::get('buyer/vendors/{id}','CustomerController@vendorDetails')->middleware('auth','customer');

Route::get('buyer/profile','CustomerController@profile')->middleware('auth','customer');
Route::post('buyer/profile','CustomerController@insertProfile')->middleware('auth','customer');

Route::get('buyer/add-to-cart/{id}','OrderController@addToCart')->middleware('auth','customer');
Route::get('buyer/cart','OrderController@cart')->middleware('auth');
Route::post('buyer/cart/{id}','OrderController@cartQuantityUpdate')->middleware('auth','customer');
Route::get('buyer/cart/remove/{id}','OrderController@removeProduct')->middleware('auth','customer');

Route::get('buyer/order/confirm','OrderController@orderConfirm')->middleware('auth','customer');
Route::post('buyer/order/confirm','OrderController@confirmOrder')->middleware('auth','customer');

Route::get('buyer/pending-orders','OrderController@pendingOrders')->middleware('auth','customer');
Route::get('buyer/pending-orders/{orderNumber}/products','OrderController@pendingOrderProducts')->middleware('auth','customer');

Route::get('buyer/completed-orders','OrderController@completedOrders')->middleware('auth','customer');