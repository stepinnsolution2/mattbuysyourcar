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

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        try {
            $faq->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'FAQ updated successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error updating the FAQ.',
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $faq->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'FAQ deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'There was an error deleting the FAQ.',
            ], 500);
        }
    }
}
