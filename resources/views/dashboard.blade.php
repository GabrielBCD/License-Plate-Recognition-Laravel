<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-5 panel">
                    <form action="/dashboard/search" method="GET" class="mb-4">
                        @csrf
                        <div class="row m-0">
                            <div class="col col-12 col-lg-6">
                                <div>
                                    <div class="input-group mb-2">
                                        <label class="input-group-text w-25" id="inputGroup-sizing-default"
                                               for="search_plate">Placa</label>
                                        <input type="text" class="form-control " aria-label="Sizing example input"
                                               placeholder="ABC-1234"
                                               aria-describedby="inputGroup-sizing-default" id="search_plate"
                                               name="search_plate" value="{{$search_plate}}">
                                    </div>
                                    <div class="input-group mb-2">
                                        <label class="input-group-text w-25" for="search_type">Tipo</label>
                                        <select class="form-select" id="search_type" name="search_type">
                                            <option value="">Selecione um Tipo</option>
                                            <option value="Entrada" {{$search_type == "Entrada" ? 'selected' : ''}}>
                                                Entrada
                                            </option>
                                            <option value="Saída" {{$search_type == "Saída" ? 'selected' : ''}}>Saída
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-lg-6">
                                <div>
                                    <div class="input-group mb-2">
                                        <label class="input-group-text w-25" for="search_vehicle">Veiculo</label>
                                        <select class="form-select" id="search_vehicle" name="search_vehicle">
                                            <option value="">Selecione um Veículo</option>
                                            <option value="Carro" {{$search_vehicle == "Carro" ? 'selected' : ''}}>Carro
                                            </option>
                                            <option value="Moto" {{$search_vehicle == "Moto" ? 'selected' : ''}}>Moto
                                            </option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-2">
                                        <label class="input-group-text" for="search_start_date">Data
                                            Inicial</label>
                                        <input class="form-control" type="date" id="search_start_date"
                                               name="search_start_date"
                                               min="2018-01-01" max="2030-12-31" value="{{$search_start_date}}"/>

                                        <label class="input-group-text" for="search_end_date">Data Final</label>
                                        <input class="form-control" type="date" id="search_end_date"
                                               name="search_end_date"
                                               min="2018-01-01" max="2030-12-31" value="{{$search_end_date}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 d-flex justify-content-end mt-3">
                                <a class="btn btn-light" href="/dashboard">Exibir Todos</a>
                                <button type="submit" class="btn btn-dark" name="search">Pesquisar</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive table-responsive-xxl">
                        <table class="table table-sm">
                            <thead>
                            <tr>
                                <th scope="col">Placa</th>
                                <th scope="col">Veiculo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Data</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($predictions as $predict)
                                <form action="/dashboard/update/{{$predict->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <tr>
                                        <td>
                                            <span class="editable" data-field="plate">{{$predict->plate}}</span>
                                        </td>
                                        <td>{{$predict->vehicle}}</td>
                                        <td>{{$predict->type}}</td>
                                        <td>{{$predict->date}}</td>
                                        <td class="text-right">

                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#{{$predict->id}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                     fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                </svg>
                                            </button>

                                            <div class="modal fade" id="{{$predict->id}}" tabindex="-1"
                                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5"
                                                                id="exampleModalLabel">{{$predict->plate}}</h1>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <form action="">
                                                            <div class="modal-body">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control"
                                                                           id="plate-edit" data-field="plate"
                                                                           name="plate" value="{{$predict->plate}}">
                                                                    <label for="plate-edit">Placa</label>
                                                                </div>

                                                                IMAGEM AQUI
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button name="button-salvar" type="submit"
                                                                        class="save-btn btn btn-success">
                                                                    Salvar
                                                                </button>
                                                                <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                    Fechar
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $predictions->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
