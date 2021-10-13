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
/*Test commit @Neher*/
//function is_secured(){
//    return true;
//}
//app/Http/routes.php
// dd("check session");
Route::get('clear_cache', function () {
    \Artisan::call('route:clear');
    // shell_exec('composer dump-autoload');
    \Artisan::call('view:clear');
    \Artisan::call('key:generate');
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');

    echo ("Cache is cleared");
});
Route::get('key_generate', function () {
    // \Artisan::call('key:generate');
    \Artisan::call('view:clear');
    \Artisan::call('config:cache');
    // shell_exec('composer require emotality/tawk-laravel');
    dd("key_generate is cleared");
});
// if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
// // Ignores notices and reports all other kinds... and warnings
//     error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
// // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
// }

Route::get('/', ['as' => 'home', 'uses' => 'Front\HomeController@getHome']);
Route::get('/orderHistory/{id}', ['as' => 'orderHistory', 'uses' => 'StripePaymentController@orderHistory']);
# Authentication
Route::get('login', ['as' => 'login', 'middleware' => 'guest', 'uses' => 'SessionsController@create']);
Route::get('ServiceLogin', ['as' => 'ServiceLogin', 'middleware' => 'guest', 'uses' => 'SessionsController@ServiceLogin']);
Route::post('ServiceLogin', ['as' => 'ServiceLoginPost', 'uses' => 'SessionsController@ServiceStore']);
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::resource('sessions', 'SessionsController' , ['only' => ['create','store','destroy']]);
# Forgotten Password
Route::get('verified/suppliers/info',['as'=>'verified.suppliers.info','uses'=>'Front\ServiceChannel\ServiceChannelController@verified_suppliers_info']);
//Read Notification
Route::get('/readNotification/{id}', 'Front\BuyerController@readNotification');
//
Route::group(['middleware' => 'guest'], function()
{
    Route::get('forgot_password', 'Front\Auth\PasswordController@getEmail')->name('password.reset');
    Route::post('forgot_password','Front\Auth\PasswordController@postEmail');
    Route::get('reset_password', 'Front\Auth\PasswordController@getReset')->name('reset_password');
    Route::post('reset_password', 'Front\Auth\PasswordController@postReset');
    Route::get('success-login', 'Front\Auth\PasswordController@login_success');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::post('supplier/password-reset','dashboard\SupplierController@password_reset');
    Route::get('recommended-suppliers/products/{name}={id}','UserEnd\ProductController@productList');
    Route::get('email/verification_by_key/{key}','RegistrationController@veryfication_by_key');
    Route::get('email/verification_by_key-mobile/{key}','RegistrationController@veryfication_by_key_mobile');

    Route::get('user/login', ['as' => 'user.login', 'middleware' => 'guest', 'uses' => 'SessionsController@userLogin']);

    Route::get('login/{return_url}', ['as' => 'user.login', 'middleware' => 'guest', 'uses' => 'SessionsController@create']);

    Route::get('join','StandardUser\UsersController@create')->name('join_user');
    Route::get('registration/email/{email}', [
        'as' => 'registration.email',
        'uses' => 'RegistrationController@send_mail'
    ]);
    Route::get('gratings','StandardUser\UsersController@gratings');
    Route::post('registration/store', ['as' => 'registration.store', 'uses' => 'RegistrationController@store']);
    Route::post('mobile-registration/store', ['as' => 'mobile.store', 'uses' => 'RegistrationController@mobile_store']);
    Route::get('check_existing_user/{email}','RegistrationController@check_user_by_email');
    Route::post('save_company_info','RegistrationController@save_company_info');
    Route::get('register/verify/{confirmationCode}', [
        'as' => 'confirmation_path',
        'uses' => 'RegistrationController@confirm'
    ]);

    Route::get('check_captcha','StandardUser\UsersController@check_captcha');
    
    Route::get('/clear-cache', function() {
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('view:clear');

 
        
        return 'DONE';//Return anything
    });
});

# E-mail change route
Route::get('subscript/change-email', 'SessionsController@changeEmail');

Route::post('subscript/confirm-email', 'SessionsController@postchangeEmail');

Route::post('subscript/change-email', 'SessionsController@postchangeEmail');

Route::post('subscription/mail-change','SessionsController@verification_by_key');

Route::post('subscript/change-email/complete', 'SessionsController@completechangeEmail');

Route::group(['middleware' => ['redirectAdmin']], function()
{
    // Route::get('bdtdc', ['as' => 'bdtdc.home', 'uses' => 'AboutusController@bdtdc_home']);
    Route::get('bdtdc-home', ['as' => 'bdtdc-home.home', 'uses'=>'Front\UserEnd\CategoriesController@bdtdc_home']);
    Route::get('category', ['as' => 'bdtdc.category', 'uses' => 'Front\AboutusController@bdtdc_category']);
    Route::get('about', ['as' => 'about', 'uses' => 'Front\PagesController@getAbout']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'Front\PagesController@getContact']);
    Route::post('user/registration','Front\PagesController@post_registration');
    Route::post('admin/Customer-add', ['as' => 'admin.customer.store', 'uses' => 'Admin\CustomerController@store']);
});
Route::group(['middleware' => 'buyer'], function()
{
    Route::get('buyer/dashbord', ['as' => 'buyer.dashbord', 'uses' => 'Front\dashboard\BuyerController@index']);
    Route::get('dashboard/{section}','Front\dashboard\BuyerController@rander_dashboard_section');
});

Route::group(['middleware' => 'supplier'], function()
{
    Route::post('supplier/section_create','Front\dashboard\SupplierController@post_section_create');
    Route::post('supplier/product_update/{id}','Front\dashboard\SupplierController@post_product_update');
    Route::get('dashboard/{section}','Front\dashboard\CompanyController@rander_dashboard_section');
    Route::get('company/dashboard',['as'=>'dashboard','uses'=>'Front\dashboard\CompanyController@index']);
    Route::post('company/post_supplier_info',['as'=>'company.post_supplier_info','uses'=>'Front\dashboard\SupplierController@store']);
    Route::post('company/post_shipping_address','Front\dashboard\CompanyController@post_shipping_address');

    Route::get('company/get-verified',['as'=>'company.dashboard','uses'=>'Front\dashboard\CompanyController@get_verified']);

    Route::post('company/post_supplier_personal_info','Front\dashboard\SupplierController@post_personal_info');
    Route::get('supplier/product_create','Front\dashboard\SupplierController@product_create');
    Route::get('supplier/product_edit/{id}','Front\dashboard\SupplierController@product_edit');
    Route::post('supplier/product_create','Front\dashboard\SupplierController@post_product_create');
    Route::get('get_sub_category/{id}','Front\UserEnd\CategoriesController@get_sub_cat');
    Route::get('add_product_group/{group_name}','Front\dashboard\SupplierController@add_product_group');
    Route::get('supplier/wholesale_product_create','Front\dashboard\SupplierController@wholesale_product_create');
    Route::post('supplier/wholesale_product_create','Front\dashboard\SupplierController@post_wholesale_product_create');
    Route::get('supplier/get_section_data','Front\dashboard\SupplierController@get_section_data');
    Route::post('supplier/section_create',['as'=>'supplier.section_create','uses'=>'Front\dashboard\SupplierController@post_section_create']);
    Route::get('supplier/section_delete/{id}','Front\dashboard\SupplierController@post_section_delete');
    Route::post('supplier/section_update/{id}','Front\dashboard\SupplierController@post_section_update');
    Route::get('quotation/management',['as'=>'Qutation.management','uses'=>'Front\Qutation\QuotationController@Qutationlist']);
    Route::get('quotation/quote/{id}',['as'=>'Qutation.quote','uses'=>'Front\Qutation\QuotationController@quote_view']);
    Route::get('my-buyer',['as'=>'Qutation.my-buyer','uses'=>'Front\Qutation\QuotationController@my_buyer']);
    Route::get('extra-inquery',['as'=>'Qutation.extra-inquery','uses'=>'Front\Qutation\QuotationController@extra_inquery']);
    Route::get('user/upgrade/{id}',['as'=>'user/upgrade', 'uses'=>'Front\GoldSupplierController@create']);
    Route::post('user/upgrade_data', ['as'=>'user.upgrade.store_data', 'uses'=>'Front\GoldSupplierController@store_data']);
    Route::get('get_tab_content_form/{page}','StandardUser\StandardUserController@get_tab_content');
    Route::post('user/post_company_info','StandardUser\UsersController@post_company_info');
    Route::post('user/company_logo','StandardUser\UsersController@post_company_logo');
    Route::post('user/company_logo/delete','StandardUser\UsersController@delete_company_logo');
    Route::post('user/company_photo','StandardUser\UsersController@post_company_photo');
    Route::post('user/company_photo/delete/{id}','StandardUser\UsersController@delete_company_photo');
    Route::post('user/post_certification_info','StandardUser\UsersController@post_certification_info');
    Route::get('user/get_name_by_type/{id}','StandardUser\UsersController@get_name_by_type');
    Route::post('user/all_certification_image','StandardUser\UsersController@all_certification_image');
    Route::get('user/delete_image/{id}/{modal}','StandardUser\UsersController@delete_image');
    Route::get('change_product_image/{id}/{action}','Front\UserEnd\ProductController@change_product_image');
    Route::post('dashboard/banar_upload','StandardUser\UsersController@banar_upload');
    Route::post('dashboard/update_banar','StandardUser\UsersController@update_banar');
    Route::post('upload_p_image','Front\UserEnd\ProductController@upload_p_image');
    Route::get('delete_p_image/{img_name}','Front\UserEnd\ProductController@delete_p_image');
    Route::get('change_live_status/{current_status}/{id}','Front\UserEnd\ProductController@change_live_status_product');

    // product group

    Route::get('product/manage_product_group',['as'=>'product.manage_product_group','uses'=>'SupplierUser\SupplierController@product_manage_roup']);
    Route::post('product/manage_product_group',['as'=>'product.manage_product_group','uses'=>'SupplierUser\SupplierController@product_manage_roup_insert']);
    Route::get('product/manage_product_group_edit/{id}', ['as' => 'edit-group', 'uses' => 'SupplierUser\SupplierController@edit_group']);
    Route::post('product/manage_product_group_update/{id}', ['as'=>'group-update', 'uses'=>'SupplierUser\SupplierController@update_group']);
    Route::get('product/group_delete/{id}', ['as' => 'delete-group', 'uses' => 'SupplierUser\SupplierController@delete_group']);
    Route::post('x_product/{id}','Front\UserEnd\ProductController@x_product');

});

