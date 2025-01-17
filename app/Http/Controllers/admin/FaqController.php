<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        try {
            Faq::create($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'FAQ created successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error creating the FAQ.',
            ], 500);
        }
    }

    public function edit($id)
    {
        // Find the FAQ by id
        $faq = Faq::findOrFail($id);

        // Return the edit view with the FAQ data
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        try {
            // Find the FAQ by id
            $faq = Faq::findOrFail($id);

            // Update the FAQ with the validated data
            $faq->update($request->only(['question', 'answer']));

            // Return a successful response
            return response()->json([
                'status' => 'success',
                'message' => 'FAQ updated successfully.',
            ]);
        } catch (\Exception $e) {
            // Return an error response if the FAQ wasn't found or an exception occurred
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error updating the FAQ.',
            ], 500);
        }
    }


    public function destroy(Request $request, $id)
{
    try {
        // Find the FAQ by id
        $faq = Faq::findOrFail($id);

        // Delete the FAQ
        $faq->delete();

        // Return a successful response
        return response()->json([
            'status' => 'success',
            'message' => 'FAQ deleted successfully.',
        ]);
    } catch (\Exception $e) {
        // If the FAQ is not found or another error occurs, return an error response
        return response()->json([
            'status' => 'error',
            'message' => 'There was an error deleting the FAQ. ' . $e->getMessage(),
        ], 500);
    }
}
}
