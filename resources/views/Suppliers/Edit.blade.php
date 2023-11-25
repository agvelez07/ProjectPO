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
                <form method="post" action="{{ url('Update-User') }}">
                    @csrf
                    <input type="hidden" name="ID" value="{{ $data->ID }}">
                    <div class="md-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email', $data->email) }}">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="md-3">
                        <h3>Função</h3>
                        <select name="role" class="form-control">
                            <option value="0" @if($data->role == 0) selected @endif>Finance</option>
                            <option value="1" @if($data->role == 1) selected @endif>First Approver</option>
                            <option value="2" @if($data->role == 2) selected @endif>Final Approver</option>
                            <option value="3" @if($data->role == 3) selected @endif>Administrador</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submeter</button>
                    <a href="{{ url('/Users') }}" class="btn btn-danger">Retroceder</a>         
                </form>
                
            </div>
        </div>
    </div>

</body>

</html>
