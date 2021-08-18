<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts=Contact::orderBy('id','desc')->get();
        return view('back.contact.index',compact('contacts'));
    }

    public function delete($id)
    {
        Contact::find($id)->delete();
        toastr()->success('yorum başarıyla silindi');
        return redirect()->route('admin.contact.index');
    }
}
