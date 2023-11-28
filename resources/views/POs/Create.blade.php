<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Criar Ordem de Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
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
                        <input type="text" class="form-control" name="num" placeholder="Número de Ordem"
                            value="{{ old('num') }}">
                        @error('num')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-label">Data de Começo</label>
                        <input type="date" class="form-control" name="dateInit" value="2023-12-01" min="2023-12-01"
                            value="{{ old('dateInit') }}">
                        @error('dateInit')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-label">Data Final</label>
                        <input type="date" class="form-control" name="dateEnd" value="2023-12-01" min="2023-12-01" value="{{ old('dateEnd') }}">
                        @error('dateEnd') 
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <div class="md-3">
                        <label class="form-label">Custo Total</label>
                        <input type="text" class="form-control" name="totalCost" placeholder="000,00€"
                            value="{{ old('totalCost') }}">
                        @error('totalCost')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <h3>Fornecedor</h3>
                        <select name="supplierID"> 
                            <option value="1">1 algo</option>
                            <option value="1">1 algo</option>
                            <option value="1">1 funciona</option>
                            <option value="1">1 algo</option>
                        </select>
                    </div>
                    
                    <div class="md-3">
                        <h3>Tipo de Custo</h3>
                        <select name="costType">
                            <option value="0">1 algo</option>
                            <option value="1">2 algo</option>
                            <option value="2">3 algo</option>
                            <option value="3">4 algo</option>
                        </select>
                    </div>

                    <div class="md-3">
                        <h3>Estado</h3>
                        <select name="status">
                            <option value="0">1 algo</option>
                            <option value="1">2 algo</option>
                            <option value="2">3 algo</option>
                            <option value="3">4 algo</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submeter</button>
                    <a href="./" class="btn btn-danger">Retroceder</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>

</html>
