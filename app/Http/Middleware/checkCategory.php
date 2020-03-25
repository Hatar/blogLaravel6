<?php

namespace App\Http\Middleware;

use Closure;
use App\Category;
class checkCategory
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
        $count = \App\Category::all()->count();
        if($count ==0){
            session()->flash('error','Please You Should To Add Some Category !!');
            return redirect(route('categories.index'));
        }
        return $next($request);
    }
}
