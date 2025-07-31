<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletters,email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The email is invalid or already subscribed.'
            ], 422);
        }

        Newsletter::create([
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'Thank you for subscribing!'
        ]);
    }
}

