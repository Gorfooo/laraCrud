<?php

namespace App\Http\Controllers;

use App\Models\contact;
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
        $contacts = $this->contact->paginate(10);
        return view('home',compact('contacts'));
    }

    public function create(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        $data = $request->all();
        dd($data);
    }

    public function edit($id)
    {
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
