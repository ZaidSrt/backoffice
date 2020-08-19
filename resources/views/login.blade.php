@extends('layaout.app')

@section('title')
    Claro Networks
@endsection

@section('content')

    <body class="fondo-BO">
        <span class="d-flex align-items-center justify-content-between  py-xl-2 texto">
            <span class="  ml-5 "></span>
            <span class="text-light  mr-5 pt-2">Administrador de contenido</span>


        </span>
        <hr class="bg-light mb-1 pt-0 ml-3 mr-3 mt-2 " />
        <div class="login-container ">
            <div class="login-form no-gutters mb-4">
                <div class="col-sm-12 no-gutters col-md-6  no-gutters col-lg-4  col-xl-3 shadow1 fondolog-reco mb-4">
                    <img src="./images/registro/group-10.svg" class="ubicacion5" />

                    <div class="row ma-no no-gutters">
                        <div class="col-sm-12 col-md-12 col-lg-12 no-gutters ">
                            <img src="./images/registro/group-3.svg" class="form-image-blue" />
                            <a href="{{ route('index') }}">
                                <img src="./images/home/claro-logo.svg" class="ubicacion1" /></a>

                        </div>
                    </div>
                    <br />
                    <div class="col-10 col-sm-8 col-md-8 col-lg-9 col-xl-9 mx-auto">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div class="row ma-no centro no-gutters">
                                <div class="col-sm-12 no-gap">
                                    <div class="tamaño2">
                                        <input class="insert-data input-email correo" type="email"
                                            placeholder="Correo electrónico" id="login-email" name="login-email" />

                                        <img src="./images/registro/group-12.svg" class="ubicacion3" />
                                        <div class="d-flex align-items-center mt-2">
                                            <p class="correo-valido warning-email-text mt-0 mb-0">
                                                Correo válido
                                            </p>
                                            <img src="http://www.claronetworks.openofficedospuntocero.info/images/registro/alerta.svg"
                                                class="error ml-2" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="row ma-no centro no-gutters">
                                <div class=" col-sm-12 no-gap ">
                                    <div class="tamaño2 centro">
                                        <div class="position-relative">
                                            <input class="insert-data input-password correo" type="password"
                                                id="login-password" name="login-password" placeholder="Contraseña"
                                                autocomplete="off" />
                                            <img src="./images/registro/eye-none.svg" class="icon-eye" />
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <p class="caracteres-min mt-1 mb-0">
                                                8 caractéres mínimo
                                            </p>
                                            <img src="http://www.claronetworks.openofficedospuntocero.info/images/registro/listo.svg"
                                                class="listo ml-2 mt-1" />
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!--  <div class="col-xl-12 row ma-no centro margin-top-por contra pt-3 pb-2" >
                  <input type="checkbox" value="1" class=" mr-1 reco-chek" style="display:block">
      <p class="pb-1">  Recordar contraseña</p>
                  </div>-->
                            @if (session('error'))
                                <p class="warning-login a-text-semibold-lightbrown mt-3 invalid-email">
                                    {{ session('error') }}</p>
                            @endif


                            <div class="centro">

                                <!-- <a href="Admin-BO.php"> -->
                                <button type="submit" class="btn-ingresar-reco text-public mt-5" id="button-login">
                                    INGRESAR
                                </button>
                                <!-- </a> -->

                            </div>
                        </form>

                        <div class="centro">
                            <div class="mt-5 mb-5">
                                <a href="{{ route('reset') }}" class="d-block mb-5">
                                    <p class="contra">¿Olvidaste la contraseña?</p>
                                </a>
                                <hr class="line btn-margin" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
