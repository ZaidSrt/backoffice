<div class='bg-color'>
            <span class='d-flex align-items-center justify-content-between  py-xl-2'>
            <a href="{{ route('admin')}}"><span class='ml-5'><img src="{{asset('/images/home/claro-logo.svg')}}"> </span></a>

                <span class='text-light1 mr-5'>Administrador de contenido</span>
        </span>
        </div>
        <div id='user_information' class='o-user-info-container d-flex align-items-center justify-content-between pt-xl-1 '>
            <div class='ml-5'>
                <span class='a-text-black-bold a-name-user'>{{ session('name') }}</span><br>
                <span class='text-light1 '>{{ session('rol_name') }}</span>
            </div>
            <div class='mr-5'>
                <a href="{{route('admin')}}">
                    <button class='mt-4 btn-return-sitio  a-btn-basic-small text-return load-photo'>REGRESAR</button>
                </a>
            </div>
        </div>
