<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(){
        return view('contactus');
    }

    public function store(Request $request){
        $request->validate([
            'full_name' => 'required',
            'feedback_email' => 'required',
            'feedback_message' => 'required'
        ]);

        $feedback = new Feedback();
        $feedback->full_name = $request->input('full_name');
        $feedback->feedback_email = $request->input('feedback_email');
        $feedback->feedback_message = $request->input('feedback_message');
        $feedback->save();

        return redirect()->back()->with('success', 'Feedback sent Successfully!');
    }
}
