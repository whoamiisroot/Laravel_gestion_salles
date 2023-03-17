@extends('layouts.app')


@section('content')

<div class="container">
<div class="container-fluid">
<div class="row">
    <nav   style="padding-top: 30px;" class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">

        <ul class="nav flex-column nav-pills">
        <li class="nav-item">
            <a class="nav-link bg-light text-dark" href="{{ url('/statistique') }}">Statistiques</a>
        </li>
        <li class="nav-item">
            
            <a class="nav-link active bg-dark text-white" href="/machine">Machine</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link bg-light text-dark" href="/classe">Classes</a>
        </li>
        </ul>
    </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
        <h2 class="text-center">Gestion Machines</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
        

        </div>
    </div>
    @if($etat==0)
    <form method="POST" action="{{ route('machine.store') }}">
    @csrf
    <input type="text" name="reference" placeholder="Reference">
    <input type="text" name="marque" placeholder="Marque">
    <input type="date" name="DateAchat" placeholder="Date D'achat">
    <input type="text" name="prix" placeholder="Prix">
    <!-- <input type="text" name="salleid" classe="dropdown" placeholder="Dans la salle"> -->
    <input type="text" list="dabab" name="salleid" placeholder="Dans La salle">
<datalist id="dabab">
    @foreach($drop as $dr)
  <option value='{{$dr->id}}#{{$dr->libelle}}'>
    @endforeach
</datalist>
    
    <button type="submit" class="btn btn-success">Ajotuer</button>
</form> 
@else

<form method="POST" action="{{ route('machine.update', $machine->id) }}">
    @csrf
    @method('PUT') <!-- Override the form's method to PUT -->
    <input type="text" name="reference" placeholder="Reference" value="{{ $machine->reference }}">
    <input type="text" name="marque" placeholder="Marque" value="{{ $machine->marque }}">
    <input type="date" name="DateAchat" placeholder="Date D'achat" value="{{ $machine->DateAchat }}">
    <input type="text" name="prix" placeholder="Prix" value="{{ $machine->prix }}">
    <input type="text" list="dabab" name="salleid" placeholder="Dans La salle" value="{{ $machine->salleid }}">
    <datalist id="dabab">
        @foreach($drop as $dr)      
        <option value='{{$dr->id}}#{{$dr->libelle}}'>
        @endforeach
    </datalist>
    <button type="submit" class="btn btn-success">Modifier</button>
</form>
@endif

        @if(count($data)>=1)
        <table class="table table-dark" style="margin-top: 50px;" >
            <tr>
                <th class="p-3 mb-2 bg-secondary text-white">Reference</th>
                <th class="p-3 mb-2 bg-secondary text-white">Marque</th>
                <th class="p-3 mb-2 bg-secondary text-white">Date d'Achat</th>
                <th class="p-3 mb-2 bg-secondary text-white">Prix</th>
                <th class="p-3 mb-2 bg-secondary text-white">Dans la Salle</th>
                <th class="p-3 mb-2 bg-secondary text-white">Supprimer</th>
                <th class="p-3 mb-2 bg-secondary text-white">Modifier</th>
            </tr>
            @foreach($data as $line)
            <tr>
                <td>
                    {{$line->reference}}
                </td>
                <td>
                    {{$line->marque}}
                </td>
                <td>
                    {{$line->dateAchat}}
                </td>
                <td>
                    {{$line->prix}}
                </td>
                @foreach($drop as $dr)
                        @if($line->salleid==$dr->id)
                            <td> {{$dr->libelle}} </td>   @endif
                        
                    @endforeach
                                  <td>
                <form method="POST" action="{{ route('machine.destroy', $line->id) }}">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this record?')">Supprimer</button>
</form>
                </td>
                <td>
                <a href="{{ route('machine.edit', $line->id) }}" type="button" class="btn btn-warning">Modifier</a>
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

@endsection
