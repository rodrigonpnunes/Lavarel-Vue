<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $listaMigalhas = json_encode([
            ["titulo"=>"Home","url"=>route('home')],
            ["titulo"=>"Lista de agendamento","url"=>""]
      ]);
      $listaModelo = Agenda::select('id','titulo','conteudo', 'datai', 'dataf')->paginate(2);
      return view('admin.agenda.index',compact('listaMigalhas','listaModelo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $validacao = \Validator::make($data,[
        'titulo' => 'required|string|max:255',
        'conteudo' => 'required|string|max:255',
        'datai' => 'required',
        'dataf' => 'required',
      ]);

      if($validacao->fails()){
        return redirect()->back()->withErrors($validacao)->withInput();
      }

      Agenda::create($data);
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Agenda::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $data = $request->all();
      $validacao = \Validator::make($data,[
        "titulo" => "required",
        "conteudo" => "required",
        "datai" => "required",
        "dataf" => "required",
      ]);

      if($validacao->fails()){
        return redirect()->back()->withErrors($validacao)->withInput();
      }

      Agenda::find($id)->update($data);
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Agenda::find($id)->delete();
      return redirect()->back();
    }
}
