# 📄 Especificación de Requisitos de Software (IEEE 830)

## Sistema de Gestión de Miembros - IPUC San Rafael

**Versión:** 1.0  
**Fecha:** Enero 2026  
**Proyecto:** FlockTrak Hub

---

## 1. Introducción

### 1.1 Propósito

Este documento especifica los requisitos de software para el Sistema de Gestión de Miembros de la Iglesia Pentecostal Unida de Colombia (IPUC) – Sede San Rafael. El sistema permite administrar información de los integrantes de la congregación, generar estadísticas y facilitar la toma de decisiones administrativas.

### 1.2 Alcance

El sistema **FlockTrak Hub** es una aplicación web que permite:

- Registrar y gestionar información de miembros de la iglesia
- Categorizar miembros por ministerios, roles y estados
- Generar reportes y estadísticas demográficas
- Exportar datos en formatos estándar
- Administrar usuarios con diferentes niveles de acceso

### 1.3 Definiciones, Acrónimos y Abreviaturas

| Término | Definición |
|---------|------------|
| IPUC | Iglesia Pentecostal Unida de Colombia |
| Miembro | Persona registrada en la congregación |
| Ministerio | Grupo de servicio dentro de la iglesia |
| RLS | Row Level Security (Seguridad a nivel de fila) |
| CRUD | Create, Read, Update, Delete |
| SRS | Software Requirements Specification |

### 1.4 Referencias

- IEEE Std 830-1998: Práctica Recomendada para Especificaciones de Requisitos de Software
- Documentación interna IPUC San Rafael
- Manual de procedimientos administrativos de la iglesia

### 1.5 Visión General del Documento

Este documento se organiza en secciones que describen la descripción general del sistema, los requisitos específicos y los apéndices correspondientes.

---

## 2. Descripción General

### 2.1 Perspectiva del Producto

FlockTrak Hub es un sistema independiente basado en web que reemplaza los registros manuales y hojas de cálculo utilizados actualmente para gestionar la información de los miembros de la iglesia.

```
┌─────────────────────────────────────────────────────────┐
│                    FlockTrak Hub                        │
├─────────────────────────────────────────────────────────┤
│  ┌───────────┐  ┌───────────┐  ┌───────────────────┐   │
│  │ Dashboard │  │ Miembros  │  │    Reportes       │   │
│  │           │  │  (CRUD)   │  │  (Estadísticas)   │   │
│  └───────────┘  └───────────┘  └───────────────────┘   │
├─────────────────────────────────────────────────────────┤
│                  Base de Datos                          │
│              (Lovable Cloud/Supabase)                   │
└─────────────────────────────────────────────────────────┘
```

### 2.2 Funciones del Producto

| Función | Descripción |
|---------|-------------|
| Gestión de Miembros | CRUD completo de información de integrantes |
| Dashboard Analítico | Visualización de estadísticas en tiempo real |
| Filtrado y Búsqueda | Localización rápida de miembros por criterios |
| Exportación de Datos | Generación de archivos CSV |
| Control de Acceso | Gestión de roles y permisos |
| Reportes | Generación de informes administrativos |

### 2.3 Características de los Usuarios

| Tipo de Usuario | Descripción | Nivel Técnico |
|-----------------|-------------|---------------|
| Administrador | Acceso total al sistema | Medio |
| Secretario | Gestión de miembros y reportes | Básico |
| Líder | Consulta de información de su ministerio | Básico |

### 2.4 Restricciones

- El sistema debe funcionar en navegadores web modernos (Chrome, Firefox, Safari, Edge)
- Debe ser responsive y funcionar en dispositivos móviles
- Los datos sensibles deben estar protegidos
- Requiere conexión a internet para funcionar

### 2.5 Suposiciones y Dependencias

- Los usuarios tienen acceso a dispositivos con navegador web
- Existe conexión a internet estable
- Los datos de miembros se proporcionan de forma veraz

---

## 3. Requisitos Específicos

### 3.1 Requisitos Funcionales

#### RF-001: Registro de Miembros
| ID | RF-001 |
|----|--------|
| **Nombre** | Registro de nuevo miembro |
| **Descripción** | El sistema debe permitir registrar nuevos miembros con toda su información personal, demográfica y eclesiástica |
| **Entrada** | Datos del formulario de registro |
| **Proceso** | Validar datos, calcular edad automáticamente, asignar rango de edad |
| **Salida** | Miembro registrado en el sistema |
| **Prioridad** | Alta |

#### RF-002: Edición de Miembros
| ID | RF-002 |
|----|--------|
| **Nombre** | Modificación de información de miembro |
| **Descripción** | El sistema debe permitir actualizar la información de miembros existentes |
| **Entrada** | Datos actualizados del formulario |
| **Proceso** | Validar datos, recalcular campos automáticos |
| **Salida** | Información actualizada |
| **Prioridad** | Alta |

