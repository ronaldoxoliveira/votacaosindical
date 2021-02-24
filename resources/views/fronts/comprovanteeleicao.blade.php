@extends('layouts.front')
@section('title', 'Etapa de verificação: A')
@section('content')

      <div class="card">
            <h5 class="card-header">COMPROVANTE DE PARTICIPAÇÃO ELEIÇÕES</h5>
            <div class="card-body">
            <h5 class="card-title">{{ $eleicoe->titulo }}</h5>
            <p class="card-text"><strong>Eleitor:</strong>{{ $participante->nome }}</p>
            <p class="card-text"><strong>CPF:</strong>{{ $participante->cpf }}</p>
            <p class="card-text"><strog>Abertuda:</strog> {{ $eleicoe->abertura }}</p>
            <p class="card-text"><strog>Encerramento:</strog> {{ $eleicoe->encerramento }}</p>
            <p class="card-text">{{ $eleicoe->descricao }}</p>

            </div>
        </div>

    <p class="form-text">&nbsp;</p>


@endsection

