<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Hotel\Hotel;
use Illuminate\Http\Request;

class CheckHotelStatus
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
            $Property = Hotel::find($id);

            if($Property->hotel_status==0){
                return redirect('/');

            }else{

                return $next($request);

            }
        
    }
}
