

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Editando compromisso</title>
        <link rel="stylesheet" href="css/styles.css" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

       
       
       
          
            
           
      
    </head>
   
    <body>
        
        <form action= "/agenda/update/{{$tarefas->id}}" method= "POST" enctype="multipart/form-data">
            @csrf
            {{ csrf_field() }}
        <br>
        <br>
        <br>
        
        <table>
        <tr>
            <td> Nome do compromisso:  </td>
        <td> <input type="text" name="nome" size="30" value="{{ $tarefas->nome }}"> </td>
        </tr>
        <tr>
        <td> data do compromisso: </td>
        <td><input type="date" name="data" size="20" value="{{ $tarefas->data }}"> </td> 
    </tr>
        <tr>
        <td> Horário de inicio:  </td>
        <td> <input type="time" name="inicio" size="20" value="{{ $tarefas->inicio }}"> </td> 
    </tr>
        <tr>
        <td> Horário de termino: </td>
        <td><input type="time" name="termino" size="20" value="{{ $tarefas->termino }}"> </td> 
    </tr>
        <tr>
    <td>Status do compromisso: </td>
    <td>
        <select name="status">
      
        <option value="agendado"> Agendado</option>
        <option value="realizado"> Realizado </option>
        <option value="cancelado"> Cancelado</option>
      
      
        </select>
    </td> 
</tr>
    <tr>
     <td> Observações:  </td>
   <td>  <input type="text" name="obs" size="80" value="{{ $tarefas->obs }}"> </td> 
    </tr> 
</tr>
<tr>
</tr>
  <td>  <input type="submit" class="btn btn-primary" name="salvar" value="Salvar"> </td>
    
</tr>
        </table>
    
</form>

    </body>
</html>