// Trade Center
Route::get('category/product/{id}',['as'=>'category.product','uses'=>'Front\UserEnd\CategoriesController@productList']);

Route::group(['middleware' => 'supplier','buyer'], function()
{
// payment proccess
    Route::get('paywithpaypal', array('as' => 'addmoney.paywithpaypal','uses' => 'AddMoneyController@payWithPaypal',));
    Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'AddMoneyController@postPaymentWithpaypal',));
    Route::get('paypal', array('as' => 'payment.status','uses' => 'AddMoneyController@getPaymentStatus',));
    Route::view('/checkout', 'checkout-page');
    Route::post('/checkout', 'PaymentController@createPayment')->name('create-payment');
    Route::get('/confirm', 'PaymentController@confirmPayment')->name('confirm-payment');
// stripe payment system
    Route::get('stripe', 'StripePaymentController@stripe');
    Route::post('stripe', 'StripePaymentController@stripePost')->name('stripe.post');
    Route::post('payment-success', 'PaymentController@success')->name('payment.success');
//order payment
    Route::post('order-payment', 'StripePaymentController@orderpayment')->name('order.payment.post');
    Route::post('/pay-order-payment', 'PaymentController@orderPayment')->name('pay-order-payment');
    Route::get('membership/invoice/{id}',['as'=>'product.invoice','uses'=>'Front\SupplierChannel\SupplierChannelController@product_invoice']);
// Live chat route
    Route::get('default/chat/{id}','Front\dashboard\MessageController@default_chat');
    Route::get('default/message','Front\dashboard\MessageController@default_message');
    Route::get('get-message-data/{data}','Front\dashboard\MessageController@get_message_data');
    Route::get('default/mark-action','Front\dashboard\MessageController@mark_action');
    Route::post('default/manage-folder','Front\dashboard\MessageController@manage_folder');
    Route::get('default/get-total-new-inq','Front\dashboard\MessageController@get_total_new_inq');
    Route::post('default/chat','Front\dashboard\MessageController@post_default_chat');
    Route::post('default/get-chat-data','Front\dashboard\MessageController@get_chat_data');
    Route::post('default/get-contact-data','Front\dashboard\MessageController@get_contact_data');
    Route::post('default/ajax-chat-data','Front\dashboard\MessageController@ajax_chat_data');
    Route::post('default/get-scrolled-chat','Front\dashboard\MessageController@get_scrolled_chat');
// End Live chat route
//order management route
    Route::get('order-list',['as' => 'order-list.customer.store', 'uses' => 'Front\Bdsource\OrderController@showall']);
    Route::get('send-order-list',['as' => 'send-order-list.customer.store', 'uses' => 'Front\Bdsource\OrderController@sendshowall']);
    Route::get('order-details/{id}',['as' => 'order.details', 'uses' => 'Front\Bdsource\OrderController@order_details']);
    Route::get('order-edit/{id}',['as' => 'order.edit', 'uses' => 'Front\Bdsource\OrderController@order_edit']);
    Route::post('order-edit/{id}',['as' => 'order.edit', 'uses' => 'Front\Bdsource\OrderController@post_order_edit']);
    Route::get('order-delete/{id}',['as' => 'order.delete', 'uses' => 'Front\Bdsource\OrderController@order_delete']);
    Route::get('order-confirm/{id}',['as' => 'order.confirm', 'uses' => 'Front\Bdsource\OrderController@order_confirm']);
    Route::get('order-postpone/{id}',['as' => 'order.postpone', 'uses' => 'Front\Bdsource\OrderController@order_postpone']);
    Route::get('order-active/{id}',['as' => 'order.active', 'uses' => 'Front\Bdsource\OrderController@order_active']);
    Route::get('order-drop-ship/{id}',['as' => 'order.drop.ship', 'uses' => 'Front\Bdsource\OrderController@order_drop_ship']);
    Route::get('confirm-order-received/{id}',['as' => 'order.active', 'uses' => 'Front\Bdsource\OrderController@order_confirm_received']);
// make fav
    Route::get('Trade/alert','Front\BuyerChannel\BuyerChannelController@trade_alert');
    Route::get('my-favorite','MobileView\MobileViewController@my_favorite');
    Route::post('make-favorite','Front\UserEnd\ProductController@make_favorite');
    Route::post('remove-favorite','Front\UserEnd\ProductController@remove_favorite');
    Route::get('favorite-product','Front\UserEnd\ProductController@favorite_product');
    Route::get('favorite-supplier','Front\UserEnd\ProductController@favorite_supplier');
    Route::post('remove-favorite-supplier','Front\UserEnd\ProductController@remove_favorite_supplier');

// account settings
    Route::get('account-settings','Front\SettingController@account_settings');
    Route::get('my-profile','Front\SettingController@my_profile');
    Route::get('edit-my-profile','Front\SettingController@edit_my_profile');
    Route::post('edit-my-profile/{user_id}','Front\SettingController@update_my_profile');
    Route::get('member-profile','Front\SettingController@member_profile');
    Route::get('upload-photo','Front\SettingController@upload_photo');
    Route::get('sample-photo','Front\SettingController@sample_photo');
    Route::get('privacy-setting','Front\SettingController@privacy_setting');
    Route::get('email-services','Front\SettingController@email_services');
    Route::get('security-questions','Front\SettingController@security_question');
    Route::get('manage-verification-phones','Front\SettingController@manage_verification_phones');
    Route::get('bank-account','Front\SettingController@bank_account');
    Route::get('payment-history','Front\SettingController@payment_history');
    Route::get('order/invoice/{id}',['as' => 'order.orderinvoice', 'uses' => 'Front\Bdsource\OrderController@order_invoice']);

    Route::get('Mybuy','Front\SettingController@index');
    Route::get('order-details','Front\dashboard\ProductCreateController@index');

    Route::get('Mybuying-Request','Front\BuyingRequest\BuyingRequestController@get_buying_request');
    Route::get('my-supplier','Front\BuyingRequest\BuyingRequestController@my_supplier');
