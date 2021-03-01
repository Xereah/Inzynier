<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uzytkownik = User::all();
        return view('Uzytkownicy.index', compact('uzytkownik'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uzytkownik = User::all();
        return view('Uzytkownicy.add', compact('uzytkownik'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uzytkownik = new User();
        $uzytkownik->name = $request->name;
        $uzytkownik->surname = $request->surname;
        $uzytkownik->adress = $request->adress;
        $uzytkownik->email = $request->email;
        $uzytkownik->password = bcrypt($request->password);
        $uzytkownik->level = $request->level;
        $uzytkownik->save();
        return redirect()->route('uzytkownik.index')->with('message', 'Udało się dodać użytkownika.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uzytkownik = User::findOrFail($id);
        return view('Uzytkownicy.edit', compact('uzytkownik'));
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
        $uzytkownik = User::find($request->id);
        $uzytkownik->name = $request->name;
        $uzytkownik->surname = $request->surname;
        $uzytkownik->adress = $request->adress;
        $uzytkownik->email = $request->email;
        $uzytkownik->password = bcrypt($request->password);
        $uzytkownik->level = $request->level;
        $uzytkownik->save();
        return redirect()->route('uzytkownik.index')->with('message', 'Udało się edytowac użytkownika.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uzytkownik = User::findOrFail($id);

        // usunięcie produkty
        $uzytkownik->delete();

        return redirect()->route('uzytkownik.index')->with('message', 'Udało się usunąć użytkownika.');
    }
}
