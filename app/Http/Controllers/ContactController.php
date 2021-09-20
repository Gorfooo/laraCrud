<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->paginate(10)->onEachSide(0);

        return view('home', compact('contacts'));
    }

    public function create()
    {
        session(['filename' => '']);

        return view('insertContact');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Storage::move('photos/' . session('filename'),'public/photos/' . session('filename'));

        $data['photo_path'] = session('filename');

        Contact::create($data);
        return redirect()->route('home');
    }

    public function edit($id)
    {        
        session(['filename' => '']);

        $contact = Contact::findOrFail($id);

        return view('editContact',compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $contact = Contact::findOrFail($id);

        $contact->update($data);
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

    public function upload(Request $request)
    {
        if ($request->hasFile('filepond')){
            $file = $request->file('filepond');
            $filename = uniqid() . '-' . now()->timestamp . $file->getClientOriginalName();
            $file->storeAs('photos/', $filename);
        }
        session(['filename' => $filename]);
        return $filename;
    }

    public function cancel()
    {
        File::delete(storage_path('app/photos/' . session('filename')));

        return redirect()->route('home');
    }
}
