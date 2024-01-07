<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

       // dd($request->email);
//        $mail=$request->email;
//        $user = User::where('email',$mail) -> get();
//        foreach ($user as $rs){
//            foreach ($rs->roles as $role){
//                if($role->name=='admin'){
//                    return $next($request);
//                }
//            }
//            return route('login');
//        }
        $userRoles = Auth::user()->roles->pluck('name');
        If(!$userRoles->contains('admin')){
            return  redirect(route('loginadmin'))->withErrors([
            'permission' => 'You dont have a permission.',
        ])->onlyInput('permission');
        }
        return $next($request);


    }
}
