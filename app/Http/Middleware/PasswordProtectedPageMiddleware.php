<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;

class PasswordProtectedPageMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the current page from Filament Fabricator
        $page = $this->getCurrentPage($request);

        if ($page && $page->is_password_protected) {
            $pageId = $page->id;
            $hasAccess = Session::has('page_access_'.$pageId);
            $hasUnlockedParam = $request->has('unlocked');

            // If user has access but URL doesn't have 'unlocked' param, redirect
            if ($hasAccess && ! $hasUnlockedParam) {
                return redirect($request->url().'?unlocked=true');
            }

            // If user doesn't have access and has 'unlocked' param, remove it
            if (! $hasAccess && $hasUnlockedParam) {
                return redirect($request->url());
            }
        }

        return $next($request);
    }

    /**
     * Get the current page being rendered
     */
    private function getCurrentPage(Request $request)
    {
        try {
            // Try to get page from Fabricator
            $slug = trim($request->getPathInfo(), '/') ?: '/';

            return \App\Models\Page::where('slug', $slug)->first();
        } catch (\Exception $e) {
            return null;
        }
    }
}
