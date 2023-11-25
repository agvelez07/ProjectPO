<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="font-sans antialiased">
    <div class="menu">
        <a href="https://www.kyntech.pt" class="menu-logo">
            <img src="\imgs\kyndryl-logo-min.svg" alt="Kyndryl" class="logo" />
        </a>
        <ul class= "authentication-buttons">
            <li>
                <a href="registrar" id="register-button">
                    Registrar
                </a>
            </li>
            <li>
                <a href="login" id="login-button">
                    Login
                </a>
            </li>
        </ul>
    </div>
    </nav>
    </header>
    <main class="welcome-main" >
        <div class="options-container">
            <ul class="app-options-buttons">
                <li>
                    <a href="{{url('Suppliers')}}" class="app-option-button">
                        Gerir Fornecedores
                    </a>
                    <li>
                    <a href="{{url('Users')}}" id="second-btn" class="app-option-button">
                        Gerir Utilizadores
                    </a>
                    <a href="" id="second-btn" class="app-option-button">
                        Adicionar PO
                    </a>
                </li>
            </ul>
        </div>
    </main>

</body>

</html>
