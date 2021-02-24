<?php
namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;
use App\Models\Eleicoe;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

use App\Models\Instituicoe;
use App\Models\Participante;
use App\Models\Eleicao;
use App\Models\Chapa;
use App\Models\Voto;

class VotaeleicaoController extends Controller
{

    protected $participante = null;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $eleicoes = null;
        $participante = $request->session()->get('participante');
         if( !isset($participante) ){
            return redirect('/fronts/')->with('warning',"Necessário validar dados do participante.");
         }else{
             //DB::enableQueryLog();
             $eleicoes = Eleicoe::where([
                 ['abertura','<=', date('Y-m-d H:i:s')],
                 ['encerramento','>=', date('Y-m-d H:i:s')]
             ])->get();
            //dd(DB::getQueryLog());
            return view('fronts.eleicao',compact('eleicoes'));
         }
    }

    public function showchapas(Request $request){
        //DB::enableQueryLog();
        $data = $request->validate(['key'=>'required'],['key.required'=>'Possívelmente alguma etapa foi pulada.']);
        $chapas = Chapa::where('eleicoe_id',Crypt::decryptString($data['key']))->get();
       // dd(DB::getQueryLog());
        return view('fronts.chapa',compact('chapas'));
    }

    public function storevoto(Request $request){
       //DB::enableQueryLog();
       $participante = $request->session()->get('participante');
       $data = $request->validate(['chapa'=>'required'],['chapa.required'=>'Selecione qual chapa irá votar.']);
       $data['participante_id'] = $participante->id;
       $data['chapa_id'] = Crypt::decryptString($data['chapa']);
       $data['audita'] = request()->ip();
       try{
            $voto = Voto::create($data);
            $eleicoe = DB::table('eleicoes')
            ->join('chapas', 'eleicoes.id', '=', 'chapas.eleicoe_id')
            ->select('eleicoes.id', 'eleicoes.titulo', 'eleicoes.descricao','eleicoes.abertura','eleicoes.encerramento')
            ->where('chapas.id', $data['chapa_id'])
            ->first();
            return view('fronts.comprovanteeleicao',compact('participante','eleicoe'));
       }catch(\Exception $e){
            $message = 'Voto não pode ser registrado.';
            if(env('APP_DEBUG')) {
                $message = $e->getMessage();
            }
            return redirect('/fronts/votaeleicao')->with('warning',"Registro do voto Falhou. Possilvmente o voto já foi realizado.");;
       }

    }
}
