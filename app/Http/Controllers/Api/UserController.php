<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $creds = $request->only(['email', 'password']);

        if(!$token = auth()->attempt($creds)){
            return response()->json([
                'token' => $token,
                'Success' => false
            ]);
        }

        return response()->json([
            'Success' => true,
            'token' => $token,
            'user' => Auth::user() 
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$encryptedPass = Hash::make($request->password);

        //$user = new User;
        $user = User::create([
            'names' => $request->names,
            'father_last_name' => $request->father_last_name,
            'mother_last_name' => $request->mother_last_name,
            'email' => $request->email,
            'password' => $encryptedPass,
        ]);*/

        try{
            $encryptedPass = Hash::make($request->password);

            $user = User::create([
                'names' => $request->names,
                'father_last_name' => $request->father_last_name,
                'mother_last_name' => $request->mother_last_name,
                'email' => $request->email,
                'password' => $encryptedPass,
            ]);
            return response()->json($user, 200);
        }
        catch(Exception $e){
            return response()->json([
                'Success' => false,
                'messege' => $e
            ]);
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
    public function destroy()
    {
        Auth::logout();
    }
}
