<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;
use App\Models\Ticket;
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
        $articles = Article::all();
        return view('soporte.academy', compact('articles'));
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
        $tickets = Ticket::where('user_id', Auth::user()->ID)->where('status', '!=', 'Cancelado')->get();

        return view('soporte.client_ticket', compact('tickets'));
    }

    public function create_ticket(Request $request){
        $ticket = new Ticket($request->all());
        $ticket->user_id = Auth::user()->ID;
        $ticket->status = 'Abierto';
        $ticket->fecha = Carbon::now()->format('Y-m-d');
        $ticket->soporte = 'Soporte';
        $ticket->save();

        if ($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $name = $ticket->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/tickets/archivos', $name);
            $ticket->archivo = $name;
            $ticket->archivo_name = $file->getClientOriginalName();
            $ticket->save();
        }

       return redirect('admin/soporte/ticket/client')->with('msj-exitoso', 'El Ticket' . $ticket->titulo . ' ha sido creado con éxito.');

    }

    public function edit_ticket($id)
    {
        $ticket = Ticket::find($id);

        return response()->json(
            $ticket
        );
    }
    public function update_ticket(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);
        $ticket->titulo = $request->titulo;
        $ticket->comentario = $request->comentario;
        $ticket->tipo = $request->tipo;
        if ($request->hasFile('archivo')){
            $file = $request->file('archivo');
            $name = $ticket->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/tickets/archivos', $name);
            $ticket->archivo = $name;
            $ticket->archivo_name = $file->getClientOriginalName();
        }
        $ticket->save();
        return redirect('admin/soporte/ticket/client')->with('msj-exitoso', 'El ticket ' . $ticket->title . ' ha sido modificado con éxito.');
    }


    public function delete_ticket($id){
        $ticket = Ticket::find($id);
        $ticket->status = 'Cancelado';
        $ticket->save();

        return redirect('admin/soporte/ticket/client')->with('msj-exitoso', 'El ticket '.$ticket->title.' ha sido eliminado con éxito.');

    }

    public function soporte_team()
    {
        // TITLE
        view()->share('title', ' ');
        return view('soporte.admin_soporte');
    }
    public function soporte_article()
    {
        // TITLE
        view()->share('title', 'Artículos');
        $articles = Article::all();
        return view('admin.soporte.article' , compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_article(Request $request)
    {
        $article= new Article($request->all());
        $article->save();
        return redirect('admin/soporte/article')->with('msj-exitoso', 'El artículo ' . $article->title . ' ha sido creado con éxito.');
    }

    public function edit_article($id)
    {
        $evento = Article::find($id);

        return response()->json(
            $evento
        );
    }

    public function update_article(Request $request)
    {
        $article = Article::find($request->article_id);
        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();
        return redirect('admin/soporte/article')->with('msj-exitoso', 'El artículo ' . $article->title . ' ha sido modificado con éxito.');
    }

    public function delete_article($id){
        $article = Article::find($id);
        $article->delete();
        return redirect('admin/soporte/article')->with('msj-exitoso', 'El artículo '.$article->title.' ha sido eliminado con éxito.');

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
