# 📖 Historias de Usuario

## Sistema de Gestión de Miembros - IPUC San Rafael

**Versión:** 1.0  
**Fecha:** Enero 2026

---

## 📋 Índice de Historias

| ID | Épica | Historia | Prioridad |
|----|-------|----------|-----------|
| HU-001 | Gestión de Miembros | Registrar nuevo miembro | Alta |
| HU-002 | Gestión de Miembros | Editar información de miembro | Alta |
| HU-003 | Gestión de Miembros | Eliminar miembro | Alta |
| HU-004 | Gestión de Miembros | Buscar miembros | Alta |
| HU-005 | Gestión de Miembros | Filtrar miembros | Media |
| HU-006 | Dashboard | Ver estadísticas generales | Media |
| HU-007 | Dashboard | Ver distribución por edad | Media |
| HU-008 | Dashboard | Ver distribución por género | Media |
| HU-009 | Dashboard | Ver miembros por ministerio | Media |
| HU-010 | Reportes | Exportar lista a CSV | Media |
| HU-011 | Administración | Gestionar roles de usuario | Alta |
| HU-012 | Autenticación | Iniciar sesión | Alta |
| HU-013 | Autenticación | Cerrar sesión | Alta |
| HU-014 | Configuración | Personalizar sistema | Baja |

---

## 🎯 Épica 1: Gestión de Miembros

### HU-001: Registrar Nuevo Miembro

**Como** secretario de la iglesia  
**Quiero** poder registrar nuevos miembros en el sistema  
**Para** mantener actualizado el registro de la congregación

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | El formulario debe incluir todos los campos requeridos (nombre, documento, fecha de nacimiento, etc.) | ✅ |
| 2 | La edad debe calcularse automáticamente a partir de la fecha de nacimiento | ✅ |
| 3 | El rango de edad debe asignarse automáticamente según la edad | ✅ |
| 4 | El documento de identidad debe ser único | ✅ |
| 5 | Debe mostrarse un mensaje de confirmación al guardar | ✅ |
| 6 | Los campos obligatorios deben estar marcados visualmente | ✅ |

#### Datos de Prueba

```
Nombre: Juan Pérez García
Documento: 1234567890
Fecha Nacimiento: 1990-05-15
Género: Masculino
Estado Civil: Casado
Ministerio: Alabanza
Rol: Miembro
```

---

### HU-002: Editar Información de Miembro

**Como** secretario de la iglesia  
**Quiero** poder modificar la información de un miembro existente  
**Para** corregir errores o actualizar datos que han cambiado

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Al hacer clic en "Editar", debe abrirse el formulario con los datos actuales | ✅ |
| 2 | Todos los campos deben ser editables | ✅ |
| 3 | La fecha de actualización debe registrarse automáticamente | ✅ |
| 4 | Debe mostrarse confirmación de cambios guardados | ✅ |
| 5 | Los cambios deben reflejarse inmediatamente en la tabla | ✅ |

---

### HU-003: Eliminar Miembro

**Como** administrador del sistema  
**Quiero** poder eliminar el registro de un miembro  
**Para** mantener la base de datos limpia y actualizada

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe mostrarse un diálogo de confirmación antes de eliminar | ✅ |
| 2 | El diálogo debe mostrar el nombre del miembro a eliminar | ✅ |
| 3 | Debe existir opción de cancelar la eliminación | ✅ |
| 4 | El miembro debe desaparecer de la lista al confirmar | ✅ |
| 5 | Debe mostrarse mensaje de éxito tras la eliminación | ✅ |

---

### HU-004: Buscar Miembros

**Como** usuario del sistema  
**Quiero** poder buscar miembros por nombre o documento  
**Para** encontrar rápidamente a una persona específica

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | La búsqueda debe funcionar por nombre completo o parcial | ✅ |
| 2 | La búsqueda debe funcionar por número de documento | ✅ |
| 3 | Los resultados deben actualizarse en tiempo real al escribir | ✅ |
| 4 | Si no hay resultados, debe mostrarse un mensaje apropiado | ✅ |
| 5 | La búsqueda no debe distinguir mayúsculas/minúsculas | ✅ |

---

### HU-005: Filtrar Miembros

**Como** líder de ministerio  
**Quiero** poder filtrar la lista de miembros por diferentes criterios  
**Para** ver solo los miembros que me interesan

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe poder filtrarse por rango de edad | ✅ |
| 2 | Debe poder filtrarse por género | ✅ |
| 3 | Debe poder filtrarse por ministerio | ✅ |
| 4 | Debe poder filtrarse por estado (activo/inactivo) | ✅ |
| 5 | Los filtros deben poder combinarse | ✅ |
| 6 | Debe existir opción para limpiar todos los filtros | ✅ |

---

## 📊 Épica 2: Dashboard Analítico

### HU-006: Ver Estadísticas Generales

