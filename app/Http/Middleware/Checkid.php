<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class Checkid
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
       
        $user = DB::table('banid')->where('user_id',$request->cookie('binggan'))->first();
        if($user)
        {
            return response('您的饼干已经被管理员封禁');
        }
        return $next($request);
    }
}
