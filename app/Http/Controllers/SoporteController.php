<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
// llamado a los controlladores
use App\Http\Controllers\IndexController;
class SoporteController extends Controller
{

    function __construct()
    {
        Carbon::setLocale('es');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // TITLE
        view()->share('title', 'Ayuda');
        return view('soporte.index');
    }

    public function academy()
    {
        // TITLE
        view()->share('title', ' ');
        return view('soporte.academy');
    }

    public function ticket()
    {
        // TITLE
        view()->share('title', 'Tickets');
        return view('soporte.ticket');
    }

    public function ticket_clients()
    {
        // TITLE
        view()->share('title', ' ');
        return view('soporte.client_ticket');
    }
    public function soporte_team()
    {
        // TITLE
        view()->share('title', ' ');
        return view('soporte.admin_soporte');
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
        //
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
