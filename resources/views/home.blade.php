@extends('layouts.app')

@section('content')
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="user">
                <i class="fas fa-user fa-3x"></i>
            </div>
            <div class="navigation">
                <h5>{{ Auth::user()->name }}</h5>
                @guest
                @else
                <p>
                    {{ ' '.__('roles.'.Auth::user()->roles->first()->name) . ' ' }}
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Sair') }}
                    </a>
                </p>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
            </div>
        </div>
        <ul class="list-unstyled components">
            <p>Gerenciamento de Ordens de Serviço</p>
            <li>
                <a href="{{ route('create') }}" title="Abrir OS">Abrir OS</a>
            </li>
            <li>
                <a href="{{ route('regist') }}" title="Registrar OS">Registrar OS</a>
            </li>
            <li>
                @if(Auth::user()->roles->first()->name === 'Admin')
                <a href="{{ route('register') }}" title="Novo Usuário">Novo Usuário</a>
                @endif
            </li>
        </ul>
    </nav>
    <!-- Sidebar -->

    <!-- Content -->
    <div class="content">
        <div class="col-md-12">
            <div class="card card-list shadow-sm">
                <div class="card-body table-responsive align-middle">
                    <h5>Lista de OS</h5>
                    <br>
                    <div class="os_lists table-responsive">
                        <table id="table_os" class="table table-sm table-striped table-bordered" style="width: 100%">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th>Solicitante</th>
                                    <th>Departamento</th>
                                    <th>Data</th>
                                    <th>Motivo</th>
                                    <th>Status</th>
                                    <th width="160">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $order)
                                <tr>
                                    <td class="align-middle">{{ $order->id }}</td>
                                    <td class="align-middle">{{ $order->requester }}</td>
                                    <td class="align-middle">{{ $order->department }}</td>
                                    <td class="align-middle">
                                        @if($order->date === null)
                                        {{ $order->created_at->format('d/m/Y H:i') }}
                                        @else
                                        {{ $order->date->format('d/m/Y H:i') }}
                                        @endif
                                    </td>
                                    <td class="align-middle">{{ $order->reason }}</td>
                                    <td class="align-middle">{{ $order->status_service }}</td>
                                    <td class="align-middle">
                                        @if((Auth::user()->roles->first()->name === 'Admin') xor (Auth::user()->roles->first()->name ==='Techinician'))
                                        <a class="btn btn-sm btn-warning " href="{{route('form', $order->id)}}" title="Editar OS"><i class="fas fa-pen fa-fw text-black"></i></a>
                                        @endif
                                        @if((Auth::user()->roles->first()->name === 'Admin') or (Auth::user()->roles->first()->name === 'Atendee') or (Auth::user()->roles->first()->name === 'Techinician'))
                                        <a class="btn btn-sm btn-info " href="{{route('view', $order->id)}}" title="Ver OS"><i class="fas fa-eye fa-fw text-black"></i></a>
                                        @endif
                                        @if(Auth::user()->roles->first()->name === 'Admin')
                                        <a class="btn btn-sm btn-danger delete" href="{{route('destroy', $order->id)}}" title="Deletar OS"><i class="fas fa-times fa-fw text-black"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
</div>
@endsection