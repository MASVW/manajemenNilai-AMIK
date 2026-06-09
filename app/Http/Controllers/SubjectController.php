<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::query()->latest()->get();

        return view('pages.subject.subject-list', ['subjects' => $subjects]);
    }

    public function createView()
    {
        return view('pages.subject.subject-create');
    }

    public function createData(Request $request)
    {
        $validated = $this->validateSubject($request);

        Subject::query()->create($validated);

        return redirect()->route('subject.list')->with('success', 'Subject created successfully.');
    }

    public function detailView($id)
    {
        $subject = Subject::query()->findOrFail($id);

        return view('pages.subject.subject-detail', ['subject' => $subject]);
    }

    public function patchView($id)
    {
        $subject = Subject::query()->findOrFail($id);

        return view('pages.subject.subject-patch', ['subject' => $subject]);
    }

    public function patchData(Request $request, $id)
    {
        $validated = $this->validateSubject($request);
        $subject = Subject::query()->findOrFail($id);

        $subject->update($validated);

        return redirect()->route('subject.view', ['id' => $subject->id])->with('success', 'Subject updated successfully.');
    }

    public function deleteData($id)
    {
        Subject::query()->findOrFail($id)->delete();

        return redirect()->route('subject.list')->with('success', 'Subject deleted successfully.');
    }

    private function validateSubject(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
        ]);
    }
}
