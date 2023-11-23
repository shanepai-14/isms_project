<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        $allowedRoles = ['student', 'admin', 'cashier', 'registrar', 'teachercollege','teacherseniorhigh'];

        if (!in_array($role, $allowedRoles)) {
            abort(403, 'Invalid role specified');
        }

        

 try{
    $userRole = auth()->user()->role;
 }catch(\Exception $e){
    return view('auth.login');
 }


        if ($role != $userRole) {
            abort(403, 'Unauthorized');
        }else if($userRole  == null || $role == null){
            return view('auth.login');
        }

        return $next($request);
    }
}
