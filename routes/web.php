<?php

Auth::routes();
Route::get('/', function(){
    $products = App\Product::limit(9)->get();
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
Route::post('contact','IndexController@postContact');


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

Route::get('seller/pending-orders','SellerController@pendingOrders')->middleware('auth');
Route::get('seller/pending-orders/{id}/products','SellerController@pendingOrderProducts')->middleware('auth','seller');
Route::post('seller/pending-orders/{id}/{prod}/deliever','SellerController@markAsSent')->middleware('auth','seller');

Route::get('seller/complete-orders','SellerController@completedOrders')->middleware('auth','seller');
Route::get('seller/complete-orders/{id}/products','SellerController@completedOrderProducts')->middleware('auth','seller');

Route::get('seller/analytics','SellerController@analytics')->middleware('auth','seller');
Route::get('seller/analytics/product/{id}','SellerController@productAnalytics')->middleware('auth','seller');

Route::get('seller/notifications','SellerController@notifications')->middleware('auth','seller');
Route::get('seller/notifications/add','SellerController@addNotification')->middleware('auth','seller');
Route::post('seller/notifications/add','SellerController@insertNotification')->middleware('auth','seller');
Route::get('seller/notifications/delete/{id}','SellerController@deleteNotification')->middleware('auth','seller');
Route::get('seller/notifications/view/{id}','SellerController@viewNotification')->middleware('auth','seller');



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

Route::get('admin/contacts','AdminController@contacts')->middleware('auth','admin');

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
Route::get('admin/blogs/delete/{id}', 'AdminController@deleteBlog')->middleware('auth','admin');

// Buyer Routes

Route::get('buyer/dashboard','CustomerController@index')->middleware('auth','customer');
Route::get('buyer/products','CustomerController@products')->middleware('auth','customer');
Route::get('buyer/products/{id}','ProductController@productDetail')->middleware('auth','customer');
Route::post('buyer/search-products','CustomerController@searchProduct')->middleware('auth','customer');
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

Route::get('buyer/b2bproducts','ProductController@b2bproducts')->middleware('auth','customer');
Route::get('buyer/track-order','OrderController@trackOrder')->middleware('auth','customer');
Route::post('buyer/track-order','OrderController@trackOrderSeriously')->middleware('auth','customer');

Route::get('buyer/order/review/{orderId}/{productId}','OrderController@writeReview')->middleware('auth','customer');
Route::post('buyer/order/review/{orderId}/{productId}','OrderController@submitReview')->middleware('auth','customer');

Route::get('buyer/notifications','CustomerController@notifications')->middleware('auth','customer');
Route::get('buyer/notifications/view/{id}','CustomerController@viewNotification')->middleware('auth','customer');

// Custom Procurement

Route::get('buyer/rfq','QuotationController@rfq')->middleware('auth','customer');
Route::post('buyer/rfq','QuotationController@submitRFQ')->middleware('auth','customer');
Route::get('buyer/vendor-requests','QuotationController@vendorRequests')->middleware('auth','customer');
Route::get('buyer/vendor-requests/{id}','QuotationController@viewRequests')->middleware('auth','customer');
Route::get('buyer/view-quotation/{id}','QuotationController@viewBuyerQuotation')->middleware('auth','customer');
Route::get('buyer/view-products/{id}','QuotationController@viewBidProducts')->middleware('auth','customer');
Route::post('buyer/vendor-requests/add-to-cart/{prodID}/{bidID}','QuotationController@addToCart')->middleware('auth','customer');
Route::get('buyer/request/expire/{id}','QuotationController@markAsExpire')->middleware('auth','customer');


Route::get('seller/buyer-requests','QuotationController@buyerRequests')->middleware('auth','seller');
Route::get('seller/response-requests/{id}','QuotationController@responseRequest')->middleware('auth','seller');
Route::get('seller/view-quotation/{id}','QuotationController@viewQuotation')->middleware('auth','seller');
Route::post('seller/view-quotation/{id}','QuotationController@submitQuotation')->middleware('auth','seller');
Route::get('seller/view-quotation/delete-product/{id}','QuotationController@deleteProduct')->middleware('auth','seller');
Route::post('seller/response-requests/addProduct/{bidId}/{productId}','QuotationController@addRequestProduct')->middleware('auth','seller');

Route::get('test', function(){
    $order = App\Order::find(14);
    return view('emails.order',compact('order'));
});