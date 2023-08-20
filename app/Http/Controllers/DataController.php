<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use App\Models\Account;
use App\Rules\CinSyntax;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function getdata(){
        return [
            ['id' => 1, 'name' => 'John Doe'],
            ['id' => 2, 'name' => 'Jane Doe'],
            ['id' => 3, 'name' => 'Petr Yan'],
        ];

    }


     public function index()
    {
        $user_info= Data::findorfail(Auth::user()->data_id);
        return view('data.info', ['user' => $user_info]);
        
        //
        //retourner les données de la table dans une variable $data
    }
    public function info(){
        $user_info= Data::findorfail(Auth::user()->data_id);
        return view('data.info', [
            'data' => $user_info,
            'user' => Auth::user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('data.create');
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
            'nom' => 'required|max:80',
            'prenom' => 'required|max:80',
            'cin' => ['required','unique:data,cin', 'max:9', new CinSyntax],
            'date_de_naissance' => 'required|date|before_or_equal:today',
            'telephone' => ['required' , 'min:9', 'max:10'],
            
        ]);
        //
        $data=new Data();
        $data->nom= strip_tags($request->input('nom'));
        $data->prenom= strip_tags($request->input('prenom'));
        $data->cin= strip_tags($request->input('cin'));
        $data->date_de_naissance= strip_tags($request->input('date_de_naissance'));
        $data->telephone= strip_tags($request->input('telephone'));
        $data->save();

        return redirect()->route('register', ['dataid' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $data
     * @return \Illuminate\Http\Response
     */
    //show est celle qui nous permettera de se redirect vers la page correspondante selon l'argument donnée
    public function show($data)
    {
        //
        $index= Data::findorFail($data);//recuperer la table de getdata dans $table
       //rechercher dans la colonne id de la $table le $data passé en argument(l'id en arguments)
        // if($index === false) abort(404);//si on a pas trouvé l'id, ERROR 404
        return view('data.show', [
                'data' => $index
        ]);//on retourner la page data.show.blade avec la ligne trouvee dans qu'on va stocker dans une variable nommée $data ('data')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $data
     * @return \Illuminate\Http\Response
     */
    public function edit($data)
    {
        
        //
        return view('data.edit_data', ['data' => Data::findorfail($data)]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $data)
    {
        //
        $request->validate([
            'nom' => 'required|max:80',
            'prenom' => 'required|max:80',
            'cin' => ['required','unique:data,cin', 'max:9', new CinSyntax],
            'date_de_naissance' => 'required|date|before_or_equal:today',
            'telephone' => ['required' , 'min:9', 'max:10'],
            
        ]);
        $update=Data::findorfail($data);
        $update->nom= strip_tags($request->input('nom'));
        $update->prenom= strip_tags($request->input('prenom'));
        $update->cin= strip_tags($request->input('cin'));
        $update->date_de_naissance= strip_tags($request->input('date_de_naissance'));
        $update->telephone= strip_tags($request->input('telephone'));
        $update->save();
        $id=Auth::user();
        return redirect()->route('account.edit', $id);
        // return view('data.edit_user', ['user' => Auth::user(),]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $data
     * @return \Illuminate\Http\Response
     */
    public function destroy($data)
    {
        //
        $delete_data=Data::findorFail($data);
        $id=Auth::user()->id;
        $delete_user=User::findorFail($id);
        $delete_data->delete();
        $delete_user->delete();
        return redirect()->route('home.index');
    }
}
