@extends('layout.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="antialiased bg-body text-white font-body">
        <div>
            <h1
                class="text-3xl uppercase leading-tight font-heading my-8 text-center border-2 mx-80 border-gray-500 py-4 shadow-lg">
                FORMULARIO DE REGISTRO</h1>
        </div>
        <div class="pb-16">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="px-4 mx-48 p-4 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <div>
                            <span class="font-medium">{{ $error }}!</span>
                        </div>
                    </div>
                @endforeach
            @endif
            <form action="{{ route('proyecto.store') }}" method="post"
                class="border-2 px-4 mx-48 py-2 border-gray-700 mb-16 bg-form">
                @csrf
                <h2 class="text-2xl uppercase leading-tight font-heading text-center pb-2 underline mt-2 mb-8">
                    INFORMACION
                    DEL
                    PROYECTO</h2>
                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Nombre del proyecto:</h3>
                @if ($errors->has('proyectoNombre'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('proyectoNombre') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6 bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="proyectoNombre" placeholder="Escribe el nombre de tu proyecto"
                        value="{{ old('proyectoNombre') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Descripción <strong>breve</strong> del proyecto (300 caracteres max):</h3>
                @if ($errors->has('proyectoDescripcion'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('proyectoDescripcion') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <textarea class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        name="proyectoDescripcion" maxlength="300" placeholder="Descripción...">{{ old('proyectoDescripcion') }}</textarea>
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Asesor del proyecto:</h3>

                <div class="mb-6">
                    @if ($errors->has('proyectoAsesorNombre'))
                        <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                            <span>{{ $errors->first('proyectoAsesorNombre') }}</span>
                        </div>
                    @endif
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="proyectoAsesorNombre" placeholder="Escribe el nombre completo de tu asesor"
                        value="{{ old('proyectoAsesorNombre') }}">

                    {{-- @if ($errors->has('proyectoAsesor'))
                        <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center"
                             role="alert">
                            <span>{{ $errors->first('proyectoAsesor') }}</span>
                        </div>
                    @endif
                    <div class="relative mb-6">
                        <select
                            class="appearance-none w-full px-6  bg-gray-900 rounded-full border outline-none py-4"
                            name="proyectoAsesor">
                            <option value="">Seleccione Asesor</option>
                            @foreach ($asesor as $asesores)
                                <option
                                    value="{{ $asesores->id }}">{{ $asesores->nombre . ' ' . $asesores->apellidos }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                <path
                                    d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                        </div>
                    </div> --}}
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Celular del asesor:</h3>

                <div class="mb-6">
                    @if ($errors->has('proyectoAsesorCelular'))
                        <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                            <span>{{ $errors->first('proyectoAsesorCelular') }}</span>
                        </div>
                    @endif
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="proyectoAsesorCelular" placeholder="Escribe el numero de de tu asesor"
                        value="{{ old('proyectoAsesorCelular') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Correo del asesor:</h3>

                <div class="mb-6">
                    @if ($errors->has('proyectoAsesorCorreo'))
                        <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                            <span>{{ $errors->first('proyectoAsesorCorreo') }}</span>
                        </div>
                    @endif
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="proyectoAsesorCorreo" placeholder="Escribe el correo de de tu asesor"
                        value="{{ old('proyectoAsesorCorreo') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">¿Su proyecto ha participado con
                    anterioridad en ferias?
                </h3>

                <div class="border rounded-full px-6 py-4 mb-6  bg-gray-900">
                    <label class="mr-2">
                        <input type="radio" name="participado" value="1"
                            {{ old('participado') == '1' ? 'checked' : '' }}><span class="ml-1">Si</span>
                    </label>
                    <label class="ml-2">
                        <input type="radio" name="participado" value="0"
                            {{ old('participado') == '0' ? 'checked' : '' }}><span class="ml-1">No</span>
                    </label>
                </div>

                {{-- <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">TIPO:</h3>

                <div class="mb-6">
                    <div class="relative mb-6">
                        <select
                            class="appearance-none w-full px-6  bg-gray-900 rounded-full border outline-none placeholder-gray-500 py-4"
                            name="tipo"  >
                            <option value="">Seleccione Tipo...</option>
                            @foreach ($tipo as $tipos)
                                <option value="{{ $tipos->id }}" {{ (old('tipo')==$tipos->id)? "selected" : "" }}>{{ $tipos->nombre }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                        </div>
                    </div>
                </div> --}}

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Categoria</h3>

                <div class="mb-6">
                    <div class="relative mb-6">
                        <select class="appearance-none w-full py-4 px-6  bg-gray-900 rounded-full border outline-none"
                            name="categoria" id="categoria" onchange="subcategoriaForm()">
                            <option value="">Seleccione categoria...</option>
                            @foreach ($categoria as $categorias)
                                <option value="{{ $categorias->id }}"
                                    {{ old('categoria') == $categorias->id ? 'selected' : '' }}>{{ $categorias->nombre }}
                                </option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div name="subcategoriaForm" id="subcategoriaForm">
                    <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Sub-Categoria</h3>

                    <div class="mb-6">
                        <div class="relative">
                            <select class="appearance-none w-full py-4 bg-gray-900 rounded-full border outline-none px-6"
                                name="sub-Categoria" id="sub-Categoria">
                                <option value="">Seleccione sub-categoria...</option>
                                @foreach ($sub_categoria as $sub_categoria)
                                    <option value="{{ $sub_categoria->id }}"
                                        {{ old('sub-Categoria') == $sub_categoria->id ? 'selected' : '' }}>
                                        {{ $sub_categoria->nombre }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="text-2xl uppercase leading-tight font-heading my-8 text-center underline mb-8">Información
                    participante 1</h2>

                <h3 class="text-xl uppercase leading-tight font-heading ml-6 mb-2">NOMBRE(s):</h3>
                @if ($errors->has('participante1_Nombre'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante1_Nombre') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante1_Nombre" placeholder="Nombre..."
                        value="{{ old('participante1_Nombre') }}">
                </div>

                <h3 class=" text-xl mb-2 uppercase leading-tight font-heading ml-6">Apellidos:</h3>
                @if ($errors->has('participante1_Apellidos'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante1_Apellidos') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante1_Apellidos" placeholder="Apellidos..."
                        value="{{ old('participante1_Apellidos') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Numero de contacto:</h3>
                @if ($errors->has('participante1_Telefono'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante1_Telefono') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante1_Telefono" placeholder="Ejemplo +52 687 191 9431"
                        value="{{ old('participante1_Telefono') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Correo Electronico:</h3>
                @if ($errors->has('participante1_Correo'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante1_Correo') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante1_Correo" placeholder="correo@mail.com"
                        value="{{ old('participante1_Correo') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">INTITUCIÓN DE PROCEDENCIA:</h3>
                @if ($errors->has('participante1_InstitucionProcedencia'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante1_InstitucionProcedencia') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante1_InstitucionProcedencia"
                        placeholder="Institución de procedencia..."
                        value="{{ old('participante1_InstitucionProcedencia') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">NIVEL EDUCATIVO:</h3>

                <div class="mb-6">
                    <div class="relative">
                        <select
                            class="appearance-none w-full py-4 px-6  bg-gray-900 rounded-full border outline-none text-red-600"
                            name="participante1_NivelEducativo">
                            <option value="">Seleccione Nivel Educativo...</option>
                            <option value="1" {{ old('participante1_NivelEducativo') == '1' ? 'selected' : '' }}>
                                Primaria</option>
                            <option value="2" {{ old('participante1_NivelEducativo') == '2' ? 'selected' : '' }}>
                                Secundaria</option>
                            <option value="3" {{ old('participante1_NivelEducativo') == '3' ? 'selected' : '' }}>
                                Preparatoria</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">TALLA DE PLAYERA:</h3>

                <div class="mb-6">
                    <div class="relative">
                        <select
                            class="appearance-none w-full py-4 px-6  bg-gray-900 rounded-full border outline-none text-red-600"
                            name="participante1_TallaPlayera">
                            <option value="">Seleccione talla...</option>
                            <option value="1" {{ old('participante1_TallaPlayera') == '1' ? 'selected' : '' }}>Extra
                                Chica</option>
                            <option value="2" {{ old('participante1_TallaPlayera') == '2' ? 'selected' : '' }}>Chica
                            </option>
                            <option value="3" {{ old('participante1_TallaPlayera') == '3' ? 'selected' : '' }}>
                                Mediana
                            </option>
                            <option value="4" {{ old('participante1_TallaPlayera') == '4' ? 'selected' : '' }}>Grande
                            </option>
                            <option value="5" {{ old('participante1_TallaPlayera') == '5' ? 'selected' : '' }}>Extra
                                Grande</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <h2 class="text-2xl uppercase leading-tight font-heading my-8 text-center uncerline mb-8">
                    Información
                    Participante 2</h2>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">NOMBRES(S):</h3>
                @if ($errors->has('participante2_Nombre'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante2_Nombre') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante2_Nombre" placeholder="Nombre..."
                        value="{{ old('participante2_Nombre') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Apellidos:</h3>
                @if ($errors->has('participante2_Apellidos'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante2_Apellidos') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante2_Apellidos" placeholder="Apelldios..."
                        value="{{ old('participante2_Apellidos') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">NUMERO DE CONTACTO:</h3>
                @if ($errors->has('participante2_Telefono'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante2_Telefono') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante2_Telefono" placeholder="Ejemplo: +52 687 191 9431"
                        value="{{ old('participante2_Telefono') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">CORREO ELECTRONICO:</h3>
                @if ($errors->has('participante2_Correo'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante2_Correo') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante2_Correo" placeholder="correo@mail.com"
                        value="{{ old('participante2_Correo') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">Institución de procedencia:</h3>
                @if ($errors->has('participante2_InstitucionProcedencia'))
                    <div class="rounded alert text-red-500 alert-danger bg-white mb-2 text-center" role="alert">
                        <span>{{ $errors->first('participante2_InstitucionProcedencia') }}</span>
                    </div>
                @endif
                <div class="mb-6">
                    <input
                        class="w-full py-4 px-6  bg-gray-900 rounded-full border text-white outline-none placeholder-gray-500"
                        type="text" name="participante2_InstitucionProcedencia"
                        placeholder="Institucion de procedencia..."
                        value="{{ old('participante2_InstitucionProcedencia') }}">
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">NIvel educativo:</h3>

                <div class="mb-6">
                    <div class="relative">
                        <select
                            class="appearance-none w-full py-4 px-6  bg-gray-900 rounded-full border outline-none placeholder-gray-500 text-red-600"
                            name="participante2_NivelEducativo">
                            <option value="">Seleccione Nivel Educativo...</option>
                            <option value="1" {{ old('participante2_NivelEducativo') == '1' ? 'selected' : '' }}>
                                Primaria</option>
                            <option value="2" {{ old('participante2_NivelEducativo') == '2' ? 'selected' : '' }}>
                                Secundaria</option>
                            <option value="3" {{ old('participante2_NivelEducativo') == '3' ? 'selected' : '' }}>
                                Preparatoria</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <h3 class="text-xl mb-2 uppercase leading-tight font-heading ml-6">TALLA DE PLAYERA:</h3>

                <div class="mb-6">
                    <div class="relative">
                        <select
                            class="appearance-none w-full py-4 px-6  bg-gray-900 rounded-full border outline-none placeholder-gray-500 text-red-600"
                            name="participante2_TallaPlayera">
                            <option value="">Seleccione talla...</option>
                            <option value="1" {{ old('participante2_TallaPlayera') == '1' ? 'selected' : '' }}>Extra
                                Chica</option>
                            <option value="2" {{ old('participante2_TallaPlayera') == '2' ? 'selected' : '' }}>Chica
                            </option>
                            <option value="3" {{ old('participante2_TallaPlayera') == '3' ? 'selected' : '' }}>
                                Mediana
                            </option>
                            <option value="4" {{ old('participante2_TallaPlayera') == '4' ? 'selected' : '' }}>Grande
                            </option>
                            <option value="5" {{ old('participante2_TallaPlayera') == '5' ? 'selected' : '' }}>Extra
                                Grande</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-white">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z">
                                </path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0 text-right">
                        <button
                            class="btn inline-block items-center py-4 px-6 text-sm uppercase font-heading rounded-full transition duration-200 text-green-900 bg-green-400 hover:bg-green-500"
                            type="submit">Registrar
                        </button>
                    </div>
                    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0 text-left">
                        <a href="{{ route('index') }}"
                            class="btn cursor-pointer inline-block items-center py-4 px-6 text-sm uppercase font-heading rounded-full transition duration-200 bg-red-400 hover:bg-red-500">Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/registrar-proyecto.js') }}"></script>

@endsection
