@extends('layouts.front')
@section('title', 'Etapa de verificação: A')
@section('content')
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">VERIFICAÇÃO DO PARTICIPANTE</h4>
            <form method="POST" action="{{ route('passo3') }}" name="participante">
                @csrf

                <input type="hidden" name="cpf" value='{{ $cpf }}' >
                <div class="form-group">
                    <label for="">ENTRE COM A DATA NASCIMENTO</label>
                    <input type="text" class="form-control" name="datanasc" value="{{ old('datanasc') }}" id="particpanteDatanasc" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">Informe a data de nascimento. Exemplo: 01/04/1980</small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
@endsection

