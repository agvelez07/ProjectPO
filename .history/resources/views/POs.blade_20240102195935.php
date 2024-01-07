<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <main class="sideContainer">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <div class="sideContainer">
            <div class="leftSide">
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
            <div style="display: inline-flex; margin-top: 20px">
                <h1>Ordem de Compra</h1>
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
                            <th>Data de Começo</th>
                            <th>Data Final</th>
                            <th>Tipo de Custo</th>
                            <th>Custo Total</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>

                        </thead>
                        <tbody>
                            @if (Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('success') }}
                                </div>
                            @elseif(Session::has('fail'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('fail') }}
                                </div>
                            @endif
                            @foreach ($data as $po)
                                <tr>
                                    <form method="post" action="{{ url('Update-PO/' . $po->id) }}" class="POForm">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ old('id', $po->id) }}">
                                        <td>
                                            <input type="text" class="form-control" name="num"
                                                placeholder="Ex.12345454642341" value="{{ $po->num }}">
                                        </td>
                                        <td>
                                            <select name="supplierID" class="dropdown">
                                                @foreach ($suppliersData as $supplier)
                                                    <option value="{{ $supplier->id }}"
                                                        {{ $supplier->id == $po->supplierID ? 'selected' : '' }}>
                                                        {{ $supplier->name }}
                                                    </option>
                                                @endforeach
                                            </select>

                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="dateInit"
                                                value="{{ old('dateInit', $po->dateInit) }}" min="2023-12-01">

                                        </td>
                                        <td>
                                            <input type="date" class="form-control" name="dateEnd"
                                                value="{{ old('dateEnd', $po->dateEnd) }}" min="2023-12-01">
                                        </td>
                                        <td>
                                            <select name="costType" class="dropdown">
                                                <option value="0"
                                                    @if ($po->costType == 0) selected @endif>
                                                    Mensal
                                                </option>
                                                <option value="1"
                                                    @if ($po->costType == 1) selected @endif>
                                                    Pagamento Único
                                                </option>
                                                <option value="2"
                                                    @if ($po->costType == 2) selected @endif>3
                                                    algo
                                                </option>
                                                <option value="3"
                                                    @if ($po->costType == 3) selected @endif>4
                                                    algo
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="totalCost"
                                                placeholder="000,00€" value="{{ old('totalCost', $po->totalCost) }}">

                                        </td>
                                        <td>
                                            <select name="status" class="dropdown">
                                                <option value="0"
                                                    @if ($po->status == 0) selected @endif>
                                                    Pendente
                                                </option>
                                                <option value="1"
                                                    @if ($po->status == 1) selected @endif>
                                                    Concluído
                                                </option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" class="btn btn-save btn-primary"
                                                data-mdb-ripple-color="dark"><img src="{{ asset('imgs/save.svg') }}"
                                                    alt="Save" class="save"
                                                    onmouseover="this.src='{{ asset('imgs/save-hover.svg') }}';"onmouseout="this.src='{{ asset('imgs/save.svg') }}';"></button>
                                        </td>
                                        <td style="padding-top: 0 5px 0 0 !important;">

                                            <a class="btn btn-delete btn-outline-danger" data-bs-toggle="modal"
                                                data-bs-target="#Delete">
                                                <img src="{{ asset('imgs/delete.svg') }}" alt="Delete"
                                                    class="delete"
                                                    onmouseover="this.src='{{ asset('imgs/delete-hover.svg') }}';"onmouseout="this.src='{{ asset('imgs/delete.svg') }}';"></a>
                                        </td>

                                </tr>
                                </form>

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
                                                                        min="2023-12-01"
                                                                        value="{{ old('dateInit') }}">
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
                                                                        min="2023-12-01"
                                                                        value="{{ old('dateEnd') }}">
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
                                                                        <option value="option_select" disabled
                                                                            selected>
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
                                                                <a href="./"
                                                                    class="btn btn-danger">Retroceder</a>
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
    </x-app-layout>
a