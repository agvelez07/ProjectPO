<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="font-sans antialiased">
    <header>
        <a href="" class="menu-logo">
            <img src="https://wweb.dev/resources/navigation-generator/logo-placeholder.png" alt="Kyntech"/>
          </a>
        
        
          <!-- menu items -->
          <div class="menu">
            <ul>
              <li>
                <a href="{{url('Users')}}">
                  Gerir Utilizadores
                </a>
              </li>
              <li>
                <a href="#addPO">
                  Adicionar PO
                </a>
              </li>
            </ul>
            <ul>
              <li>
                <a href="registrar">
                  Registrar
                </a>
              </li>
              <li>
                <a href="#login">
                  Login
                </a>
              </li>
            </ul>
          </div>
        </nav>
    </header>

</body>

</html>
