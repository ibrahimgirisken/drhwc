<?php



use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeGetController;

use App\Http\Controllers\Blogs\BlogsController;

use App\Http\Controllers\Datasheets\DatasheetsController;

use App\Http\Controllers\Pages\PagesController;

use App\Http\Controllers\Categories\CategoriesController;

use App\Http\Controllers\Module\ModuleController;

use App\Http\Controllers\Template\TemplateController;

use App\Http\Controllers\Sliders\SliderController;

use App\Http\Controllers\Menu\MenusController;

use App\Http\Controllers\Products\ProductController;

use App\Http\Controllers\Users\UsersController;

use App\Http\Controllers\Settings\SettingsController;

use App\Http\Controllers\Contact\ContactController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\MailSettings\MailSettingsController;

use App\Http\Controllers\Main\MainController;

use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Models\Settings;



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







// Auth::routes();

Auth::routes([
    'register' => false,
    'verify' => true,
    'reset' => false
]);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::prefix("admin")->middleware('auth')->group(function () {

        Route::get('/', [HomeGetController::class, 'index'])->name('index');

        Route::get('/logout', [HomeGetController::class, 'getLogout'])->name("logout");



        Route::get('/main-pages', [MainController::class, 'getMainPages'])->name('main-pages');

        Route::get('/main-page-add', [MainController::class, 'getMainPageAdd'])->name('main-page-add');

        Route::post('/main-page-add', [MainController::class, 'postMainPageAdd'])->name('main-page-add');

        Route::get('/main-page-edit/{id}', [MainController::class, 'getMainPageEdit'])->name('main-page-edit');

        Route::post('/main-page-edit/{id}', [MainController::class, 'postMainPageEdit'])->name('main-page-edit');



        Route::get('/datasheets', [DatasheetsController::class, 'getDatasheets'])->name('datasheets');

        Route::get('/datasheet-add', [DatasheetsController::class, 'getDatasheetAdd'])->name('datasheet-add');

        Route::post('/datasheet-add', [DatasheetsController::class, 'postDatasheetAdd'])->name('datasheet-add');

        Route::get('/datasheet-edit/{id}', [DatasheetsController::class, 'getDatasheetEdit'])->name('datasheet-edit');

        Route::post('/datasheet-edit/{id}', [DatasheetsController::class, 'postDatasheetEdit'])->name('datasheet-edit');



        Route::get('/blogs', [BlogsController::class, 'getBlogs'])->name('blogs');

        Route::get('/blog-add', [BlogsController::class, 'blogAdd'])->name('blog-add');

        Route::get('/blog-edit', [BlogsController::class, 'blogEdit'])->name('blog-edit');

        Route::get('/blog-category', [BlogsController::class, 'blogCategory'])->name('blog-category');

        Route::get('/blog-category-add', [BlogsController::class, 'blogCategoryAdd'])->name('blog-category-add');

        Route::get('/blog-category-edit', [BlogsController::class, 'blogCategoryEdit'])->name('blog-category-edit');



        Route::get('/products', [ProductController::class, 'getProducts'])->name('products');

        Route::get('/product-add', [ProductController::class, 'getProductAdd'])->name('product-add');

        Route::post('/product-add', [ProductController::class, 'postProductAdd'])->name('product-add');

        Route::get('/product-edit/{id}', [ProductController::class, 'getProductEdit'])->name('product-edit');

        Route::post('/product-edit/{id}', [ProductController::class, 'postProductEdit'])->name('product-edit');


        Route::get('/categories', [CategoriesController::class, 'getCategories'])->name('categories');

        Route::get('/category-add', [CategoriesController::class, 'getCategoryAdd'])->name('category-add');

        Route::post('/category-add', [CategoriesController::class, 'postCategoryAdd'])->name('category-add');

        Route::get('/category-edit/{id}', [CategoriesController::class, 'getCategoryEdit'])->name('category-edit');

        Route::post('/category-edit/{id}', [CategoriesController::class, 'postCategoryEdit'])->name('category-edit');


        Route::get('/pages', [PagesController::class, 'getPages'])->name('pages');

        Route::get('/page-add', [PagesController::class, 'getPageAdd'])->name('page-add');

        Route::post('/page-add', [PagesController::class, 'postPageAdd'])->name('page-add');

        Route::get('/page-edit/{id}', [PagesController::class, 'getPageEdit'])->name('page-edit');

        Route::post('/page-edit/{id}', [PagesController::class, 'postPageEdit'])->name('page-edit');


        Route::get('/modules', [ModuleController::class, 'getModules'])->name('modules');

        Route::get('/module-add', [ModuleController::class, 'getModuleAdd'])->name('module-add');

        Route::post('/module-add', [ModuleController::class, 'postModuleAdd'])->name('module-add');

        Route::get('/module-edit/{id}', [ModuleController::class, 'getModuleEdit'])->name('module-edit');

        Route::post('/module-edit/{id}', [ModuleController::class, 'postModuleEdit'])->name('module-edit');


        Route::get('/templates', [TemplateController::class, 'getTemplates'])->name('templates');

        Route::get('/template-add', [TemplateController::class, 'getTemplateAdd'])->name('template-add');

        Route::post('/template-add', [TemplateController::class, 'postTemplateAdd'])->name('template-add');

        Route::get('/template-edit/{id}', [TemplateController::class, 'getTemplateEdit'])->name('template-edit');

        Route::post('/template-edit/{id}', [TemplateController::class, 'postTemplateEdit'])->name('template-edit');



        Route::get('/sliders', [SliderController::class, 'getSliders'])->name('sliders');

        Route::get('/slider-add', [SliderController::class, 'getSliderAdd'])->name('slider-add');

        Route::post('/slider-add', [SliderController::class, 'postSliderAdd'])->name('slider-add');

        Route::get('/slider-edit/{id}', [SliderController::class, 'getSliderEdit'])->name('slider-edit');

        Route::post('/slider-edit/{id}', [SliderController::class, 'postSliderEdit'])->name('slider-edit');



        Route::get('/menus', [MenusController::class, 'getMenus'])->name('menus');

        Route::get('/menu-add', [MenusController::class, 'getMenuAdd'])->name('menu-add');

        Route::get('/menu-edit/{id}', [MenusController::class, 'getMenuEdit'])->name('menu-edit');

        Route::post('/menu-add', [MenusController::class, 'postMenuAdd'])->name('menu-add');

        Route::post('/menu-edit/{id}', [MenusController::class, 'postMenuEdit'])->name('menu-edit');



        Route::get('/users', [UsersController::class, 'getUsers'])->name('users');

        Route::get('/user-add', [UsersController::class, 'getUserAdd'])->name('user-add');

        Route::post('/user-add', [UsersController::class, 'postUserAdd'])->name('user-add');

        Route::get('/user-edit/{id}', [UsersController::class, 'getUserEdit'])->name('user-edit');

        Route::post('/user-edit/{id}', [UsersController::class, 'postUserEdit'])->name('user-edit');



        Route::get('/settings', [SettingsController::class, 'getSettings'])->name('settings');

        Route::get('/setting-edit/{id}', [SettingsController::class, 'getSettingEdit'])->name('setting-edit');

        Route::post('/setting-edit/{id}', [SettingsController::class, 'postSettingEdit'])->name('setting-edit');


        Route::get('/mail-setting-edit/{id}', [MailSettingsController::class, 'getMailSettingEdit'])->name('mail-setting-edit');

        Route::post('/mail-setting-edit/{id}', [MailSettingsController::class, 'postMailSettingEdit'])->name('mail-setting-edit');
    });
});




Route::group(
    [
        'prefix' => LaravelLocalization::setLocale()
    ],
    function () {
        Route::middleware('checkstatus')->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name("getSite");
            Route::get('/{slug}', [HomeController::class, 'getPage'])->name("getPage");
            Route::get('/qr/{qrId}', [DatasheetsController::class, 'getQrCode'])->name('qr');
            Route::get('/' . trans('products-link') . '/' . '{slug}', [HomeController::class, 'getProduct'])->name("getProduct");
            Route::get('/' . trans('categories-link') . '/' . '{slug}', [HomeController::class, 'getProductListByCategory'])->name("getProductList");
            Route::post('/' . trans('contact-link'), [ContactController::class, 'postMail'])->name('postMail');
        });
    }
);
