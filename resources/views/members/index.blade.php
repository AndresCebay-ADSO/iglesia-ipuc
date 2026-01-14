@extends('layouts.app')

@section('title', 'Miembros')

@section('content')
<div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Miembros</h1>
        <a href="{{ route('members.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
            + Nuevo Miembro
        </a>
    </div>

    <!-- Filters -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 mb-6">
        <form method="GET" action="{{ route('members.index') }}" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            <!-- Search -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Búsqueda</label>
                <input type="text" name="search" value="{{ request('search') }}" 
                       placeholder="Nombre o documento" 
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>

            <!-- Age Range -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Rango de Edad</label>
                <select name="age_range" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Todos</option>
                    <option value="niños" {{ request('age_range') == 'niños' ? 'selected' : '' }}>Niños</option>
                    <option value="jóvenes" {{ request('age_range') == 'jóvenes' ? 'selected' : '' }}>Jóvenes</option>
                    <option value="adultos" {{ request('age_range') == 'adultos' ? 'selected' : '' }}>Adultos</option>
                    <option value="adultos_mayores" {{ request('age_range') == 'adultos_mayores' ? 'selected' : '' }}>Adultos Mayores</option>
                </select>
            </div>

            <!-- Gender -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Género</label>
                <select name="gender" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Todos</option>
                    <option value="masculino" {{ request('gender') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="femenino" {{ request('gender') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>

            <!-- Ministry -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ministerio</label>
                <select name="ministry" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
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
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado</label>
                <select name="status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Todos</option>
                    <option value="activo" {{ request('status') == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ request('status') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="flex items-end">
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
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
@endsection
