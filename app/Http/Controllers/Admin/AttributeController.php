<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        $attributes = AttributeGroup::orderBy('display_order')->paginate(10);

        return view('admin.attributes.index', compact('attributes'));
    }

    public function create()
    {
        return view('admin.attributes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            //'group_name' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
        ]);

        //$data['slug'] = Str::slug($request->name);
        $data['slug'] = Str::slug($request->name) . '-' . time();

        AttributeGroup::create($data);

        return redirect()->route('attributes.index')
            ->with('success', 'Attribute group created');
    }

    public function edit(AttributeGroup $attribute)
    {
        return view('admin.attributes.edit', compact('attribute'));
    }

    public function update(Request $request, AttributeGroup $attribute)
    {
        $data = $request->validate([
            //'name' => 'required|string|max:255',
            'group_name' => 'nullable|string|max:255',
            'display_order' => 'nullable|integer',
        ]);

        if ($attribute->name !== $request->name) {
            $data['slug'] = Str::slug($request->name);
        }

        $attribute->update($data);

        return redirect()->route('attributes.index')
            ->with('success', 'Attribute updated');
    }

    public function destroy(AttributeGroup $attribute)
    {
        $attribute->delete();

        return back()->with('success', 'Attribute deleted');
    }
}