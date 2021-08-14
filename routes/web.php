<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ImagesController;
use App\Http\Controllers\Admin\ClientsController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\VendeursController;
use App\Http\Controllers\Admin\CommandesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PaiementsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\SubCategoriesController;

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

Route::get('/', [App\Http\Controllers\FrontendController::class, 'home'])->name('accueil');

Route::get('/article/{article_slug}', [App\Http\Controllers\FrontendController::class, 'detailArticle'])->name('article.detail');
Route::get('/article/{category_slug}/all', [App\Http\Controllers\FrontendController::class, 'listArticle'])->name('articles.list');
Route::get('/boutique', [App\Http\Controllers\BoutiqueController::class, 'index'])->name('boutique.index');
Route::get('/boutique/product-details', [App\Http\Controllers\BoutiqueProduitDetailsController::class, 'index'])->name('boutique.product-details');
Route::get('/ventes-flash', [App\Http\Controllers\VenteFlashController::class, 'index'])->name('ventes-flash');
Route::get('/nouveaute', [App\Http\Controllers\NouveauteController::class, 'index'])->name('nouveaute.index');
Route::get('/meilleurs-ventes', [App\Http\Controllers\MeilleursVentesController::class, 'index'])->name('meilleurs-ventes');
Route::get('/shop-list', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');
Route::get('/panier', [App\Http\Controllers\PanierController::class, 'index'])->name('panier.panier');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('panier.checkout');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//**************ADMIN ROUTES*************

Route::group(['as'=>'admin.','prefix'=>'admin'],function () {

    Route::middleware(["isAdmin"])->group(function(){
        Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

        //***************************** MODULES USERS ***********************************/
        Route::middleware([])->group(function () {

            /***************MODULES UTILISATEURS************/
            Route::middleware('can:manage-users')->group(function () {
                Route::get('/users',[UsersController::class,'index'])->name('users.index');
                Route::get('/users/create',[UsersController::class,'create'])->name('users.create');
                Route::post('/users/store',[UsersController::class,'store'])->name('users.store');
                Route::get('/users/{id}/edit',[UsersController::class,'edit'])->name('users.edit');
                Route::post('/users/{id}/update',[UsersController::class,'update'])->name('users.update');
                Route::get('/users/{id}/show',[UsersController::class,'show'])->name('users.show');
                Route::get('/users/{id}/delete',[UsersController::class,'destroy'])->name('users.delete');
            });
            /***************MODULES MENUS************/
            Route::middleware('can:manage-menus')->group(function () {
                Route::get('/menus',[MenuController::class,'index'])->name('menus.index');
                Route::get('/menus/create',[MenuController::class,'create'])->name('menus.create');
                Route::post('/menus/store',[MenuController::class,'store'])->name('menus.store');
                Route::get('/menus/{id}/edit',[MenuController::class,'edit'])->name('menus.edit');
                Route::post('/menus/{id}/update',[MenuController::class,'update'])->name('menus.update');
                Route::get('/menus/{id}/show',[MenuController::class,'show'])->name('menus.show');
                Route::get('/menus/{id}/delete',[MenuController::class,'destroy'])->name('menus.delete');
            });

            /***************MODULES SETTINGS************/
            Route::get('/users/parametres',[UsersController::class,'parametres'])->name('users.parametres');
            Route::post('/users/parametres/update-info',[UsersController::class,'updateUserInfo'])->name('users.update.userinfo');
            Route::get('/users/parametres/password',[UsersController::class,'password'])->name('users.parametres.password');
            Route::post('/users/parametres/password/update',[UsersController::class,'updateUserPassword'])->name('users.update-password');

            /***************MODULES RÔLES************/
            Route::middleware('can:manage-roles')->group(function () {
                Route::get('/users/roles',[RolesController::class,'index'])->name('users.roles.index');
                Route::get('/users/roles/create',[RolesController::class,'create'])->name('users.roles.create');
                Route::post('/users/roles/store',[RolesController::class,'store'])->name('users.roles.store');
                Route::get('/users/roles/{id}/edit',[RolesController::class,'edit'])->name('users.roles.edit');
                Route::post('/users/roles/{id}/update',[RolesController::class,'update'])->name('users.roles.update');
                Route::get('/users/roles/{id}/show',[RolesController::class,'show'])->name('users.roles.show');
                Route::get('/users/roles/{id}/delete',[RolesController::class,'destroy'])->name('users.roles.delete');
            });

            /***************MODULES PERMISSIONS************/
            Route::middleware('can:manage-permissions')->group(function () {
                Route::get('/users/permissions/{id}/roles',[PermissionsController::class,'editRolePermission'])->name('users.permissions.role.edit');
                Route::post('/users/permissions/{id}/roles',[PermissionsController::class,'updateRolePermission'])->name('users.permissions.role.update');
                Route::get('/users/permissions',[PermissionsController::class,'index'])->name('users.permissions.index');
                Route::get('/users/permissions/create',[PermissionsController::class,'create'])->name('users.permissions.create');
                Route::post('/users/permissions/store',[PermissionsController::class,'store'])->name('users.permissions.store');
                Route::get('/users/permissions/{id}/edit',[PermissionsController::class,'edit'])->name('users.permissions.edit');
                Route::post('/users/permissions/{id}/update',[PermissionsController::class,'update'])->name('users.permissions.update');
                Route::get('/users/permissions/{id}/delete',[PermissionsController::class,'destroy'])->name('users.permissions.delete');

            });

            /***************MODULES ARTICLES************/
            Route::middleware('can:manage-articles')->group(function () {
                Route::get('/articles',[ArticlesController::class,'index'])->name('articles.index');
                Route::get('/articles/create',[ArticlesController::class,'create'])->name('articles.create');
                Route::post('/articles/store',[ArticlesController::class,'store'])->name('articles.store');
                Route::get('/articles/{id}/edit',[ArticlesController::class,'edit'])->name('articles.edit');
                Route::post('/articles/{id}/update',[ArticlesController::class,'update'])->name('articles.update');
                Route::get('/articles/{id}/delete',[ArticlesController::class,'destroy'])->name('articles.delete');
                Route::get('/articles/{id}/show',[ArticlesController::class,'show'])->name('articles.show');
                /***************MODULES ARTICLES************/
                Route::get('/articles/{id}/images',[ImagesController::class,'list'])->name('articles.images.list');
                Route::get('/articles/{id}/images/add',[ImagesController::class,'add'])->name('articles.images.add');
                Route::post('/articles/{id}/images/store',[ImagesController::class,'store'])->name('articles.images.store');
                Route::post('/articles/{id}/images/update',[ImagesController::class,'update'])->name('articles.images.update');
                Route::get('/articles/images',[ImagesController::class,'index'])->name('articles.images.index');
                Route::get('/articles/images/create',[ImagesController::class,'create'])->name('articles.images.create');
                Route::get('/articles/{article_id}/images/{id}/edit',[ImagesController::class,'edit'])->name('articles.images.edit');
                Route::post('/articles/{article_id}/images/{id}/update',[ImagesController::class,'update'])->name('articles.images.update');
                Route::get('/articles/{article_id}/images/{id}/delete',[ImagesController::class,'destroy'])->name('articles.images.delete');
                Route::get('/articles/images/{id}/show',[ImagesController::class,'show'])->name('articles.images.show');
            });

            Route::middleware('can:manage-categories')->group(function () {
                /***************MODULES CATÉGORIES************/
                Route::get('/articles/categories',[CategoriesController::class,'index'])->name('articles.categories.index');
                Route::get('/articles/categories/create',[CategoriesController::class,'create'])->name('articles.categories.create');
                Route::post('/articles/categories/store',[CategoriesController::class,'store'])->name('articles.categories.store');
                Route::get('/articles/categories/{id}/edit',[CategoriesController::class,'edit'])->name('articles.categories.edit');
                Route::post('/articles/categories/{id}/update',[CategoriesController::class,'update'])->name('articles.categories.update');
                Route::get('/articles/categories/{id}/delete',[CategoriesController::class,'destroy'])->name('articles.categories.delete');

                /***************MODULES SOUS CATÉGORIES************/
                Route::get('/categories/{id}/subcategories/',[SubCategoriesController::class,'getSubCategorieByCategorie'])->name('categories.subcategories');
                Route::get('/articles/subcategories',[SubCategoriesController::class,'index'])->name('articles.subcategories.index');
                Route::get('/articles/subcategories/create',[SubCategoriesController::class,'create'])->name('articles.subcategories.create');
                Route::post('/articles/subcategories/store',[SubCategoriesController::class,'store'])->name('articles.subcategories.store');
                Route::get('/articles/subcategories/{id}/edit',[SubCategoriesController::class,'edit'])->name('articles.subcategories.edit');
                Route::post('/articles/subcategories/{id}/update',[SubCategoriesController::class,'update'])->name('articles.subcategories.update');
                Route::get('/articles/subcategories/{id}/delete',[SubCategoriesController::class,'destroy'])->name('articles.subcategories.delete');
                Route::get('/articles/subcategories/{id}/show',[SubCategoriesController::class,'show'])->name('articles.subcategories.show');
            });

            /***************MODULES VENDEURS************/
            Route::middleware('can:manage-providers')->group(function () {
                Route::get('/vendeurs',[VendeursController::class,'index'])->name('vendeurs.index');
                Route::get('/vendeurs/create',[VendeursController::class,'create'])->name('vendeurs.create');
                Route::post('/vendeurs/store',[VendeursController::class,'store'])->name('vendeurs.store');
                Route::get('/vendeurs/{id}/edit',[VendeursController::class,'edit'])->name('vendeurs.edit');
                Route::get('/vendeurs/{id}/delete',[VendeursController::class,'destroy'])->name('vendeurs.delete');
                Route::post('/vendeurs/{id}/update',[VendeursController::class,'update'])->name('vendeurs.update');
                Route::get('/vendeurs/{id}/show',[VendeursController::class,'show'])->name('vendeurs.show');
            });

            /***************MODULES CLIENTS************/
            Route::middleware('can:manage-customers')->group(function () {
                Route::get('/clients',[ClientsController::class,'index'])->name('clients.index');
                Route::get('/clients/create',[ClientsController::class,'create'])->name('clients.create');
                Route::post('/clients/store',[ClientsController::class,'store'])->name('clients.store');
                Route::get('/clients/{id}/edit',[ClientsController::class,'edit'])->name('clients.edit');
                Route::post('/clients/{id}/update',[ClientsController::class,'update'])->name('clients.update');
                Route::get('/clients/{id}/show',[ClientsController::class,'show'])->name('clients.show');
                Route::get('/clients/{id}/delete',[ClientsController::class,'destroy'])->name('clients.delete');
            });

            /***************MODULES COMMANDES************/
            Route::middleware('can:manage-orders')->group(function () {
                Route::get('/commandes',[CommandesController::class,'index'])->name('commandes.index');
                Route::get('/commandes/{id}/show',[CommandesController::class,'show'])->name('commandes.show');
            });

            /***************MODULES PAIEMENTS************/
            Route::middleware('can:manage-payments')->group(function () {
                Route::get('/paiements',[PaiementsController::class,'index'])->name('paiements.index');
                Route::get('/paiements/{id}/show',[PaiementsController::class,'show'])->name('paiements.show');
            });
        });
    });
});
//**************ADMIN ROUTES*************
Auth::routes();
