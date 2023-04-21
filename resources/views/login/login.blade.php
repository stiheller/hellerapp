
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <title>Validar Usuario</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            height: 100vh;
            font-family: "Nunito Sans";
        }

        .form-control {
            line-height: 2;
        }

        .bg-custom {
            background-color: #3aaead;
        }

        .btn-custom {
            background-color: #3e3d56;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #33313f;
            color: #fff;
        }

        label {
            color: #fff;
        }

        a,
        a:hover {
            color: #fff;
            text-decoration: none;
        }

        a,
        a:hover {
            text-decoration: none;
        }

        @media(max-width: 932px) {
            .display-none {
                display: none !important;
            }
        }
    </style>
    <script type="text/javascript">
        function valideKey(evt){

            // code is the decimal ASCII representation of the pressed key.
            var code = (evt.which) ? evt.which : evt.keyCode;

            if(code==8) { // backspace.
              return true;
            } else if(code>=48 && code<=57) { // is a number.
              return true;
            } else{ // other keys.
              return false;
            }
        }
    </script>
</head>

<body>

    <div class="row m-0 h-100">
        <div class="col p-0 text-center d-flex justify-content-center align-items-center display-none">
            <!--<img src="login.svg" class="w-100">-->
			<img src="{{ asset('img/foto1.jpg') }}" class="w-100">
        </div>
        <div class="col p-0 bg-custom d-flex justify-content-center align-items-center flex-column w-100">

			<form class="w-75" action="{{ route('login') }}"  method="POST">



                @csrf

                <div class="alert alert-danger alert-dismissible text-center text-font-bold"> SERVIDOR LOCAL - SISTEMA EN DESARROLLO </div>


				<div class="text-center ">
					<img src="{{ asset('img/logo.jpg') }}" class="rounded img-fluid img-thumbnail" alt="...">

				</div>
                <div class="clearfix"></div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Numero de Documento</label>
                    <input type="text" class="form-control" name="username" id="username" maxlength="8" onkeypress="return valideKey(event);" placeholder="Ingrese Número de Documento"  :value="old('username')" required autofocus>

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Clave</label>
                    <input type="password" class="form-control" name="password" id="password" Placeholder="Clave" required>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-check">
                            <!--<input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">-->
                            <a href="{{ route('login_alt') }}" class="form-check-label" for="flexCheckDefault">Login Alternativo</a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-custom btn-lg btn-block mt-3">Validar Usuario</button>
                <br><br>
                {{-- errores --}}
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                            <h5>{{ $error }}</h5>
                        @endforeach
                    </div>
                @endif
            </form>
        </div>
    </div>
</body>

</html>
