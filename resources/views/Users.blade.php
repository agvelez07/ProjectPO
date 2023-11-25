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
    <h1>Users</h1>
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <a href="{{ url('Users/Create ') }}">Adicionar Utilizador</a>
    <div>
        <table class="table">
            <thead>
                <th>Id</th>
                <th>Email</th>
                <th>Role</th>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        <td>{{ $user->ID }}</td>
                        <td>{{ $user->email }}</td>
                        @if ($user->role == 0)
                            <td> Finance
                            <td>
                        @elseif($user->role == 1)
                            <td> First Approver
                            <td>
                        @elseif($user->role == 2)
                            <td> Final Approver
                            <td>
                        @elseif($user->role == 3)
                            <td> Administrador
                            <td>
                        @endif

                        <td><a href="{{ url('Users/Edit/' . $user->ID) }}" class="btn btn-primary">Edit</a>
                        <td><a href="{{ url('Delete/' . $user->ID) }}" class="btn btn-danger"
                                onclick="return confirm('Deseja eliminar o utilizador {{ $user->email }}')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
