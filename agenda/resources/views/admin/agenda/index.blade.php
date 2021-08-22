@extends('layouts.app')

@section('content')
  <pagina tamanho="12">

    @if($errors->all())
      <div class="alert alert-danger alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        @foreach ($errors->all() as $key => $value)
          <li><strong>{{$value}}</strong></li>
        @endforeach
      </div>
    @endif

    <painel titulo="Minha aplicacao - Agendamentos">
      <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>


      <tabela-lista
      v-bind:titulos="['#','Titulo','Conteudo', 'Data inicial', 'Data final']"
      v-bind:itens="{{json_encode($listaModelo)}}"
      ordem="desc" ordemcol="1"
      criar="#criar" detalhe="/admin/agenda/" editar="/admin/agenda/" deletar="/admin/agenda/" token="{{ csrf_token() }}"
      modal="sim"

      ></tabela-lista>
      <div align="center">
        {{$listaModelo}}
      </div>
    </painel>

  </pagina>

  <modal nome="adicionar" titulo="Adicionar">
    <formulario id="formAdicionar" css="" action="{{route('agenda.store')}}" method="post" enctype="" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="name">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="titulo" value="{{old('titulo')}}">
      </div>

      <div class="form-group">
        <label for="name">Conteudo</label>
        <input type="text" class="form-control" id="conteudo" name="conteudo" placeholder="conteudo" value="{{old('conteudo')}}">
      </div>

      <div class="form-group">
        <label for="data">Data Inicial</label>
        <input type="datetime-local" class="form-control" id="datai" name="datai" value="{{old('datai')}}">
      </div>

      <div class="form-group">
        <label for="data">Data Final</label>
        <input type="datetime-local" class="form-control" id="dataf" name="dataf" value="{{old('dataf')}}">
      </div>

    </formulario>
    <span slot="botoes">
      <button form="formAdicionar" class="btn btn-info">Adicionar</button>
    </span>

  </modal>
  <modal nome="editar" titulo="Editar">
    <formulario id="formEditar" v-bind:action="'/admin/agenda/' + $store.state.item.id" method="put" enctype="" token="{{ csrf_token() }}">

      <div class="form-group">
        <label for="name">Titulo</label>
        <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Titulo">
      </div>

      <div class="form-group">
        <label for="name">Conteudo</label>
        <input type="text" class="form-control" id="conteudo" name="conteudo" v-model="$store.state.item.conteudo" placeholder="Conteudo">
      </div>

      <div class="form-group">
          <label for="datai">Data Inicial</label>
          <input type="datetime-local" class="form-control" id="datai" name="datai" v-model="$store.state.item.datai">
      </div>

      <div class="form-group">
          <label for="dataf">Data Final</label>
          <input type="datetime-local" class="form-control" id="dataf" name="dataf" v-model="$store.state.item.dataf">
      </div>
    </formulario>
    <span slot="botoes">
      <button form="formEditar" class="btn btn-info">Atualizar</button>
    </span>
  </modal>
@endsection
