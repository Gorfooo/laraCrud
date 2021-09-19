<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->paginate(10);

        return view('home', compact('contacts'));
    }

    public function create()
    {
        return view('insertContact');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $photo_path = $request->file('photo')->store('photos','public');

        $data['photo_path'] = $photo_path;

        Contact::create($data);
        return redirect()->route('home');
    }

    public function edit($id)
    {        
        $contact = Contact::findOrFail($id);

        return view('editContact',compact('contact'));
    }

    public function update(Request $request, $id)
    {
        dd('caiu no update');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('home');
    }

    public function search(Request $request)
    {
        $parameters = $request->all();

        if(empty($parameters['search'])){
            return redirect()->route('home');
        }

        $contacts = Contact::where('id', 'like','%'.$parameters['search'].'%' )->orWhere('name', 'like', '%'.$parameters['search'].'%')->paginate(10);

        return view('home',compact('contacts','parameters'));
    }
}
