<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de Usuarios
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="row">
                <div class="col-sm-6">
                  <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title">Registro de usuario</h2>

                        <form action="/gestion/usuarios/guardar" method="POST">
                            @csrf
                            <input type="hidden" id="id" name="id" value="{{ $usuario->id }}">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" value="{{ $usuario->email }}"
                                            maxlength="150" required="true">

                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del usuario" value="{{ $usuario->name }}"
                                            maxlength="150" required="true">
                                </div>
                            </div>
                            @if (Session::has("error"))
                                <div class="alert alert-danger mt-2" role="alert">
                                    {{ Session::get("error") }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    <a class="btn btn-secondary" style="float: right" href="/gestion/usuarios">Volver</a>
                                    <button type="submit" class="btn btn-primary mr-1" style="float: right">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>


                  </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
