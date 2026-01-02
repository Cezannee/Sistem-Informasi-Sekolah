<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    private function calcFinal(float $task, float $mid, float $final): float
    {
        // Bobot: Tugas 30%, UTS 30%, UAS 40%
        return round(($task * 0.30) + ($mid * 0.30) + ($final * 0.40), 2);
    }

    public function index()
    {
        $grades = Grade::with(['student','subject'])
            ->latest()
            ->paginate(10);

        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();
        $subjects = Subject::orderBy('name')->get();

        return view('grades.create', compact('students', 'subjects'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'year' => ['required', 'string', 'max:20'],
            'semester' => ['required', 'integer', 'in:1,2'],
            'task_score' => ['required', 'integer', 'min:0', 'max:100'],
            'mid_score' => ['required', 'integer', 'min:0', 'max:100'],
            'final_score' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        $validated['final_grade'] = $this->calcFinal(
            (float) $validated['task_score'],
            (float) $validated['mid_score'],
            (float) $validated['final_score']
        );

        try {
            Grade::create($validated);
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->withErrors(['student_id' => 'Data nilai untuk kombinasi siswa, mapel, semester, dan tahun ini sudah ada.']);
        }

        return redirect()
            ->route('grades.index')
            ->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function edit(Grade $grade)
    {
        $grade->load(['student','subject']);
        $students = Student::orderBy('name')->get();
        $subjects = Subject::orderBy('name')->get();

        return view('grades.edit', compact('grade', 'students', 'subjects'));
    }

    public function update(Request $request, Grade $grade)
    {
        $validated = $request->validate([
            'student_id' => ['required', 'exists:students,id'],
            'subject_id' => ['required', 'exists:subjects,id'],
            'year' => ['required', 'string', 'max:20'],
            'semester' => ['required', 'integer', 'in:1,2'],
            'task_score' => ['required', 'integer', 'min:0', 'max:100'],
            'mid_score' => ['required', 'integer', 'min:0', 'max:100'],
            'final_score' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        $validated['final_grade'] = $this->calcFinal(
            (float) $validated['task_score'],
            (float) $validated['mid_score'],
            (float) $validated['final_score']
        );

        try {
            $grade->update($validated);
        } catch (\Throwable $e) {
            return back()
                ->withInput()
                ->withErrors(['student_id' => 'Data nilai untuk kombinasi siswa, mapel, semester, dan tahun ini sudah ada.']);
        }

        return redirect()
            ->route('grades.index')
            ->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()
            ->route('grades.index')
            ->with('success', 'Nilai berhasil dihapus.');
    }

    public function show(Grade $grade)
    {
        return redirect()->route('grades.edit', $grade);
    }
}
