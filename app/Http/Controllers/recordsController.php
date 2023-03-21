<?php

namespace App\Http\Controllers;

use App\Models\appointmentModel;
use App\Models\petsModel;
use App\Models\recordsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class recordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = recordsModel::get()->groupBy('pet_id');

        return view('records.records', compact('pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($appointment)
    {
        // Datos de la cita
        $appointment = appointmentModel::where('id', $appointment)->first();
        
        return view('records.recordsCreate', compact('appointment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->prescriptions != ''){
            $prescription = $request->prescriptions;
        }else{
            $prescription = 'NINGUNA';
        }

        if($request->weight != ''){
            $weight = $request->weight;
        }else{
            $weight = '0';
        }

        if($request->remarks != ''){
            $remarks = $request->remarks;
        }else{
            $remarks = 'NINGUNA';
        }


        // Actualizamos el expediente de la mascota
        $record = recordsModel::create([
            'pet_id' => $request->pet_id,
            'prescriptions' => $prescription,
            'weight' => $weight,
            'remarks' => $remarks
        ]);


        // Marcamos la cita como completada
        $appointment = appointmentModel::find($request->appointment);
        $appointment->delete();

        Session::flash('mesage', 'Expediente Actualizado con Éxito');

        return redirect()->route('appointment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function attend($id)
    {
        // Datos de la cita
        $appointment = appointmentModel::where('id', $id)->first();

        if( $appointment->typeOfAppointment_id != "4"){
            return view('appointment.bath', compact('appointment'));
        }

        if($appointment->typeOfAppointment_id == "4"){
            // Buscamos todos los registros del  expediente de la mascota en cita
            $records = recordsModel::where('pet_id', $appointment->pet_id)->get();

            // Validamos que existe un expediente
            if(count($records) >= 1){

                // Retornamos la vista cuando existe un expediente
                return view('records.recordsAttend', compact('appointment', 'records'));
            }else {

                // Retornamos al method Create para mantener el orden en los contoladores
                return redirect()->route('records.create', compact('appointment', 'records'));
            }
        }

        if( $appointment->typeOfAppointment_id == "3"){
            echo "ESTETICA";
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
        // Datos de la cita
        $pet = petsModel::where('id', $id)->first();

        // Buscamos todos los registros del  expediente de la mascota en cita
        $records = recordsModel::where('pet_id', $pet->id)->get();

        // Validamos que existe un expediente
        if(count($records) >= 1){

            // Retornamos la vista cuando existe un expediente
            return view('records.recordsShow', compact('pet', 'records'));
        }else {

            // Retornamos al method Create para mantener el orden en los contoladores
            return redirect()->route('records.create', compact('pet'));
        }
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