// password reset
    Route::post('user/password-reset','Front\dashboard\SupplierController@password_reset');


    Route::get('mysource/inq/{id}','Front\BuyingRequest\BuyingRequestController@mysource');
    Route::get('mysource/edit-add/{id}','Front\BuyingRequest\BuyingRequestController@edit_add');
    Route::post('mysource/edit-add/{id}','Front\BuyingRequest\BuyingRequestController@post_edit_add');
    Route::get('mysource/add-details/{id}','Front\BuyingRequest\BuyingRequestController@add_details');
    Route::post('mysource/update-details','Front\BuyingRequest\BuyingRequestController@update_details');
    Route::get('mysource_quotations/inq/{id}','Front\BuyingRequest\BuyingRequestController@mysource_quotations');
    Route::get('mysource/online-order/{inq}/{id}','Front\BuyingRequest\BuyingRequestController@online_order');
    Route::post('mysource/post-online-order/{quote_id}','Front\BuyingRequest\BuyingRequestController@post_online_order');

    Route::get('quotations','Front\BuyerChannel\BuyerChannelController@quote_form');
    Route::get('view/request-sample/{id}',['as'=>'view-request.sample','uses'=>'Front\BuyingRequest\BuyingRequestController@view_request_sample']);
    Route::post('view/request-sample/success',['as'=>'view-request.sample.success','uses'=>'Front\BuyingRequest\BuyingRequestController@view_request_sample_success']);
    Route::get('list/view/requested/sample',['as'=>'list.requested_sample','uses'=>'Front\BuyingRequest\BuyingRequestController@requested_sample']);
    Route::get('list/view/requested/sample/buyer','Front\BuyingRequest\BuyingRequestController@sample_buyer');
    Route::get('list/view/requested/sample/buyer/{id}','Front\BuyingRequest\BuyingRequestController@sample_buyer_details');
// message conversion
    Route::post('post_conversation','Front\BuyerController@post_conversation');
    Route::get('get_inquires_by_filter/{group}','Front\dashboard\SupplierController@get_inquires_by_filter');
    Route::get('inquery_action/{action}/{inquery_id}','Front\dashboard\SupplierController@inquery_action');
    Route::get('reverse-action-on-inquery/{id}','Front\dashboard\SupplierController@reverse_action_on_inquery');
