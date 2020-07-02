<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;



class ProgramacionGeneralController extends Controller
{
    private $url = "http://www.claronetworks.openofficedospuntocero.info/Claro_Networks_API/public/";

    //MÉTODOS PARA GESTION DE PROGRAMACION GENERAL DEL BACKOFFICE DE CLARO NETWORKS

    public function index(){
        //se obtine la version que se peuda editar
        //si el usuario tiene una version se muestra si no se muestra la version maestra del dia
        //en caso de que ninguna tenga datos se mostrara la maestra pero cn valores vacios, es decir al grilla aparecera en blanco
        //el dia en que inicia la version maestra es:
        $hoy = '2020-2-8';
        //$hoy = date('Y-m-d');
       $client = new Client();
        $response = $client->get(
            $this->url . "program/VersionEditable/".$hoy."&Claro Canal&" . session('id_user')
        );
        $respuesta =  json_decode($response->getBody()); 
      
        if($respuesta->code == 200){
            return view('admin-site.Menu')->with('respuesta', $respuesta);

        }else{
            return back()->with("error", "Por el momento no podemos obtneer informacion intenta mas tarde");
        };
    }   
    
    public function getGrilla(){
        //se obtine la version que se peuda editar
        //si el usuario tiene una version se muestra si no se muestra la version maestra del dia
        //en caso de que ninguna tenga datos se mostrara la maestra pero cn valores vacios, es decir al grilla aparecera en blanco
        //el dia en que inicia la version maestra es:
        //$hoy = '2020-2-8';
        $hoy = date('Y-n-j');
       $client = new Client();
        $response = $client->get(
            $this->url . "program/VersionEditable/".$hoy."&Claro Canal&" . session('id_user')
        );
        $respuesta =  json_decode($response->getBody()); 
      
        if($respuesta->code == 200){
            return view('layaout.adm-CN.Menu')->with('respuesta', $respuesta);

        }else{
            return back()->with("error", "Por el momento no podemos obtneer informacion intenta mas tarde");
        };
    }  


