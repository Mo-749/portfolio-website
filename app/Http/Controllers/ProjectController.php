<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);

   if ($request->hasFile('image') && $request->file('image')->isValid()) {
    $image = $request->file('image');

    $filename = time() . '_' . $image->getClientOriginalName();

    $image->move(
        storage_path('app/public/projects'),
        $filename
    );

    $validated['image'] = 'projects/' . $filename;
}

    Project::create($validated);

    return redirect()
        ->route('projects.index')
        ->with('success', 'Project succesvol toegevoegd.');
}

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['title']);

        $project->update($validated);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project succesvol aangepast.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project succesvol verwijderd.');
    }
}