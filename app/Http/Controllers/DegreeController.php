<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Person;

class DegreeController extends Controller
{
    public function showForm()
    {
        return view('test_degree.degree');
    }

    public function calculateDegree(Request $request)
    {
        $request->validate([
            'person1_id' => 'required|integer',
            'person2_id' => 'required|integer',
        ]);

        DB::enableQueryLog();
        $timestart = microtime(true);

        $person = Person::findOrFail($request->person1_id);

        $result = $person->getDegreeWith($request->person2_id);

        $time = microtime(true) - $timestart;
        $nbQueries = count(DB::getQueryLog());

        if ($result) {
            return view('test_degree.degree', [
                'degree' => $result['degree'],
                'path' => implode('->', $result['path']),
                'time' => $time,
                'nbQueries' => $nbQueries,
            ]);
        } else {
            return view('test_degree.degree', [
                'degree' => null,
                'path' => null,
                'time' => $time,
                'nbQueries' => $nbQueries,
            ]);
        }
    }
}