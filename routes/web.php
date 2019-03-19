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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/services', 'HomeController@services')->name('services');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/booking', 'HomeController@booking')->name('booking');
Route::post('/submitbooking', 'BookingController@submitbooking')->name('submitbooking');
Route::get('/admin', 'AdminController@login')->name('admin');
Route::get('/tags/{slug}', 'HomeController@slug')->name('slug');
Route::get('/category/{id}', 'HomeController@category')->name('category');
Route::get('/brand/{id}', 'HomeController@brand')->name('brand');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/session', 'HomeController@session')->name('session');
Route::get('/userregister', 'HomeController@register')->name('register');
Route::get('/user', 'HomeController@register')->name('register');
Route::get('/error', 'HomeController@errortoken')->name('errortoken');

Route::post('/cart/addproducts', 'CartController@addProducts')->name('cart');
Route::get('/cart', 'CartController@viewCart')->name('viewCart');
//Route::group(['middleware' =>'genUserAuth'], function(){ 
    Route::post('/cart/reserve', 'CartController@reserveOrder')->name('reserveOrder');
    
//});

Route::post('/cart/updatequantity', 'CartController@updateQuantity')->name('updateQuantity');
Route::get('/cart/deleteproduct/{id}', 'CartController@deleteproduct')->name('deleteproduct');

Route::get('/product', 'HomeController@shop')->name('product');
Route::get('/product/{id}', 'CartController@viewProduct')->name('viewcartProduct');