**Como** pastor de la iglesia  
**Quiero** ver un resumen estadístico de la congregación  
**Para** conocer el estado actual de la membresía

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe mostrarse el total de miembros registrados | ✅ |
| 2 | Debe mostrarse el número de miembros activos | ✅ |
| 3 | Debe mostrarse el número de miembros bautizados | ✅ |
| 4 | Debe mostrarse el número de miembros sellados | ✅ |
| 5 | Las estadísticas deben actualizarse en tiempo real | ✅ |

---

### HU-007: Ver Distribución por Edad

**Como** líder de jóvenes  
**Quiero** ver un gráfico de distribución por rangos de edad  
**Para** planificar actividades según la demografía

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe mostrarse un gráfico de torta/pastel | ✅ |
| 2 | Debe incluir categorías: Niños, Jóvenes, Adultos, Adultos Mayores | ✅ |
| 3 | Debe mostrar el porcentaje de cada categoría | ✅ |
| 4 | El gráfico debe ser interactivo (hover para ver detalles) | ✅ |

---

### HU-008: Ver Distribución por Género

**Como** administrador  
**Quiero** ver la distribución de miembros por género  
**Para** entender la composición demográfica

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe mostrarse un gráfico con distribución masculino/femenino | ✅ |
| 2 | Debe mostrar cantidades y porcentajes | ✅ |
| 3 | Los colores deben ser distinguibles | ✅ |

---

### HU-009: Ver Miembros por Ministerio

**Como** pastor  
**Quiero** ver cuántos miembros hay en cada ministerio  
**Para** evaluar la participación en los diferentes grupos

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe mostrarse un gráfico de barras | ✅ |
| 2 | Debe incluir todos los ministerios disponibles | ✅ |
| 3 | Debe ordenarse de mayor a menor participación | ✅ |
| 4 | Debe mostrar el número exacto de miembros por ministerio | ✅ |

---

## 📤 Épica 3: Reportes

### HU-010: Exportar Lista a CSV

**Como** secretario  
**Quiero** exportar la lista de miembros a un archivo CSV  
**Para** tener un respaldo o compartir con otras aplicaciones

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe existir un botón "Exportar CSV" visible | ✅ |
| 2 | El archivo debe incluir todas las columnas de la tabla | ✅ |
| 3 | El archivo debe descargarse automáticamente | ✅ |
| 4 | El nombre del archivo debe incluir la fecha | ✅ |
| 5 | Los datos deben exportarse respetando los filtros aplicados | ⏳ |

---

## 🔐 Épica 4: Autenticación y Autorización

### HU-011: Gestionar Roles de Usuario

**Como** administrador  
**Quiero** poder asignar roles a los usuarios del sistema  
**Para** controlar quién puede hacer qué acciones

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe existir panel de administración de usuarios | ⏳ |
| 2 | Debe poder asignarse rol: Administrador, Secretario, Líder | ⏳ |
| 3 | Los permisos deben aplicarse según el rol | ⏳ |
| 4 | Solo administradores pueden gestionar otros usuarios | ⏳ |

---

### HU-012: Iniciar Sesión

**Como** usuario registrado  
**Quiero** poder iniciar sesión con mis credenciales  
**Para** acceder al sistema de forma segura

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe existir formulario de inicio de sesión | ⏳ |
| 2 | Debe validarse email y contraseña | ⏳ |
| 3 | Debe mostrarse error si las credenciales son incorrectas | ⏳ |
| 4 | Debe redirigir al dashboard tras inicio exitoso | ⏳ |

---

### HU-013: Cerrar Sesión

**Como** usuario autenticado  
**Quiero** poder cerrar mi sesión  
**Para** proteger mi cuenta cuando no esté usando el sistema

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe existir botón de cerrar sesión visible | ⏳ |
| 2 | Al cerrar sesión debe redirigir a página de login | ⏳ |
| 3 | La sesión debe invalidarse correctamente | ⏳ |

---

## ⚙️ Épica 5: Configuración

### HU-014: Personalizar Sistema

**Como** administrador  
**Quiero** poder personalizar aspectos del sistema  
**Para** adaptarlo a las necesidades de la iglesia

#### Criterios de Aceptación

| # | Criterio | Estado |
|---|----------|--------|
| 1 | Debe poder configurarse el nombre de la iglesia | ⏳ |
| 2 | Debe poder agregarse/editarse ministerios | ⏳ |
| 3 | Debe poder personalizarse el tema visual | ⏳ |

---

## 📈 Resumen de Estado

| Estado | Cantidad | Porcentaje |
|--------|----------|------------|
| ✅ Completado | 32 criterios | ~75% |
| ⏳ Pendiente | 11 criterios | ~25% |

---

## 🗓️ Roadmap Sugerido

### Sprint 1 (Completado)
- ✅ HU-001 a HU-005: Gestión básica de miembros
- ✅ HU-006 a HU-009: Dashboard analítico

### Sprint 2 (En progreso)
- ⏳ HU-010: Exportación mejorada con filtros
- ⏳ HU-012, HU-013: Autenticación

### Sprint 3 (Planificado)
- ⏳ HU-011: Gestión de roles
- ⏳ HU-014: Configuración personalizable

---

*Documento de Historias de Usuario*  
*Sistema de Gestión de Miembros - IPUC San Rafael*
