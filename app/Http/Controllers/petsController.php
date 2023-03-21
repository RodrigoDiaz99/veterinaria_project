<?php

namespace App\Http\Controllers;

use App\Models\appointmentModel;
use Illuminate\Http\Request;
use App\Models\petsModel;
use App\Models\recordsModel;
use App\Models\sizesPetsModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class petsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = petsModel::all();

        return view('pets.index', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sizes = sizesPetsModel::all();
        $users = User::all();

        return view('pets.create', compact('sizes', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->names != ''){
            // Registramos al usuario nuevo
            $user = User::create([
                'names' => $request->names,
                'father_last_name' => $request->father_last_name,
                'mother_last_name' => $request->mother_last_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            // Hacemos una consulta para obtener su id
            $user_id = User::where('email', $request->email)->first();

            $pet = petsModel::create([
                'user_id' => $user_id->id,
                'name' => $request->name,
                'race' => $request->race,
                'sizePets_id' => $request->sizePets_id
            ]);
        }else {

            $pet = petsModel::create([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'race' => $request->race,
                'sizePets_id' => $request->sizePets_id
            ]);

        }

        return redirect()->route('pets.index')->with('mesageCreate', 'La Mascota se registro con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pet = petsModel::find($id);
        $records = recordsModel::where('pet_id', $id)->get();

        $contRecords = appointmentModel::where('pet_id', $id)->onlyTrashed()->count();
        $contAppointments = appointmentModel::where('pet_id', $id)->count();

        $totalAppointments = ($contRecords + $contAppointments);

        if($totalAppointments > 0){
            $total = ($contRecords / $totalAppointments)*100;
        }else {
            $total = 0;
        }

        return view('pets.show', compact('pet', 'records', 'contRecords', 'contAppointments', 'total'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit = petsModel::find($id);

        $sizes = sizesPetsModel::all();
        $users = User::all();

        return view('pets.edit', compact('edit', 'sizes', 'users'));
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
        if($request->names != ''){
            // Registramos al usuario nuevo
            $user = User::where('id', $request->user_id)->update([
                'names' => $request->names,
                'father_last_name' => $request->father_last_name,
                'mother_last_name' => $request->mother_last_name,
                'phone' => $request->phone,
                'email' => $request->email
            ]);

            // Hacemos una consulta para obtener su id
            $user_id = User::where('email', $request->email)->first();

            $pet = petsModel::where('id', $id)->update([
                'user_id' => $user_id->id,
                'name' => $request->name,
                'race' => $request->race,
                'sizePets_id' => $request->sizePets_id
            ]);

            return redirect()->route('pets.index')->with('mesageCreate', 'La Mascota y Usuario se Actualizaron con Éxito.');

        }else {

            $pet = petsModel::where('id', $id)->update([
                'user_id' => $request->user_id,
                'name' => $request->name,
                'race' => $request->race,
                'sizePets_id' => $request->sizePets_id
            ]);

            return redirect()->route('pets.index')->with('mesageCreate', 'La Mascota se Actualizo con Éxito.');

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
        $pet = petsModel::find($id);
        $pet->delete();

        // Eliminamos todas las citas del pet que se elimina
        $appointments = appointmentModel::where('pet_id', $id);
        $appointments->delete();

        // Eliminamos el expediente de esa mascota
        $records = recordsModel::where('pet_id', $id);
        $records->delete();

        return redirect()->route('pets.index')->with('mesageDelete', 'La Mascota se elimino con Éxito.');
    }
}
