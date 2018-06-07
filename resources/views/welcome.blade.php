<!DOCTYPE html>


<html lang="en">

<head>
      <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- build:css css/main.css -->

    <link rel="stylesheet" href="{{ asset('node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link href="{!! asset('node_modules/font-awesome/css/font-awesome.min.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap-social.css') }}">
    <link href="{!! asset('css/styles.css') !!}" media="all" rel="stylesheet" type="text/css" />
{{--     <link href="{!! asset('css/app.css') !!}" media="all" rel="stylesheet" type="text/css" />
 --}}    <link href="{!! asset('css/bootstrap-social.css') !!}" media="all" rel="stylesheet" type="text/css" />

    <script type="text/javascript"  src="{{ URL::asset('js/index.js') }}"></script>
    <title>Encuesta Primer Año EIA</title>

</head>

<body>

    <nav class="navbar navbar-inverse navbar-toggleable-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="buttton" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <span class="fa fa-home fa-lg"></span> Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row row-content  align-self-center">
        <div class="col-2"></div>
        <div class="col-12 col-md-8" id="ResTable">
            <div class="card" >
                <h3 class="card-header bg-primary text-white">Perfil sociodemográfico</h3>
                <div class="card-block">
                    <form data-toggle="validator" role="form" action="/" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h6> Grupo y Tutor</h6>
                            <div class="form-group row">
                                <label for="grupo" class="col-md-2 control-label">Grupo</label>
                                <div class="col-md-3">
                                    <select class="form-control" name="grupo" id="grupo" required>
                                        @foreach($grupos as $grupo)
                                            <option value="{{ $grupo->idgrupo }}">{{ $grupo->nombre }} </option>
                                        @endforeach
                                        <option value="0">Ninguno</option>
                                    </select>
                                </div>
                                <label for="tutor" class="col-md-2 control-label">Tutor</label>
                                <div class="col-md-5">
                                    <select class="form-control" name="tutor" id="tutor" required>
                                        @foreach($tutores as $tutor)
                                            <option value="{{ $tutor['idtutor'] }}">{{ $tutor['nombre'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        <div class="form-group row"></div>
                        <hr>

                        <h6> Información del estudiante</h6>

                        <div class="form-group row "></div>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 control-label">Nombre Completo</label>
                            <div class="col-md-9">
                                <input type="text" pattern="^[a-zA-Z\s\.]*$" class="form-control" id="nombre" name="nombre" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fechaN" class="col-md-3 control-label">Fecha de Nacimiento</label>
                            <div class="col-md-9">
                                <input type="date" class="form-control" id="fechaN" name="fechaN" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nombre" class="col-md-3 control-label">Teléfono</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <label for="nombre" class="col-md-3 control-label">Celular</label>
                            <div class="col-md-3">
                                <input type="text"  class="form-control" id="celular" name="celular" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="correo" class="col-md-3 control-label">Correo Electrónico</label>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="correo" name="correo" data-error="Bruh, that email address is invalid" required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="direccion" class="col-md-3 control-label">Dirección actual</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Acá viene el mapa" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="fam" class="col-md-3 control-label">¿Con quién vive actualmente?</label>
                            <div class="col-md-9">
                                <select class="form-control" name="vive" id="vive" required>
                                    <option>Padres</option>
                                    <option>Familiares</option>
                                    <option>Amigos</option>
                                    <option>Pensión</option>
                                    <option>Solo / Sola</option>
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="programa" class="col-md-3 control-label">Programa académico</label>
                            <div class="col-md-9">
                                <select class="form-control" name="programa" id="programa" required>
                                    @foreach($programas as $programa)
                                            <option value="{{ $programa['idprograma'] }}">{{ $programa['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row"></div>
                        <hr>
                        <div class="form-group row">
                            <label for="transporte" class="col-md-4 control-label">¿Cuál es su medio de transporte para la U?</label>
                            <div class="form-group row">
                                <div class="checkbox" required>
                                    @foreach($transportes as $transporte)
                                        <label class="col-md-1">
                                            <input type="checkbox" id="busE" name="transportes[]" data-error="" value="{{ $transporte['idtransporte'] }}" >{{ $transporte['nombre'] }}
                                        </label>
                                        <div class="help-block with-errors"></div>

                                    @endforeach
{{--                                     <label class="col-md-1">
                                        <input type="checkbox" id="otro" data-error="" onchange="habilitar(this.value)">Otro
                                        <input type="text" id="otroV" name="tranportes[]" data-error="" disabled="true">
                                    </label> --}}
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="beca" class="col-md-4 control-label">¿Es beneficiario de alguna beca?</label>
                            <div class="form-group row" >
                                <div class="radio ">
                                    <label class="col-md-4">
                                        <input type="radio" name="becas" value="1" onchange="habilitar(this.value)" required>Si
                                    </label>
                                    <label class="col-md-4">
                                        <input type="radio" name="becas" value="2" onchange="habilitar(this.value)" required>No
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="beca" class="col-md-3 control-label">¿Cuál es el nombre de la beca?</label>
                            <div class="col-md-8">
                                <select class="form-control " name="beca" id="beca" required>
                                    @foreach($becas as $beca)
                                            <option value="{{ $beca['idbeca'] }}">{{ $beca['nombre'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="rep" class="col-md-3 control-label">¿Está repitiendo asignaturas?</label>
                            <div class="form-group row" >
                                <div class="radio">
                                    <label class="col-md-1">
                                        <input type="radio" value="3" name="repi" onchange="habilitar(this.value)" required>Si
                                    </label>
                                    <label class="col-md-1">
                                        <input type="radio" value="4" name="repi" onchange="habilitar(this.value)" required>No
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fam" class="col-md-3 control-label">¿Cuantas materias esta repitiendo?</label>
                            <div class="col-md-9">
                                <select class="form-control" name="cantMat" id="cantMat" required disabled="true" onchange="crearInputs()">
                                    <option id="cantMat1" value="1">1</option>
                                    <option id="cantMat2" value="2">2</option>
                                    <option id="cantMat3" value="3">3</option>
                                    <option id="cantMat4" value="4">4</option>
                                    <option id="cantMat5" value="5">5</option>
                                    <option id="cantMat6" value="6">6</option>
                                    <option id="cantMat7" value="7">7</option>
                                </select>
                            </div>
                        </div>

                        <div>
                            @for ($i = 1; $i <= 7; $i++)
                                <div class="form-group row">
                                    <label for="rep" class="col-md-3 control-label">¿Cuál asignatura?</label>
                                    <div class="col-md-9">
                                        <select class="form-control" name="rep{{ $i }}" id="rep{{ $i }}" required disabled="true">
                                            @foreach ($asignaturas as $asignatura)
                                                <option value="{{ $asignatura['idasignatura'] }}">{{ $asignatura['nombre'] }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="direccion" class="col-md-3 control-label">¿Cuántas veces las ha repetido?</label>
                                    <div class="col-md-9" >
                                        <input type="number"  min="0" class="form-control" id="cantRep{{ $i }}" name="cantRep{{ $i }}" required disabled="true">
                                    </div>
                                </div>
                            @endfor
<!--  -->

                        </div>

                        <div class="form-group row justify-content-center">
                            <button type="enviar" class="btn btn-primary">Enviar</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-5 offset-1 col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                    </ul>
                </div>
                <div class="col-sm align-self-center">
                    <div style="text-align:center">
                        <a class="btn btn-social-icon btn-google-plus" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                        <a class="btn btn-social-icon btn-youtube" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
                        <a  class="btn btn-social-icon"href="mailto:"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
           </div>
           <div class="row justify-content-center">
                <div class="col-auto">
                    <p>© Copyright 2018 Universidad EIA</p>
                </div>
           </div>
        </div>
    </footer>

    <script type="text/javascript"  src="{{ URL::asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript"  src="{{ URL::asset('node_modules/tether/dist/js/tether.min.js') }}"></script>
    <script type="text/javascript"  src="{{ URL::asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript"  src="{{ URL::asset('js/script.js') }}"></script>


</body>

</html>