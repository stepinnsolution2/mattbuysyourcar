<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use App\Models\CarDetails;
use Mail;
use DB;

class CarDetailsController extends Controller
{
    public function storeCarInfo(Request $request)
    {
        // dd($request->all());
        // Validate the incoming data
        $validator = Validator::make($request->all(), [
            'car_info.car_type' => 'string',
            'car_info.model' => 'string',
            'car_info.specification' => 'string',
            'car_info.engine_size' => 'string',
            'car_info.year' => 'string',
            'car_info.kilometers' => 'string',
            'additional_questions.gcc_spec' => 'string',
            'additional_questions.condition' => 'string',
            'additional_questions.paintwork' => 'string',
            'additional_questions.interior_condition' => 'string',
            'additional_questions.service_history' => 'string',
            'additional_questions.comment' => 'string',
            'additional_questions.loan_secured' => 'string',
            'images' => 'array|min:6',  // Ensure there are at least 6 images
            'contact_info.first_name' => 'string',
            'contact_info.last_name' => 'string',
            'contact_info.phone_number' => 'string',
            'contact_info.email' => 'email',
            'contact_info.address' => 'string',
        ]);

        // Handling images
        $imagePaths = [];
        foreach ($request->file('images') as $image) {
            // Store image and get its path
            $imagePath = $image->store('car_images', 'public');  // store in 'public' disk, inside 'car_images' folder
            $imagePaths[] = $imagePath;  // Add the path to the array
        }

        $car_type = DB::table('car_types')->where('id', $request->input('car_info.car_type'))->pluck('name')->first();

        $car_model = DB::table('car_models')->where('id', $request->input('car_info.model'))->pluck('name')->first();

        // Create car details entry
        $carDetail = new CarDetails();
        $carDetail->car_type = $car_type;
        $carDetail->model = $car_model;
        $carDetail->specification = $request->input('car_info.specification');
        $carDetail->engine_size = $request->input('car_info.engine_size');
        $carDetail->year = $request->input('car_info.year');
        $carDetail->kilometers = $request->input('car_info.kilometers');

        // Additional questions
        $carDetail->gcc_spec = $request->input('additional_questions.gcc_spec');
        $carDetail->condition = $request->input('additional_questions.condition');
        $carDetail->paintwork = $request->input('additional_questions.paintwork');
        $carDetail->interior_condition = $request->input('additional_questions.interior_condition');
        $carDetail->service_history = $request->input('additional_questions.service_history');
        $carDetail->comment = $request->input('additional_questions.comment');
        $carDetail->loan_secured = $request->input('additional_questions.loan_secured');

        // Contact info
        $carDetail->first_name = $request->input('contact_info.first_name');
        $carDetail->last_name = $request->input('contact_info.last_name');
        $carDetail->phone_number = $request->input('contact_info.phone_number');
        $carDetail->email = $request->input('contact_info.email');
        $carDetail->address = $request->input('contact_info.address');

        // Save the images (paths) in the database as a JSON array
        $carDetail->car_images = json_encode($imagePaths);  // Store image paths as a JSON array

        $carDetail->save();  // Save the car details to the database

        //Email Code 
        $formData = [
            'car_type'            => $car_type,
            'model'               => $car_model,
            'specification'       => $request->input('car_info.specification'),
            'engine_size'         => $request->input('car_info.engine_size'),
            'year'                => $request->input('car_info.year'),
            'kilometers'          => $request->input('car_info.kilometers'),
        
            // Additional questions
            'gcc_spec'            => $request->input('additional_questions.gcc_spec'),
            'condition'           => $request->input('additional_questions.condition'),
            'paintwork'           => $request->input('additional_questions.paintwork'),
            'interior_condition'  => $request->input('additional_questions.interior_condition'),
            'service_history'     => $request->input('additional_questions.service_history'),
            'comment'             => $request->input('additional_questions.comment'),
            'loan_secured'        => $request->input('additional_questions.loan_secured'),
        
            // Contact info
            'first_name'          => $request->input('contact_info.first_name'),
            'last_name'           => $request->input('contact_info.last_name'),
            'phone_number'        => $request->input('contact_info.phone_number'),
            'email'               => $request->input('contact_info.email'),
            'address'             => $request->input('contact_info.address'),
        
            // Other data
            'car_images'          => json_encode($imagePaths),  // Store image paths as a JSON string
        ];
        

        //Email to Subscriber
        $toEmail = "stepinnsolution@gmail.com"; // The email address to send to
        $subject = 'New Car Available for purchase!!';
       
        // Send the email
        Mail::send('emails.email', ['formData' => $formData], function ($message) use ($toEmail, $subject) {
            $message->to($toEmail)
                    ->subject($subject);
        });

        // dd("ok");
        return response()->json([
            'message' => 'Car details saved successfully.',
            'data' => $carDetail
        ], 201);
    }

    public function index()
    {
        $cars = CarDetails::all();

        return view('admin.carsDetail.index',compact('cars'));
    }

    public function show($id)
    {
        $carDetail = CarDetails::find($id);

        if (!$carDetail) {
            return response()->json(['message' => 'Car details not found.'], 404);
        }

        return view('admin.carsDetail.show', compact('carDetail'));
    }

    public function destroy($id)
    {
        // dd($id);
        $carDetail = CarDetails::find($id);

        if (!$carDetail) {
            //dd("ok");
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error deleting the marketing media.'
            ], 500);
        }

        // Delete images from storage
        // $imagePaths = json_decode($carDetail->car_images, true);
        // foreach ($imagePaths as $imagePath) {
        //     Storage::disk('public')->delete($imagePath);
        // }

        $carDetail->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Car Detail deleted successfully.'
        ]);
    }

}
