<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
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
                                    <option value="0" @if ($po->costType == 0) selected @endif>
                                        Mensal
                                    </option>
                                    <option value="1" @if ($po->costType == 1) selected @endif>
                                        Pagamento Único
                                    </option>
                                    <option value="2" @if ($po->costType == 2) selected @endif>3
                                        algo
                                    </option>
                                    <option value="3" @if ($po->costType == 3) selected @endif>4
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
                                    <option value="0" @if ($po->status == 0) selected @endif>
                                        Pendente
                                    </option>
                                    <option value="1" @if ($po->status == 1) selected @endif>
                                        Concluído
                                    </option>
                                </select>
                            </td>
                

                    </tr>
                    </form>
            
    </div>

</body>

</html>
