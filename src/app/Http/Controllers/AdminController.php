<?php


namespace Nggiahao\Tessa\app\Http\Controllers;


use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     */
    public function dashboard()
    {
        return view(tessa_view('dashboard'));
    }
}