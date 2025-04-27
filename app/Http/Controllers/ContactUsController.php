<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function showForm()
    {
        return view('your_view');  
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Thank you for getting in touch! We will get back to you shortly.');
    }
}
