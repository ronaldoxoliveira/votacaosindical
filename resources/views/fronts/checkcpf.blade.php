@extends('layouts.front')
@section('title', 'Etapa de verificação: A')
@section('content')
    <div class="card">
        <img class="card-img-top" src="holder.js/100x180/" alt="">
        <div class="card-body">
            <h4 class="card-title">VERIFICAÇÃO DO PARTICIPANTE</h4>
            <form method="POST" action="{{ route('passo2') }}" name="participante">
                @csrf
                <div class="form-group">
                    <label for="">ENTRE COM SEU CPF </label>
                    <input type="text" class="cpf form-control" name="cpf" id="particpanteCpf" aria-describedby="helpId" placeholder="">
                    <small id="helpId" class="form-text text-muted">O cpf tem 11 digitos. Podendo ser informado com máscara ou sem. Exemplo de cpf com máscara xxx.xxx.xxx-xx e exemplo de cpf sem náscara xxxxxxxxxxx</small>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $(".cpf").inputmask("999.999.999-99");  //inputmask to CPF
        });
    </script>
@endsection

