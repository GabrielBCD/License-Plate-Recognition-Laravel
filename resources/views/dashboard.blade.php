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
                                        <label class="input-group-text w-14" for="search_start_date">Data</label>
                                        <input class="form-control" type="date" id="search_start_date"
                                               name="search_start_date"
                                               min="2018-01-01" max="2030-12-31" value="{{$search_start_date}}"/>

                                        <label class="input-group-text w-14" for="search_end_date">Data</label>
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
                    <table class="table table-sm">
                        <thead>
                        <tr>
                            <th scope="col">Placa</th>
                            <th scope="col">Veiculo</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Data</th>
                            <th scope="col">Visualizar</th>
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
                                    <td>
                                        <button type="button" class="btn btn-link" data-bs-toggle="modal"
                                                data-bs-target="#{{$predict->id}}">
                                            Image
                                        </button>

                                        <div class="modal fade" id="{{$predict->id}}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5"
                                                            id="exampleModalLabel">{{$predict->plate}}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <form onsubmit="return validateForm()" action="">
                                                        <div class="modal-body">
                                                            <input type="text" name="plate"
                                                                   class="form-control m-auto"
                                                                   data-field="plate"
                                                                   value="{{$predict->plate}}">
                                                            IMAGEM AQUI
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="save-btn btn btn-success">
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
                    {{ $predictions->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
