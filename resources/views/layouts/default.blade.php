<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Depilcorps</title>
    <link rel="shortcut icon" href="/images/layout/logo_icon.png" type="image/x-icon">
    <link type="text/css" rel="stylesheet" href="/css/icons/bootstrap-icons.css">
    <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="/css/app.css">
    <script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="/js/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.mask.min.js"></script>
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg d-flex justify-content-between align-items-center">

        <li class="d-flex">

            <a class="menu-toggle p-2 px-3 button-menu">
                <i class="bi bi-list fs-4 text-white"></i>
            </a>
        </li>

        <a class="ms-5" href="{{ url('admin/dashboard') }}">
            <img src="/images/layout/logo.png" alt="logo" height="40">
        </a>


        <li id="dropdown-m" class="nav-item px-3 dropdown d-flex align-items-center">

            <a id="name" class="nav-link text-white">Olá, {{ auth()->user()->nome }}.</a>

            <a class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown" role="button">

                @if (auth()->user()->foto == null)
                    <img src="/images/layout/user.png" class=" rounded-circle mx-1" alt="usuario" height="38"
                        width="37">
                @else
                    <img src="/storage/usuarios/{{ auth()->user()->foto }}" class=" rounded-circle mx-1" alt="usuario"
                        height="40" width="37">
                @endif

            </a>

            <ul class="dropdown-menu me-3">
                <div class="d-flex align-items-center">
                    @if (auth()->user()->foto == null)
                        <img src="/images/layout/user.png" class="rounded-circle mx-3 " alt="usuario" height="80"
                            width="72">
                    @else
                        <img src="/storage/usuarios/{{ auth()->user()->foto }}" class="rounded-circle me-2 mx-3 "
                            alt="usuario" height="80" width="72">
                    @endif

                    <a class="nav-link text-break text-black pe-2">{{ auth()->user()->nome }}</a>
                </div>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item " href="{{ route('admin.usuarios.edit', auth()->user()->id) }}">Alterar
                        dados</a>
                </li>
                <li><a class="dropdown-item" href="{{ route('login.logout') }}">Sair</a></li>
            </ul>
        </li>
    </nav>


    <div id="sub-menu" class="open">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a style="border-bottom: 1px solid #d1d0d0;color: #FFF;font-weight: 500;"
                    class="d-flex flex-column justify-content-center align-items-center nav-link">
                    <span class="p-1">Menu</span>
                </a>
                <a class="d-flex align-items-center nav-link link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{{ url('admin/dashboard') }}">
                    <i class="bi bi-house fs-5 px-2"></i>
                    <span class="">Home</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center nav-link link {{ Request::is('admin/clientes*') ? 'active' : '' }}"
                    href="{{ url('admin/clientes') }}">
                    <i class="bi bi-person-check fs-5 px-2"></i>
                    <span class="">Clientes</span>
                </a>
            </li>
            @can('acessar-usuarios')
            <li class="nav-item">
                <a class=" d-flex align-items-center nav-link link {{ Request::is('admin/servicos*') ? 'active' : '' }}"
                    href="{{ url('admin/servicos') }}">
                    <i class="bi bi-bag-heart fs-5 px-2"></i>
                    <span class="">Serviços</span>
                </a>
            </li>
            @endcan
            <li class="nav-item">
                <a class=" d-flex align-items-center nav-link link {{ Request::is('admin/agendamentos*') ? 'active' : '' }}"
                    href="{{ url('admin/agendamentos') }}">
                    <i class="bi bi-calendar-check fs-5 px-2"></i>
                    <span class="">Agendamentos</span>
                </a>
            </li>
            @can('acessar-usuarios')
                <li class="nav-item">
                    <a class=" d-flex align-items-center nav-link link {{ Request::is('admin/usuarios*') ? 'active' : '' }}"
                        href="{{ url('admin/usuarios') }}">
                        <i class="bi bi-people fs-5 px-2"></i>
                        <span class="">Usuários</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>


    <div class="conteudo mb-3 p-4" style="margin-top: 100px">
        @yield('conteudo')

    </div>

    {{-- <footer class="container-fluid text-center mb-3" style="color: #FFFFFF; padding-bottom:2%; margin-top:8%; background-color:#1c1b35;">
        <span>
            Sistema desenvolvido para empresa depilcors<br>
            Semestre letivo: 2022.2<br>
            Centro Universitário UniRios
        </span>
    </footer> --}}

    <script type="text/javascript" src="/js/index.js"></script>
    
    <script type="text/javascript">
        $('.cep').mask('00000-000');
        $('.telefone').mask('(00) 00000-0000');
    </script>

</body>

</html>
