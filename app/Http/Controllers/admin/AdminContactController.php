<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class AdminContactController extends Controller
{
    //
    public function index(){
        $contacts  =  Contact::latest()->get();
         return view("admin.contact.list",compact('contacts'));
    }
    public function destroy($id)
    {
        $Contact = Contact::find($id);
        
        if (!$Contact) {
            return response()->json(['status' => false, 'message' => 'Contact not found.']);
        }
        
        $Contact->delete();
        
        return response()->json(['status' => true, 'message' => 'Contact deleted successfully.']);
    }
}
