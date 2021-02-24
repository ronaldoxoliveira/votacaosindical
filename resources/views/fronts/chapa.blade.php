@extends('layouts.front')
@section('title', 'Etapa de verificação: A')
@section('content')

    <form method="POST" action="{{ route('eleicao3') }}" name="chapa">
        @csrf
        <div class="card">
            <h5 class="card-header">CHAPAS</h5>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                @foreach ($chapas as $chapa)
                        <li class="list-group-item">
                         <div class="form-check">
                             <label class="form-check-label">
                             <input type="radio" class="form-check-input" name="chapa" value="{{ Crypt::encryptString($chapa->id) }}" />
                             {{ $chapa->nome }} - {{ $chapa->resenha }}
                           </label>
                         </div>
                        </li>
                @endforeach
                    </ul>
                <button type="submit" class="btn btn-primary">Realiza votação</button>
            </div>
        </div>

    </form>
    <p class="form-text">&nbsp;</p>

@endsection

