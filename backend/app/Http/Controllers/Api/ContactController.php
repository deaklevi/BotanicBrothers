<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OfferMail;
use App\Mail\CustomerConfirmationMail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required|string',
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new OfferMail($validated));

        Mail::to($validated['email'])->send(new CustomerConfirmationMail($validated));
        return response()->json(['message' => 'Üzenet sikeresen elküldve!'], 200);
    }
}