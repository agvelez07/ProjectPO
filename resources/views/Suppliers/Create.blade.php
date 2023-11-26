<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Adicionar Fornecedor</h2>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @elseif(Session::has('fail'))
                <div class="alert alert-danger" role="alert">
                     {{Session::get('fail') }}
                </div>
                @elseif(Session::has('emailExists'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('emailExists') }}
                </div>
                @endif
                <form method="post" action="{{url('Save-Supplier')}}">
                    @csrf
                    <div class="md-3">
                        <label class="form-label">Id</label>
                        <input type="text" class="form-control" name="id" placeholder="Número do Fornecedor">
                        @error('id')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <h3>Estado</h3>
                        <select name="status">
                            <option value="0">Não sei</option>
                            <option value="1">Something</option>
                            <option value="2">Lorem ipsum </option>
                            <option value="3">3</option>
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