<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contact;

    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        // $contacts = $this->contact->paginate(10);
        return view('home');
    }

    public function create(Request $request)
    {
        $routeParameter = 'contacts/store';
        return view('insertContact',compact('routeParameter'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
    }

    public function edit($id)
    {
        //     $routeParameter = 'Contacts/update';
        //     return view('editContact',compact('routeParameter'));
        $contact = $this->contact->findOrFail($id);

        return view('editContact',compact('contact'));
    }

    public function update(Request $request, $id)
    {
        dd('caiu no update');
    }

    public function destroy($id)
    {
        //
    }
}
