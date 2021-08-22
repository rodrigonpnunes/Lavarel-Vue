@extends('layouts.app')

@section('content')
  <pagina tamanho="10">
    <painel titulo="Dashboard - Principal">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

      <div class="row">
        <div class="col-md-4">
          <caixa titulo="Agenda" url="{{route('agenda.index')}}" cor="orange" icone="ion ion-pie-graph"></caixa>
        </div>
        <div class="col-md-4">
          <caixa titulo="Usuários" url="{{route('usuarios.index')}}" cor="blue" icone="ion ion-person-stalker"></caixa>
        </div>
      </div>
    </painel>

  </pagina>
@endsection
