@extends('layouts.front')
@section('title', 'Etapa de verificação: A')
@section('content')
   @foreach($eleicoes as $eleicao)
    <form method="POST" action="{{ route('eleicao2') }}" name="eleicao">
        @csrf
        <input type="hidden" name="key" value='{{ Crypt::encryptString($eleicao->id) }}' >
        <div class="card">
            <h5 class="card-header">ELEIÇÃO</h5>
            <div class="card-body">
            <h5 class="card-title">{{ $eleicao->titulo }}</h5>
            <p class="card-text"><strog>Abertuda:</strog> {{ $eleicao->abertura }}</p>
            <p class="card-text"><strog>Encerramento:</strog> {{ $eleicao->encerramento }}</p>
            <p class="card-text">{{ $eleicao->descricao }}</p>
            <button type="submit" class="btn btn-primary">Realiza votação</button>
            </div>
        </div>
    </form>
    <p class="form-text">&nbsp;</p>
    @endforeach
    @if( count($eleicoes) == 0 )
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>
                    No momento não há nem uma eleição.<br/>
                    Por favor, entre em contato com a equipe responsável.
            </strong>
        </div>
    @endif

@endsection

