<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Models\PersonalInformation;
use Illuminate\Support\Facades\View;

class FrontDataShareMiddleware
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
        $socialMediaData = SocialMedia::where('status', 1)->orderBy('order','ASC')->get();
        $personal = PersonalInformation::find(1);
        View::share('socialMediaData', $socialMediaData);
        View::share('personal', $personal);

        return $next($request);
    }
}
