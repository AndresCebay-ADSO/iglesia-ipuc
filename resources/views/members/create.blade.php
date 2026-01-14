@extends('layouts.app')

@section('title', 'Nuevo Miembro')

@section('content')
<div class="max-w-4xl">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Nuevo Miembro</h1>

    <form method="POST" action="{{ route('members.store') }}" class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Información Personal -->
            <div class="md:col-span-2">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Información Personal</h2>
            </div>

            <div>
                <label for="fullname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre Completo *</label>
                <input type="text" id="fullname" name="fullname" value="{{ old('fullname') }}" required
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label for="document_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Documento de Identidad *</label>
                <input type="text" id="document_id" name="document_id" value="{{ old('document_id') }}" required
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha de Nacimiento *</label>
                <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}" required
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Género *</label>
                <select id="gender" name="gender" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Seleccione...</option>
                    <option value="masculino" {{ old('gender') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                    <option value="femenino" {{ old('gender') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                </select>
            </div>

            <div>
                <label for="marital_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado Civil *</label>
                <select id="marital_status" name="marital_status" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Seleccione...</option>
                    <option value="soltero" {{ old('marital_status') == 'soltero' ? 'selected' : '' }}>Soltero</option>
                    <option value="casado" {{ old('marital_status') == 'casado' ? 'selected' : '' }}>Casado</option>
                    <option value="viudo" {{ old('marital_status') == 'viudo' ? 'selected' : '' }}>Viudo</option>
                    <option value="divorciado" {{ old('marital_status') == 'divorciado' ? 'selected' : '' }}>Divorciado</option>
                </select>
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Teléfono *</label>
                <input type="text" id="phone" name="phone" value="{{ old('phone') }}" required
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Dirección</label>
                <input type="text" id="address" name="address" value="{{ old('address') }}"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label for="neighborhood" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Barrio</label>
                <input type="text" id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>

            <!-- Información Eclesiástica -->
            <div class="md:col-span-2 mt-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Información Eclesiástica</h2>
            </div>

            <div>
                <label for="ministry" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ministerio *</label>
                <select id="ministry" name="ministry" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                        onchange="updateMinistryRoles()">
                    <option value="">Seleccione un ministerio...</option>
                    <option value="alabanza" {{ old('ministry') == 'alabanza' ? 'selected' : '' }}>Alabanza</option>
                    <option value="jóvenes" {{ old('ministry') == 'jóvenes' ? 'selected' : '' }}>Jóvenes</option>
                    <option value="niños" {{ old('ministry') == 'niños' ? 'selected' : '' }}>Niños</option>
                    <option value="líderes" {{ old('ministry') == 'líderes' ? 'selected' : '' }}>Líderes</option>
                    <option value="intercesión" {{ old('ministry') == 'intercesión' ? 'selected' : '' }}>Intercesión</option>
                    <option value="ujieres" {{ old('ministry') == 'ujieres' ? 'selected' : '' }}>Ujieres</option>
                    <option value="diaconía" {{ old('ministry') == 'diaconía' ? 'selected' : '' }}>Diaconía</option>
                    <option value="multimedia" {{ old('ministry') == 'multimedia' ? 'selected' : '' }}>Multimedia</option>
                    <option value="damas_dorcas" {{ old('ministry') == 'damas_dorcas' ? 'selected' : '' }}>Damas Dorcas</option>
                    <option value="escuela_dominical" {{ old('ministry') == 'escuela_dominical' ? 'selected' : '' }}>Escuela Dominical</option>
                    <option value="evangelismo" {{ old('ministry') == 'evangelismo' ? 'selected' : '' }}>Evangelismo</option>
                    <option value="ninguno" {{ old('ministry') == 'ninguno' ? 'selected' : '' }}>Ninguno</option>
                </select>
            </div>

            <div id="ministry_role_container" style="display: none;">
                <label for="ministry_role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Rol en el Ministerio</label>
                <select id="ministry_role" name="ministry_role"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Sin rol específico</option>
                </select>
            </div>

            <div>
                <label for="church_role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Rol en la Iglesia *</label>
                <select id="church_role" name="church_role" required
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="">Seleccione un rol...</option>
                    
                    <optgroup label="Roles Ministeriales">
                        <option value="pastor_principal" {{ old('church_role') == 'pastor_principal' ? 'selected' : '' }}>Pastor Principal</option>
                        <option value="pastor_asociado" {{ old('church_role') == 'pastor_asociado' ? 'selected' : '' }}>Pastor Asociado</option>
                        <option value="evangelista" {{ old('church_role') == 'evangelista' ? 'selected' : '' }}>Evangelista</option>
                    </optgroup>
                    
                    <optgroup label="Junta Local">
                        <option value="secretario" {{ old('church_role') == 'secretario' ? 'selected' : '' }}>Secretario</option>
                        <option value="tesorero" {{ old('church_role') == 'tesorero' ? 'selected' : '' }}>Tesorero</option>
                        <option value="miembro_junta" {{ old('church_role') == 'miembro_junta' ? 'selected' : '' }}>Miembro de Junta</option>
                    </optgroup>
                    
                    <optgroup label="Comité Damas Dorcas">
                        <option value="presidenta_dorcas" {{ old('church_role') == 'presidenta_dorcas' ? 'selected' : '' }}>Presidenta</option>
                        <option value="vicepresidenta_dorcas" {{ old('church_role') == 'vicepresidenta_dorcas' ? 'selected' : '' }}>Vicepresidenta</option>
                        <option value="secretaria_dorcas" {{ old('church_role') == 'secretaria_dorcas' ? 'selected' : '' }}>Secretaria</option>
                        <option value="tesorera_dorcas" {{ old('church_role') == 'tesorera_dorcas' ? 'selected' : '' }}>Tesorera</option>
                    </optgroup>
                    
                    <optgroup label="Comité Jóvenes">
                        <option value="presidente_jovenes" {{ old('church_role') == 'presidente_jovenes' ? 'selected' : '' }}>Presidente</option>
                        <option value="vicepresidente_jovenes" {{ old('church_role') == 'vicepresidente_jovenes' ? 'selected' : '' }}>Vicepresidente</option>
                        <option value="secretario_jovenes" {{ old('church_role') == 'secretario_jovenes' ? 'selected' : '' }}>Secretario</option>
                        <option value="tesorero_jovenes" {{ old('church_role') == 'tesorero_jovenes' ? 'selected' : '' }}>Tesorero</option>
                    </optgroup>
                    
                    <optgroup label="Escuela Dominical">
                        <option value="director_escuela_dominical" {{ old('church_role') == 'director_escuela_dominical' ? 'selected' : '' }}>Director</option>
                        <option value="subdirector_escuela_dominical" {{ old('church_role') == 'subdirector_escuela_dominical' ? 'selected' : '' }}>Subdirector</option>
                        <option value="secretario_escuela_dominical" {{ old('church_role') == 'secretario_escuela_dominical' ? 'selected' : '' }}>Secretario</option>
                    </optgroup>
                    
                    <optgroup label="Otros Roles">
                        <option value="líder" {{ old('church_role') == 'líder' ? 'selected' : '' }}>Líder</option>
                        <option value="diácono" {{ old('church_role') == 'diácono' ? 'selected' : '' }}>Diácono</option>
                        <option value="miembro" {{ old('church_role') == 'miembro' ? 'selected' : '' }}>Miembro</option>
                        <option value="visitante" {{ old('church_role') == 'visitante' ? 'selected' : '' }}>Visitante</option>
                    </optgroup>
                </select>
            </div>

            <div>
                <label for="join_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha de Ingreso *</label>
                <input type="date" id="join_date" name="join_date" value="{{ old('join_date') }}" required
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado</label>
                <select id="status" name="status"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
                    <option value="activo" {{ old('status', 'activo') == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ old('status') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="flex items-center">
                    <input type="checkbox" name="is_baptized" value="1" {{ old('is_baptized') ? 'checked' : '' }}
                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">¿Está bautizado?</span>
                </label>
            </div>

            <div class="md:col-span-2">
                <label class="flex items-center">
                    <input type="checkbox" name="is_sealed" value="1" {{ old('is_sealed') ? 'checked' : '' }}
                           class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">¿Está sellado con el Espíritu Santo?</span>
                </label>
            </div>

            <div class="md:col-span-2">
                <label for="friend_relation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Amigo o Relación que lo Invitó</label>
                <input type="text" id="friend_relation" name="friend_relation" value="{{ old('friend_relation') }}"
                       class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            </div>
        </div>

        <div class="mt-6 flex justify-end space-x-3">
            <a href="{{ route('members.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                Cancelar
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                Guardar Miembro
            </button>
        </div>
    </form>
</div>

<script>
    const ministryRoles = {
        'damas_dorcas': [
            {value: '', text: 'Sin rol específico'},
            {value: 'presidenta', text: 'Presidenta'},
            {value: 'vicepresidenta', text: 'Vicepresidenta'},
            {value: 'secretaria', text: 'Secretaria'},
            {value: 'tesorera', text: 'Tesorera'},
        ],
        'jóvenes': [
            {value: '', text: 'Sin rol específico'},
            {value: 'presidente', text: 'Presidente'},
            {value: 'vicepresidente', text: 'Vicepresidente'},
            {value: 'secretario', text: 'Secretario'},
            {value: 'tesorero', text: 'Tesorero'},
        ],
        'escuela_dominical': [
            {value: '', text: 'Sin rol específico'},
            {value: 'director', text: 'Director'},
            {value: 'subdirector', text: 'Subdirector'},
            {value: 'secretario', text: 'Secretario'},
            {value: 'maestro', text: 'Maestro'},
        ],
        'alabanza': [
            {value: '', text: 'Sin rol específico'},
            {value: 'director', text: 'Director'},
            {value: 'vocalista', text: 'Vocalista'},
            {value: 'músico', text: 'Músico'},
        ],
        'líderes': [
            {value: '', text: 'Sin rol específico'},
            {value: 'coordinador', text: 'Coordinador'},
            {value: 'asistente', text: 'Asistente'},
        ],
        'intercesión': [
            {value: '', text: 'Sin rol específico'},
            {value: 'coordinador', text: 'Coordinador'},
            {value: 'intercesor', text: 'Intercesor'},
        ],
        'ujieres': [
            {value: '', text: 'Sin rol específico'},
            {value: 'coordinador', text: 'Coordinador'},
            {value: 'ujier', text: 'Ujier'},
        ],
        'diaconía': [
            {value: '', text: 'Sin rol específico'},
            {value: 'coordinador', text: 'Coordinador'},
            {value: 'diácono', text: 'Diácono'},
        ],
        'multimedia': [
            {value: '', text: 'Sin rol específico'},
            {value: 'coordinador', text: 'Coordinador'},
            {value: 'técnico', text: 'Técnico'},
        ],
        'evangelismo': [
            {value: '', text: 'Sin rol específico'},
            {value: 'coordinador', text: 'Coordinador'},
            {value: 'evangelista', text: 'Evangelista'},
        ],
        'niños': [
            {value: '', text: 'Sin rol específico'},
            {value: 'coordinador', text: 'Coordinador'},
            {value: 'maestro', text: 'Maestro'},
        ],
    };

    function updateMinistryRoles() {
        const ministrySelect = document.getElementById('ministry');
        const roleContainer = document.getElementById('ministry_role_container');
        const roleSelect = document.getElementById('ministry_role');
        const selectedMinistry = ministrySelect.value;

        // Limpiar opciones actuales
        roleSelect.innerHTML = '';

        if (selectedMinistry && selectedMinistry !== 'ninguno' && ministryRoles[selectedMinistry]) {
            // Mostrar el contenedor
            roleContainer.style.display = 'block';
            
            // Agregar opciones
            ministryRoles[selectedMinistry].forEach(role => {
                const option = document.createElement('option');
                option.value = role.value;
                option.textContent = role.text;
                roleSelect.appendChild(option);
            });

            // Restaurar valor anterior si existe
            const oldValue = '{{ old("ministry_role") }}';
            if (oldValue) {
                roleSelect.value = oldValue;
            }
        } else {
            // Ocultar el contenedor si no hay roles o es "ninguno"
            roleContainer.style.display = 'none';
            roleSelect.value = '';
        }
    }

    // Ejecutar al cargar la página si hay un ministerio seleccionado
    document.addEventListener('DOMContentLoaded', function() {
        const ministrySelect = document.getElementById('ministry');
        if (ministrySelect.value) {
            updateMinistryRoles();
        }
    });
</script>
@endsection