Route::get('/shop', 'HomeController@shop')->name('shop');
Route::post('/admin/login', 'LoginController@adminLogin')->name('admin.login');
Route::post('/cashier/login', 'LoginController@cashierLogin')->name('cashier.login');
Route::post('/checker/login', 'LoginController@checkerLogin')->name('checker.login');
Route::get('/checker', 'LoginController@checker')->name('checker');
Route::post('/assistant/login', 'LoginController@assistantLogin')->name('assistant.login');
Route::post('/customer/login', 'LoginController@customerLogin')->name('customer.login');
Route::post('/accounting/login', 'LoginController@accountingLogin')->name('accounting.login');
Route::get('/cashier', 'LoginController@cashier')->name('cashier');
Route::get('/oic', 'LoginController@oic')->name('oic');
Route::get('/accounting', 'LoginController@accounting')->name('accounting');
Route::get('/assistant', 'LoginController@assistant')->name('assistant');
//Route::get('/customer', 'LoginController@customer')->name('customer');
Route::group(['middleware' =>'adminAuth','prefix' => 'admin'], function(){
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');
    Route::get('/shop', 'AdminController@shop')->name('shop');
    Route::get('/request', 'AdminController@request')->name('request');
    Route::get('/members', 'AdminController@members')->name('members');
    Route::get('/vieworder/{ordernumber}', 'AdminController@vieworder')->name('vieworder');

    Route::get('/report', 'AdminController@report')->name('report');
    Route::get('/report/sales', 'AdminController@salesreport')->name('salesreport');
    Route::get('/report/packages', 'AdminController@packagesreport')->name('packagesreport');
    Route::get('/report/branch/{branchid}', 'AdminController@reportbranch')->name('reportbranch');
    Route::post('/report/generate/branch', 'AdminController@reportrangebranch')->name('reportrangebranch');
    Route::post('/report/generate', 'AdminController@reportrange')->name('reportrange');
    Route::post('/report/sales/generate', 'AdminController@reportsalesrange')->name('reportsalesrange');
 
    //Route::get('/branchs', 'AdminController@branchs')->name('branchs');
    Route::get('/settings', 'AdminController@settings')->name('settings');
    Route::get('/tags', 'AdminController@tags')->name('tags');
    Route::get('/return/{returnbatchnum}', 'AdminController@returnnum')->name('returnnum');
    Route::get('/returns', 'AdminController@returnslist')->name('returnslist');

    Route::get('/transports', 'TransportController@readTransport')->name('transports');
    Route::get('/transports/{id}', 'TransportController@viewTransport')->name('viewTransport');
    Route::post('/transports/approve', 'TransportController@approveTransport')->name('approveTransport');
    Route::post('/transports/disapprove', 'TransportController@disapproveTransport')->name('disapproveTransport');
    Route::post('/transports/cancel', 'TransportController@cancelTransport')->name('cancelTransport');
    Route::post('/transports/delete', 'TransportController@deleteTransport')->name('deleteTransport');

    Route::get('/branchs', 'BranchsController@readBranch')->name('branchs');
    Route::get('/branchs/{id}', 'BranchsController@viewBranch')->name('viewBranch');
    Route::get('/branch/users/{id}', 'BranchsController@viewBranchUser')->name('viewBranchUser');
    Route::get('/branch/stocks/{id}', 'BranchsController@viewBranchStocks')->name('viewBranchStocks');
    Route::get('/branch/stockssearch', 'BranchsController@searchBranchStocks')->name('searchBranchStocks');
    Route::get('/branch/packages/{id}', 'BranchsController@viewBranchPackages')->name('viewBranchPackages');
    Route::get('/branch/dealers/{branchid}', 'DealersController@viewBranchDealers')->name('viewBranchDealers');
    Route::get('/dealers/{id}', 'DealersController@showdealersAdmin')->name('showdealersAdmin');   
    Route::get('/dealers', 'DealersController@showalldealersAdmin')->name('showalldealersAdmin');
    Route::get('/branch/packages/add/{branchid}/{packageid}', 'BranchsController@addBranchPackage')->name('addBranchPackage');
    Route::get('/branch/stocks/add/{branchid}/{productid}', 'BranchsController@addBranchProduct')->name('addBranchProduct');

    Route::post('/branchs/addbranchs', 'BranchsController@addBranch')->name('addbranchs');
    Route::post('/branchs/editbranchs', 'BranchsController@editBranch')->name('editbranchs');
    Route::post('/branchs/deletebranchs', 'BranchsController@deleteBranch')->name('deletebranchs');

    Route::get('/users', 'UsersController@readUser')->name('users');   
    Route::get('/users/{id}', 'UsersController@showUser')->name('showusers');   
    Route::post('/users/addusers', 'UsersController@addUser')->name('addusers');
    Route::post('/users/editusers', 'UsersController@editUser')->name('editusers');
    Route::post('/users/deleteusers', 'UsersController@deleteUser')->name('deleteusers');
    Route::post('/users/deletebranchusers', 'UsersController@deleteUser')->name('deleteusers');
    

    Route::post('/branchusers/addbranchusers', 'UsersController@addbranchusers')->name('addbranchusers');
    Route::post('/branchusers/editbranchusers', 'UsersController@editbranchusers')->name('editbranchusers');

    Route::get('/subscriber/add', 'SubscribersController@add')->name('add');
    Route::post('/subscriber/addsubscriber', 'SubscribersController@addSubscriber')->name('addSubscriber');
    Route::get('/subscribers', 'SubscribersController@viewSubscribers')->name('viewSubscribers');
    Route::get('/subscribers/status/{status}', 'SubscribersController@viewSubscribersStatus')->name('viewSubscribersStatus');

    Route::get('/branch/subscribers/{branchid}', 'SubscribersController@viewBranchSubscribers')->name('viewBranchSubscribers');
    Route::get('/subscribers/{boxid}', 'SubscribersController@showSubscriberAdmin')->name('showusers');  

    Route::get('/categories', 'CategoriesController@readCategory')->name('categories');
    Route::post('/categories/addcategories', 'CategoriesController@addCategory')->name('addcategories');
    Route::post('/categories/editcategories', 'CategoriesController@editCategory')->name('editcategories');
    Route::post('/categories/deletecategories', 'CategoriesController@deleteCategory')->name('deletecategories');
    
    Route::get('/brands', 'BrandsController@readBrand')->name('brands');
    Route::post('/brands/addbrands', 'BrandsController@addBrand')->name('addbrands');
    Route::post('/brands/editbrands', 'BrandsController@editBrand')->name('editbrands');
    Route::post('/brands/deletebrands', 'BrandsController@deleteBrand')->name('deletebrands');

    Route::get('/suppliers', 'SuppliersController@readSupplier')->name('suppliers');
    Route::post('/suppliers/addsuppliers', 'SuppliersController@addSupplier')->name('addsuppliers');
    Route::post('/suppliers/editsuppliers', 'SuppliersController@editSupplier')->name('editsuppliers');
    Route::post('/suppliers/deletesuppliers', 'SuppliersController@deleteSupplier')->name('deletesuppliers');

    Route::get('/products', 'ProductController@readProduct')->name('readProduct');
    Route::get('/products/add', 'ProductController@productAdd')->name('productAdd');
    Route::get('/products/branchadd/{prodid}', 'ProductController@productBranchAdd')->name('productBranchAdd');
    Route::get('/products/addvariation/{id}', 'ProductController@addVariation')->name('addVariation');
    Route::get('/products/{id}', 'ProductController@viewProduct')->name('viewProduct');
    Route::get('/product/{id}', 'ProductQuantityController@viewProductDetails')->name('viewProductDetails');
    Route::get('/product/edit/{id}', 'ProductQuantityController@editProductDetails')->name('editProductDetails');
    Route::post('/products/addproducts', 'ProductController@addProduct')->name('addproducts');
    Route::post('/products/editproducts', 'ProductController@editProduct')->name('editproducts');
    Route::post('/products/addproductvariation', 'ProductController@addProductVariation')->name('addproductvariation');
    Route::post('/products/updateproductvariation', 'ProductController@updateproductvariation')->name('updateproductvariation');
    Route::post('/products/addadditionalproductvariation', 'ProductController@addAdditionalProductVariation')->name('addadditionalproductvariation');
    Route::get('/products/branch/add/{branchid}/{productid}', 'ProductController@addBranchProduct')->name('addBranchProduct');
    Route::get('/productsearch', 'ProductController@productSearch')->name('productSearch');

    

    Route::post('/products/addproductquantity', 'ProductQuantityController@addProductQuantity')->name('addproductquantity');
    Route::post('/products/editproductquantity', 'ProductQuantityController@updateProductQuantity')->name('updateProductQuantity');
    Route::post('/products/updateprice', 'ProductQuantityController@updateprice')->name('updateprice');

    Route::get('/stocks', 'StocksController@stocks')->name('stocks');
    Route::get('/stockssearch', 'StocksController@stocksSearch')->name('stocksSearch');
    Route::get('/outofstocks', 'StocksController@outofstocks')->name('outofstocks');

    Route::get('/purchase', 'PurchaseController@readPurchase')->name('purchase');
    Route::post('/purchase/productsearch', 'PurchaseController@purchasesearch')->name('purchasesearch');
    Route::post('/createpurchase', 'PurchaseController@createpurchase')->name('createpurchase');
    Route::get('/createpurchase/{purchasenumber}', 'PurchaseController@createpurchaserequest')->name('createpurchaserequest');
    Route::post('/purchase/search', 'PurchaseController@productSearch')->name('productSearch');
    Route::post('/purchase/addquantity', 'PurchaseController@addQuantity')->name('addQuantity');
    Route::post('/purchase/recievequantity', 'PurchaseController@recievequantity')->name('recievequantity');
    Route::post('/purchase/addquantityrequest', 'PurchaseController@addQuantityRequest')->name('addQuantityRequest');
    Route::post('/purchase/deletequantityrequest', 'PurchaseController@deleteQuantityRequest')->name('deleteQuantityRequest');
    Route::post('/purchase/generatepurchaseorder', 'PurchaseController@generatePurchaseOrder')->name('generatePurchaseOrder');
    Route::get('/purchase/history/{purchasenumber}', 'PurchaseController@purchaseHistory')->name('purchaseHistory');
    Route::get('/purchase/recieved/{purchasenumber}', 'PurchaseController@purchaseRecieved')->name('purchaseRecieved');

    Route::get('/distribution', 'DistributionController@readDistributionAdmin')->name('readDistributionAdmin');
    Route::post('/distribution/search', 'DistributionController@distributionsearch')->name('distributionsearch');
    Route::post('/createdistribution', 'DistributionController@createdistributionAdmin')->name('createdistributionAdmin');
    Route::get('/distribution/{distributionnumber}', 'DistributionController@distributebranchproductAdmin')->name('createpurchaserequestAdmin');
    Route::post('/distribution/adddistributionrecord', 'DistributionController@adddistributionrecordAdmin')->name('adddistributionrecordAdmin');
    Route::post('/distribution/deletedistributionrecord', 'DistributionController@deletedistributionrecordAdmin')->name('deletedistributionrecordAdmin');
    Route::get('/distribution/history/{distributionnumber}', 'DistributionController@distributionHistoryAccAdmin')->name('distributionHistoryAccAdmin');
    Route::post('/distribution/generatedistribution', 'DistributionController@generatedistributionAdmin')->name('generatedistributionAdmin');

    Route::get('/vieworder/{ordernumber}', 'AdminController@adminvieworder')->name('adminvieworder');
    Route::get('/viewdealerorder/{ordernumber}', 'AdminController@viewadmindealerorder')->name('viewadmindealerorder');
    Route::get('/viewpackageorder/{ordernumber}', 'AdminController@viewpackageorder')->name('viewpackageorder');
    
    
});
Route::group(['middleware' =>'cashierAuth','prefix' => 'cashier'], function(){ 
    Route::get('/dashboard', 'CashierController@index')->name('dashboard');
    Route::get('/productsearch', 'CashierController@productsearchlive')->name('productsearchlive');
    Route::get('/account', 'CashierController@account')->name('account');
    Route::post('/updatepass', 'CashierController@updatepass')->name('updatepass');
    Route::get('/orders', 'CashierController@orders')->name('orders');
    Route::post('/cancelorder', 'CashierController@cancelorder')->name('cancelorder');
    Route::post('/cancelpackage', 'CashierController@cancelpackage')->name('cancelpackage');
    Route::post('/canceldealer', 'CashierController@canceldealer')->name('canceldealer');
    
    Route::get('/receiving', 'CashierController@receiving')->name('receiving');
    Route::get('/receiving/recieved/{drnumber}', 'CashierController@deliveryRecieved')->name('deliveryRecieved');
    Route::get('/receiving/{drnumber}', 'CashierController@receivingdetails')->name('receivingdetails');
    Route::post('/receiving/stocks', 'CashierController@receivingstocks')->name('receivingstocks');
    
    Route::get('/return', 'ReturnsController@returns')->name('returns');
    Route::get('/returns', 'ReturnsController@returnslist')->name('returnslist');
    Route::get('return/productsearchreturn', 'CashierController@productsearchreturn')->name('productsearchreturn');
    Route::post('/return/products', 'ReturnsController@returnsproducts')->name('returnsproducts');
    Route::post('/return/updatequantity', 'ReturnsController@updatequantity')->name('rupdatequantity');
    Route::get('/return/deleteproduct/{id}', 'ReturnsController@deleteproduct')->name('rdeleteproduct');
    Route::post('/return/processReturn', 'ReturnsController@processReturn')->name('processReturn');
    Route::get('/return/{returnbatchnum}', 'ReturnsController@returnnum')->name('returnnum');

    
    Route::post('/updateprice', 'CashierController@updateprice')->name('updateprice');
    Route::get('/orders/{requestId}', 'CashierController@viewOrders')->name('viewOrders');
    
    Route::get('/items', 'CashierController@items')->name('items');
    Route::get('/inventory', 'CashierController@inventory')->name('inventory');
    Route::get('/history', 'CashierController@history')->name('history');
    Route::post('/history/generate', 'CashierController@historygenerate')->name('history');
    Route::get('/report', 'CashierController@report')->name('report');
    Route::get('/transactions', 'CashierController@transactions')->name('transactions');
    Route::get('/vieworder/{ordernumber}', 'CashierController@cashiervieworder')->name('cashiervieworder');
    Route::get('/viewdealerorder/{ordernumber}', 'CashierController@viewcashierdealerorder')->name('viewcashierdealerorder');
    Route::get('/viewpackageorder/{ordernumber}', 'CashierController@viewpackageorder')->name('viewpackageorder');


    Route::get('/products/{id}', 'ProductController@viewBranchProduct')->name('viewBranchProduct');

    Route::post('/report/generate', 'CashierController@reportrange')->name('reportrange');
    Route::post('/cart/addproducts', 'CashierController@addProducts')->name('addProducts');
    Route::post('/cart/updatequantity', 'CashierController@updateQuantity')->name('cashierupdateQuantity');
    Route::post('/orderupdatequantity', 'CashierController@orderupdatequantity')->name('orderupdatequantity');
    Route::get('/cart/deleteproduct/{id}', 'CashierController@deleteproduct')->name('deleteproduct');
    Route::post('/cart/processOrder', 'CashierController@processOrder')->name('processOrder');
    Route::get('/cart/reciept/{ordernumber}', 'CashierController@reciept')->name('reciept');
    Route::post('/product/search', 'CashierController@productSearch')->name('productSearch');
    Route::post('/subscriber/search', 'CashierController@subscribersSearch')->name('subscribersSearch');
    Route::post('/dealers/search', 'CashierController@dealersSearch')->name('dealersSearch');
    Route::get('/declineorder/{id}/{requestid}', 'CashierController@declineOrder')->name('declineOrder');
    Route::get('/declinereservation/{requestid}', 'CashierController@declineReservation')->name('declineReservation');

    Route::get('/subscribers', 'SubscribersController@subscribersAcc')->name('subscribersAcc');
    Route::get('/subscribers/{boxid}', 'SubscribersController@showSubscriber')->name('showusers');  
    Route::get('/subscribers/status/{status}', 'SubscribersController@viewSubscribersStatus')->name('viewSubscribersStatus');
    Route::post('/subscribers/activate/', 'CustomerController@activateUser')->name('activateUser');  
    Route::post('/dealers/activate/', 'DealersController@activateUser')->name('activateUser');  
    Route::get('/dealers', 'DealersController@dealersAcc')->name('dealersAcc');
    Route::get('/dealers/{id}', 'DealersController@showdealers')->name('showdealers');   


});
Route::group(['middleware' =>'customerAuth','prefix' => 'subscriber'], function(){ 
    Route::get('/dashboard', 'CustomerController@index')->name('dashboard');
    Route::get('/history', 'CustomerController@history')->name('history');
    Route::get('/orders', 'CustomerController@orders')->name('orders');
    Route::get('/order/{requestId}', 'CustomerController@viewRequestOrder')->name('viewRequestOrder');
    Route::get('/account', 'CustomerController@account')->name('account');
    Route::get('/bookings', 'CustomerController@readBooking')->name('bookings');
    Route::get('/profile/edit/{id}', 'CustomerController@editProfile')->name('editProfile');
    Route::post('/profile/edit', 'CustomerController@editProfileproc')->name('editProfileproc');
    Route::get('/changepass/{id}', 'CustomerController@changepass')->name('changepass');
    Route::post('/changepass/proc', 'CustomerController@changepassproc')->name('changepassproc');
    Route::post('/updatepic', 'CustomerController@editProfilePic')->name('editProfilePic');
    Route::get('/bookings/{id}', 'CustomerController@viewBooking')->name('viewBooking');
    Route::get('/deleteorder/{requestid}', 'CartController@deleteOrder')->name('deleteOrder');

});
Route::group(['middleware' =>'oicAuth','prefix' => 'oic'], function(){ 
    Route::get('/dashboard', 'OicController@index')->name('dashboard');
});
Route::group(['middleware' =>'checkerAuth','prefix' => 'checker'], function(){ 
    Route::get('/dashboard', 'CheckerController@dashboard')->name('dashboard');
    Route::get('/receiving', 'CheckerController@dashboard')->name('dashboard');
    Route::get('/receiving/recieved/{drnumber}', 'CheckerController@deliveryRecieved')->name('deliveryRecieved');
    Route::get('/receiving/{drnumber}', 'CheckerController@receivingdetails')->name('receivingdetails');
    Route::post('/receiving/stocks', 'CheckerController@receivingstocks')->name('receivingstocks');
    Route::get('/account', 'CheckerController@account')->name('account');
    Route::post('/updatepass', 'CheckerController@updatepass')->name('updatepass');
});


// Route::group(['middleware' =>'customerAuth','prefix' => 'customer'], function(){ 
//     Route::get('/dashboard', 'CustomerController@index')->name('dashboard');
//     Route::get('/history', 'CustomerController@history')->name('history');
//     Route::get('/orders', 'CustomerController@orders')->name('orders');
//     Route::get('/account', 'CustomerController@account')->name('account');
//     Route::get('/deleteorder/{id}/{requestid}', 'CartController@deleteOrder')->name('deleteOrder');

// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