    public function captureExcel(Request $request)
    {
        //obtnemos el archvio
        $new_file = $_FILES['file'];
        $data = $request->datos;
        $ruta = $new_file['tmp_name'];
        $documento = IOFactory::load($ruta);
        # obtener conteo e iterar
        $totalDeHojas = $documento->getSheetCount();
       #iterar por hojas
        $programas = [];
        for ($indiceHoja = 0; $indiceHoja < $totalDeHojas; $indiceHoja++) {
            $hojaActual = $documento->getSheet($indiceHoja);
            # Calcular el máximo valor de la fila 
            $numeroMayorDeFila = $hojaActual->getHighestRow(); // Numérico
            $letraMayorDeColumna = $hojaActual->getHighestColumn(); // Letra
            # Convertir la letra al número de columna correspondiente
            $numeroMayorDeColumna = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($letraMayorDeColumna);
            # Iterar filas con ciclo for e índices
            for ($indiceFila = 3; $indiceFila <= $numeroMayorDeFila; $indiceFila++) {
                # declaramos un arreglo que contendra los datos
                $programa = [];
                for ($indiceColumna = 1; $indiceColumna <= $numeroMayorDeColumna; $indiceColumna++) {

                    # Obtener celda por columna y fila
                    $celda = $hojaActual->getCellByColumnAndRow($indiceColumna, $indiceFila);
                    # Y ahora que tenemos una celda trabajamos con ella
                    $value = $celda->getValue();
                    switch ($indiceColumna) {
                        case 1:
                            # Titulo del programa...
                            $programa['Program_Title'] = $value;
                            break;
                        case 2:
                            # code...
                            $programa['Programar_publicacion'] = $value;
                            break;
                        case 3:
                            # code...
                            $programa['Periodicidad'] = $value;
                            break;
                        case 4:
                            # code...
                            $programa['Establecer_home'] = $value;
                            break;
                        case 5:
                            # code...
                            $objFecha = Date::excelToDateTimeObject($value);
                            $cadena_nuevo_formato =  date_format($objFecha, 'Y-m-d');;

                            $programa['Vigencia_home'] = $cadena_nuevo_formato;
                            break;
                        case 6:
                            # code...
                            $programa['Establecer_landing'] = $value;
                            break;
                        case 7:
                            # code...
                            $objFecha = Date::excelToDateTimeObject($value);
                            $cadena_nuevo_formato =  date_format($objFecha, 'Y-m-d');;
                            $programa['Vigencia_landing'] = $cadena_nuevo_formato;
                            break;
                        case 8:
                            # code...
                            $objFecha = Date::excelToDateTimeObject($value);
                            $cadena_nuevo_formato =  date_format($objFecha, 'Y-m-d H:i:s');;


                            $programa['Schedule_Item_Date_Time'] = $cadena_nuevo_formato;
                            break;
                        case 9:
                            # code...
                            $objFecha = Date::excelToDateTimeObject($value);
                            $cadena_nuevo_formato =  date_format($objFecha, 'Y-m-d');;

                            $programa['Schedule_Item_Long_Date'] = $cadena_nuevo_formato;
                            break;
                        case 10:
                            # code...
                            $objFecha = Date::excelToDateTimeObject($value);
                            $cadena_nuevo_formato =  date_format($objFecha, 'H:i:s');

                            $programa['Schedule_Item_Long_Time'] = $cadena_nuevo_formato;
                            break;
                        case 11:
                            # code...
                            $objFecha = Date::excelToDateTimeObject($value);
                            $cadena_nuevo_formato =  date_format($objFecha, 'H:i:s');
                            $programa['Estimed_Schedule_Item_Duration'] = $cadena_nuevo_formato;
                            break;
                        case 12:
                            # code...
                            $programa['Program_Year_Produced'] = $value;
                            break;
                        case 13:
                            # code...
                            $programa['Program_Genre_List'] = $value;
                            break;
                        case 14:
                            # code...
                            $programa['Program_Title_Alternate'] = $value;
                            break;
                        case 15:
                            # code...
                            $programa['Program_Episode_Season'] = $value;
                            break;
                        case 16:
                            # code...
                            $programa['Program_Episode_Number'] = $value;
                            break;
                        case 17:
                            # code...
                            $programa['Synopsis'] = $value;
                            break;
                        case 18:
                            # code...
                            $programa['Schedule_Item_Rating_Code'] = $value;
                            break;
                        case 19:
                            # code...
                            $programa['Scheduled_Version_SUBBED'] = $value;
                            break;
                        case 20:
                            # code...
                            $programa['Scheduled_Version_DUBBED'] = $value;
                            break;
                        case 21:
                            # code...
                            $programa['Audio_5.1_avalieble'] = $value;
                            break;
                        default:
                            # code...
                            break;
                    }
                }
                $programas[$indiceFila - 3] = $programa;
            }
        }
        //$programas=json_encode($programas);

        $htmlProgrmacion = "<div id='tb1' class='contenedor-tabla  ml-5 pr-5'>
        <div class='contenedor-fila'>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'> Entrada</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Estado</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Alerta</span>
            </div>
            <div class='contenedor-columna centro  centro title-table'>
                <span class='text-public'> Seleccionar</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Program Title Original</span>
            </div>
            <div class='contenedor-columna centro  centro title-table'>
                <span class='text-public'>Programar publicación</span>
            </div>
            <div class='contenedor-columna centro  centro title-table'>
                <span class='text-public'>Periodicidad</span>
            </div>
            <div class='contenedor-columna centro  centro title-table'>
                <span class='text-public'>Establecer en Home</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Establecer en landing</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'> Imagenes</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Schedule Item Date Time</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Schedule Item Long Date</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Schedule Item Long Time< (GMT)</span> </div> <div class='contenedor-columna centro centro title-table'>
                        <span class='text-public'>Estimated Schedule Item Duration</span>
            </div>
            <div class='contenedor-columna centro  centro title-table'>
                <span class='text-public'>Program Year Produced</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Program Genre List</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Program Title Alternate </span>
            </div>
            <div class='contenedor-columna centro  centro title-table'>
                <span class='text-public'>Program Episode Season</span>
            </div>
            <div class='contenedor-columna centro  centro title-table'>
                <span class='text-public'>Program Episode Number</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Synopsis</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Schedule Item Rating Code</span>
            </div>
            <div class='contenedor-columna centro  centro title-table'>
                <span class='text-public'>Scheduled Version SUBBED (1=Yes/0=No)</span>
            </div>
            <div class='contenedor-columna centro centro title-table'>
                <span class='text-public'>Scheduled Version DUBBED (1=Yes/0=No)</span>
            </div>
            <div class='contenedor-columna centro  centro title-table'>
                <span class='text-public'>Audio 5.1 available
                    (1=Yes/0=No)</span>
            </div>
        </div>";

        for ($indexProgramas = 0; $indexProgramas < count($programas); $indexProgramas++) {
            $htmlProgrmacion = $htmlProgrmacion . '
            <div class="contenedor-fila" id="programa_' . $programas[$indexProgramas]['Program_Title'] . '">
                <div class="contenedor-columna centro" id="">
                    <img src="./images/bin.svg"  class="mx-auto"alt="">
                </div>
                <div class="contenedor-columna centro">
                <img src="./images/pendientes.svg" class="mx-auto" alt=""><br>
                <span class="program-original"> Pendiente de revisión </span>
                </div>
                <div class="contenedor-columna centro"></div>
                <div class="contenedor-columna centro">
                    <label class="mg6 checkradio">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    </label>
                </div>
                <div class="contenedor-columna centro">
                    <label class="program-original">' . $programas[$indexProgramas]['Program_Title'] . '</label>
                    <img src="./images/pencil.svg" alt="" class=""class="pencil">
                </div>
                <div class="contenedor-columna centro">
                <div class="yes-no">
                            <input type="radio" name="yes-no" id="si' . $indexProgramas . '" checked />
                            <label for="si' . $indexProgramas . '" id="siestado" class="si-estilo">
                            Sí</label>
                            <input type="radio" name="yes-no" id="no' . $indexProgramas . '" />
                            <label for="no' . $indexProgramas . '" id="noestado" class="no-estilo">
                            No</label>
                        </div>
                        <img src="./images/pencil.svg" alt=""class="pencil1">
                        <div class=" d-flex fechas ">
                            <label class="date" type=date>7/1/2019</label> <label class="date" type="time">11:00:00</label>
                        </div>
                        
                </div>
                <div class="contenedor-columna centro">
                <div class="periodicidad">
                            <input type="radio" name="si-no" id="yes" checked />
                            <label for="yes" id="siestado" class="si-estilo1">
                            Sí</label>
                            <input type="radio" name="si-no" id="nop" />
                            <label for="nop" id="noestado" class="no-estilo1">
                            No</label>
                        </div> 
                </div>
                <div class="contenedor-columna centro">
                <label class="mg6 checkradio  mb-5">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    </label>
                    <div class="vigencia mt-5">          
                        <label class="text-public">Vigencia en home</label>
                        <img src="./images/pencil.svg" alt=""class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class=" d-flex mt-3 ml-4"><span class="text-lan ml-5 mtop-8"> No te pierdas</span>
                <label class="checkradio">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    </label>
                </div>
                    <div class="d-flex ml-4"><span class="text-lan ml-5 mtop-8 mb-4"> Solo por canal claro</span>
                    <label class="checkradio">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                    </label>
                    </div>
                    <div class="vige-lan">
                    <label class="text-public">Vigencia en landing</label>
                    </div>
                </div>
                <div class="contenedor-columna centro">
                    <div class="image-ta">
                    <img src="./images/pencil.svg" alt=""class="pencil2">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                    <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small">7/1/2019 11:00:00</label>
                        <img src="./images/pencil.svg" alt=""class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small" >1-Jul-19</label>
                        <img src="./images/pencil.svg" alt=""class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small" >11:00:00 AM</label>
                        <img src="./images/pencil.svg" alt=""class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small" >12:07:19 AM</label>
                        <img src="./images/pencil.svg" alt=""class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small" >1982</label>
                        <img src="./images/pencil.svg" alt=""class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small">Animación, Cultura, Series</label>
                        <img src="./images/pencil.svg" alt="" class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small">Cantinflas y sus amigos: James Watt</label>
                        <img src="./images/pencil.svg" alt="" class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small" >3</label>
                        <img src="./images/pencil.svg" alt="" class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small">28</label>
                        <img src="./images/pencil.svg" alt="" class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro ">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do <br>eiusmod tempor incididunt ut labore et dolore magna aliqua.  </label>
                        <img src="./images/pencil.svg" alt="" class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small" >PG-13</label>
                        <img src="./images/pencil.svg" alt="" class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small" >0</label>
                        <img src="./images/pencil.svg" alt="" class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small" >0</label>
                        <img src="./images/pencil.svg" alt="" class="pencil">
                    </div>
                </div>
                <div class="contenedor-columna centro">
                <div class="schedule-date">
                        <label class="a-text-regular-brownishtwo text-small" >0</label>
                        <img src="./images/pencil.svg" alt="" class="pencil">
                    </div>
                </div>
            </div>
            ';
        }

        //hacemos la llamada a la API
        $data=json_decode($data);
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);
        $response = $client->post(
            $this->url . "program/CapturePrograming",
            ['body' => json_encode(
                [
                    'usuario_id' => $data->usuario_id,
                    'landing_id' => $data->landing_id,
                    'version_id' => $data->version_id,
                    'version_number' => $data->version_number,
                    'programs'=>$programas
                ]
            )]
        );
        $respuesta =  $response->getBody()->getContents(); 
        
