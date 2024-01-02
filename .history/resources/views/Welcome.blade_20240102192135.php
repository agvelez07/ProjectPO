<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="font-sans antialiased">
    <header>
        <header>
            @include('layouts.header')
        </header>
    </header>
    <main class="welcome-main" >
        <div class="options-container">
            <ul class="app-options-buttons">
                <li>

                    <a href="{{url('POs')}}" class="app-option-button">
                        Gerir Ordens de Compra
                    </a>
                    <a href="{{url('Suppliers')}}" class="app-option-button second-btn">
                        Gerir Fornecedores
                    </a>
                    <li>
                    <a href="{{url('Users')}}"class="app-option-button second-btn">
                        Gerir Utilizadores
                    </a>
    
                </li>
            </ul>
        </div>
        <div>
            
        </div>
    </main>

</body>

</html>
