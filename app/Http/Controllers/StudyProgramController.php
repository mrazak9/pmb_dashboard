<?php

namespace App\Http\Controllers;

use App\Models\StudyProgram;
use Illuminate\Http\Request;

class StudyProgramController extends Controller
{
    public function index()
    {
        $studyPrograms = StudyProgram::all();
        return view('pages.master.study_programs.index', compact('studyPrograms'));
    }

    public function create()
    {
        return view('pages.master.study_programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:20|unique:study_programs,code',
            'name' => 'required|string',
            'level' => 'required|in:D3,S1,S2,S3',
            'accreditation' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        StudyProgram::create($request->all());

        return redirect()->route('study-programs.index')
            ->with('success', 'Program Studi berhasil ditambahkan.');
    }

    public function show(StudyProgram $studyProgram)
    {
        $studyProgram->load(['concentrations']);
        return view('pages.master.study_programs.show', compact('studyProgram'));
    }

    public function edit(StudyProgram $studyProgram)
    {
        return view('pages.master.study_programs.edit', compact('studyProgram'));
    }

    public function update(Request $request, StudyProgram $studyProgram)
    {
        $request->validate([
            'code' => 'required|string|max:20|unique:study_programs,code,' . $studyProgram->id,
            'name' => 'required|string',
            'level' => 'required|in:D3,S1,S2,S3',
            'accreditation' => 'nullable|string|max:10',
            'description' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        $studyProgram->update($request->only([
            'code',
            'name',
            'level',
            'accreditation',
            'description',
            'is_active',
        ]));

        $studyProgram->is_active = $request->has('is_active');
        $studyProgram->save();

        return redirect()->route('study-programs.index')
            ->with('success', 'Program Studi berhasil diupdate.');
    }

    public function destroy(StudyProgram $studyProgram)
    {
        $studyProgram->delete();

        return redirect()->route('study-programs.index')
            ->with('success', 'Program Studi berhasil dihapus.');
    }
}
