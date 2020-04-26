@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center col-md-12">
        <div class="card">
            <div class="card-header">
                Nova Ordem de Serviço
            </div>
            <div class="card-body">
                <form method="post" action="{{"/OS/{$services->id}/edit"}}">
                    {!! csrf_field() !!}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="requester">Solicitante</label>
                            <input class="form-control" type="text" name="requester" id="requester" value="{{ $services->requester }}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="department">Departamento</label>
                            <input class="form-control" type="text" name="department" id="department" value="{{ $services->department }}" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="date">Data</label>
                            <input class="form-control" type="datetime-local" name="date" id="date" value="{{ $services->date }}" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="contact">Contato</label>
                            <input class="form-control" type="text" name="contact" id="contact" value="{{ $services->contact }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="reason">Motivo do Chamado</label>
                            <input class="form-control" type="text" name="reason" id="reason" value="{{ $services->reason }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="soluction">Solução</label>
                            <input class="form-control" type="text" name="soluction" id="soluction" value="{{ old('soluction', $services->soluction) }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="technician">Técnico</label>
                            <input class="form-control" type="text" name="technician" id="technician" value="{{ old('technician', $services->technician) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="date_resolution">Data da Solução</label>
                            <input class="form-control" type="datetime-local" name="date_resolution" id="date_resolution" value="{{ old('date_resolution', $services->date_resolution) }}">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status_service">Status</label>
                            <select class="form-control" name="status_service" id="status_service">
                                <option value="1" {{ old('status_service', isset($services) ? $services->status_service : null) == "Aberta" ? 'selected="selected"' : null }}>Aberta</option>
                                <option value="2" {{ old('status_service', isset($services) ? $services->status_service : null) == "Em Analise" ? 'selected="selected"' : null }}>Em Analise</option>
                                <option value="3" {{ old('status_service', isset($services) ? $services->status_service : null) == "Concluída" ? 'selected="selected"' : null }}>Concluída</option>
                                <option value="4" {{ old('status_service', isset($services) ? $services->status_service : null) == "Atendimento Local" ? 'selected="selected"' : null }}>Atendimento Local</option>
                                <option value="5" {{ old('status_service', isset($services) ? $services->status_service : null) == "Atendimento Remoto" ? 'selected="selected"' : null }}>Atendimento Remoto</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <button class="form-control btn btn-primary" type="submit">Salvar</button>
                        </div>
                        <div class="form-group col-md-6">
                            <a href="{{route('home')}}" class="form-control btn btn-primary">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection