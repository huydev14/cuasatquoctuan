<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->latest()->paginate(10);
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'category_id', 'description']);
        $data['slug'] = Str::slug($request->title) . '-' . time();
        $data['status'] = $request->boolean('status');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $data['image_path'] = $path;
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Đã thêm công trình mới thành công!');
    }

    public function edit(Project $project)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'category_id', 'description']);
        $data['slug'] = Str::slug($request->title) . '-' . $project->id;
        $data['status'] = $request->has('status');

        // remove old image if existed
        if ($request->hasFile('image')) {
            if ($project->image_path) {
                Storage::disk('public')->delete($project->image_path);
            }
            $path = $request->file('image')->store('projects', 'public');
            $data['image_path'] = $path;
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Đã cập nhật công trình thành công!');
    }

    public function destroy(Project $project)
    {
        if ($project->image_path) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Đã xóa công trình thành công!');
    }
}
