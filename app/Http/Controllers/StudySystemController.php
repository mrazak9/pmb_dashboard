<?php

namespace App\Http\Controllers;

use App\Models\StudySystem;
use Illuminate\Http\Request;

class StudySystemController extends Controller
{
    public function index()
    {
        $studySystems = StudySystem::paginate(10);
        // return $studySystems;
        // die();
        return view('pages.master.study_systems.index', compact('studySystems'));
    }

    public function create()
    {
        return view('pages.master.study_systems.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'code' => 'required|string|max:20|unique:study_systems,code',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        StudySystem::create($request->all());

        return redirect()->route('study-systems.index')
            ->with('success', 'Sistem Studi berhasil ditambahkan.');
    }

    public function show(StudySystem $studySystem)
    {
        return view('pages.master.study_systems.show', compact('studySystem'));
    }

    public function edit(StudySystem $studySystem)
    {
        return view('pages.master.study_systems.edit', compact('studySystem'));
    }

    public function update(Request $request, StudySystem $studySystem)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'code' => 'required|string|max:20|unique:study_systems,code,' . $studySystem->id,
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $studySystem->update($request->all());

        return redirect()->route('study-systems.index')
            ->with('success', 'Sistem Studi berhasil diupdate.');
    }

    public function destroy(StudySystem $studySystem)
    {
        $studySystem->delete();

        return redirect()->route('study-systems.index')
            ->with('success', 'Sistem Studi berhasil dihapus.');
    }
}
