@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center col-md-12">
        <div class="card">
            <div class="card-header">
                Nova Ordem de Serviço
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('store') }}">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="requester">Solicitante</label>
                            <input class="form-control" type="text" name="requester" id="requester">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="department">Departamento</label>
                            <input class="form-control" type="text" name="department" id="department">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="contact">Contato</label>
                            <input class="form-control" type="text" name="contact" id="contact">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="reason">Motivo do Chamado</label>
                            <input class="form-control" type="text" name="reason" id="reason">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="offset-md-4 col-md-4 mb-1">
                            <button class="form-control btn btn-primary" type="submit">Abrir OS</button>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('home') }}" class="form-control btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection