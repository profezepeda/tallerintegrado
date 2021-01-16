<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de Usuarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="row">
                <div class="col-md-12">
                    <a type="button" class="btn btn-primary mb-3" style="float: right;" href="/gestion/usuarios/editar/0">Agregar</a>
                </div>
            </div>

            <div class="row">

                @foreach ($usuarios as $usuario)
                    <div class="col-sm-4">
                        <div class="card shadow-lg mb-2">
                            <div class="card-body">
                            <h4 class="card-title">{{ $usuario->name }}</h4>
                            <p class="card-text">{{ $usuario->email }}</p>

                            <div class="btn-group btn-group-sm" role="group"
                                 aria-label="Acciones para {{ $usuario->name }}"
                                 style="margin-top: 10px;">
                                <button type="button" class="btn btn-danger" onclick="eliminar({{ $usuario }})">Eliminar</button>
                                <a type="button" class="btn btn-warning" href="/gestion/usuarios/editar/{{ $usuario->id }}">Editar</a>
                            </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>


    </div>

    <form id="eliminarUsuario" method="POST" action="/gestion/usuarios/eliminar">
        @csrf
        <input type="hidden" id="id" name="id" value="">
    </form>


    <script>
        function eliminar(usuario) {
            if (!confirm("Está seguro de eliminar el usuario " + usuario.name))   {
                return false;
            }
            $("#id").val(usuario.id);
            $("#eliminarUsuario").submit();
        }
    </script>

</x-app-layout>
