<x-filament-panels::page.simple>
    <style>

        @media (min-width: 768px) {
            .container {
                 max-width: 100%;
            }
        }

        @media (min-width: 640px) {
            .sm\:max-w-lg {
                max-width: none !important; /* Sobrescreve o max-width original */
            }
        }

        .my-16 {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        .px-6 {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .py-12 {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }

        .bg-white {
            background-color: transparent !important; /* Sobrescreve bg-white */
        }

        body {


            height: 100vh;
            margin: 0;
            color: #000; /* Cor do texto no modo claro */
            background-color: #fff; /* Fundo da página no modo claro */
        }

        .dark body {
            color: #ccc; /* Cor do texto no modo escuro */
            background-color: #142648; /* Fundo da página no modo escuro */
        }

        .container {
            display: flex;
            width: 100%;
            height: 100vh;
        }


        @media (max-width: 639px) {

            .background-mobile {
                display: block;

            }


        }


        @media (min-width: 640px) {

            .background-mobile {
                display: none;
            }

            .background {
                display: flex;
                font-size: 4em;
                color: #FFF; /* Cor do texto no modo claro */
                align-items: center;
                justify-content: center;
                padding-left: 10%;
                width: 100%;
                background-image: url('{{ asset('images/busca-bgm.jpg') }}');
                background-size: cover;
                background-position: left;
                background-repeat: no-repeat;
            }

            .dark .background {
                color: #ccc; /* Cor do texto no modo escuro */
            }

            .form-container {
                width: 40%;
                align-items: center;
                justify-content: center;
                background-color: #fff; /* Fundo do container do formulário no modo claro */
                padding: 20px;
                text-align: center;
                max-width: 500px;
                border-radius: 8px; /* Adiciona bordas arredondadas */
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5); /* Adiciona sombra */
                color: #000; /* Cor do texto no modo claro */
            }

        }
        .dark .form-container {
            background-color: #0c172c; /* Fundo do container do formulário no modo escuro */
            color: #fff; /* Cor do texto no modo escuro */
        }

        .form-content {
            width: 100%;
            padding: 16px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Sombra no modo claro */
            border-radius: 8px;
            background-color: #fff; /* Fundo do conteúdo do formulário no modo claro */
            color: #000; /* Cor do texto no modo claro */
        }

        .dark .form-content {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5); /* Sombra no modo escuro */
            background-color: #142648; /* Fundo do conteúdo do formulário no modo escuro */
            color: #fff; /* Cor do texto no modo escuro */
        }

        .logo {
            display: flex;
            justify-content: center;
            margin-bottom: 16px;
        }

        .logo img.light {
            display: block;
        }

        .logo img.dark {
            display: none;
        }

        .dark .logo img.light {
            display: none;
        }

        .dark .logo img.dark {
            display: block;
        }

        .fi-simple-header {
            display: none !important;
        }

        .login-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #000; /* Cor do título do login no modo claro */
        }

        .dark .login-title {
            color: #fff; /* Cor do título do login no modo escuro */
        }

        input, button {
            color: #000; /* Cor do texto dos inputs e botões no modo claro */
        }

        .dark input, .dark button {
            color: #fff; /* Cor do texto dos inputs e botões no modo escuro */
        }

        .logo-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        .logo-container img {
        }
    </style>

    <div class="container">
        <div class="form-container">
            <div class="form-content">
                <div class="logo" style="margin-top: 50px; margin-bottom: 40px">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="light">
                    <img src="{{ asset('images/logo_branca.png') }}" alt="Logo Dark" class="dark">
                </div>

                <div class="background-mobile"><img src="{{ asset('images/bg-site-login.png') }}" width="100%" style="margin-bottom: 20px"></div>

                @if (filament()->hasRegistration())
                    <x-slot name="subheading">
                        {{ __('filament-panels::pages/auth/login.actions.register.before') }}

                        {{ $this->registerAction }}
                    </x-slot>
                @endif

                {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.before') }}

                <x-filament-panels::form wire:submit="authenticate">
                    {{ $this->form }}

                    <x-filament-panels::form.actions
                        :actions="$this->getCachedFormActions()"
                        :full-width="$this->hasFullWidthFormActions()"
                    />
                </x-filament-panels::form>

                {{ \Filament\Support\Facades\FilamentView::renderHook('panels::auth.login.form.after') }}
            </div>



        </div>
        <div class="background"></div>
    </div>
</x-filament-panels::page.simple>
