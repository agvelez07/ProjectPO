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
        <div class="row">
            <div class="col-md-12">
                <h2>Editar Utilizador</h2>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
                <form method="post" action="{{ url('Update-PO') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id}}">
                    <div class="md-3">
                        <label class="form-label">Número de Ordem</label>
                        <input type="text" class="form-control" name="num" placeholder="Ex.12345454642341" value="{{ old('num', $data->num) }}">
                        @error('num')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-label">Data de Começo</label>
                        <input type="date" class="form-control" name="dateInit" value="{{ old('dateInit', $data->dateInit) }}"min="2023-12-01">
                        @error('dateInit')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-label">Data Final</label>
                        <input type="date" class="form-control" name="dateEnd" value="{{ old('num', $data->dateEnd) }}" min="2023-12-01">
                        @error('dateInit')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
        
                    </div>
                    <div class="md-3">
                        <label class="form-label">Custo Total</label>
                        <input type="text" class="form-control" name="totalCost" placeholder="000,00€" value="{{ old('num', $data->num) }}">
                        @error('totalCost')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <select name="supplierID" required id="id">
                            <option value="option_select" disabled selected>Fornecedor</option>
                            @foreach ($suppliersData as $supplier)
                                <option value="{{ $supplier->id }}" >
                                    {{ $supplier->id }} | {{ $supplier->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md-3">
                        <h3>Tipo de Custo</h3>
                        <select name="costType">
                            <option value="0" @if($data->costType == 0) selected @endif>1 algo</option>
                            <option value="1" @if($data->costType == 0) selected @endif>2 algo</option>
                            <option value="2" @if($data->costType == 0) selected @endif>3 algo</option>
                            <option value="3" @if($data->costType == 0) selected @endif>4 algo</option>
                        </select>
                    </div>
                    
                    <div class="md-3">
                        <h3>Estado</h3>
                        <select name="status">
                            <option value="0" @if($data->status == 0) selected @endif>1 algo</option>
                            <option value="1" @if($data->status == 0) selected @endif>1 algo</option>
                            <option value="2" @if($data->status == 0) selected @endif>1 algo</option>
                            <option value="3" @if($data->status == 0) selected @endif>1 algo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submeter</button>
                    <a href="{{ url('/POs') }}" class="btn btn-danger">Retroceder</a>         
                </form>
                
            </div>
        </div>
    </div>

</body>

</html>
