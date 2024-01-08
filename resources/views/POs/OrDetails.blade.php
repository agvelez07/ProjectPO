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
                <h2>Detalhes Ordem de Compra Nº: {{ $data->num }}</h2>

                <dl class="row">
                    <dt class="col-sm-3">Start Date:</dt>
                    <dd class="col-sm-9">{{ $data->dateInit }}</dd>

                    <dt class="col-sm-3">End Date:</dt>
                    <dd class="col-sm-9">{{ $data->dateEnd }}</dd>

                    <dt class="col-sm-3">Total Cost:</dt>
                    <dd class="col-sm-9">{{ $data->totalCost }}</dd>

                    <dt class="col-sm-3">Supplier:</dt>
                    <dd class="col-sm-9">{{ $data->supplierID }}</dd>

                    <dt class="col-sm-3">Cost Type:</dt>
                    <dd class="col-sm-9">{{ $data->costType }}</dd>

                    <dt class="col-sm-3">Status:</dt>
                    <dd class="col-sm-9">{{ $data->status }}</dd>
                </dl>

                <a href="{{ url('/POs') }}" class="btn btn-danger">Retroceder</a>                         
            </div>
        </div>
    </div>

</body>

</html>
