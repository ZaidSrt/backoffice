<div class='bg-color'>
            <span class='d-flex align-items-center justify-content-between  py-xl-2'>
                <span class='ml-5'>   <img src='./images/registro/group-24.svg'> </span>
               
                <span class='text-light1 mr-5'>Administrador de contenido</span>          
        </span>
        </div>
        <div id='user_information' class='o-user-info-container d-flex align-items-center justify-content-between pt-xl-1 '>               
            <div class='ml-5'>
                <span class='a-text-black-bold a-name-user'>{{ session('name') }}</span><br>
                <span class='text-light1 '>{{ session('rol_name') }}</span>
            </div>
            <div class='mr-5'>
           
            <form method="POST" action="{{ route('exit') }}">  {{ csrf_field() }} <button class='mt-4 btn-return-sitio text-return'>Regresar a Administrar sitio</button></form>
            </div>
        </div>