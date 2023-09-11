<?php

namespace App\Http\Middleware;

use App\Models\GroupActing;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectOldActingsUrls
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //Redirect old downloads URLs to new URLs
        if ($request->has('file')) {
            $file = $request->input('file');
            if ($file) {
                $file = base64_decode($file);
                if (preg_match("#\.(mp3)$# i", $file)) {
                    $acting = GroupActing::where('filename', $file)->first();

                    if ($acting) {
                        return redirect()->route('group-acting', ['modality' => $acting->group->modality->slug, 'year' => $acting->group->year, 'group' => $acting->group->slug, 'phase' => strtolower($acting->phase)]);
                    }
                }
            }
        }

        return $next($request);
    }
}
