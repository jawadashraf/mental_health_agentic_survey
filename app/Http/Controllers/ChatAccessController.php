<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Settings\ChatSettings;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;

class ChatAccessController extends Controller
{
    /**
     * Download the QR code as a PNG file.
     */
    public function downloadQrCode(Request $request): Response
    {
        $settings = app(ChatSettings::class);
        $size = min(max((int) $request->query('size', 600), 150), 1200);

        $surveyParam = $request->query('survey');
        $survey = $surveyParam ? Survey::query()->where('slug', $surveyParam)->orWhere('id', $surveyParam)->first() : null;

        if ($survey) {
            $code = $request->query('code', $survey->access_code ?? $settings->access_code);
            $targetUrl = route('raft-chat', array_filter([
                'survey' => $survey->slug,
                'access_code' => $code,
            ]));
            $filename = 'survey-access-qrcode-'.$survey->slug.'.png';
        } else {
            $code = $request->query('code', $settings->access_code);
            $target = $request->query('target', 'raft');
            $targetUrl = match ($target) {
                'test' => route('raft-chat', ['mode' => 'test', 'access_code' => $code]),
                'chat' => route('chat', ['access_code' => $code]),
                default => route('raft-chat', ['access_code' => $code]),
            };
            $filename = 'survey-access-qrcode-'.$target.'.png';
        }

        $qrApiUrl = 'https://api.qrserver.com/v1/create-qr-code/?size='.$size.'x'.$size.'&data='.urlencode($targetUrl);

        $response = Http::timeout(10)->get($qrApiUrl);

        if ($response->successful()) {
            return response($response->body(), 200, [
                'Content-Type' => 'image/png',
                'Content-Disposition' => 'attachment; filename="'.$filename.'"',
                'Cache-Control' => 'no-cache, private',
            ]);
        }

        abort(502, 'Unable to generate QR code at this time.');
    }
}
