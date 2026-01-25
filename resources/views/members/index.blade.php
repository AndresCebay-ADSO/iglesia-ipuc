@extends('layouts.app')

@section('title', 'Miembros')

@section('content')
<div>
    <div class="mb-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Miembros</h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Gestiona los integrantes de la iglesia</p>
            </div>
            <div class="flex gap-3">
                @if(auth()->user()->isAdmin() || auth()->user()->isSecretary())
                <button onclick="showExportModal()" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Exportar
                </button>
                @endif
                <a href="{{ route('members.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Agregar Miembro
                </a>
            </div>
        </div>

        <!-- Filters - Compact Style -->
        <form method="GET" action="{{ route('members.index') }}" class="flex flex-col gap-3">
            <!-- Search Bar -->
            <div class="flex-1">
                <div class="relative">
                    <svg class="absolute left-3 top-3 w-5 h-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" name="search" value="{{ request('search') }}" 
                           placeholder="Buscar por nombre o documento..." 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white text-sm">
                </div>
            </div>

            <!-- Filter Dropdowns -->
            <div class="flex gap-3 flex-wrap">
                <select name="age_range" class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white text-sm">
                    <option value="">Todas las edades</option>
                    <option value="niños" {{ request('age_range') == 'niños' ? 'selected' : '' }}>Niños</option>
                    <option value="jóvenes" {{ request('age_range') == 'jóvenes' ? 'selected' : '' }}>Jóvenes</option>
                    <option value="adultos" {{ request('age_range') == 'adultos' ? 'selected' : '' }}>Adultos</option>
                    <option value="adultos_mayores" {{ request('age_range') == 'adultos_mayores' ? 'selected' : '' }}>Adultos Mayores</option>
                </select>

                <select name="gender" class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white text-sm">
                    <option value="">Todos</option>
                    <option value="masculino" {{ request('gender') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="femenino" {{ request('gender') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                </select>

                <select name="ministry" class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white text-sm">
                    <option value="">Todos</option>
                    <option value="alabanza" {{ request('ministry') == 'alabanza' ? 'selected' : '' }}>Alabanza</option>
                    <option value="jóvenes" {{ request('ministry') == 'jóvenes' ? 'selected' : '' }}>Jóvenes</option>
                    <option value="niños" {{ request('ministry') == 'niños' ? 'selected' : '' }}>Niños</option>
                    <option value="líderes" {{ request('ministry') == 'líderes' ? 'selected' : '' }}>Líderes</option>
                    <option value="intercesión" {{ request('ministry') == 'intercesión' ? 'selected' : '' }}>Intercesión</option>
                    <option value="ujieres" {{ request('ministry') == 'ujieres' ? 'selected' : '' }}>Ujieres</option>
                    <option value="diaconía" {{ request('ministry') == 'diaconía' ? 'selected' : '' }}>Diaconía</option>
                    <option value="multimedia" {{ request('ministry') == 'multimedia' ? 'selected' : '' }}>Multimedia</option>
                    <option value="damas_dorcas" {{ request('ministry') == 'damas_dorcas' ? 'selected' : '' }}>Damas Dorcas</option>
                    <option value="escuela_dominical" {{ request('ministry') == 'escuela_dominical' ? 'selected' : '' }}>Escuela Dominical</option>
                    <option value="evangelismo" {{ request('ministry') == 'evangelismo' ? 'selected' : '' }}>Evangelismo</option>
                    <option value="ninguno" {{ request('ministry') == 'ninguno' ? 'selected' : '' }}>Ninguno</option>
                </select>

                <select name="status" class="px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white text-sm">
                    <option value="">Todos</option>
                    <option value="activo" {{ request('status') == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ request('status') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                    Filtrar
                </button>
            </div>
        </form>
    </div>

    <!-- Members Table -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Documento</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Edad</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Género</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Ministerio</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Rol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($members as $member)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">{{ $member->fullname }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $member->document_id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $member->age }} años</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 capitalize">{{ $member->gender }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                {{ $member->formatted_ministry }}
                                @if($member->ministry_role)
                                    <span class="text-xs text-gray-400 dark:text-gray-500">({{ ucfirst($member->ministry_role) }})</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">{{ $member->formatted_church_role }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $member->status == 'activo' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                    {{ ucfirst($member->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('members.edit', $member) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 mr-3">Editar</a>
                                @if(auth()->user()->isAdmin())
                                <form action="{{ route('members.destroy', $member) }}" method="POST" class="inline" onsubmit="return confirm('¿Está seguro de eliminar este miembro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">Eliminar</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                                No se encontraron miembros
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal de Confirmación de Exportación (copiado del layout) -->
<div id="exportModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white dark:bg-gray-800">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 dark:bg-green-900 mb-4">
                <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Confirmar Exportación</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    ¿Desea descargar la lista de miembros en formato CSV?
                </p>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                    El archivo incluirá todos los datos de los miembros con los filtros actuales aplicados.
                </p>
            </div>
            <div class="flex items-center px-4 py-3 space-x-3">
                <button onclick="hideExportModal()" class="flex-1 px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-base font-medium rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                    Cancelar
                </button>
                <a href="{{ route('export.index', request()->query()) }}" onclick="hideExportModal()" class="flex-1 px-4 py-2 bg-green-600 text-white text-base font-medium rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition-colors text-center">
                    Descargar
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function showExportModal() {
        document.getElementById('exportModal').classList.remove('hidden');
    }

    function hideExportModal() {
        document.getElementById('exportModal').classList.add('hidden');
    }

    // Cerrar modal al hacer clic fuera de él
    document.getElementById('exportModal').addEventListener('click', function(e) {
        if (e.target === this) {
            hideExportModal();
        }
    });

    // Cerrar modal con tecla ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideExportModal();
        }
    });
</script>
@endsection
