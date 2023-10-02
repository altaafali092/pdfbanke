<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {
        
        $contacts = contact::latest()->paginate(10);
        return view('admin.contact.index',compact('contacts'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'subject' => 'required', // Add this validation rule
            'message' => 'required',
        ]);
    
        // Proceed with the database operation
        $contact = new Contact();
        $contact->name = $validatedData['name'];
        $contact->phone = $validatedData['phone'];
        $contact->email = $validatedData['email'];
        $contact->subject = $validatedData['subject'];
        $contact->message = $validatedData['message'];
        $contact->save();
    
        return redirect()->back()->with('success','Sucessfully your form is Submitted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contact $contact)
    {
        $contact->delete();
        toast('Feedback or Query  Deleted Successfully','success');
        return back();
    }
    
}