//Route::get('inquery_action/{action}/{inquery_id}','dashboard\SupplierController@inquery_action');

    Route::get('country/products',['as'=>'country.products','uses'=>'Front\UserEnd\CategoriesController@country_productList']);
    Route::get('category/products',['as'=>'category.products','uses'=>'Front\UserEnd\CategoriesController@category_productList']);
    Route::get('conversation/{id}/{quotation_type}','Front\BuyerController@get_conversation');
    Route::get('conversation/change-inq-view','Front\BuyerController@change_inq_view');
    Route::post('product_details',['as'=>'product.details','uses'=>'Front\UserEnd\ProductController@message']);

    Route::post('all-action/{name}',['as'=>'all.action','uses'=>'Front\AllActionController@manage_action']);

});
Route::get('byer/contact_supplier/{supplier_id}/{product_id}','Front\BuyerController@get_contact_with_supplier');
Route::get('contact_supplier/{supplier_id}','Front\BuyerController@contact_supplier');
Route::post('buyer/contact_supplier','Front\BuyerController@post_contact_with_supplier');
Route::post('user/upgrade', ['as'=>'user.upgrade.store', 'uses'=>'Front\GoldSupplierController@store']);
Route::get('country/region','Front\limitedController@country_region');
Route::get('submit_report', ['as'=>'submit.report', 'uses'=>'Front\ServiceChannel\ServiceChannelController@report']);
Route::post('submit_report', ['as'=>'submit.report.store', 'uses'=>'Front\ServiceChannel\ServiceChannelController@report_store']);
# Admin Routes
Route::get('admin/profiles/listarchiveuser', ['uses' => 'Admin\AdminUsersController@listarchiveuser']);
Route::group(['middleware' => ['auth', 'admin']], function()
{
    Route::resource('admin/profiles', 'Admin\AdminUsersController', ['only' => ['index', 'show', 'edit', 'update', 'destroy']]);
    Route::get('admin/profiles/deletuser/{id}', ['uses' => 'Admin\AdminUsersController@deletuser']);
    Route::get('admin/profiles/permanentdeleteuser/{id}', ['uses' => 'Admin\AdminUsersController@permanentdeleteuser']);
    Route::get('admin/profiles/approveuser/{id}', ['uses' => 'Admin\AdminUsersController@approveuser']);
    
    Route::post('admin/profiles/{id}/update', ['as' => 'admin.profiles.update','uses' => 'Admin\AdminUsersController@update']);

    Route::get('admin/profiles/deactive/{id}', ['as' => 'profiles.deactive', 'uses' => 'Admin\AdminUsersController@deactive']);
    Route::get('admin/profiles/active/{id}', ['as' => 'profiles.active', 'uses' => 'Admin\AdminUsersController@active']);

    Route::get('admin',function(){
        return  redirect(URL::to('admin/dashboard'));
    });
    Route::post('admin/company/search', ['as' => 'admin.company.search', 'uses' => 'Admin\AdminUsersController@getSearch']);


    Route::get('admin/dashboard', ['as' => 'admin_dashboard', 'uses' => 'Admin\AdminController@getHome']);
    Route::get('admin/dashboard/{content}','Admin\AdminController@getcontent');
    Route::get('admin/sliderSetting', ['as' => 'admin.slider_setting', 'uses' => 'Admin\SliderSettingController@index']);
    Route::get('admin/sliderAdd', ['as' => 'admin.slider_add', 'uses' => 'Admin\SliderSettingController@create']);
    Route::get('admin/sliderView/{id}', ['as' => 'admin.slider_view', 'uses' => 'Admin\SliderSettingController@show']);
    Route::post('admin/sliderStore', ['as' => 'admin.slider_store', 'uses' => 'Admin\SliderSettingController@store']);
    Route::get('admin/sliderEdit/{id}', ['as' => 'admin.slider_edit', 'uses' => 'Admin\SliderSettingController@edit']);
    Route::post('admin/sliderUpdate/{id}', ['as' => 'admin.slider_update', 'uses' => 'Admin\SliderSettingController@update']);
    Route::get('admin/sliderDelete/{id}', ['as' => 'admin.slider_delete', 'uses' => 'Admin\SliderSettingController@destroy']);

    Route::get('admin/noticeList', ['as' => 'admin.notice_list', 'uses' => 'Admin\NoticeBoardController@index']);
    Route::get('admin/noticeView/{id}', ['as' => 'admin.notice_view', 'uses' => 'Admin\NoticeBoardController@show']);

    Route::get('admin/noticeCreate', ['as' => 'admin.notice_create', 'uses' => 'Admin\NoticeBoardController@create']);
    Route::post('admin/noticeStore', ['as' => 'admin.notice_store', 'uses' => 'Admin\NoticeBoardController@store']);
    Route::get('admin/noticeEdit/{id}', ['as' => 'admin.notice_edit', 'uses' => 'Admin\NoticeBoardController@edit']);
    //Route for manage product
    Route::get('admin/manage-product', ['as' => 'admin.manage-product', 'uses' => 'Admin\ProductController@manage_product']);
    Route::get('admin/edit-product/{id}', ['as' => 'admin.edit-product', 'uses' => 'Admin\ProductController@edit_product']);
    /*Route::get('dashboard/edit-product/{id}', ['as' => 'admin.edit-product', 'uses' => 'dashboard\SupplierController@product_edit']);*/
    Route::get('admin/confirm-delete-product/{id}', ['as' => 'admin.delete.product', 'uses' => 'Admin\ProductController@delete_product']);
    Route::post('admin/product-update/{id}', ['as'=>'admin.product-update', 'uses'=>'Front\dashboard\SupplierController@post_product_update']);

    //Dangerous route for deleting everything, so be careful
    Route::get('admin/manage-anything', ['as' => 'admin.manage-anything', 'uses' => 'Admin\DangerousController@index']);
    Route::get('admin/make-me-login/{id}', ['as' => 'admin.make-login', 'uses' => 'Admin\DangerousController@make_me_login']);
    Route::get('admin/make-me-login-redirect/{id}', ['as' => 'admin.make-login-redirect', 'uses' => 'Admin\DangerousController@make_me_login_redirect']);
    Route::get('admin/check-image-available', ['as' => 'admin.check-image-available', 'uses' => 'Admin\DangerousController@check_image_available']);

    //Route for manage inquiry
    Route::any('admin/manage-inquiry', ['as' => 'admin.manage-inquiry', 'uses' => 'Admin\ProductController@manage_inquiry']);
    Route::get('admin/edit-inquiry/{id}', ['as' => 'admin.edit-inquiry', 'uses' => 'Front\BuyingRequest\BuyingRequestController@edit_add']);
    Route::post('admin/edit-inquiry/{id}', ['as' => 'admin.post-edit-inquiry', 'uses' => 'Admin\ProductController@post_edit_inquiry']);
    Route::post('admin/edit-inquiry-active/{id}/{value}', ['as' => 'admin.manage-inquiry-active', 'uses' => 'Admin\ProductController@edit_inquiry_active']);
    Route::get('admin/inquiry-details/{id}', ['as' => 'admin.inquiry-details', 'uses' => 'Admin\ProductController@inquiry_details']);
    Route::post('admin/delete-inquiry/{id}', ['as' => 'admin.inquiry-delete', 'uses' => 'Admin\ProductController@delete_inquiry']);
    Route::post('admin/manage-inquiry-store', ['as' => 'admin.store-inquiry', 'uses' => 'Admin\ProductController@store_inquiry']);
    Route::post('admin/make-home-inquiry', ['as' => 'admin.store-home-inquiry', 'uses' => 'Admin\ProductController@store_home_inquiry']);
    Route::delete('admin/delete-allinquiry', 'Admin\ProductController@deleteAll');

    // route for admin product search
    Route::get('admin/product-search', ['as' => 'admin.product-search', 'uses' => 'Admin\ProductController@product_search']);
    // route for admin product search

    //Route for SEO
    Route::get('admin/add-seo', ['as' => 'admin.add-seo', 'uses' => 'Admin\ModuleController@add_seo']);
    Route::post('admin/seo-id', ['uses' => 'Admin\ModuleController@get_seo']);
    Route::get('admin/manage-seo', ['as' => 'admin.manage-seo', 'uses' => 'Admin\ModuleController@manage_seo']);
    Route::post('admin/manage-seo', ['as' => 'admin.add-seo-store', 'uses' => 'Admin\ModuleController@add_seo_store']);
    Route::get('admin/edit-seo/{id}', ['as' => 'admin.edit-seo', 'uses' => 'Admin\ModuleController@edit_seo']);
    Route::post('admin/seo-update/{id}', ['as'=>'admin.seo-update', 'uses'=>'Admin\ModuleController@update_seo']);
    Route::get('admin/delete-seo/{id}', ['as' => 'admin.delete-seo', 'uses' => 'Admin\ModuleController@delete_seo']);
    #route by monir
    Route::get('admin/product', ['as' => 'admin.product', 'uses' => 'Admin\ProductController@index']);
    Route::get('admin/productdelete/{id}', ['as' => 'admin.productdelete', 'uses' => 'Admin\ProductController@productdelete']);
    Route::get('admin/product-add', ['as' => 'admin.product-add', 'uses' => 'Admin\ProductController@create']);
    Route::post('admin/product-add', ['as'=>'admin.product-add', 'uses'=>'Admin\ProductController@store']);
    Route::get('admin/products', ['as'=>'admin.product-list', 'uses'=>'Admin\ProductController@index']);
    Route::get('admin/product-edit/{id}', ['as'=>'admin.product-edit', 'uses'=>'Admin\ProductController@edit']);
    // Route::post('admin/product-update/{id}', ['as'=>'admin.product-update', 'uses'=>'Admin\ProductController@update']);
    // manage buying request
    Route::get('admin/manage-buying-request', ['as' => 'admin.manage-buying-request', 'uses' => 'Admin\AdminController@ManageBuyingRequest']);


    //modules CRUD
    Route::get('admin/module-add', ['as' => 'admin.module-add', 'uses' => 'Admin\ModuleController@create']);
    Route::post('admin/module-add', ['as' => 'admin.module-add', 'uses' => 'Admin\ModuleController@store']);
    Route::get('admin/module-manage', ['as' => 'admin.module-manage', 'uses' => 'Admin\ModuleController@allModules']);
    Route::get('admin/module-edit/{id}', ['as' => 'admin.module-edit', 'uses' => 'Admin\ModuleController@edit']);
    Route::post('admin/module-update/{id}', ['as'=>'admin.module-update', 'uses'=>'Admin\ModuleController@update']);
    Route::get('admin/module-delete/{id}','Admin\ModuleController@delete');

    //Page CRUD
    Route::resource('page_content', 'Admin\PageContentController');
    Route::get('admin/page_content-delete/{id}','Admin\PageContentController@destroy');

    //page-contents CRUD
    Route::get('admin/content-add', ['as' => 'admin.content-add', 'uses' => 'Admin\PageCategoriesController@create']);
    Route::post('admin/content-add', ['as' => 'admin.content-add', 'uses' => 'Admin\PageCategoriesController@store']);
    Route::get('admin/content-manage', ['as' => 'admin.content-manage', 'uses' => 'Admin\PageCategoriesController@index']);
    Route::get('admin/content-edit/{id}', ['as' => 'admin.content-edit', 'uses' => 'Admin\PageCategoriesController@edit']);
    Route::post('admin/content-update/{id}', ['as'=>'admin.content-update', 'uses'=>'Admin\PageCategoriesController@update']);
    Route::get('admin/content-delete/{id}','Admin\PageCategoriesController@delete');
    //page-contents descriptions CRUD
    Route::get('admin/description-add', ['as' => 'admin.description-add', 'uses' => 'Admin\PagesContentDescriptionController@create']);
    Route::post('admin/description-add', ['as' => 'admin.description-add', 'uses' => 'Admin\PagesContentDescriptionController@store']);
    Route::get('admin/description-manage', ['as' => 'admin.description-manage', 'uses' => 'Admin\PagesContentDescriptionController@index']);
    Route::get('admin/description-edit/{id}', ['as' => 'admin.description-edit', 'uses' => 'Admin\PagesContentDescriptionController@edit']);
    Route::post('admin/description-update/{id}', ['as'=>'admin.description-update', 'uses'=>'Admin\PagesContentDescriptionController@update']);
    Route::get('admin/description-delete/{id}','Admin\PagesContentDescriptionController@delete');
    #end monir route
    Route::get('admin/Customer', ['as' => 'admin.Customer', 'uses' => 'Admin\CustomerController@index']);
    Route::get('admin/Customer-add', ['as' => 'admin.Customer-add', 'uses' => 'Admin\CustomerController@create']);
    //Route::post('admin/Customer-add', ['as' => 'admin.customer.store', 'uses' => 'Admin\CustomerController@store']);

    Route::get('admin/Customer-group', ['as'=>'admin.customer.group', 'uses'=>'Admin\CustomerController@create_group']);
    Route::post('admin/Customer-group', ['as'=>'admin.customer.group_store', 'uses'=>'Admin\CustomerController@group_store']);

    Route::get('admin/add-package', ['as'=>'admin.customer.package', 'uses'=>'Admin\CustomerController@create_package']);
    Route::post('admin/add-package', ['as'=>'admin.customer.store_package', 'uses'=>'Admin\CustomerController@store_package']);

    Route::get('admin/Category-add', ['as'=> 'admin.category.add', 'uses'=>'Admin\CategoryController@create']);
    Route::post('admin/Category-add', ['as'=> 'admin.category.store', 'uses'=>'Admin\CategoryController@store']);
    Route::get('admin/category-list', ['as' => 'admin.category-list', 'uses' => 'Admin\CategoryController@index']);
    Route::post('edit-category/category_sort/{value}/{id}', ['as'=>'admin.category-sort', 'uses'=>'Admin\CategoryController@category_sort']);
    Route::get('admin/suppliers-list', ['as' => 'admin.suppliers-list', 'uses' => 'Admin\CategoryController@supplier_status']);
    Route::get('admin/category-edit/{id}', ['as' => 'admin.category-edit', 'uses' => 'Admin\CategoryController@edit']);
    Route::post('admin/category-edit/{id}', ['as' => 'admin.category-editu', 'uses' => 'Admin\CategoryController@update']);
    Route::post('admin/category-update/{id}', ['as' => 'admin.category-update', 'uses' => 'Admin\CategoryController@update']);
    Route::get('admin/category-delete/{id}', ['as' => 'admin.category-delete', 'uses' => 'Admin\CategoryController@destroy']);

    Route::get('admin/Add-business-types', ['as'=>'admin.category.businessType', 'uses'=>'Admin\CategoryController@business_type']);
    Route::post('admin/Add-business-types', ['as'=>'admin.category.store_businessType', 'uses'=>'Admin\CategoryController@store_business_type']);

    Route::get('admin/tradeshow-add', ['as'=>'admin.tradeshow-add', 'uses'=>'Admin\TradeshowController@create']);
    Route::get('admin/tradeshow-show', ['as'=>'admin.tradeshow-show', 'uses'=>'Admin\TradeshowController@show']);
    Route::get('admin/tradeshow-edit/{id}', ['as'=>'admin.tradeshow-edit', 'uses'=>'Admin\TradeshowController@edit']);
    Route::post('admin/tradeshow-add', ['as'=>'admin.tradeshow-add', 'uses'=>'Admin\TradeshowController@store']);
    Route::post('admin/tradeshow-update/{id}', ['as'=>'admin.tradeshow-update', 'uses'=>'Admin\TradeshowController@update']);
    Route::post('admin/tradeshow/search', ['as'=>'admin.post_trade_search', 'uses'=>'Admin\TradeshowController@search']);
    Route::get('admin/tradeshow-delete/{id}','Admin\TradeshowController@delete');
    // Around World routes
    Route::get('admin/aroundworld-add', ['as'=>'admin.around-world', 'uses'=>'Admin\TradeshowController@around_world_create']);
    Route::post('admin/aroundworld-add', ['as'=>'admin.around-world-add', 'uses'=>'Admin\TradeshowController@around_world_store']);
    Route::get('admin/aroundworld-show', ['as'=>'admin.aroundworld-show', 'uses'=>'Admin\TradeshowController@around_world_show']);
    Route::get('admin/aroundworld-edit/{id}', ['as'=>'admin.aroundworld-edit', 'uses'=>'Admin\TradeshowController@around_world_edit']);
    Route::post('admin/aroundworld-update/{id}', ['as'=>'admin.aroundworld-update', 'uses'=>'Admin\TradeshowController@around_world_update']);
    Route::post('admin/aroundworld-search', ['as'=>'admin.post_aroundworld_search', 'uses'=>'Admin\TradeshowController@around_world_search']);
    Route::get('admin/aroundworld-delete/{id}','Admin\TradeshowController@around_world_delete');

    #for global keyword and value #
    Route::get('admin/add-keyword', ['as'=>'admin.around-world', 'uses'=>'Admin\ModuleController@keyword_create']);
    Route::post('admin/store-keyword', ['as'=>'admin.around-world-add', 'uses'=>'Admin\ModuleController@keyword_store']);

    Route::get('admin/add-keyword-value', ['as'=>'admin.keyword-value', 'uses'=>'Admin\ModuleController@keyword_value_create']);
    Route::post('admin/store-keyword-value', ['as'=>'admin.keyword-value.store', 'uses'=>'Admin\ModuleController@keyword_value_store']);
    Route::get('admin/manage-home-products', ['as'=>'admin.manage_home_products', 'uses'=>'Admin\HomepageController@index']);
    Route::post('admin/add-home-product', ['as'=>'admin.add_home_product', 'uses'=>'Admin\HomepageController@add_home_product']);
    Route::post('admin/edit-home-product/{section}/{value}/{id}', ['as'=>'admin.edit_home_product', 'uses'=>'Admin\HomepageController@edit_home_product']);
    Route::post('admin/delete-home-product/{id}', ['as'=>'admin.delete_home_product', 'uses'=>'Admin\HomepageController@delete_home_product']);
    Route::post('admin/delete-home-product-image/{id}', ['as'=>'admin.delete_home_product_image', 'uses'=>'Admin\HomepageController@delete_home_product_image']);
    Route::get('admin/Manage-selected-supplier', ['as' => 'admin.Manage.selected.supplier', 'uses' => 'Admin\ProductController@Manage_selected_supplier']);

    //Add by poly
    Route::get('Footer-add',['as'=>'admin.Footer-add', 'uses'=>'Admin\FooterController@create']);
    Route::post('Footer-add', ['as'=>'admin.footercategory.store', 'uses'=>'Admin\FooterController@store']);

    Route::get('manage-junk-product','Admin\ProductController@junk_product_form');
    Route::get('delete-junk-products','Admin\ProductController@delete_junk_products');
    Route::get('delete-junk-images','Admin\ProductController@delete_junk_images');
    Route::get('delete-junk-company','Admin\ProductController@delete_junk_company');
    Route::get('delete-junk-company/manage-zone/{idzone}','MyController@delete_junk_company');

   //For Seller ProductPage
   Route::get('admin/profiles/sellerproduct/{id}', 'Admin\SellerProductController@index');
   Route::get('admin/profiles/sellerproduct_edit/{id}', 'Admin\SellerProductController@product_edit');
   Route::post('admin/profiles/sellerproduct_update/{id}', 'Admin\SellerProductController@post_product_update');
   Route::get('admin/profiles/sellerproduct_delete/{id}', 'Admin\SellerProductController@product_delete');
   Route::get('admin/profiles/sellerproduct/add_product_group/{group_name}','Admin\SellerProductController@add_product_group');
});



