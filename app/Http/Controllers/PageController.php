<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use App\Models\About;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Faq;
use App\Models\CarType;
use App\Models\CarModel;
use App\Models\Blog;
use App\Models\Subscribe;
use App\Models\MarketingMedia;
use App\Models\CarYear;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function storeCarNames(Request $request)
    {
        try {
            $carNames = $request->input('carNames');
            foreach ($carNames as $name) {
                CarType::updateOrCreate(['name' => $name]); // Avoid duplicates
            }
            return response()->json(['message' => 'Car names stored successfully']);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error($e->getMessage());
            return response()->json(['error' => 'Server Error'], 500);
        }
    }

    public function storeCarData(Request $request)
    {

        // $request->validate([
        //     'car_year' => 'required|integer',
        //     'car_models' => 'required|array',
        //     'car_models.*.model_name' => 'required|string',
        //     'car_models.*.model_value' => 'required|string',
        // ]);
        // Store the car year
        $carYear = CarYear::firstOrCreate(['year' => $request->car_year,]);
        dd($carYear);
        // Store the car models with relationships
        foreach ($request->car_models as $modelData) {
            CarModel::firstOrCreate([
                'name' => $modelData['model_name'],
                'car_type_id' => 8,
                'car_year_id' => $carYear->id,
            ]);
        }

        return response()->json(['success' => true, 'message' => 'Car data stored successfully']);
    }


    public function getMakes()
    {
        return response()->json(CarType::all());
    }

    public function getYears($makeId)
    {
        $years = CarYear::where('car_type_id', $makeId)->get();
        return response()->json($years);
    }

    public function getModels($makeId, $yearId)
    {
        $models = CarModel::where('car_type_id', $makeId)
                          ->where('car_year_id', $yearId)
                          ->get();
        return response()->json($models);
    }
    public function home(){
         $banners = Banner::latest()->get();
         $faqs = Faq::latest()->get();
         $blogs = Blog::latest()->get();
         $carTypes = CarType::all();
         $about = About::find(1);
         $testimonials = Service::get();
         $settings = Setting::first();
         $mediaItems = MarketingMedia::all();

            foreach ($mediaItems as $mediaItem) {
                $mediaItem->images = json_decode($mediaItem->images, true) ?? [];
                $mediaItem->videos = json_decode($mediaItem->videos, true) ?? [];
            }
            // dd($mediaItems);

        //  dd($settings);
        // $projects = Project::latest()->paginate(4); // Adjust the number 10 to the number of records per page you want to display
        // $nurseries = Nursery::latest()->get();
        // $seeds = Seed::latest()->get();
        // $envelops = Envelop::latest()->get();
        // $transporters = Transporter::latest()->get();
        // //dd($nurseries->images);

        return view('home',compact('banners', 'faqs', 'testimonials', 'carTypes', 'about', 'blogs','settings', 'mediaItems'));
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

    public function blog_view($id){
        $blog = Blog::find($id);

        return view('blog', compact('blog'));
    }
    public function subscribe(Request $req){
        $check = Subscribe::where('email', $req->email)->first();

        if($check){
            return response()->json([
                'status' => false
            ]);
        }

        Subscribe::create([
            'email' => $req->email
        ]);

        //Email to Subscriber
        $toEmail = $req->email;  // The email address to send to
        $subject = 'Welcome to Our Service! Stay Tuned for Updates';

        // Send the email
        // Mail::send('emails.email-subscribe', [], function ($message) use ($toEmail, $subject) {
        //     $message->to($toEmail)
        //             ->subject($subject);
        // });

        return response()->json([
            'status' => true
        ]);
    }


}
