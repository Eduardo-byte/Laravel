<?php

namespace App\Http\Controllers;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients' , compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newclient');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'age' => 'required|min:2|max:3',
            'address' => 'required',
            'email' => 'required|unique:clients|email'
        ];

        $messages = [
          'required' => 'O atributo :attribute nao pode estar em branco' ,
          'name.required' => 'O nome e requerido',
          'age.required' => 'Idade e requerido',
          'age.min' => 'Indroduza no minimo 2 caracteres',
          'address.required' => 'Morada e requerido',
          'email.email' => 'Introduza um enderesso de email valido'
        ];

        $request->validate($rules , $messages);

        /*
         $request->validate([
            'name' => 'required',
            'age' => 'required|min:2|max:3',
            'address' => 'required',
            'email' => 'required|unique:clients|email'
        ], $messages);
        */


        $client = new Client();
        $client->name = $request->input('name');
        $client->age = $request->input('age');
        $client->address = $request->input('address');
        $client->email = $request->input('email');
        $client->save();
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
