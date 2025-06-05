<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects
     * Purpose: Show all projects with filtering and pagination
     */
    public function index(Request $request)
    {
        $query = Project::with(['creator', 'updater']);

        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter by featured
        if ($request->filled('featured')) {
            $query->where('is_featured', $request->boolean('featured'));
        }

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title_ar', 'like', "%{$search}%")
                  ->orWhere('title_en', 'like', "%{$search}%")
                  ->orWhere('title_fr', 'like', "%{$search}%")
                  ->orWhere('description_ar', 'like', "%{$search}%")
                  ->orWhere('description_en', 'like', "%{$search}%");
            });
        }

        $projects = $query->orderBy('sort_order')
                         ->orderBy('created_at', 'desc')
                         ->paginate(15);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project
     * Purpose: Display project creation form with multilingual fields
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project
     * Purpose: Handle project creation with validation and file uploads
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_fr' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_fr' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric|min:0',
            'beneficiaries' => 'nullable|integer|min:0',
            'sort_order' => 'nullable|integer',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')
                                                  ->store('projects', 'public');
        }

        // Set creator and generate slug
        $validated['created_by'] = Auth::guard('admin')->id();
        $validated['slug'] = Str::slug($validated['title_en']);

        $project = Project::create($validated);

        return redirect()->route('admin.projects.index')
                        ->with('success', 'Project created successfully!');
    }

    /**
     * Display the specified project
     * Purpose: Show project details for review
     */
    public function show(Project $project)
    {
        $project->load(['creator', 'updater']);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified project
     * Purpose: Display project edit form with current data
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project
     * Purpose: Handle project updates with validation
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title_ar' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'description_fr' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_fr' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'boolean',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'location' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric|min:0',
            'beneficiaries' => 'nullable|integer|min:0',
            'sort_order' => 'nullable|integer',
        ]);

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($project->featured_image) {
                Storage::disk('public')->delete($project->featured_image);
            }

            $validated['featured_image'] = $request->file('featured_image')
                                                  ->store('projects', 'public');
        }

        // Set updater and update slug if title changed
        $validated['updated_by'] = Auth::guard('admin')->id();
        if ($validated['title_en'] !== $project->title_en) {
            $validated['slug'] = Str::slug($validated['title_en']);
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')
                        ->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified project
     * Purpose: Delete project with file cleanup
     */
    public function destroy(Project $project)
    {
        // Delete associated files
        if ($project->featured_image) {
            Storage::disk('public')->delete($project->featured_image);
        }

        $project->delete();

        return redirect()->route('admin.projects.index')
                        ->with('success', 'Project deleted successfully!');
    }
}
