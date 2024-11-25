<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribe;
class SubscribeController extends Controller
{
    //
    public function index(){
        $subscribers  =  Subscribe::latest()->get();
         return view("admin.subscribe.list",compact('subscribers'));
    }
    public function destroy($id)
    {
        $subscribe = Subscribe::find($id);
        
        if (!$subscribe) {
            return response()->json(['status' => false, 'message' => 'Subscriber not found.']);
        }
        
        $subscribe->delete();
        
        return response()->json(['status' => true, 'message' => 'Subscriber deleted successfully.']);
    }
}
