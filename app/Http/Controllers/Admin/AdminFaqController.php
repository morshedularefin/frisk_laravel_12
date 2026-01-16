<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        return view('admin.faq.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->item_order = $request->item_order;
        $faq->faq_page = $request->faq_page;
        $faq->home_page_1 = $request->home_page_1;
        $faq->home_page_5 = $request->home_page_5;
        $faq->save();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = Faq::where('id', $id)->first();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->item_order = $request->item_order;
        $faq->faq_page = $request->faq_page;
        $faq->home_page_1 = $request->home_page_1;
        $faq->home_page_5 = $request->home_page_5;
        $faq->save();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $faq = Faq::where('id', $id)->first();
        $faq->delete();

        return redirect()->route('admin.faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
