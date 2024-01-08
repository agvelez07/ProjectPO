<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ordem De Compra') }}
        </h2>
    </x-slot>
    <div class="container">
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
                <!------------------------------------------------------------ Ordem De Compra--------------------------------------------------------------------------------->
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('fail'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <tr>
                    <form method="post" action="{{ url('Update-PO/' . $data->id) }}" class="POForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ old('id', $data->id) }}">
                        <input type="hidden" name="totalCost" value="{{ old('id', $data->totalCost) }}">
                        <td>
                            <input type="text" class="form-control" name="num" placeholder="Ex.12345454642341"
                                value="{{ $data->num }}" style="width: 9em;">
                        </td>
                        <td>
                            <select name="supplierID" class="dropdown">
                                @foreach ($suppliersData as $supplier)
                                    <option value="{{ $supplier->id }}"
                                        {{ $supplier->id == $data->supplierID ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>

                        </td>
                        <td>
                            <input type="date" class="form-control" name="dateInit"
                                value="{{ old('dateInit', $data->dateInit) }}" min="2023-12-01">

                        </td>
                        <td>
                            <input type="date" class="form-control" name="dateEnd"
                                value="{{ old('dateEnd', $data->dateEnd) }}" min="2023-12-01">
                        </td>
                        <td>
                            <select name="costType" class="dropdown">
                                <option value="0" @if ($data->costType == 0) selected @endif>
                                    Mensal
                                </option>
                                <option value="1" @if ($data->costType == 1) selected @endif>
                                    Pagamento Único
                                </option>
                                <option value="2" @if ($data->costType == 2) selected @endif>3
                                    algo
                                </option>
                                <option value="3" @if ($data->costType == 3) selected @endif>4
                                    algo
                                </option>
                            </select>
                        </td>
                        <td>
                            {{$data->totalCost}}
                        </td>
                        <td>
                            <select name="status" class="dropdown">
                                <option value="0" @if ($data->status == 0) selected @endif>
                                    Pendente
                                </option>
                                <option value="1" @if ($data->status == 1) selected @endif>
                                    Concluído
                                </option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn btn-save btn-primary" data-mdb-ripple-color="dark"><img
                                    src="{{ asset('imgs/save.svg') }}" alt="Save" class="save"
                                    onmouseover="this.src='{{ asset('imgs/save-hover.svg') }}';"onmouseout="this.src='{{ asset('imgs/save.svg') }}';"></button>
                        </td>
                        <td style="padding-top: 0 5px 0 0 !important;">

                            <a class="btn btn-delete btn-outline-danger" data-bs-toggle="modal"
                                data-bs-target="#Delete">
                                <img src="{{ asset('imgs/delete.svg') }}" alt="Delete" class="delete"
                                    onmouseover="this.src='{{ asset('imgs/delete-hover.svg') }}';"onmouseout="this.src='{{ asset('imgs/delete.svg') }}';"></a>
                        </td>

                </tr>
                </form>
                
                <!-----------------------------------------------------------------Pagamentos-------------------------------------------------------------------> 

    </div>

    <div>
        @if ($orderData)
            
        @endif
    </div>
</x-app-layout>
