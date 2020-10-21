<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Restaurant\restlist;
use Illuminate\Http\Request;

class CheckResturantStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
           $id=$request->route('id');
            $Property = restlist::find($id);

            if($Property->restaurant_status==0){
                return redirect('/');

            }else{

                return $next($request);

            }
        
    }
}
