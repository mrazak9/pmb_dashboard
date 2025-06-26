<?php

namespace App\Http\Controllers;

use App\Models\Concentration;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class ConcentrationController extends Controller
{
    public function index()
    {
        $concentrations = Concentration::with('studyProgram')->paginate(10);
        return view('pages.master.concentrations.index', compact('concentrations'));
    }

    public function create()
    {
        $studyPrograms = StudyProgram::where('is_active', true)->get();
        return view('pages.master.concentrations.create', compact('studyPrograms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'study_program_id' => 'required|exists:study_programs,id',
            'code' => 'required|string|max:20|unique:concentrations,code',
            'name' => 'required|string',
            'short_name' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'quota' => 'required|integer|min:0',
            'min_grade' => 'nullable|numeric|between:0,4.00',
            'is_active' => 'boolean'
        ]);

        Concentration::create($request->all());

        return redirect()->route('concentrations.index')
            ->with('success', 'Konsentrasi berhasil ditambahkan.');
    }

    public function show(Concentration $concentration)
    {
        $concentration->load('studyProgram');
        return view('pages.master.concentrations.show', compact('concentration'));
    }

    public function edit(Concentration $concentration)
    {
        $studyPrograms = StudyProgram::where('is_active', true)->get();
        return view('pages.master.concentrations.edit', compact('concentration', 'studyPrograms'));
    }

    public function update(Request $request, Concentration $concentration)
    {
        $request->validate([
            'study_program_id' => 'required|exists:study_programs,id',
            'code' => 'required|string|max:20|unique:concentrations,code,' . $concentration->id,
            'name' => 'required|string',
            'short_name' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'quota' => 'required|integer|min:0',
            'min_grade' => 'nullable|numeric|between:0,4.00',
            'is_active' => 'boolean'
        ]);

        $concentration->update($request->all());

        return redirect()->route('concentrations.index')
            ->with('success', 'Konsentrasi berhasil diupdate.');
    }

    public function destroy(Concentration $concentration)
    {
        $concentration->delete();

        return redirect()->route('concentrations.index')
            ->with('success', 'Konsentrasi berhasil dihapus.');
    }
}
