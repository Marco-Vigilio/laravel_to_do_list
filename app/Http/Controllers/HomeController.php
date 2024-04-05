<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Recupera l'utente corrente
        $user = Auth::user();

        // Recupera la lista dell'utente corrente
        $lista = $user->lista;

        // Recupera tutte le task associate alla lista dell'utente corrente
        $tasks = $lista->tasks;

        // Passa le task alla vista
        return view('home', compact('tasks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        // Recupera la lista associata all'utente corrente
        $lista = $user->lista;

        // Convalida i dati della richiesta
        $data = $request->validate([
            'task' => ['required'],
        ]);

        $data['done'] = false;
        // Crea la nuova task associandola direttamente alla lista dell'utente corrente
        $newTask = $lista->tasks()->create($data);

        return redirect()->route('home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
    }
}
