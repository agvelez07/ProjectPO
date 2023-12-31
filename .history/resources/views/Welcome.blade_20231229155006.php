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
            <x-guest-layout>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />
            
                <form method="POST" action="{{ route('register') }}">
                    @csrf
            
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
            
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
                    </div>
            
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-3">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-guest-layout>
            
        </div>
    </main>

</body>

</html>
