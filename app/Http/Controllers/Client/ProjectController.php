<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $categories = Category::with(['projects' => function ($query) {
            $query->where('status', true)->latest();
        }])->get();

        $projects = Project::with('category')
            ->where('status', true)
            ->latest()
            ->get();

        return view('client.projects.index', compact('categories', 'projects'));
    }
}
