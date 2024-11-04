<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Create Feedback Function 
    public function sendFeedback(Request $request)
    {
        $formFields = $request->validate([
            'user_email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        $formFields['user_id'] = auth()->id();
        Feedback::create($formFields);
        return redirect('/feedback')->with('message', 'Thank you for your feedback');
    }
}