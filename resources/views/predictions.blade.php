@extends('layout.main')

@section('title' , 'Panel')

@section('content')
    <div class="">
        <div class="rounded shadow mb-5 p-4">
            <form action="/predictions" method="GET">
                @csrf
                <div class="row m-0">
                    <div class="col col-12 col-lg-6">
                        <div>
                            <div class="input-group mb-2">
                                <label class="input-group-text w-25" id="inputGroup-sizing-default"
                                       for="search_plate">Placa</label>
                                <input type="text" class="form-control " aria-label="Sizing example input" placeholder="ABC-1234"
                                       aria-describedby="inputGroup-sizing-default" id="search_plate" name="search_plate" value="{{$search_plate}}">
                            </div>
                            <div class="input-group mb-2">
                                <label class="input-group-text w-25" for="search_type">Tipo</label>
                                <select class="form-select" id="search_type" name="search_type">
                                    <option value="">Selecione um Tipo</option>
                                    <option value="E" {{$search_type == "E" ? 'selected' : ''}}>Entrada</option>
                                    <option value="S" {{$search_type == "S" ? 'selected' : ''}}>Saída</option>
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
                                    <option value="Carro" {{$search_vehicle == "Carro" ? 'selected' : ''}}>Carro</option>
                                    <option value="Moto" {{$search_vehicle == "Moto" ? 'selected' : ''}}>Moto</option>
                                </select>
                            </div>
                            <div class="input-group mb-2">
                                <label class="input-group-text w-25" for="search_date">Data</label>
                                <input class="form-control" type="date" id="search_date" name="search_date"
                                       min="2018-01-01" max="2030-12-31" value="{{$search_date}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 d-flex justify-content-end">
                        <a type="submit" class="btn btn-light" href="/predictions">Exibir Todos</a>
                        <button type="submit" class="btn btn-dark" name="search">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="">
            <table class="table table-sm table-light table-striped text-lg-center">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Plate</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Type</th>
                    <th scope="col">Date</th>
                    <th scope="col">Photo</th>
                </tr>
                </thead>
                <tbody>
                @foreach($predictions as $predict)
                    <tr>
                        <th scope="row">{{$predict -> id}}</th>
                        <td>{{$predict -> plate}}</td>
                        <td>{{$predict -> vehicle}}</td>
                        <td>{{$predict -> type}}</td>
                        <td>{{$predict -> date}}</td>
                        <td>{{$predict -> photo}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        const plateInput = document.getElementById('search_plate');
        const vehicleInput = document.getElementById('search_vehicle');

        plateInput.addEventListener('input', function() {
            vehicleInput.disabled = !!this.value;
        });
        vehicleInput.addEventListener('input', function() {
            plateInput.disabled = !!this.value;
        });
    </script>
@endsection
