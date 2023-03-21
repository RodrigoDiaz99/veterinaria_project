<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\petsModel;
use App\Models\appointmentModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $usersCount = User::count();
        
        $petsCount = petsModel::count();
        
        // Falta ganancias
        
        $appointmentsCount = appointmentModel::count();
        
        return view('dashboard', compact('usersCount', 'petsCount', 'appointmentsCount'));
    }
}
