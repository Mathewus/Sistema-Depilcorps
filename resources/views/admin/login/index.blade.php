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
    <style>
        body #imagem {
            width: 50%;
            background-image: url("/images/layout/estetica_bg3.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            /* background-attachment: fixed; */
        }
        
        #fundo {
            background-color: #527A73;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0.5;
        }
    </style>
    <script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
</head>

<body style="overflow:hidden;">

    <div class="d-flex" style="height: 100vh;">

        <div id="imagem">
        </div>
        <div id="fundo"></div>

        {{-- <div class="col-xl-3 bg-white rounded-4 p-5 shadow position-absolute top-50 start-50 translate-middle"> --}}

        <div id="login" class="bg-light pt-2">

            <div class="container">

                <img src="/images/layout/logomarca2.png"  alt="Depilcorps" class="mx-auto d-block img-fluid"
                    style="width: 160px;">

                <form class="row g-4 justify-content-center" action="{{ route('login.auth') }}" method="POST">
                    @csrf

                    <h3 style="color:#525050" class="text-center">Acesse sua conta</h3>

                        @if (Session::get('erro'))
                            <div style="margin-bottom: -10px" class="alert alert-danger text-center p-2 w-50">{{ Session::get('erro') }}</div>
                        @endif

                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div style="margin-bottom: -10px"class="alert alert-warning text-center p-0 w-75">{{ $error }}</div>
                            @endforeach
                        @endif

                        <div class="col-8">
                            <label for="email" class="form-label fs-5 fs-5">E-mail</label>
                            <input type="email" class="inputs bg-light form-control form-control-lg"
                                name="email">
                        </div>
                        <div class="col-8">
                            <label for="password" class="form-label fs-5 fs-5">Senha</label>
                            <div class="d-flex justify-content-end align-items-center">
                                <input type="password" class="inputs password bg-light form-control form-control-lg"
                                    name="password">
                                <div class="icon">
                                    <img class="icon-image" onclick="showhide()" src="/images/layout/show.png"
                                        width="30px" height="30px" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-8 d-grid">
                            <button type="submit" class="btn btn-success btn-lg">Entrar</button>
                        </div>
                </form>

            </div>

        </div>

    </div>
    <script type="text/javascript">
        const password = document.querySelector(".password");
        const icon = document.querySelector(".icon-image");

        function showhide() {
            if (password.type === "password") {
                password.setAttribute("type", "text");
                icon.setAttribute("src", "/images/layout/hide.png")
            } else {
                password.setAttribute("type", "password");
                icon.setAttribute("src", "/images/layout/show.png")
            }
        }
    </script>
</body>

</html>
