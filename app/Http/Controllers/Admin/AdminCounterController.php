<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Counter;

class AdminCounterController extends Controller
{
    public function index()
    {
        $counter_items = Counter::where('id',1)->first();
        return view('admin.counter.index', compact('counter_items'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'number1' => 'required|integer',
            'title1' => 'required|string',
            'text1' => 'required|string',
            'number2' => 'required|integer',
            'title2' => 'required|string',
            'text2' => 'required|string',
            'number3' => 'required|integer',
            'title3' => 'required|string',
            'text3' => 'required|string',
        ]);

        $counter = Counter::where('id', 1)->first();
        $counter->number1 = $request->number1;
        $counter->title1 = $request->title1;
        $counter->text1 = $request->text1;
        $counter->number2 = $request->number2;
        $counter->title2 = $request->title2;
        $counter->text2 = $request->text2;
        $counter->number3 = $request->number3;
        $counter->title3 = $request->title3;
        $counter->text3 = $request->text3;
        $counter->save();

        return redirect()->route('admin.counter.index')->with('success', 'Counter updated successfully.');
    }
}
