<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="font-sans antialiased">
    <header>
        @include('layouts.header')
    </header>
    @component('components.my-component')
    {{-- Slot content --}}
    @component('components.my-component')
    {{-- Slot content --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Custom Header') }}
        </h2>
    </x-slot>
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
