<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
        $this->mapUserWebRoutes();
        //home routes
        $this->HomeListingRoutes();
        //room routes
        $this->roomroutes();
        //restaurants routes
        $this->restaurants();
        //car agency route
        $this->CarAgencyListingRoute();
       //only routes form home pages, deatils page etc ajax call and else
        $this->HomeUser();

        $this->HotelUser();

       //for basic user like page show // profile update general pupose
        $this->BasicUser();
//for basic user like page show // profile update general pupose
        $this->RestaurantsUser();
        
        //for loged_in user
        $this->LoggedInUser();

        //for Car user, Pages 
        $this->CarUser();
        //admin routes
        
        $this->AdminRoutes();

        //hotel admin rooutes
        
        $this->AdminHotelRoutes();

        //Home Admin Routes
        $this->AdminHomeRoutes();

        //AdminResturanrRoutes
        $this->AdminResturantRoutes();

        //Car Agency Admin Routes
        $this->AdminCarAgencyRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/web.php'));
    }
    protected function roomroutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        ->group(base_path('routes/roomroutes.php'));
    }

    protected function mapUserWebRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        
        ->group(base_path('routes/hotelroutes.php'));
    }
    protected function HomeListingRoutes()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        
        ->group(base_path('routes/HomeListingRoutes.php'));
    } 
    protected function restaurants()
    {
        Route::middleware('web')
        ->namespace($this->namespace)
        
        ->group(base_path('routes/restaurants.php'));
    }
    protected function CarAgencyListingRoute(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/CarAgencyListingRoute.php'));

   }
// for normal user for seraching , view and 
   protected function HomeUser(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/HomeUser.php'));

   }
   protected function HotelUser(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/HotelUser.php'));

   }

   protected function BasicUser(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/BasicUser.php'));

   }
   protected function RestaurantsUser(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/RestaurantsUser.php'));

   } 

   protected function LoggedInUser(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/LoggedInUser.php'));

   } 
    protected function CarUser(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/CarUser.php'));

   } 

 protected function AdminRoutes(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/AdminRoutes.php'));

   }
    protected function AdminHotelRoutes(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/AdminHotelRoutes.php'));

   } 
    protected function AdminHomeRoutes(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/AdminHomeRoutes.php'));

   } 

   protected function AdminResturantRoutes(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/AdminResturantRoutes.php'));

   } 
    protected function AdminCarAgencyRoutes(){
       Route::middleware('web')
       ->namespace($this->namespace)
       
       ->group(base_path('routes/AdminCarAgencyRoutes.php'));

   } 



   
   





    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
        ->middleware('api')
        ->namespace($this->namespace)
        ->group(base_path('routes/api.php'));
    }
}
