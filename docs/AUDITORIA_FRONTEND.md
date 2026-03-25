# Auditoría Frontend y Calidad - FlockTrak Hub

Fecha: 24 de marzo de 2026

## 1. Introducción
Análisis a fondo del proyecto Laravel + Blade + Tailwind en `c:/iglesia-2/flocktrak-hub-church`.

Objetivos:
- Revisar responsive design
- Revisión de textos, consistencia y ortografía
- Coherencia UI/UX
- Código duplicado / no utilizado
- Problemas de calidad / mal prácticas

## 2. Resultados generales

### 🔴 Problemas críticos
1. **Doble función `toggleMobileMenu()`** en `resources/views/layouts/app.blade.php` (bloque de scripts a fin de archivo). Causa comportamiento impredecible del menú en mobile.
2. **Modal export duplicado** con mismo `id="exportModal"` en `app.blade.php` y `members/index.blade.php`, provoca conflicto DOM y falla en manipuladores de modal.
3. **Duplicación extra de lógica JS** (`ministryRoles` y `updateMinistryRoles`) en `members/create.blade.php` y `members/edit.blade.php`.
4. **Formularios de miembros casi idénticos** (create + edit) sin partial/component central; alto riesgo de inconsistencias.

### 🟡 Problemas medios
1. `members/index.blade.php`: filtro en layout lineal `flex gap-3 flex-wrap` sin `items-end`, podría causar visuales desalineados en tablets (md).
2. Sidebar + main en `app.blade.php`: `main` debería incluir `overflow-auto`, mantener padding margen en todas resoluciones.
3. Textos inconsistentes alrededor de brand name:
   - `FlockTrak Hub` (sidebar)
   - `IPUC - AL` (title base)
   - `IPUC - Avenida Libertadores` (sidebar subtítulo)
4. Nombres de ministerios y roles en HTML hay mix de tildes (`diaconía`, `jóvenes`) y `snake_case` variable; indicar estandarización.

### 🟢 Mejoras recomendadas
1. Extraer componente `members/form` para reuse.
2. Extraer `export-modal` a `resources/views/components/export-modal.blade.php` y usar `@include`.
3. Cambiar JS duplicado a archivo `public/js/members.ministry.js` y referenciar con `<script src="..."></script>`.
4. Configuración central en `config/members.php` de ministerios/roles para evitar comentarios hardcode duplicate.
5. Accesibilidad: `role="dialog"`, `aria-modal="true"`, `aria-expanded` en menu mobile, `aria-label` en botones.

## 3. Evidencia y ubicación de archivos
- `resources/views/layouts/app.blade.php`
  - Doble `toggleMobileMenu()`
  - Modal export duplicado
  - Sidebar con nombres hardcode
- `resources/views/members/index.blade.php`
  - Modal export + JS de autenticación
  - Estructura de tabla móvil vs desktop (`.hidden md:block`, `.md:hidden`)
- `resources/views/members/create.blade.php` y `edit.blade.php`
  - Campos alineados 1/2 md con clases consistentes, pero duplicación de script
  - Necesidad de setear estados iniciales, roles dinámicos
- `resources/views/reports/index.blade.php`
  - Dashboard/estadísticas buen uso de grid breakpoints, soporte responsive sólido

## 4. Recomendaciones concretas de código

### 4.1 `app.blade.php` (fix de menú + modal)
- Eliminar función duplicada `toggleMobileMenu()` al final.
- Asegurar `main`:
```html
<main class="flex-1 w-full lg:ml-64 pt-14 lg:pt-0 min-h-screen overflow-auto">
```
- Reemplazar modal hardcoded en layout y eliminar de `members/index`.

### 4.2 `members/index.blade.php` (tablas responsive)
- Mantener wrapper:
```html
<div class="overflow-x-auto">
    <table class="min-w-full ...">
```
- Tarjetas móviles: `class="md:hidden space-y-4 px-2"`.

### 4.3 `members/create` + `edit`
- Extracto:
```blade
@include('members.partials.form', ['member' => $member ?? null])
```
- JS unificado en app bundle:
`public/js/members.ministry.js`.

### 4.4 Textos y naming
- Archivo de config `config/app.php`:
```php
'church_name' => env('APP_CHURCH_NAME', 'IPUC - Avenida Libertadores'),
```
- en `app.blade.php`:
`<p class="...">{{ config('app.church_name') }}</p>`

### 4.5 Calidad
- Agregar pruebas feature para `/members`, `/dashboard`, `/reports`.
- Eliminar archivos no importados (sin rutas ni vistas): no se hallaron archivos obvios, pero revisar con `git ls-files` para detectar `*.blade.php` no referenciados.

## 5. Notas de estado
- No hay rutas huérfanas (usar `routes/web.php` minimal).
- No hay componentes Livewire ni Vue; todo es Blade + Tailwind a partir de los archivos analizados.
- No se requiere migraciones para frontend.

## 6. Conclusión
✅ Base sólida con un buen patrón de componentes y responsive.  
⚠️ Principal fix: DOM conflict de modal y duplicación de JS, no afecta lógica backend pero sí UX crítico.
✅ Siguiente paso: implementar refactor en componentes y limpieza de scripts, luego validar con prueba manual en mobile usando emulador.
