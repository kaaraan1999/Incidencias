<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Incidencia
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('incidencias.update', $incidencia->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="cAdicional" class="block font-medium text-sm text-gray-700">Comentarios del tecnico</label>
                            <input type="text" name="cAdicional" id="cAdicional" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('cAdicional', $incidencia->cAdicional) }}" />
                            @error('estado')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="estado" class="block font-medium text-sm text-gray-700">Estado</label>
                            <select name="estado" id="estado">
                                <option value="Recibido">Recibido</option>
                                <option value="Resuelto">Resuelto</option>
                                <option value="En Proceso">En Proceso</option>
                                <option value="Rechazado">Rechazado</option>
                            </select>
                            @error('estado')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Editar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>
