<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckChatbotAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('access_code') && $request->query('access_code') === '123456') {
            session(['chatbot_access_granted' => true]);

            return redirect($request->fullUrlWithoutQuery('access_code'));
        }

        if (! session('chatbot_access_granted')) {
            return redirect()->route('chatbot-access');
        }

        return $next($request);
    }
}
