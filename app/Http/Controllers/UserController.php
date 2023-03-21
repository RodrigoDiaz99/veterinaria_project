<?php

namespace App\Http\Controllers;

use App\Models\appointmentModel;
use App\Models\petsModel;
use App\Models\recordsModel;
use App\Models\sizesPetsModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = sizesPetsModel::all();
        if(auth()->user()->hasRole('CLIENT')){
            $pets = petsModel::where('user_id', auth()->user()->id)->get();
        }else {
            $pets = petsModel::all()->groupBy('user_id');
        }

        return view('users.create',compact('sizes', 'pets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'names' =>  $request->names,
            'father_last_name' => $request->father_last_name,
            'mother_last_name' => $request->mother_last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        $user->assignRole('CLIENT');

        // Hacemos una consulta para obtener su id
        $user_id = User::where('email', $request->email)->first();

        $pet = petsModel::create([
            'user_id' => $user_id->id,
            'name' => $request->name,
            'race' => $request->race,
            'sizePets_id' => $request->size
        ]);

        return redirect()->route('user.index')->with('mesageCreate', 'El usuario y la mascota se crearon con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtenemos los datos del usuario
        $user = User::find($id);

        // Obtenemos su rol
        $role = $user->getRoleNames()->first();

        return view('users.show', compact('user', 'role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
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
        User::where('id', $id)->update([
            'names' =>  $request->names,
            'father_last_name' => $request->father_last_name,
            'mother_last_name' => $request->mother_last_name,
            'phone' => $request->phone,
            'email' => $request->email
            
        ]);

        return redirect()->route('user.index')->with('mesageEdit', 'El usuario se actualizó con Éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Recuperamos datos
        $mascotas = petsModel::where('user_id', $id)->get();

        // Recoremos todas las mascotas que tiene el usuario
        foreach($mascotas as $pet){
            // Eliminamos los appointments de los pets
            $appointments = appointmentModel::where('pet_id', $pet->id);
            $appointments->delete();
             
            // Eliminamos el expediente de las mascotas
            $records = recordsModel::where('pet_id', $pet->id);
            $records->delete();
        }

        // Eliminamos los pets
        $pets = petsModel::where('user_id', $id);
        $pets->delete();

        //Eliminamos al usuario
        $user = User::find($id);
        $user->delete();

        return redirect()->route('user.index')->with('mesageDelete', 'El usuario se elimino junto con sus mascotas y sus registros.');
    }
}
