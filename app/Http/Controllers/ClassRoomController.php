<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::latest()->paginate(10);
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'year' => ['required', 'string', 'max:20'],
        ]);

        ClassRoom::create($validated);

        return redirect()
            ->route('classes.index')
            ->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(ClassRoom $classRoom)
    {
        return view('classes.edit', compact('classRoom'));
    }

    public function update(Request $request, ClassRoom $classRoom)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'year' => ['required', 'string', 'max:20'],
        ]);

        $classRoom->update($validated);

        return redirect()
            ->route('classes.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(ClassRoom $classRoom)
    {
        $classRoom->delete();

        return redirect()
            ->route('classes.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }

    public function show(ClassRoom $classRoom)
    {
        return redirect()->route('classes.edit', $classRoom);
    }
}
