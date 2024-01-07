{{-- <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ordem de Compra</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <header>
        @include('layouts.header')
    </header>
    {{-- ---------------------------------------------------------------------------------Left Side PO ------------------------------------------------------------------------------------------------------- 

    <main class="sideContainer"> --}}
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Ordem De Compra') }}
                </h2>
            </x-slot>
        
        <div class="left-side">
            <div>
                Ordenar por:
                <p></p>
                <div style="display: inline-flex;">
                    <button type="button" class="btn btn-light">Custos Mensais</button>
                    <button type="button" class="btn btn-light">Pedentes</button>
                </div>
            </div>
        </div>




        {{-- ----------------------------------------------------------------------------------------------------------- PO Live List / Rigth Side----------------------------------------------------------------------------------------------------------- --}}
        <div class="right-side">
        <div style="display: inline-flex; margin-top: 20px">
            <a class="addButtons" data-bs-toggle="modal" data-bs-target="#Create">
                <img src="{{ asset('imgs/add.svg') }}" alt="+" class="plus"> </span>
                <span class="text">Adicionar Ordem de Compra</span>
            </a>
        </div>



        <div class="side">

            @if ($data->count() <= 0)
                <h1>Sem Ordens de compra</h1>
            @else
                <div id="search_container">
                    <div>
                        <form asp-controller="Students" asp-action="Search" method="get">
                            <input type="text" class="search_input" placeholder="Search" name="searchTerm">
                            <button type="submit" id="search_button" title="Adicionar Estudante">Search</button>
                        </form>
                    </div>

                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        Houve um problema . Por favor, corrija os seguintes erros:
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <table class="table">
                    <thead>
                        <th>Número de Ordem</th>
                        <th>Fornecedor</th>
                        <th>ID Fornecedor</th>
                        <th>Data de Começo</th>
                        <th>Data Final</th>
                        <th>Tipo de Custo</th>
                        <th>Custo Total</th>
                        <th>Estado</th>
                        <th></th>
                        <th></th>

                    </thead>
                        <tbody>
                            @foreach ($data as $po)
                                <tr>
                                    <td>{{ $po->num}}</td>
                                    @foreach ($suppliersData as $supplier)
                                        @if($supplier->ID == $po->id){
                                            <td>$supplier->id</td> 
                                            <td>$supplier->name</td>
                                        }
                                    @endforeach
                                    <td>$po->dateInit</td>
                                    <td>$po->dateEnd</td>
                                    <td>$po->costType</td>
                                    <td>$po->totalCost</td>
                                    <td>$po->status</td>
            
                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                            {{-- ---------------------------------------------------------------------------------Create PO Modal------------------------------------------------------------------------------------------------------- --}}

                            <div class="modal" id="Create">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">Criar Ordem de Compra</h4>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h2>Criar Ordem de Compra</h2>
                                                        @if (Session::has('success'))
                                                            <div class="alert alert-success" role="alert">
                                                                {{ Session::get('success') }}
                                                            </div>
                                                        @elseif(Session::has('fail'))
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ Session::get('fail') }}
                                                            </div>
                                                        @elseif(Session::has('emailExists'))
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ Session::get('emailExists') }}
                                                            </div>
                                                        @endif
                                                        <form method="post" action="{{ url('Save-PO') }}">
                                                            @csrf
                                                            <div class="md-3">
                                                                <label class="form-label">Número</label>
                                                                <input type="text" class="form-control"
                                                                    name="num" placeholder="Número de Ordem"
                                                                    value="{{ old('num') }}">
                                                                @error('num')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="md-3">
                                                                <label class="form-label">Data de Começo</label>
                                                                <input type="date" class="form-control"
                                                                    name="dateInit" value="2023-12-01"
                                                                    min="2023-12-01" value="{{ old('dateInit') }}">
                                                                @error('dateInit')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="md-3">
                                                                <label class="form-label">Data Final</label>
                                                                <input type="date" class="form-control"
                                                                    name="dateEnd" value="2023-12-01"
                                                                    min="2023-12-01" value="{{ old('dateEnd') }}">
                                                                @error('dateEnd')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>

                                                            <div class="md-3">
                                                                <label class="form-label">Custo Total</label>
                                                                <input type="text" class="form-control"
                                                                    name="totalCost" placeholder="000,00€"
                                                                    value="{{ old('totalCost') }}">
                                                                @error('totalCost')
                                                                    <div class="alert alert-danger" role="alert">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="md-3">
                                                                <select name="supplierID" required id="id">
                                                                    <option value="option_select" disabled selected>
                                                                        Fornecedor</option>
                                                                    @foreach ($suppliersData as $supplier)
                                                                        <option value="{{ $supplier->id }}">
                                                                            {{ $supplier->id }} |
                                                                            {{ $supplier->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="md-3">
                                                                <h3>Tipo de Custo</h3>
                                                                <select name="costType">
                                                                    <option value="0">Mensal</option>
                                                                    <option value="1">2 algo</option>
                                                                    <option value="2">3 algo</option>
                                                                    <option value="3">4 algo</option>
                                                                </select>
                                                            </div>

                                                            <div class="md-3">
                                                                <h3>Estado</h3>
                                                                <select name="status">
                                                                    <option value="0">Pendente</option>
                                                                    <option value="1">Conluído</option>
                                                                    <option value="2">3 algo</option>
                                                                    <option value="3">4 algo</option>
                                                                </select>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary">Submeter</button>
                                                            <a href="./" class="btn btn-danger">Retroceder</a>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- ------------------------------------------------------------------------------------------------------------Delete Modal------------------------------------------------------------------------------------------------------------ --}}
                            {{-- <div class="modal" id="Delete">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">

                                            <h4 class="modal-title">Eliminar Ordem de Compra</h4>
                                            <button type="button" class="btn-close"
                                                data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">
                                                Têm a certeza que deseja eliminar a ordem de compra número:
                                                {{ $po->num }}?
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger"
                                                    href="{{ url('POs/Delete/' . $po->id) }}">Eliminar</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        @endforeach
                    </tbody>
                </table>
            @endif
            <a href="{{ url('/') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
    {{-- </main>

</body>

</html> --}}
</x-app-layout>
