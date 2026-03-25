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
    
    if (!ministrySelect || !roleContainer || !roleSelect) return;
    
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

        // Restaurar valor anterior si existe (desde data-old-value seteado por Blade)
        const oldValue = roleSelect.getAttribute('data-old-value');
        if (oldValue) {
            roleSelect.value = oldValue;
            // Limpiar el atributo para que no interfiera en cambios manuales después
            // (Opcional, pero útil si se quiere evitar persistencia no deseada)
        }
    } else {
        // Ocultar el contenedor si no hay roles o es "ninguno"
        roleContainer.style.display = 'none';
        roleSelect.value = '';
    }
}

// Ejecutar al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    const ministrySelect = document.getElementById('ministry');
    if (ministrySelect && ministrySelect.value) {
        updateMinistryRoles();
    }
});
