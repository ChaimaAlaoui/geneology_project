<?php

namespace App\Http\Controllers;
use App\Models\Person;


use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');  
    }
    public function index()
    {
        $people = Person::with('user')->paginate(10);
        return view('people.index', compact('people'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('people.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'middle_names' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        $data = [
            'created_by' => auth()->id(),
            'first_name' => ucfirst(strtolower($request->input('first_name'))),
            'last_name' => strtoupper($request->input('last_name')),
            'birth_name' => $request->input('birth_name') ? strtoupper($request->input('birth_name')) : strtoupper($request->input('last_name')),
            'middle_names' => $request->input('middle_names') ? implode(',', array_map('ucfirst', explode(',', strtolower($request->input('middle_names'))))) : null,
            'date_of_birth' => $request->input('date_of_birth'),
        ];
        

        Person::create($data);

        return redirect()->route('people.index')->with('success', 'Personne créée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Person::with(['children', 'parents.user', 'user'])->findOrFail($id);
        return view('people.show', compact('person'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
