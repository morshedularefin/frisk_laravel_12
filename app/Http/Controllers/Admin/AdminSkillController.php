<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class AdminSkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('item_order','asc')->get();
        return view('admin.skill.index', compact('skills'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer',
            'item_order' => 'required|integer',
        ]);

        $skill = new Skill();
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->item_order = $request->item_order;
        $skill->save();

        return redirect()->route('admin.skill.index')->with('success', 'Skill added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'percentage' => 'required|integer',
            'item_order' => 'required|integer',
        ]);

        $skill = Skill::where('id', $id)->first();
        $skill->name = $request->name;
        $skill->percentage = $request->percentage;
        $skill->item_order = $request->item_order;
        $skill->save();

        return redirect()->route('admin.skill.index')->with('success', 'Skill updated successfully.');
    }

    public function destroy(Request $request, $id)
    {
        $skill = Skill::where('id', $id)->first();
        $skill->delete();

        return redirect()->route('admin.skill.index')->with('success', 'Skill deleted successfully.');
    }
}
