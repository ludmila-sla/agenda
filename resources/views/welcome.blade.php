
<!DOCTYPE html>


    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Agenda</title>

        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        
            
           
      
    </head>
    <body >
      
<center>
<div class="col-md-12">
    
  <br>
  <h2> Minha Agenda </h2>
  <form>
      <h4> Filtros: </h4>
  <p> Nome do compromisso:  <input type="text" name="filtron" size="30"> 
   Data:  <input type="date" name="filtrod" size="30"> 
  Status: <select name="filtrost">
      
        <option value="agendado"> Agendado</option>
        <option value="realizado"> Realizado </option>
        <option value="cancelado"> Cancelado</option>
      
      
        </select>
    <input type="submit" class="btn btn-primary" name="filtro" value="Filtrar">
  </form>
</div>
<br>

<a href="/agenda/criar"> <input type="submit" class="btn btn-primary"  value="criar novo compromisso">   </a> 



    @if($filtron|| $filtrost || $filtrod)
    <h2>Buscando compromissos: </h2>
    @else
    <h2>Compromissos: </h2>
    @endif
    <div id="cards-container" class="row">
        @foreach($tarefas as $tarefa)
     
            <div class="card">
               
            <h5 > Compromisso: {{ $tarefa->nome }} </h5>
            <div >
               
               
                <p >Data: {{ $tarefa->data }}</p>
                <p>Hora de inicio: {{$tarefa->inicio}}</p>
                <p>Hora de termino: {{$tarefa->termino}}</p>
                <p>status: {{$tarefa->status}}</p>
                <p>Observações: {{$tarefa->obs}}</p>
               
                <a href="/agenda/editar/{{$tarefa->id}}">    <input type="submit" class="btn btn-primary" name="editar" value="Editar tarefa"> </a>
                <br>
                <form action="/agenda/{{$tarefa->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <br>
                    <button type="submit" class="btn btn-primary"> Deletar compromisso</button>
                </form>
            </div>
           
        </div>
      
        @endforeach
 

</center>
    </body>
</html>


   