// special page
Route::get('online-marketplace',['as'=>'online.marketplace.show','uses'=>'Front\UserEnd\CategoriesController@showall']);
Route::get('Marketplace',['as'=>'online.marketplace.show','uses'=>'Front\UserEnd\CategoriesController@showall']);
Route::get('kids-fashion',['as'=>'Home.Contract.Textiles','uses'=>'Front\UserEnd\SpecialPageController@showall']);
Route::get('bangladesh-rmg',['as'=>'Home.bangladesh.rmg','uses'=>'Front\UserEnd\SpecialPageController@rmg']);
Route::get('bangladesh-clothing',['as'=>'Home.bangladesh.clothing','uses'=>'Front\UserEnd\SpecialPageController@clothing']);
Route::get('bangladesh-footwear',['as'=>'Home.bangladesh.footware','uses'=>'Front\UserEnd\SpecialPageController@footware']);
Route::get('bangladesh-frozen-foods',['as'=>'Home.bangladesh.frozen.food','uses'=>'Front\UserEnd\SpecialPageController@frozen_food']);
Route::get('bangladesh-tea',['as'=>'Home.bangladesh.tea.coffee','uses'=>'Front\UserEnd\SpecialPageController@tea_coffee']);
Route::get('bangladesh-furniture',['as'=>'Home.bangladesh.furniture','uses'=>'Front\UserEnd\SpecialPageController@furniture']);
Route::get('bangladesh-jute-products',['as'=>'Home.bangladesh.jute','uses'=>'Front\UserEnd\SpecialPageController@jute']);
Route::get('bangladesh-leather',['as'=>'Home.bangladesh.jute','uses'=>'Front\UserEnd\SpecialPageController@leather']);

// Helpcenter pages

Route::get('user/guide',['as'=>'user.guide', 'uses'=>'Front\GoldSupplierController@userguide']);
route::get('select/suppliers','Front\GoldSupplierController@buyer_supplier_info');
Route::get('buyer/contactsupplier',['as'=>'buyer.contactsupplier','uses'=>'Front\AboutusController@buyer_contact_supplier']);
Route::get('services',['as'=>'bdtdc.service','uses'=>'Front\ServiceChannel\ServiceChannelController@bdtdc_service']);
Route::get('executive','Front\GoldSupplierController@executive');
Route::get('application/received/info','Front\GoldSupplierController@application_received');
Route::get('trade','Front\GoldSupplierController@trade');
Route::get('buyer-list','Front\limitedController@buyer');
Route::get('security-list','Front\limitedController@security');
Route::get('trading-agent','Front\GoldSupplierController@trading_agent_bdtdc');
Route::get('trading-agent/details/{company_name}/{company_id}','Front\GoldSupplierController@trading_agent_details');
Route::get('market/individual','Front\GoldSupplierController@individual_product');
Route::get('extra-inquiries','Front\GoldSupplierController@extra_inquiries');
Route::get('vvgratings','Front\GoldSupplierController@bdtdc_agencies');
Route::get('company/home','Front\GoldSupplierController@company_home');
Route::get('about-us',['as'=>'about.us','uses'=>'Front\AboutusController@about_bdtdc']);

// trade answer
Route::get('trade/answers/{id}',['as'=>'trade.answers','uses'=>'Front\BuyerChannel\BuyerChannelController@trade_answer']);
Route::get('trade/answers-search',['as'=>'trade.answers','uses'=>'Front\BuyerChannel\BuyerChannelController@trade_answer_search']);
Route::post('trade/answers',['as'=>'trade.answers','uses'=>'Front\BuyerChannel\BuyerChannelController@trade_answers_insert']);
Route::post('trade/answers/success/page',['as'=>'trade.answers.success','uses'=>'Front\BuyerChannel\BuyerChannelController@trade_answers_store']);
Route::post('pages/trade-answers',['as'=>'pages.trade-answers','uses'=>'Front\BuyerChannel\BuyerChannelController@t_answers']);
Route::post('pages/category_submit/{category_id}',['as'=>'pages.category.submit','uses'=>'Front\BuyerChannel\BuyerChannelController@t_submit_answers']);

// buyer protection
Route::get('Trade/alert/{id}','Front\BuyerChannel\BuyerChannelController@trade_alert');
Route::get('order-protect','Front\BuyerChannel\BuyerChannelController@trade_protect');
Route::post('get-supplier/{email}','Front\BuyerChannel\BuyerChannelController@get_supplier');
Route::post('order-protect-post','Front\BuyerChannel\BuyerChannelController@trade_protect_post');

Route::get('popular-brand/{id}','Front\Qutation\QuotationController@popular_product_brand');
Route::get('Gold-supplier','Front\FooterPage\FooterPageController@gold_supplier');

