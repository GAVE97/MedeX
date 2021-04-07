@extends('layouts.appComun')

@section('title', 'Usuaios')

@section('content')
<div class="container-fluid">
<div class="row justify-content-md-center">
    @foreach($Users as $User)
    <div class="col-sm-3">
    <div class="card">
      <div class="card-body">
        PERSONAL<br>
        {{$User->name}}<br>
        <!--{{$User->role}}<br-->
        {{$User->email}}
      </div>
    </div>
    </div>
    @endforeach  
</div>
</div>
@endsection