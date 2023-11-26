<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Fornecedores</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    
    <div style="display: inline-flex; margin-top: 20px">
        <h1>Fornecedor</h1>
        <a class="studentButtons" onclick="location.href='{{ url('Suppliers/Create ') }}'" >
            <span class="plus"> +</span>
            <span class="text">Adicionar Fornecedor</span>
        </a>
    </div>
    @if($data->count() <= 0)
        <h1>Sem Fornecedores</h1>
    
    @else
    <div>
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Email</th>
                <th>Role</th>
            </thead>
            <tbody>
                @foreach ($data as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->name}}</td>
                        @if ($supplier->status == 0)
                            <td> Não sei
                            <td>
                        @elseif($supplier->status == 1)
                            <td> Something
                            <td>
                        @elseif($supplier->status == 2)
                            <td> Lorem Ipsum
                            <td>
                        @elseif($supplier->rstatusole == 3)
                            <td> 3
                            <td>
                        @endif

                        <td><a href="{{ url('Suppliers/Edit/' . $supplier->id) }}" class="btn btn-primary">Edit</a>
                        <td><a href="{{ url('Delete/' . $supplier->id) }}" class="btn btn-danger"
                                onclick="return confirm('Deseja eliminar o fornecedor {{ $supplier->name }}')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @endif
    <a href="{{ url('/')}}" class="btn btn-primary">Return</a>

</body>

</html>
