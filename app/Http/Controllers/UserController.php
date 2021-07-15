<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kategorie;
use App\Models\Produkty;
use App\Models\Task;
use App\Models\Gospodarstwo;
use App\Models\Zamowienia;
use App\Models\ZamowienieSzczegoly;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Uzytkownicy\StoreUzytkownicyRequest;
use App\Http\Requests\Uzytkownicy\UpdateUzytkownicyRequest;
use Session;
use Auth;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        $uzytkownik = User::all();
        return view('AdminPanel.Uzytkownicy.index', compact('uzytkownik','produktystanilosc','zamowienia'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        $uzytkownik = User::all();
        return view('AdminPanel.Uzytkownicy.add', compact('uzytkownik','produktystanilosc','zamowienia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUzytkownicyRequest $request)
    { 
        try {
        $uzytkownik = new User();
        $uzytkownik->name = $request->name;
        $uzytkownik->surname = $request->surname;
        $uzytkownik->adress = $request->adress;
        $uzytkownik->email = $request->email;
        $uzytkownik->phone = $request->phone;
        $uzytkownik->password = bcrypt($request->password);
        $uzytkownik->level = $request->level;
        $uzytkownik->save();
        return redirect()->route('uzytkownik.index')->with('message', 'Udało się dodać użytkownika.');
    } catch(\Illuminate\Database\QueryException $e) {
        \Log::error($e);
        // duplikacja klucza - jest to sprawdzane w regułach walidacji
        switch($e->getCode()){
            case '23000':
                return redirect()->route('uzytkownik.index')
                ->with('message', 'Nie udało się dodać użytkownika.');
                break;
            default:
                return redirect()->route('uzytkownik.index')
                ->with('message', 'Nie udało się dodać użytkownika.');
        }
    }
    }


    public function storeguest(Request $request)
    { 
        try {
        $uzytkownik = new User();
        $uzytkownik->name = $request->name;
        $uzytkownik->surname = $request->surname;
        $uzytkownik->adress = $request->adress;
        $uzytkownik->email = $request->email;
        $uzytkownik->phone = $request->phone;
        $uzytkownik->password = bcrypt($request->password);
        $uzytkownik->save();
        return redirect()->route('index.index')->with('message', 'Udało się dodać użytkownika.');
    } catch(\Illuminate\Database\QueryException $e) {
        \Log::error($e);
        // duplikacja klucza - jest to sprawdzane w regułach walidacji
        switch($e->getCode()){
            case '23000':
                return redirect()->route('index.index')
                ->with('message', 'Nie udało się dodać użytkownika.');
                break;
            default:
                return redirect()->route('index.index')
                ->with('message', 'Nie udało się dodać użytkownika.');
        }
    }
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
        $produktystanilosc=Produkty::where('produkty.Ilosc',0)->count();
        $zamowienia= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        $uzytkownik = User::findOrFail($id);
        $edit = true;
        return view('AdminPanel.Uzytkownicy.edit', compact('uzytkownik','produktystanilosc','zamowienia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUzytkownicyRequest $request, $id)
    {
        // $uzytkownik = User::find($request->id);
        // $uzytkownik->name = $request->name;
        // $uzytkownik->surname = $request->surname;
        // $uzytkownik->adress = $request->adress;
        // $uzytkownik->email = $request->email;
        // $uzytkownik->password = bcrypt($request->password);
        // $uzytkownik->level = $request->level;
        // $uzytkownik->save();
        // return redirect()->route('uzytkownik.index')->with('message', 'Udało się edytowac użytkownika.');

        try {
            // pobranie aktualnej kategorii z bazy
            $uzytkownik = User::find($request->id);
            $uzytkownik->name = $request->name;
             $uzytkownik->surname = $request->surname;
             $uzytkownik->adress = $request->adress;
             $uzytkownik->email = $request->email;
             $uzytkownik->phone = $request->phone;
             $uzytkownik->password = bcrypt($request->password);
             $uzytkownik->level = $request->level;
             $uzytkownik->save();
            
            return redirect()->route('uzytkownik.index')
                ->with('message', 'Udało się edytowac użytkownika.');
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('uzytkownik.index')
                    ->with('message', 'Nie udało się edytowac użytkownika.');
                    break;
                default:
                    return redirect()->route('uzytkownik.index')
                    ->with('message', 'Nie udało się edytowac użytkownika.');
            }
        }
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


    public function UzytkownikProfil()
    {
        $tasks= Task::all();
        $kategorie = Kategorie::all();
        $Uzytkownik = Auth::user();
        $gospodarstwo=Gospodarstwo::all();
        $ZamowieniaWOczekiwaniu= Zamowienia::where('ZamowienieStatus','W oczekiwaniu')->count();
        $ZamowieniaSprzedane= Zamowienia::where('ZamowienieStatus','Sprzedane')->count();
        $ZamowieniaPotwierdzone= Zamowienia::where('ZamowienieStatus','Potwierdzone')->count();
        $Zamowienia= Zamowienia::count();
        $uzytkownik = Auth::user();
        $zamowieniaszczegoly = Zamowienia::where('zamowienie.fk_uzytkownik','=', $uzytkownik->id)->get()->take(5);
        
     return view('FrontEnd.Uzytkownicy.uzytkownikprofil',compact('Uzytkownik','tasks','kategorie','gospodarstwo','ZamowieniaWOczekiwaniu',
     'ZamowieniaSprzedane','ZamowieniaPotwierdzone','Zamowienia','zamowieniaszczegoly','uzytkownik'));
        
    }

    public function EdycjaProfiluUzytkownika()
    {
        $tasks= Task::all();
        $kategorie = Kategorie::all();
        $uzytkownik = Auth::user();
        $gospodarstwo=Gospodarstwo::all();
     return view('FrontEnd.Uzytkownicy.uzytkownikprofiledycja',compact('uzytkownik','tasks','kategorie','gospodarstwo'));
    }

    public function AktualizacjaProfiluUzytkownika(Request $request)
    {
        try {
            // pobranie aktualnej kategorii z bazy
             $uzytkownik = Auth::user();
             $uzytkownik->name = $request->name;
             $uzytkownik->surname = $request->surname;
             $uzytkownik->adress = $request->adress;
             $uzytkownik->email = $request->email;
             $uzytkownik->phone = $request->phone;
             $uzytkownik->save();
            
            return redirect()->route('index.index')
                ->with('message', 'Udało się edytowac użytkownika.');
        } catch(\Illuminate\Database\QueryException $e) {
            \Log::error($e);
            // duplikacja klucza - jest to sprawdzane w regułach walidacji
            switch($e->getCode()){
                case '23000':
                    return redirect()->route('index.index')
                    ->with('message', 'Nie udało się edytowac użytkownika.');
                    break;
                default:
                    return redirect()->route('index.index')
                    ->with('message', 'Nie udało się edytowac użytkownika.');
            }
        }
    }



    public function ZmianaHaslaUzytkownika()
    {
        $uzytkownik = Auth::user();
        $tasks= Task::all();
        $kategorie = Kategorie::all();
        $gospodarstwo=Gospodarstwo::all();
        if($uzytkownik != NULL) {
            return view('FrontEnd.Uzytkownicy.uzytkownikzmianahasla',compact('uzytkownik','tasks','kategorie','gospodarstwo'));
        } else {
            return redirect('/');    
        }
    }

    public function AktualizacjaHaslaUzytkownika(Request $request)
    {
        $uzytkownik = Auth::user();
        if($uzytkownik != NULL) {
            $chkPasswordById = Auth::user();                 
            if(Hash::check($request->oldPassword, $chkPasswordById->password) && $request->password == $request->password2) {
                $chkPasswordById->password = bcrypt($request->password);
                $chkPasswordById->save();
                $request->session()->flush();
                return redirect()->route('index.index')->with('message', 'Password Updated Successfully! Please Login');
            } else {
                return redirect('/uzytkownik/password-change')->with('message', 'Old Password is Incorrect!');
            }   
        } else {
            return redirect('/');    
        }
    }

}
