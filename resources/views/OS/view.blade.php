@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header">
                    <h3>Ordem de Serviço</h3>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover table-borderless mx-auto">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{$services->id}}</td>
                            </tr>
                            <tr>
                                <th>Solicitante</th>
                                <td>{{$services->requester}}</td>
                            </tr>
                            <tr>
                                <th>Departamento</th>
                                <td>{{$services->department}}</td>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <td>{{$services->created_at->format('d/m/Y H:i')}}</td>
                            </tr>
                            <tr>
                                <th>Contato</th>
                                <td>{{$services->contact}}</td>
                            </tr>
                            <tr>
                                <th>Motivo do Chamado</th>
                                <td>{{$services->reason}}</td>
                            </tr>
                            <tr>
                                <th>Solução</th>
                                <td>{{$services->soluction}}</td>
                            </tr>
                            <tr>
                                <th>Técnico</th>
                                <td>{{$services->technician}}</td>
                            </tr>
                            <tr>
                                <th>Data</th>
                                <td>{{$services->updated_at->format('d/m/Y H:i')}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $services->status_service }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-group col-md-4 offset-md-8">
                        <a href="{{ route('home') }}" class="form-control btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection