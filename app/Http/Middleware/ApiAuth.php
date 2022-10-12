<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Http\Request;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {

        echo $request->session()->get('custAuthToken');;
        return;
        if($request->header('Token') == '123')
        {
            return ['status' =>2, 'msg' => 'Unathorized'];
        }
        else
        {
            return $next($request);
         }
        session_start();
        if($_SESSION["custAuthToken"] != null){

        }else{
            return response()->json([
                "statusCode" => 200,
                "message"    => 'Login details are not valid',
                "isError"    => true,
                "results"    => $_SESSION["custAuthToken"],
            ]);
        }
        // return $next($request);
    }
}