// Footer controller
Route::get('tradeshow', ['as' => 'trade.show', 'uses' => 'Admin\TradeshowController@showall']);
Route::get('get_file/{name}','Front\FooterPage\FooterPageController@get_excel');
Route::post('upload/excel','Front\FooterPage\FooterPageController@getFile');
Route::get('excel/upload','Front\FooterPage\FooterPageController@get_form_post');
Route::get('product-list/policy','Front\FooterPage\FooterPageController@product_list_Policies');
Route::get('sourcing-easier','Front\FooterPage\FooterPageController@sourcing_easier');
Route::get('tradeshow/info-details/{id}','Admin\TradeshowController@trade_show_info');
Route::get('supplemental/service','Front\FooterPage\FooterPageController@supplemental_service');
Route::get('user/agreement','Front\FooterPage\FooterPageController@user_agreement');
Route::get('Buyer/Training','Front\FooterPage\FooterPageController@buyer_training');
Route::get('online/Buy_selleing','Front\FooterPage\FooterPageController@online_buy_selling');
Route::get('improve/product-ranking','Front\FooterPage\FooterPageController@product_ranking');
Route::get('Training-course','Front\FooterPage\FooterPageController@training_course');
Route::get('Company/profile','Front\FooterPage\FooterPageController@company_profile');
Route::get('Quality/posting-for-grab','Front\FooterPage\FooterPageController@quality_posting');
Route::get('Business/trend-in-Bangladesh','Front\FooterPage\FooterPageController@business_trend');
Route::get('complaint-letter','Front\FooterPage\FooterPageController@compliment_letter');
Route::get('How-to-respond-buyer-inquiries','Front\FooterPage\FooterPageController@responds_buyer_inquiries');
Route::get('multi-language-posting','Front\FooterPage\FooterPageController@multi_language_posting');
Route::get('how-to-deal','Front\FooterPage\FooterPageController@how_to_deal');
Route::get('how-to-buy','Front\FooterPage\FooterPageController@buy_product');
Route::get('how-to-join','Front\FooterPage\FooterPageController@how_to_join');

Route::get('buyer/guide-bdsource','Front\FooterPage\FooterPageController@buyer_guide')->name('buyer.guide-bdsource');
route::get('Intellectual','Front\FooterPage\FooterPageController@Intellectual');
route::get('Policies_Rules','Front\FooterPage\FooterPageController@Policies_Rules_data');
route::get('terms_use','Front\FooterPage\FooterPageController@terms_of_use');

route::get('product_listing_policy','Front\FooterPage\FooterPageController@product_listing_policy');
route::get('displaying-prohibited','Front\FooterPage\FooterPageController@displaying_prohibited');
route::get('buying-request','Front\FooterPage\FooterPageController@buying_request');
Route::get('ServiceChannel/pages/for_buyer/35',function(){

    return Redirect::to('help-center');

});
// About us page

//sending mail
Route::get('contact_message_form','Front\GoldSupplierController@contact_message');
Route::post('contact/message/form_success',['as'=>'contact_message_form_success','uses'=>'Front\GoldSupplierController@contact_message_store']);
Route::get('Banglaesdhi/product','MobileView\MobileViewController@bangladeshi_product');
Route::get('country/name/product','MobileView\MobileViewController@country_product');
Route::get('product-category','MobileView\MobileViewController@product_category');
Route::get('company-profile/{id}','MobileView\MobileViewController@company_info');
Route::get('contact-supplier','MobileView\MobileViewController@contact_supp');
Route::get('sub-category/{name}/{id}','MobileView\MobileViewController@sub_category');
Route::get('subcategory-product-view/{id}','MobileView\MobileViewController@sub_category_pro_view');
Route::get('wholesale-subcategory/{name}/{id}','MobileView\MobileViewController@wholesale_subcategory');
Route::get('wholesale-subcategory-product-view/{id}','MobileView\MobileViewController@wholesale_sub_category_pro_view');
Route::get('product-of-month','MobileView\MobileViewController@product_of_month');
Route::get('product-by-country','MobileView\MobileViewController@product_by_region');
Route::get('selected-country-supplier','MobileView\MobileViewController@selected_country_supplier');
Route::get('wholesale/product','MobileView\MobileViewController@wholesale_product');
Route::get('bdsource/product','MobileView\MobileViewController@bdsource_product');
Route::get('bdsource-for-buyer','MobileView\MobileViewController@bdsource_buyer');
Route::get('quality-suppliers','MobileView\MobileViewController@quality_supplier');
Route::get('country/product/name/{category_id}/{country_id}','MobileView\MobileViewController@indiv_country_product');
Route::get('buyer-preference-product','MobileView\MobileViewController@buyer_preference');
Route::get('Messanger','MobileView\MobileViewController@messanger_chat');
Route::get('messages','MobileView\MobileViewController@inquiries_msg');
Route::get('all-buying-request','MobileView\MobileViewController@buying_request');
Route::get('Feedback/help-center','MobileView\MobileViewController@Feedback_center');
Route::get('inquiry/details/{id}','Front\dashboard\MessageController@inquiry_details');
Route::get('warehouse/product','MobileView\MobileViewController@warehouse_product');
Route::get('cool/technology','MobileView\MobileViewController@cool_technology');
Route::get('company-product-template/{id}','MobileView\MobileViewController@company_profile');
Route::get('product-template','MobileView\MobileViewController@company_profile_product');
Route::get('company-profile-info','MobileView\MobileViewController@company_profile_info');
Route::get('company-contact-profile','MobileView\MobileViewController@company_contact');
Route::get('product/sourceing-view','MobileView\MobileViewController@product_sourceing');
Route::get('post/buying-request','MobileView\MobileViewController@post_buying_request');
Route::get('business/matching',['as'=>'business.matching','uses'=>'Front\AboutusController@businessmatching']);
Route::get('media/room',['as'=>'media.room','uses'=>'Front\AboutusController@bdtdcmediaroom']);
Route::get('media-news',['as'=>'media.news','uses'=>'Front\AboutusController@bdtdcmedianews']);
Route::get('sme-center',['as'=>'bdtdc.smecenter','uses'=>'Front\AboutusController@smecenter']);
Route::get('bangladesh/business',['as'=>'business.bangladesh','uses'=>'Front\AboutusController@bangladeshbusiness']);
Route::get('portal/support-program',['as'=>'portal.program','uses'=>'Front\AboutusController@support_portal_program']);
Route::get('marketing/executive',['as'=>'marketing.executive','uses'=>'Front\AboutusController@marketing_executive']);
Route::get('web-developer/laravel',['as'=>'webdeveloper.laravel','uses'=>'Front\AboutusController@web_developer']);
Route::get('National-marketing-executive/b2b',['as'=>'National-marketing-executive.b2b','uses'=>'Front\AboutusController@national_marketing']);
Route::get('content/writer',['as'=>'content.writer','uses'=>'Front\AboutusController@content_writer']);
Route::get('jobs/interns',['as'=>'content.writer','uses'=>'Front\AboutusController@interns']);
Route::get('about-us',['as'=>'about.us','uses'=>'Front\AboutusController@about_bdtdc']);
Route::get('about-us-demo',['as'=>'about.us.demo','uses'=>'Front\AboutusController@about_bdtdc_demo']);
Route::get('entrepreneur/day',['as'=>'entrepreneur.day','uses'=>'Front\AboutusController@entrepreneur_day']);
Route::get('world-sme/expo',['as'=>'worldsme.expo','uses'=>'Front\AboutusController@sme_expo']);
Route::get('business/sme-center',['as'=>'business.advisory','uses'=>'Front\AboutusController@business_advisory']);
Route::get('start/programe',['as'=>'start.programe','uses'=>'Front\AboutusController@start_programe']);
Route::get('database-listing',['as'=>'bdtdc.databaselisting','uses'=>'Front\AboutusController@database_listing']);
Route::get('promoting/bangladesh',['as'=>'promoting.bangladesh','uses'=>'Front\AboutusController@promoting_bangladesh']);
Route::get('promoting/bangladesh/product',['as'=>'promoting.bangladesh','uses'=>'Front\AboutusController@promoting_bangladesh_product']);
Route::get('marketing/bangladesh',['as'=>'marketing.bangladesh','uses'=>'Front\AboutusController@marketing_bangladesh']);
Route::get('global/partnership',['as'=>'global.partnership','uses'=>'Front\AboutusController@global_partnership']);
Route::get('sustainable/business-case',['as'=>'sustainable.manufacturing','uses'=>'Front\AboutusController@sustainable_manufacturing']);
Route::get('how-to/business-bangladesh',['as'=>'howto.businessbangladesh','uses'=>'Front\AboutusController@how_to_business_bd']);
Route::get('bangladesh/advantage',['as'=>'bangladesh.advantage','uses'=>'Front\AboutusController@bangladesh_advantage']);
Route::get('test/sus',['as'=>'goldsupplier-add', 'uses'=>'Front\Qutation\QuotationController@test']);
Route::get('success/stories',['as'=>'success.stories','uses'=>'Front\AboutusController@success_stories']);
Route::get('Entrepreneurs/globalleader',['as'=>'success.stories','uses'=>'Front\AboutusController@global_leader']);
Route::get('prease-release/the-daily-star',['as'=>'prease-release.the-daily-star','uses'=>'Front\AboutusController@press_release']);
Route::get('tv-news',['as'=>'bdtdc.ekattor-tv','uses'=>'Front\AboutusController@bdtdc_tv_news']);
Route::get('media-news',['as'=>'bdtdc.media-news','uses'=>'Front\AboutusController@bdtdc_media_news_channel9']);
Route::get('prease-release/proverty-&-pollution',['as'=>'prease-release.proverty-&-pollution','uses'=>'Front\AboutusController@poverty_pollution']);
Route::get('Kazi-Ahamed/marchant-of-rainbows', 'Front\AboutusController@marchant_of_rainbows')->name('Kazi-Ahamed.marchant-of-rainbows');
Route::get('a-tale-of-patents-and-persistence', 'Front\AboutusController@patents_persistance')->name('A-TALE-OF-PATENTS-AND-PERSISTENCE');
Route::get('buyerseller-group',['as'=>'Bdtdc-group','uses'=>'Front\AboutusController@Bdtdc_Bangladesh_group']);
Route::get('company-overview',['as'=>'Bdtdc-group','uses'=>'Front\AboutusController@company_overview']);
Route::get('culture/values',['as'=>'Bdtdc-group','uses'=>'Front\AboutusController@culture_and_values']);
Route::get('all-business-info',['as'=>'Bdtdc-group','uses'=>'Front\AboutusController@all_business_info']);
Route::get('history/milestone-of-company',['as'=>'Bdtdc-group','uses'=>'Front\AboutusController@history_and_milestone']);
Route::get('about/leadership',['as'=>'bdtdc.about.leadership','uses'=>'Front\AboutusController@bdtdc_leadership']);
Route::get('Integrity/Compliance',['as'=>'bdtdc.Integrity.Compliance','uses'=>'Front\AboutusController@interigrity_compliments']);
Route::get('investor/relation/home',['as'=>'bdtdc.investor.relation','uses'=>'Front\AboutusController@investor_relation']);
Route::get('office',['as'=>'bdtdc.office','uses'=>'Front\AboutusController@our_office']);
Route::get('FAQs',['as'=>'bdtdc.office','uses'=>'Front\AboutusController@faq_answer']);
Route::get('email',['as'=>'bdtdc.email','uses'=>'Front\AboutusController@email_template']);
Route::get('branding-email',['as'=>'bdtdc.branding-email','uses'=>'Front\AboutusController@branding_email_template']);
Route::get('overseasstock',['as'=>'bdtdc.overseasstock','uses'=>'Front\UserEnd\WholesaleController@overseasstock_product']);
Route::get('suppliers-contest',['as'=>'supplier.contest','uses'=>'Front\AboutusController@supplier_contest']);
Route::get('bigbuyer',['as'=>'bdtdc.bigbuyer','uses'=>'Front\AboutusController@bigbuyer']);
Route::get('bdsource/trustpass',['as'=>'bdsource.trustpass','uses'=>'Front\AboutusController@bdsource_trustpass']);
Route::get('buyer/contactsupplier',['as'=>'buyer.contactsupplier','uses'=>'Front\AboutusController@buyer_contact_supplier']);

