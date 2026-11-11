<?php

namespace App\Http\Middleware;

use App\Models\Survey;
use App\Settings\ChatSettings;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckChatbotAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->has('access_code')) {
            $givenCode = (string) $request->query('access_code');
            $chatSettings = app(ChatSettings::class);
            $globalCode = (string) $chatSettings->access_code;

            $matchedSurvey = Survey::query()->where('access_code', $givenCode)->first();

            if ($matchedSurvey !== null || hash_equals($globalCode, $givenCode)) {
                session(['chatbot_access_granted' => true]);

                if ($matchedSurvey) {
                    session([
                        'active_survey_id' => $matchedSurvey->id,
                        'active_survey_slug' => $matchedSurvey->slug,
                    ]);
                }

                return redirect($request->fullUrlWithoutQuery('access_code'));
            }
        }

        if (! session('chatbot_access_granted')) {
            return redirect()->route('chatbot-access', $request->only(['mode', 'survey']));
        }

        return $next($request);
    }
}
