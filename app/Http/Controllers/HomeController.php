<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Prism\Prism\Enums\Provider;
use Prism\Prism\Exceptions\PrismException;
use Prism\Prism\Prism;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function pageView(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        } else {
            abort(404);
        }
    }

    //    public function index(){
    //
    //        $systemPrompt = "You are a survey assistant conducting a user satisfaction survey.";
    //        $questions = [
    //            "How satisfied are you with our service?",
    //            "What improvements would you like to see?",
    //            "Would you recommend us to others?"
    //        ];
    //
    //
    //        try {
    // //            $response = Prism::text()
    // //                ->using(Provider::OpenAI, 'gpt-4')
    // //                ->withPrompt('Generate text to make me happy')
    // //                ->generate();
    //            $response['text'] = "$systemPrompt";
    //            return view('home', compact('response'));
    //        } catch (PrismException $e) {
    //            Log::error('Text generation failed:', ['error' => $e->getMessage()]);
    //        } catch (Throwable $e) {
    //            Log::error('Generic error:', ['error' => $e->getMessage()]);
    //        }
    //
    //    }

}