Route::get('research','Front\limitedController@research');
Route::get('Future-market-of-Bangladesh','Front\limitedController@future_market_bd');
Route::get('help_center/suppliers_help/{id}','Front\ServiceChannel\ServiceChannelController@suppliers_help');
route::get('Intellectual','Front\FooterPage\FooterPageController@Intellectual');
route::get('Policies_Rules','Front\FooterPage\FooterPageController@Policies_Rules_data');
route::get('terms_use','Front\FooterPage\FooterPageController@terms_of_use');
route::get('select/suppliers','Front\GoldSupplierController@buyer_supplier_info')->name('select.suppliers');
route::get('product_listing_policy','Front\FooterPage\FooterPageController@product_listing_policy');
route::get('displaying-prohibited','Front\FooterPage\FooterPageController@displaying_prohibited');
route::get('buying-request','Front\FooterPage\FooterPageController@buying_request');
route::get('wholesale_bdtdc','Front\GoldSupplierController@wholesale_bdtdc');
route::get('success','Front\BuyerController@success');
route::get('wholesale-user-guide','Front\GoldSupplierController@wholesale_bdtdc_user_guide');
route::get('global-market/buyer-protection','Front\BuyerChannel\BuyerChannelController@buyer_protection');
route::get('buyerHome','Front\BuyerChannel\BuyerChannelController@bdtdc_buyer_home');
Route::get('VIP-buyer/One-stop-service','Front\BuyerChannel\BuyerChannelController@one_stop_service');
Route::get('sourceing-event','Front\BuyerChannel\BuyerChannelController@sourceing_event');
Route::get('source','Front\BuyerChannel\BuyerChannelController@bdtdc_sourceing');
Route::get('sourceing-season','Front\BuyerChannel\BuyerChannelController@sourceing_season');
Route::get('apply-sourceing-meeting','Front\BuyerChannel\BuyerChannelController@application_sourceing_meet');
Route::post('apply-sourceing-meeting_store',['as'=>'apply_sourcing_meeting_store','uses'=>'Front\BuyerChannel\BuyerChannelController@application_sourceing_meet_store']);

// mobile routes
Route::get('product/name','Front\UserEnd\ProductController@search_value');
Route::get('search/product-mobile', ['as'=>'search.mobile', 'uses'=>'Front\UserEnd\ProductController@search_product_mobile']);
Route::get('product/search-details','Front\UserEnd\ProductController@search_value_details');
Route::get('product-item-detail/{name}/{id}','UserEnd\ProductController@item_details');
Route::get('product-sourcing',['as'=>'sourcing.list','uses'=>'Front\Bdsource\BdsourceController@bdtdc_sourcing']);
Route::get('product-gallery',['as'=>'sourcing.list','uses'=>'Front\Bdsource\BdsourceController@bdtdc_product_gallery']);
Route::get('supplier/quote/{id}',['as'=>'postQuote.form','uses'=>'Front\BuyerChannel\BuyerChannelController@quote_from']);
Route::get('megaMarch-sourcing-consumer',['as'=>'sourcing.list','uses'=>'Front\Bdsource\BdsourceController@megaMarch_sourcing_consumer']);
Route::post('quotations_form/success/quote',['as'=>'postQuote.form.store','uses'=>'Front\BuyerChannel\BuyerChannelController@quote_form_store']);
Route::post('quotations_form/submit-message/{inqid}',['as'=>'postmsg.form.store','uses'=>'Front\BuyerChannel\BuyerChannelController@store_msg']);



/*route for faq*/
Route::get('help-center',['as'=>'bdtdc.faq','uses'=>'Front\ServiceChannel\ServiceChannelController@bdtdc_faq_question']);
Route::get('supplier-helpcenter',['as'=>'bdtdc.faq','uses'=>'Front\ServiceChannel\ServiceChannelController@bdtdc_faq_supplier']);
Route::get('faq-category-search',['as'=>'faq.category','uses'=>'Front\ServiceChannel\ServiceChannelController@faq_category_search']);
Route::get('faq-detail/{id}',['as'=>'faq.detail','uses'=>'Front\ServiceChannel\ServiceChannelController@faq_detail']);
Route::get('category-search',['as'=>'faq.search','uses'=>'Front\ServiceChannel\ServiceChannelController@category_search']);
/*route for faq*/

// Route for E store

Route::get('Home/{name}/{profile_id}','Front\TemplateController@index');

