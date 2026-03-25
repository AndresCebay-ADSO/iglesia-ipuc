@php
    $member = $member ?? null;
    $birthDate = old('birth_date', optional($member)->birth_date ? optional($member)->birth_date->format('Y-m-d') : '');
    $joinDate = old('join_date', optional($member)->join_date ? optional($member)->join_date->format('Y-m-d') : '');
    $statusValue = old('status', $member->status ?? 'activo');
    $isBaptized = old('is_baptized', $member->is_baptized ?? false);
    $isSealed = old('is_sealed', $member->is_sealed ?? false);
    $selectedMinistry = old('ministry', $member->ministry ?? '');
    $selectedRole = old('ministry_role', $member->ministry_role ?? '');
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <!-- Información Personal -->
    <div class="md:col-span-2">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Información Personal</h2>
    </div>

    <div>
        <label for="fullname" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre Completo *</label>
        <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $member->fullname ?? '') }}" required
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
    </div>

    <div>
        <label for="document_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Documento de Identidad *</label>
        <input type="text" id="document_id" name="document_id" value="{{ old('document_id', $member->document_id ?? '') }}" required
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
    </div>

    <div>
        <label for="birth_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha de Nacimiento *</label>
        <input type="date" id="birth_date" name="birth_date" value="{{ $birthDate }}" required
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
    </div>

    <div>
        <label for="gender" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Género *</label>
        <select id="gender" name="gender" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            <option value="">Seleccione...</option>
            @foreach(config('church.genders') as $value => $label)
                <option value="{{ $value }}" {{ old('gender', $member->gender ?? '') == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="marital_status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado Civil *</label>
        <select id="marital_status" name="marital_status" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            <option value="">Seleccione...</option>
            @foreach(config('church.marital_status') as $value => $label)
                <option value="{{ $value }}" {{ old('marital_status', $member->marital_status ?? '') == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Teléfono *</label>
        <input type="text" id="phone" name="phone" value="{{ old('phone', $member->phone ?? '') }}" required
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
    </div>

    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Correo Electrónico</label>
        <input type="email" id="email" name="email" value="{{ old('email', $member->email ?? '') }}"
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
    </div>

    <div>
        <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Dirección</label>
        <input type="text" id="address" name="address" value="{{ old('address', $member->address ?? '') }}"
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
    </div>

    <div>
        <label for="neighborhood" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Barrio</label>
        <input type="text" id="neighborhood" name="neighborhood" value="{{ old('neighborhood', $member->neighborhood ?? '') }}"
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
    </div>

    <!-- Información Eclesiástica -->
    <div class="md:col-span-2 mt-4">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Información Eclesiástica</h2>
    </div>

    <div>
        <label for="ministry" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ministerio *</label>
        <select id="ministry" name="ministry" required onchange="updateMinistryRoles()"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            <option value="">Seleccione un ministerio...</option>
            @foreach(config('church.ministries') as $value => $label)
                <option value="{{ $value }}" {{ $selectedMinistry == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div id="ministry_role_container" style="display: none;">
        <label for="ministry_role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Rol en el Ministerio</label>
        <select id="ministry_role" name="ministry_role" data-old-value="{{ $selectedRole }}"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            <option value="">Sin rol específico</option>
        </select>
    </div>

    <div>
        <label for="church_role" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Rol en la Iglesia *</label>
        <select id="church_role" name="church_role" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            <option value="">Seleccione un rol...</option>

            @foreach(config('church.role_groups') as $group => $roles)
                <optgroup label="{{ $group }}">
                    @foreach($roles as $roleKey)
                        @php $label = config("church.roles.$roleKey", ucfirst($roleKey)); @endphp
                        <option value="{{ $roleKey }}" {{ old('church_role', $member->church_role ?? '') == $roleKey ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>
    </div>

    <div>
        <label for="join_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Fecha de Ingreso *</label>
        <input type="date" id="join_date" name="join_date" value="{{ $joinDate }}" required
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
    </div>

    <div>
        <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Estado</label>
        <select id="status" name="status" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
            <option value="activo" {{ $statusValue == 'activo' ? 'selected' : '' }}>Activo</option>
            <option value="inactivo" {{ $statusValue == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
        </select>
    </div>

    <div class="md:col-span-2">
        <label class="flex items-center">
            <input type="checkbox" name="is_baptized" value="1" {{ $isBaptized ? 'checked' : '' }}
                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">¿Está bautizado?</span>
        </label>
    </div>

    <div class="md:col-span-2">
        <label class="flex items-center">
            <input type="checkbox" name="is_sealed" value="1" {{ $isSealed ? 'checked' : '' }}
                   class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">¿Está sellado con el Espíritu Santo?</span>
        </label>
    </div>

    <div class="md:col-span-2">
        <label for="friend_relation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Amigo o Relación que lo Invitó</label>
        <input type="text" id="friend_relation" name="friend_relation" value="{{ old('friend_relation', $member->friend_relation ?? '') }}"
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">
    </div>
</div>

<div class="mt-6 flex justify-end space-x-3">
    <a href="{{ route('members.index') }}" class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
        Cancelar
    </a>
    <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
        {{ isset($member) ? 'Actualizar Miembro' : 'Guardar Miembro' }}
    </button>
</div>
