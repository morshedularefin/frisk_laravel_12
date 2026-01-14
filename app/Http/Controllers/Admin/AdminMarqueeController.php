<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marquee;

class AdminMarqueeController extends Controller
{
    public function index()
    {
        $marquees = Marquee::get();
        return view('admin.marquee.index', compact('marquees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        $marquee = new Marquee();
        $marquee->text = $request->text;
        $marquee->url = $request->url;
        $marquee->save();
        return redirect()->route('admin.marquee.index')->with('success', 'Marquee added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'url' => 'nullable|url',
        ]);

        $marquee = Marquee::where('id', $id)->first();
        $marquee->text = $request->text;
        $marquee->url = $request->url;
        $marquee->save();
        return redirect()->route('admin.marquee.index')->with('success', 'Marquee updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $marquee = Marquee::where('id', $id)->first();
        $marquee->delete();

        return redirect()->route('admin.marquee.index')->with('success', 'Marquee deleted successfully.');
    }
}