Route::get('{name}/company-overview/{profile_id}','Front\TemplateController@show_company');
Route::post('profile/company','Front\TemplateController@template_store');
Route::get('trade-capacity/{name}/{profile_id}','Front\TemplateController@trade_capacity');
Route::get('production-capacity/{name}/{profile_id}','Front\TemplateController@production_capacity');
Route::get('rd-capacity/{name}/{profile_id}','Front\TemplateController@r_d_capacity');
Route::get('buyer-interaction/{name}/{profile_id}','Front\TemplateController@buyer_interaction_capacity');
Route::get('industrial-certification/{name}/{profile_id}','Front\TemplateController@industrial_certification');
Route::get('contact/{name}/{profile_id}','Front\TemplateController@get_contact');
Route::get('profile/product_/{profile_id}','Front\TemplateController@get_product');
Route::get('template/get_header_info/{profile_id}','Front\TemplateController@render_header_info');
Route::get('get_header_info_by_ajax/{id}/{dothis}','Front\TemplateController@get_header_info_by_ajax');
Route::get('profile/template_/{profile_id}/{group}','Front\TemplateController@product_filter_by_group');
Route::post('profile/search_/{profile_id}','Front\TemplateController@search');
Route::get('product-template/{profile_id}','Front\TemplateController@product_template');
Route::get('template-profile/product-search/{profile_id}','Front\TemplateController@product_template_search');

//

Route::get('product_suggesion/{term}/{supplier_id}','Front\UserEnd\ProductController@product_suggesion');
Route::get('country_suggesion/{term}','Front\RegistrationController@country_suggesion');
Route::get('get_inquires_by_filter/{group}','Front\dashboard\SupplierController@get_inquires_by_filter');
//Route::get('inquery_action/{action}/{inquery_id}','dashboard\SupplierController@inquery_action');
Route::get('product-details/{name}={id}','Front\UserEnd\ProductController@get_product_show');
Route::get('selected/supplier-products',['as'=>'suppliers.find','uses'=>'Front\UserEnd\ProductController@home_selected_supplier_products']);
Route::get('selected-suppliers/{name}/{id}',['as'=>'selected_suppliers.country','uses'=>'Front\UserEnd\ProductController@country_home']);
Route::get('country/products',['as'=>'country.products','uses'=>'Front\UserEnd\CategoriesController@country_productList']);
Route::get('category/products',['as'=>'category.products','uses'=>'Front\UserEnd\CategoriesController@category_productList']);
Route::get('recommended-suppliers/products/{name}={id}','Front\UserEnd\ProductController@productList');
Route::get('product-sourcing',['as'=>'sourcing.list','uses'=>'Front\Bdsource\BdsourceController@bdtdc_sourcing']);
Route::get('product-sourcing/details/{id}',['as'=>'sourcing.details','uses'=>'Front\Service\ServiceController@bdtdc_sourcing_details']);
Route::get('Popular-product-trends',['as'=>'bdsource.page','uses'=>'Front\Bdsource\BdsourceController@index']);
Route::get('Sourcing/Requests/info',['as'=>'Sourcing.Requests.info','uses'=>'Front\Qutation\QuotationController@sourcing_requests_info']);
Route::get('Sourcing/Requests/info/buyer',['as'=>'Sourcing.Requests.info.buyer','uses'=>'Front\ServiceChannel\ServiceChannelController@sourcing_requests_info_buyer']);
Route::get('Sourcing/Requests/info/{id}',['as'=>'Sourcing.Requests.info','uses'=>'Front\Qutation\QuotationController@sourcing_requests_info']);
Route::get('Sourcing/Requests_search/{info}/{id}',['as'=>'Sourcing.Requests.info.search','uses'=>'Front\Qutation\QuotationController@sourcing_requests_info_search']);
Route::get('product-sourcing/view/{id}',['as'=>'sourceing.view','uses'=>'Front\ServiceChannel\ServiceChannelController@sourcing_view']);
Route::get('product-sourcing/view/{id}/{catid}',['as'=>'sourceing.view.cat','uses'=>'Front\ServiceChannel\ServiceChannelController@sourcing_view_with_catid']);
Route::get('supplier/quote/{id}',['as'=>'postQuote.form','uses'=>'Front\BuyerChannel\BuyerChannelController@quote_from']);
Route::get('megaMarch-sourcing-consumer',['as'=>'sourcing.list','uses'=>'Front\Bdsource\BdsourceController@megaMarch_sourcing_consumer']);
Route::post('quotations_form/success/quote',['as'=>'postQuote.form.store','uses'=>'Front\BuyerChannel\BuyerChannelController@quote_form_store']);
Route::post('quotations_form/submit-message/{inqid}',['as'=>'postmsg.form.store','uses'=>'Front\BuyerChannel\BuyerChannelController@store_msg']);
Route::get('postBuyRequest/productId={id}',['as'=>'postBuyRequest.form','uses'=>'Front\Qutation\QuotationController@postBuyRequest']);
Route::post('postBuyRequest',['as'=>'postBuyRequest.store','uses'=>'Front\Qutation\QuotationController@storeBuyRequest']);
// Get Quotation
Route::get('get_qutations',function(){
    return Redirect::to('get-quotations');
} );
Route::get('get_quotations',function(){
    return Redirect::to('get-quotations');
} );
Route::get('get-quotations_product', ['as' => 'get.qutations', 'uses' => 'Front\BuyerChannel\BuyerChannelController@qutation']);
Route::get('get-quotations/{id}', ['as' => 'get.qutations.product', 'uses' => 'Front\BuyerChannel\BuyerChannelController@qutation']);
Route::get('get-quotations', ['as' => 'get.qutations', 'uses' => 'Front\BuyerChannel\BuyerChannelController@qutation']);
Route::post('get_quotations', ['as' => 'get.qutations', 'uses' => 'Front\BuyerChannel\BuyerChannelController@store_qutation']);
Route::get('get_qutations_search_product', ['as' => 'get.qutations', 'uses' => 'Front\BuyerChannel\BuyerChannelController@get_qutations_search_product']);
// page controller
Route::any('search-product/{search_value}', ['as'=>'search.product', 'uses'=>'Front\PagesController@search_store']);
Route::get('bangladesh-suppliers', ['as'=>'bangladesh.suppliers', 'uses'=>'Front\PagesController@bangladesh_suppliers']);
Route::get('{query}/search', ['as'=>'query.search', 'uses'=>'Front\filterController@search_filter']);
Route::get('{name}-{type}/pages', ['as'=>'country.type', 'uses'=>'Front\filterController@data_filter']);
Route::get('bangladesh-suppliers/{search_value}', ['as'=>'bangladesh.suppliers', 'uses'=>'Front\PagesController@bangladesh_suppliers']);
Route::get('bangladesh-trade', ['as'=>'bangladesh.trade', 'uses'=>'Front\PagesController@bangladesh_trade']);
Route::get('contact', ['as' => 'contact', 'uses' => 'Front\PagesController@getContact']);

// main category route
Route::group(array('prefix' => '{category}'), function(){
    Route::get('/{parent_id}',function($category,$parent_id){
        return App::make('App\Http\Controllers\Front\UserEnd\CategoriesController')->product_filter($parent_id,$category);
    });
});

// FormController
Route::get('bangladesh-garments','Front\FormController@bangladeshi_garments');
//Route for sitemap search
Route::get('sitemap',['as'=>'sitemap','uses'=>'Front\FormController@bdtdc_sitemap']);
Route::post('sitemap-search',['as'=>'sitemap_search','uses'=>'Front\FormController@bdtdc_sitemap_search']);
Route::get('sitemap/{type}/{data}',['as'=>'sitemap-showroom','uses'=>'Front\FormController@sitemap_search']);
Route::get('{type}-{keyword}/{key}',['as'=>'type.key','uses'=>'Front\FormController@product_details']);

// country subcategory route
Route::get('{name}-{cat_name}/{id}/{cat_id}',['as'=>'bangladeshi.product','uses'=>'Front\UserEnd\ProductController@category_productList']);
// subcategory route
Route::get('{cat_name}/{id}/{cat_id}',['as'=>'bangladeshi.product','uses'=>'Front\UserEnd\ProductController@category_productList_single']);

// wholesale
Route::get('wholesale/','Front\UserEnd\WholesaleController@index');
Route::get('wholesale/category/product/{id}',['as'=>'wholesale.category.product','uses'=>'Front\UserEnd\WholesaleController@product_list']);

//user-progress
Route::get('under-progress','Front\UserEnd\SpecialPageController@progress_page');







Route::group(array('prefix' => '{prefix}'), function()
{
    Route::get('pages/{sort_name}/{id}',function($prefix,$sort_name, $id)
    {
        return App::make('App\Http\Controllers\Front\\'.$prefix.'\\'.$prefix.'Controller')->$sort_name($id);
    });
});

Route::group(array('prefix' => '{prefix}'), function()
{
    Route::get('help_center/{slug}/{id}',function($prefix,$slug, $id)
    {
        return App::make('App\Http\Controllers\\'.$prefix.'\\'.$prefix.'Controller')->$slug($id);
    });
});





Route::get('/send', 'SendMessageController@index')->name('send');
Route::post('/postMessage', 'SendMessageController@sendMessage')->name('postMessage');