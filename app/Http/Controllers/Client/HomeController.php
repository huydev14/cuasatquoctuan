<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name', 'slug')->get();

        $projects = Project::with('category')
            ->where('status', true)
            ->latest()
            ->get();

        return view('client.home', compact('categories', 'projects'));
    }

    public function show($slug)
    {
        $project = Project::with('category')
            ->where('slug', $slug)
            ->where('status', true)
            ->firstOrFail();

        $relatedProjects = Project::where('category_id', $project->category_id)
            ->where('id', '!=', $project->id)
            ->where('status', true)
            ->limit(4)
            ->get();

        return view('client.projects.show', compact('project', 'relatedProjects'));
    }
}
