<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    const defaultPhotoPath = 'storage/photos/default__user.png';

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

        if (session('filename') != ''){
            Storage::move('photos/' . session('filename'),'public/photos/' . session('filename'));
            $data['photo_path'] = 'storage/photos/' . session('filename');
        }else{
            $data['photo_path'] = self::defaultPhotoPath;
        }

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

        if(session('filename') != ''){
            if(str_contains(session('filename'), 'default__user.png')){
                unlink(storage_path('app/photos/' . session('filename')));
            }else{
                Storage::move('photos/' . session('filename'),'public/photos/' . session('filename'));
                $data['photo_path'] = 'storage/photos/' . session('filename');
            }
        }else{
            $data['photo_path'] = self::defaultPhotoPath;
        }
        //clicar em editar em um cliente com imagem e remover ela (não irá remover de public photos)
        //clicar em editar e salvar (irá criar novo arquivo em photos)
        //abrir e salvar rápido remove a foto

        $contact->update($data);
        return redirect()->route('home');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $contact->photo_path == self::defaultPhotoPath ? '' : File::delete($contact->photo_path);

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

    public function revertUpload()
    {
        unlink(storage_path('app/photos/' . session('filename')));
        session(['filename' => '']);
    }

    public function cancel()
    {
        File::delete(storage_path('app/photos/' . session('filename')));

        return redirect()->route('home');
    }
}
