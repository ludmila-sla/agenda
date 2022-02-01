<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\User;

class AgendaController extends Controller
{
    public function index() {

        $filtron = request('filtron');
        $filtrost = request('filtrost');
        $filtrod = request('filtrod');

        if($filtron|| $filtrost || $filtrod){

            $tarefas = Agenda::where([
                ['nome', 'like', '%'.$filtron.'%'], 
                ['status', 'like', '%'.$filtrost.'%'], 
                ['data', 'like', '%'.$filtrod.'%']
            ])->get();

        } 

        else {
        
            $tarefas = Agenda::orderBy('data')->get();
           
           
        }        
    
        return view('welcome',['tarefas' => $tarefas,'filtron' => $filtron,'filtrost' => $filtrost ,'filtrod' => $filtrod]);

}
public function create() {
    return view('agenda/criar');
}

public function store(Request $request) {
    $tarefa = Agenda::all();

    $tarefas = new Agenda;

    $tarefas->nome = $request->nome;
    $tarefas->data = $request->data;
    $tarefas->inicio = $request->inicio;
    $tarefas->termino = $request->termino;
    $tarefas->status = $request->status;
    $tarefas->obs = $request->obs;
  
  

    
    $user = auth()->user();
    $tarefas->user_id = $user->id;
    $tarefas->user_name=$user->name;
    foreach($tarefa as $t) {
    if ($tarefas->data==$t->data && $tarefas->inicio>=$t->inicio && $tarefas->termino<=$t->termino ){
        return  view('/agenda/criar')->with('msg', 'já existe uma tarefa nessa data!');
    }
}
    $tarefas->save();

    return redirect('/')->with('msg', 'compromisso criado com sucesso!');
  

}


public function edit($id) {

    $user = auth()->user();

    $tarefas = Agenda::findOrFail($id);

    if($user->id != $tarefas->user_id) {
        return redirect('welcome');
    }

    return view('agenda/editar', ['tarefas' => $tarefas]);

}
public function update(Request $request) {



    $tarefas = $request->all();
    
    Agenda::findOrFail($request->id)->update( $tarefas);

    return redirect('/');
}
public function destroy($id) {

    Agenda::findOrFail($id)->delete();

    return redirect('/');

}
}