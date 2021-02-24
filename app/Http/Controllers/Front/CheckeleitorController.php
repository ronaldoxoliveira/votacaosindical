<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Models\Participante;
use App\Models\Instituicoe;

class CheckeleitorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fronts.checkcpf');
    }

    public function validacpf(Request $request){
        //DB::enableQueryLog();
        $data = $request->validate(['cpf'=>'required|cpf'],['cpf.required'=>'Informe o cpf do participante']);

        $cpf = str_replace('.','', $data['cpf']);
        $cpf = str_replace('-','', $cpf);
        $participante = Participante::where('cpf',$cpf)->first();
        //dd(DB::getQueryLog());

        if( !is_nuLL($participante) ){
            $cpf = $participante->cpf;
            return view('fronts.checkdatanasc',compact('cpf'));
        }else{
           return back()->with('warning','O cpf informado é válido, mas não está apto há vontação.');
        }


    }

    public function validadatanasc(Request $request){

        $data = $request->validate(['cpf'=>'required','datanasc'=>'required'],
                                   ['cpf.required'=>'Volte ao passo anterior','datanasc.required'=>'Data nascimento do participante']
                                    );
         $participante = Participante::where('cpf',$data['cpf'])->where('datanasc',date('Y-m-d', strtotime($data['datanasc'])))->first();

        if( !is_null($participante) ){
            $request->session()->put('participante', $participante);
            return redirect('/fronts/votaeleicao');

        }else{
            return view('fronts.checkdatanasc',$data)->with('warning','A data de nascimento informada não confere.');
        }



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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
