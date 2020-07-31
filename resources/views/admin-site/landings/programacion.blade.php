@extends('layaout.app')

@section('scripts')
    <script src="{{ asset('/js/lib/easyXDM.min.js')  }}"></script>
    <script>
        new easyXDM.Socket({
            remote: "http://www.claronetworks.openofficedospuntocero.info/v1.2/programacion-edi.php",
            container: "programacion-container",
            onMessage: function(message, origin) {
                console.log(message);
                this.container.getElementsByTagName("iframe")[0].style.height = message + "px";
                this.container.getElementsByTagName("iframe")[0].setAttribute("scrolling", "no");
                this.container.getElementsByTagName("iframe")[0].style.boxShadow = "rgba(0, 0, 0, 0.5) -1px -1px 17px 9px";
            }
        });
    </script>
   
@endsection
@section('content')
    <body>

    @include('partials.headers.headerPrograGeneral')
    <div id="title" class="mt-3">
        <div class="float-left ml-5 mb-2 " style="margin-left: 7%;">
                <div>
                    <label class=" d-inline-block mr-4 pl-4 mb-5 mt-3 checksquare" style="vertical-align: middle;">
                        <input type="checkbox" id="viewcarga">
                        <span class="checkmark1 border-green"></span>
                    </label><span class=" ml-2 a-text-green mr-4">Guardar cambios</span>
                    <label class=" d-inline-block mr-4 pl-4 mb-5 mt-3 checksquare" style="vertical-align: middle;">
                        <input type="checkbox">
                        <span class="checkmark2  border-red"></span>
                    </label><span class=" ml-2 a-text-red">No guardar cambios</span>
                </div>
            </div>                   
            <div class="d-flex float-right mb-4 mr-5 ">
            <form action="" name="formilariosexo" id="formulariosexo" class="formulario">
                    <div class=" d-flex prev text-small a-text-medium-brownish location mt-2">
                      <input type="radio" name="sexo" id="edit" checked />
                      <label for="edit" id="editar" class="mujer-estilo d-flex align-items-center pl-4 pt-3">
                        <p class=" a-prev-title">EDITAR</p></label>
                      <input type="radio" name="sexo" id="prev" />
                      <label for="prev" id="previsualiza" class="hombre-estilo pl-2 pt-3">
                      <p class=" a-prev-title ">PREVISUALIZAR</p></label>
                    </div>
                  </form>
                <div class="pt-2">
                    <img src="./images/mobile.svg" class="a-prev-image ml-3 mr-3" alt="mobile" id="prev-mobile">
                    <img src="./images/tablet.svg" class="a-prev-image" alt="tablet" id="prev-tablet">
                    <img src="./images/pc.svg" class="a-prev-image ml-3" alt="pc" id="prev-desktop">
                </div>
            </div>  
            <div class="clearfix"></div>
            <div class="ml-5 float-left mb-4">
        <div><span class="a-text-black-light text-plus">Última edición : <span class="zona">septiembre 17 2019</span> </span></div>
        <span class="a-text-black-light text-plus">Editado por: <label class="zona"> Antonio Pérez López (<label class="zona ">Usuario aprobador</label>)</label></span>
    </div>            
           
            <div class=" mr-5 d-flex float-right ">
            <button class="btn-zona zona">Zona horaria <img src="./images/paises/chile.svg" class="Icon_paises1" /></button>
        </div>
        <div class="clearfix"></div> 
        <div class="centro">
            <div class="navbar-progra-content  mb-5" id="programacion-container">
            </div>
        </div>
    </body>
@endsection
