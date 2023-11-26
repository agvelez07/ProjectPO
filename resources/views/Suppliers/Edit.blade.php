<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Fornecedor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Editar Fornecedor</h2>
                @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
                @endif
                <form method="post" action="{{ url('Update-Supplier')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id}}">
                    <h5>Id: {{$data->id}}</h5>
                    <div class="md-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ old('name', $data->name) }}">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <h3>Estado</h3>
                        <select name="status">
                            <option value="0" @if($data->status == 0) selected @endif>Não sei</option>
                            <option value="1" @if($data->status == 1) selected @endif>Something</option>
                            <option value="2" @if($data->status == 2) selected @endif>Lorem ipsum </option>
                            <option value="3" @if($data->status == 3) selected @endif>3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submeter</button>
                    <a href="../" class="btn btn-danger">Retroceder</a>         
                </form>
                
            </div>
        </div>
    </div>

</body>

</html>
