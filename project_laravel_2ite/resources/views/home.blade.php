@extends('layouts.app')


@section('content')

<div class="container">
<div class="container-fluid">
<div class="row">
     <nav   style="padding-top: 30px;" class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column nav-pills">
        <li class="nav-item">
            <a class="nav-link active bg-light text-dark" href="{{ url('/statistique') }}">Statistiques</a>
        </li>
        <li class="nav-item">
            
            <a class="nav-link bg-light text-dark" href="/machine">Machine</a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link bg-light text-dark" href="/classe">Classes</a>
        </li>

        </ul>
    </div>
    </nav>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" >HOME</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <h5>You're welcome to your account <i><span style="text-transform: uppercase;font-weight: bold;"> {{ Auth::user()->name }} !</span></i></h5>

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
