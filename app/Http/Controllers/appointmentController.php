<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\appointmentModel;
use App\Models\petsModel;
use App\Models\typeOfAppointmentModel;

class appointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = appointmentModel::orderBy('dateOfAppointment', 'ASC')->orderBy('timeOfAppointment', 'ASC')->get();
    
        return view('appointment.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(auth()->user()->hasRole('CLIENT')){
            // Obtenemos el usuario loggeado
            $user = auth()->user()->id;

            // Obtenemos todas las mascotas del usuario loggeado
            $pets = petsModel::where('user_id', $user)->get();

            // Obtenemos los tipos de citas que existen
            $types = typeOfAppointmentModel::all();
         }else{
            // Obtenemos todas las mascotas
            $pets = petsModel::all();

            // Obtenemos los tipos de citas que existen
            $types = typeOfAppointmentModel::all();
        }


        return view('appointment.create', compact('pets', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->dental == '0'){
            $appointment = appointmentModel::create([
                'pet_id' => $request->patient,
                'typeOfAppointment_id' => $request->type,
                'dateOfAppointment' => $request->date,
                'timeOfAppointment' => $request->time,
                'dental_cleaning' => '0',
                'observations' => $request->observations
            ]);
        }else{
            $appointment = appointmentModel::create([
                'pet_id' => $request->patient,
                'typeOfAppointment_id' => $request->type,
                'dateOfAppointment' => $request->date,
                'timeOfAppointment' => $request->time,
                'dental_cleaning' => '1',
                'observations' => $request->observations 
            ]);  
        }

        return redirect()->route('appointment.index')->with('mesageCreate', 'La Cita se agendo con Éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Vacio por no tener que mostrar descripciones de las citas puede ser para los role: CLIENT
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(auth()->user()->hasRole('CLIENT')){
            // Obtenemos el usuario loggeado
            $user = auth()->user()->id;

            // Obtenemos todas las mascotas del usuario loggeado
            $pets = petsModel::where('user_id', $user)->get();

            // Obtenemos los tipos de citas que existen
            $types = typeOfAppointmentModel::all();

        }else{
            // Obtenemos todas las mascotas
            $pets = petsModel::all();

            // Obtenemos los tipos de citas que existen
            $types = typeOfAppointmentModel::all();
        }

        // Recuperamos datos de la cita a editar
        $appointment = appointmentModel::find($id);

        return view('appointment.edit', compact('pets', 'types', 'appointment'));
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

        appointmentModel::where('id', $id)->update([
            'pet_id' =>  $request->patient,
            'typeOfAppointment_id' => $request->type,
            'dateOfAppointment' => $request->date,
            'timeOfAppointment' => $request->time
        ]);

        return redirect()->route('appointment.index')->with('mesageEdit', 'La Cita se actualizó con Éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = appointmentModel::find($id);
        $appointment->delete();

        return redirect()->route('appointment.index')->with('mesageDelete', 'La Cita se canceló con Éxito.');
    }
}
