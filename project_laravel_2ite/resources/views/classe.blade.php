@extends('layouts.app')


@section('content')

<div class="container">
<div class="container-fluid">
<div class="row">
    <nav style="padding-top: 30px;" class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column nav-pills">
        <li class="nav-item">
            <a class="nav-link bg-light text-dark" href="{{ url('/statistique') }}">Statistiques</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-light text-dark" href="/machine">Machine</a>
        </li>       
        
        <li class="nav-item">
            <a class="nav-link active    bg-dark text-white" href="/classe">Classes</a>
        </li>
        </ul>
    </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="text-center">Gestion Classes</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
        

        </div>
    </div>
    <form method="POST" action="{{ route('classe.store') }}">
    @csrf
    <input type="text" name="code" placeholder="Code">
    <input type="text" name="libelle" placeholder="Libelle">
    <button type="submit" class="btn btn-success">Ajouter </button>
</form>
        @if(count($data)>=1)
        <table class="table table-dark" style="margin-top: 50px;" >
            <tr>
                <th class="p-3 mb-2 bg-secondary text-white">Code</th>
                <th class="p-3 mb-2 bg-secondary text-white">Libelle</th>
                <th class="p-3 mb-2 bg-secondary text-white">Supprimer</th>
                <th class="p-3 mb-2 bg-secondary text-white">Modifier</th>
                <th class="p-3 mb-2 bg-secondary text-white">Salles</th>
            </tr>
            @foreach($data as $line)
            <tr>
                <td>
                    {{$line->code}}
                </td>
                <td>
                    {{$line->libelle}}
                </td>
                @if($line->id!=34)
                <td>
                <form method="POST" action="{{ route('classe.destroy', $line->id) }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit" onclick="return confirm('Etes vous sûr de vouloir Supprimer?')">Supprimer</button>
</form>
                </td>
                <td>
                <a href ="classe/update" type="button" class="btn btn-warning">Modifier</a>
                    </td>
                    @else
                    <td>
                    </td>
                    <td>
                    </td>
                    @endif
                    <td>
                    <div class="dropdown show">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Liste des classes
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    @foreach($results as $result)
    @if($result->id==$line->id)
    <a class="dropdown-item" >{{$result->num_machines}}</a>
    @endif
    @endforeach
  </div>
</div>
                    </td>
            </tr>
            @endforeach
            
            
        </table>

        @else
        <p>No data to show</p>
        @endif

    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
    </main>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

@endsection