         echo($respuesta);


    }
    public function newRow(Request $request){
        /*//Obtenemos los datos de la vista en especifico
        $data = $request->all();
        //solicitamos a la api para obtener el id temporal del nuevo programa
        $client = new Client([
            'headers' => ['Content-Type' => 'application/json']
        ]);
        $response = $client->post(
            $this->url . "program/newChapter",
            ['body' => json_encode(
                [
                    'usuario_id' => $data['usuario_id'],
                    'landing_id' => $data['landing_id'],
                    'version_id' => $data['version_id'],
                    'version_number' => $data['version_number'],
                ]
            )]
        );
        $respuesta =  json_decode($response->getBody()); 
        if($respuesta->code == 200){

            $chapter_id = $respuesta->data->*/
        if(1){

            $chapter_id = 0;
            $html = "            
            <div class='contenedor-fila' id='programacion-claro-".$chapter_id."'>
                    <div class='contenedor-columna centro ' id='entrada-".$chapter_id."'> <img src='./images/bin.svg' class='mx-auto'alt=''></div>
                    <div class='contenedor-columna centro ' id='estado-".$chapter_id."'>
                            <img src='./images/pendientes.svg' class='mx-auto' alt=''><br>
                            <span class='program-original'> Pendiente de revisión </span>  
                    </div>
                    <div class='contenedor-columna centro ' id='alerta-".$chapter_id."'>
                        <span class='program-original'> Este Programa no tiene datos </span>
                    </div>
                    <div class='contenedor-columna centro ' id='seleccionar-".$chapter_id."'>  
                        <label class='mg6 checkradio'>
                        <input type='checkbox' id='cb-seleccionar-".$chapter_id."'>
                        <span class='checkmark'></span>
                        </label>
                    </div>
                    <div class='contenedor-columna centro centro' id='title-".$chapter_id."'>
                        <label class='program-original' id='lb-title-".$chapter_id."'> Titulo de programa}</label>
                         <img src='./images/pencil.svg'  alt='' class=''class='pencil'>
       
                    </div>
                    <div class='contenedor-columna centro ' id='programar-".$chapter_id."'>
                        <div class='yes-no'>
                            <input type='radio' name='yes-no-".$chapter_id."' id='programar-si-".$chapter_id."' checked />
                            <label for='si-".$chapter_id."' id='siestado-".$chapter_id."' class='si-estilo'>
                              Sí</label>
                            <input type='radio' name='yes-no-".$chapter_id."' id='programar-no-".$chapter_id."' />
                            <label for='no-".$chapter_id."' id='noestado-".$chapter_id."' class='no-estilo'>
                              No</label>
                          </div>
                          <img src='./images/pencil.svg' alt=''class='pencil1'>
        
                          <div class=' d-flex fechas '>
                             <label class='date' type=date>0-0-0</label> <label class='date' type='time'>00:00</label>
                          </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='periodicidad'>
                            <input type='radio' name='si-no-periodicidad-".$chapter_id."' id='yes-periodicidad-".$chapter_id."' checked='true' />
                            <label for='yes-periodicidad-".$chapter_id." ' id='siestado-periodicidad-".$chapter_id."' class='si-estilo1'>
                              Sí</label>
                            <input type='radio' name='si-no-periodicidad-".$chapter_id."' id='no-periodicidad-".$chapter_id."' checked='false'/>
                            <label for='no-periodicidad-".$chapter_id."' id='noestado-periodicidad-".$chapter_id."' class='no-estilo1'>
                              No</label>
                        </div>
                    </div>
                    <div class='contenedor-columna centro'><label class='mg6 checkradio  mb-5'>
                        <input type='checkbox' id='in_home-".$chapter_id."'>
                        <span class='checkmark'></span>
                        </label>
                        <div class='vigencia mt-5'>          
                            <label class='text-public'>Vigencia en home</label>
                            <img src='./images/pencil.svg' alt=''class='pencil'>
                        </div>
                    </div>   
                    <div class='contenedor-columna centro'>
                        <div class=' d-flex mt-3 ml-4'><span class='text-lan ml-5 mtop-8'> No te pierdas</span>
                            <label class='checkradio'>
                                <input type='checkbox'>
                                <span class='checkmark'></span>
                                </label>
                            </div>
                                <div class='d-flex ml-4'><span class='text-lan ml-5 mtop-8 mb-4'> Solo por canal claro</span>
                                <label class='checkradio'>
                                <input type='checkbox'>
                                <span class='checkmark'></span>
                                </label>
                                </div>
                                <div class='vige-lan'>
                                <label class='text-public'>Vigencia en landing</label>
                                </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='image-ta'>
                            <img src='./images/pencil.svg' alt=''class='pencil2'>
                            </div>
                    </div>
                    <div class='contenedor-columna centro '>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small'>0-0-0 00:00}</label>
                            <img src='./images/pencil.svg' alt=''class='pencil'>
                        </div>
                    </div>
                    <div class='contenedor-columna centro '>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small' >0-0-0</label>
                            <img src='./images/pencil.svg' alt=''class='pencil'>
                        </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small' >00:00</label>
                            <img src='./images/pencil.svg' alt=''class='pencil'>
                        </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small' >00:00</label>
                            <img src='./images/pencil.svg' alt=''class='pencil'>
                        </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small' >0000</label>
                            <img src='./images/pencil.svg' alt=''class='pencil'>
                        </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small'>programa</label>
                            <img src='./images/pencil.svg' alt='' class='pencil'>
                        </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <label class='a-text-regular-brownishtwo text-small'>Nombre alternativo del prgrama</label>
                        <img src='./images/pencil.svg' alt='' class='pencil'>
                   
                    </div>
                    <div class='contenedor-columna centro'>
                        <label class='a-text-regular-brownishtwo text-small' >0</label>
                        <img src='./images/pencil.svg' alt='' class='pencil'>
                   </div>
                    <div class='contenedor-columna centro'>  
                        <label class='a-text-regular-brownishtwo text-small'>0</label>
                        <img src='./images/pencil.svg' alt='' class='pencil'>
                   </div>
                    <div class='contenedor-columna centro' style='white-space: auto;'>  
                        <label class='a-text-regular-brownishtwo text-small'>sinopsis del programa</label>
                    <img src='./images/pencil.svg' alt='' class='pencil'>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small' >Clasificacion</label>
                            <img src='./images/pencil.svg' alt='' class='pencil'>
                        </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small' >0</label>
                            <img src='./images/pencil.svg' alt='' class='pencil'>
                        </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small' >0</label>
                            <img src='./images/pencil.svg' alt='' class='pencil'>
                        </div>
                    </div>
                    <div class='contenedor-columna centro'>
                        <div class='schedule-date'>
                            <label class='a-text-regular-brownishtwo text-small' >0</label>
                            <img src='./images/pencil.svg' alt='' class='pencil'>
                        </div>
                    </div>
                   
                </div>";
            return $html;

        }else{
            return json_encode($request->all());

        }
    }
    
}