#### RF-003: Eliminación de Miembros
| ID | RF-003 |
|----|--------|
| **Nombre** | Eliminación de registro de miembro |
| **Descripción** | El sistema debe permitir eliminar miembros con confirmación previa |
| **Entrada** | ID del miembro a eliminar |
| **Proceso** | Mostrar confirmación, eliminar registro |
| **Salida** | Registro eliminado del sistema |
| **Prioridad** | Alta |

#### RF-004: Búsqueda y Filtrado
| ID | RF-004 |
|----|--------|
| **Nombre** | Búsqueda y filtrado de miembros |
| **Descripción** | El sistema debe permitir buscar por nombre/documento y filtrar por múltiples criterios |
| **Entrada** | Criterios de búsqueda/filtrado |
| **Proceso** | Aplicar filtros a la lista de miembros |
| **Salida** | Lista filtrada de miembros |
| **Prioridad** | Alta |

#### RF-005: Dashboard Estadístico
| ID | RF-005 |
|----|--------|
| **Nombre** | Visualización de estadísticas |
| **Descripción** | El sistema debe mostrar gráficos de distribución por edad, género y ministerio |
| **Entrada** | Datos de miembros registrados |
| **Proceso** | Calcular estadísticas y generar gráficos |
| **Salida** | Dashboard con gráficos interactivos |
| **Prioridad** | Media |

#### RF-006: Exportación CSV
| ID | RF-006 |
|----|--------|
| **Nombre** | Exportación de datos a CSV |
| **Descripción** | El sistema debe permitir exportar la lista de miembros en formato CSV |
| **Entrada** | Solicitud de exportación |
| **Proceso** | Generar archivo CSV con todos los campos |
| **Salida** | Archivo CSV descargable |
| **Prioridad** | Media |

#### RF-007: Control de Acceso
| ID | RF-007 |
|----|--------|
| **Nombre** | Autenticación y autorización |
| **Descripción** | El sistema debe controlar el acceso mediante roles (Administrador, Secretario, Líder) |
| **Entrada** | Credenciales de usuario |
| **Proceso** | Validar credenciales y asignar permisos |
| **Salida** | Acceso según rol asignado |
| **Prioridad** | Alta |

### 3.2 Requisitos No Funcionales

#### RNF-001: Usabilidad
- La interfaz debe ser intuitiva y fácil de usar
- El tiempo de aprendizaje no debe superar 30 minutos
- Debe incluir mensajes de confirmación y error claros

#### RNF-002: Rendimiento
- El tiempo de carga inicial no debe superar 3 segundos
- Las búsquedas deben responder en menos de 1 segundo
- El sistema debe soportar al menos 1000 registros sin degradación

#### RNF-003: Disponibilidad
- El sistema debe estar disponible 99% del tiempo
- Debe funcionar en modo offline para consultas básicas (futuro)

#### RNF-004: Seguridad
- Las contraseñas deben estar encriptadas
- Los datos sensibles deben estar protegidos
- Debe implementar políticas RLS en la base de datos

#### RNF-005: Compatibilidad
- Compatible con Chrome 90+, Firefox 88+, Safari 14+, Edge 90+
- Responsive para pantallas desde 320px hasta 2560px
- Soporte para dispositivos táctiles

#### RNF-006: Mantenibilidad
- Código modular y bien documentado
- Uso de componentes reutilizables
- Seguimiento de estándares de codificación

### 3.3 Requisitos de Interfaz

#### Interfaz de Usuario
- Diseño limpio con paleta de colores institucional
- Navegación lateral (sidebar) con iconos descriptivos
- Tablas con paginación y ordenamiento
- Formularios con validación en tiempo real
- Gráficos interactivos para estadísticas

#### Interfaz de Hardware
- Dispositivos con navegador web moderno
- Pantalla mínima: 320px de ancho
- Conexión a internet

#### Interfaz de Software
- Frontend: React + TypeScript + Tailwind CSS
- Backend: Lovable Cloud (Supabase)
- Gráficos: Recharts
- Formularios: React Hook Form + Zod

---

## 4. Apéndices

### Apéndice A: Modelo de Datos

Ver documento `DATABASE.md` para estructura completa de la base de datos.

### Apéndice B: Mockups de Interfaz

Las interfaces principales incluyen:
1. Dashboard con tarjetas estadísticas y gráficos
2. Lista de miembros con tabla y filtros
3. Formulario de registro/edición de miembros
4. Panel de configuración

### Apéndice C: Casos de Uso

Ver documento `USER_STORIES.md` para historias de usuario detalladas.

---

## 5. Historial de Revisiones

| Versión | Fecha | Autor | Descripción |
|---------|-------|-------|-------------|
| 1.0 | Enero 2026 | Equipo de Desarrollo | Versión inicial |

---

*Documento generado según estándar IEEE 830-1998*  
*Sistema de Gestión de Miembros - IPUC San Rafael*
