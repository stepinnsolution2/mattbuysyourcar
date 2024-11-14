<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\Team;
use App\Models\Event;
use App\Models\Project;
use App\Models\Seed;
use App\Models\Envelop;
use App\Models\Gallery;
use App\Models\About;
use App\Models\Service;
use App\Models\Nursery;
use App\Models\Transporter;
use App\Models\Country;
use App\Models\Setting;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        // $banners = Banner::latest()->get();
        // $projects = Project::latest()->paginate(4); // Adjust the number 10 to the number of records per page you want to display
        // $nurseries = Nursery::latest()->get();
        // $seeds = Seed::latest()->get();
        // $envelops = Envelop::latest()->get();
        // $transporters = Transporter::latest()->get();
        // //dd($nurseries->images);

        return view('home');
    }
    public function about(){


        return view('about');
    }
    public function act(){
        return view('act');
    }

    public function contact(){
        return view('contact');
    }

    public function  nursery()
    {

        return view('nursery');
    }

    public function event()
    {
        // $events = Event::paginate(10); // Adjust '5' to the number of events per page you want to display

        // // Decode JSON fields for each event in the collection
        // foreach ($events as $event) {
        //     $event->images = $event->images ? json_decode($event->images, true) : [];
        //     $event->videos = $event->videos ? json_decode($event->videos, true) : [];
        // }

        return view('event');
    }


}
