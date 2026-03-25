@extends('layouts.app')

@section('title', 'Miembros')

@section('content')
<div>
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4 mb-4">
            <div>
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">Miembros</h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Gestiona los integrantes de la iglesia</p>
            </div>
            <div class="flex flex-col sm:flex-row gap-3">
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
            <div class="flex gap-3 flex-wrap items-end">
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

    <!-- Members Table - Hidden on mobile -->
    <div class="hidden md:block bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
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

    <!-- Members Cards - Mobile only -->
    <div class="md:hidden space-y-4">
        @forelse($members as $member)
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="flex justify-between items-start mb-3">
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">{{ $member->fullname }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $member->document_id }}</p>
                    </div>
                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $member->status == 'activo' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                        {{ ucfirst($member->status) }}
                    </span>
                </div>
                <div class="space-y-1 text-sm text-gray-600 dark:text-gray-400 mb-4">
                    <p><span class="font-medium">Edad:</span> {{ $member->age }} años · <span class="font-medium">Género:</span> {{ ucfirst($member->gender) }}</p>
                    <p><span class="font-medium">Ministerio:</span> {{ $member->formatted_ministry }}@if($member->ministry_role) ({{ ucfirst($member->ministry_role) }})@endif</p>
                    <p><span class="font-medium">Rol:</span> {{ $member->formatted_church_role }}</p>
                </div>
                <div class="flex gap-2 pt-2 border-t border-gray-200 dark:border-gray-600">
                    <a href="{{ route('members.edit', $member) }}" class="flex-1 text-center py-2 px-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg">Editar</a>
                    @if(auth()->user()->isAdmin())
                    <form action="{{ route('members.destroy', $member) }}" method="POST" class="flex-1" onsubmit="return confirm('¿Está seguro de eliminar este miembro?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full py-2 px-3 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg">Eliminar</button>
                    </form>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-8 text-center text-gray-500 dark:text-gray-400">
                No se encontraron miembros
            </div>
        @endforelse
    </div>
</div>

@endsection
