# 📋 Levantamiento de Requisitos

## Sistema de Gestión de Miembros - IPUC San Rafael

**Versión:** 1.0  
**Fecha:** Enero 2026  
**Analista:** Equipo de Desarrollo

---

## 1. Información del Proyecto

### 1.1 Datos Generales

| Campo | Información |
|-------|-------------|
| **Nombre del Proyecto** | FlockTrak Hub |
| **Cliente** | IPUC San Rafael |
| **Tipo de Sistema** | Aplicación Web de Gestión |
| **Duración Estimada** | 8 semanas |
| **Metodología** | Ágil (Scrum) |

### 1.2 Stakeholders

| Rol | Nombre/Área | Responsabilidad |
|-----|-------------|-----------------|
| Product Owner | Pastor Principal | Define prioridades y acepta entregables |
| Usuario Final | Secretaría | Uso diario del sistema |
| Usuario Final | Líderes de Ministerio | Consulta de información |
| Equipo de Desarrollo | Lovable | Desarrollo e implementación |

---

## 2. Contexto del Negocio

### 2.1 Situación Actual (AS-IS)

**Problema identificado:**
La iglesia IPUC San Rafael gestiona actualmente la información de sus miembros mediante:

- 📝 Registros en papel
- 📊 Hojas de cálculo (Excel)
- 📱 Grupos de WhatsApp para comunicación

**Consecuencias:**
- ❌ Información duplicada y desactualizada
- ❌ Dificultad para generar reportes
- ❌ Pérdida de datos por falta de respaldos
- ❌ Acceso no controlado a información sensible
- ❌ Tiempo excesivo en tareas administrativas

### 2.2 Situación Deseada (TO-BE)

**Solución propuesta:**
Sistema web centralizado que permita:

- ✅ Registro único y verificado de miembros
- ✅ Acceso controlado por roles
- ✅ Generación automática de estadísticas
- ✅ Exportación de datos en múltiples formatos
- ✅ Respaldo automático en la nube
- ✅ Acceso desde cualquier dispositivo

---

## 3. Análisis de Requisitos

### 3.1 Requisitos del Negocio

| ID | Requisito | Prioridad | Justificación |
|----|-----------|-----------|---------------|
| RN-01 | Centralizar información de miembros | Alta | Eliminar duplicidad y pérdida de datos |
| RN-02 | Controlar acceso a información | Alta | Proteger datos sensibles |
| RN-03 | Generar reportes demográficos | Media | Facilitar toma de decisiones |
| RN-04 | Reducir tiempo administrativo | Media | Optimizar recursos humanos |
| RN-05 | Facilitar comunicación | Baja | Mejorar coordinación interna |

### 3.2 Requisitos de Usuario

#### 3.2.1 Perfil: Administrador

| ID | Como Administrador necesito... | Para... |
|----|-------------------------------|---------|
| RU-A01 | Gestionar todos los usuarios del sistema | Controlar quién accede a qué información |
| RU-A02 | Ver todas las estadísticas de la iglesia | Tomar decisiones estratégicas |
| RU-A03 | Configurar parámetros del sistema | Adaptar el sistema a necesidades específicas |
| RU-A04 | Exportar datos completos | Generar informes para la denominación |

#### 3.2.2 Perfil: Secretario

| ID | Como Secretario necesito... | Para... |
|----|----------------------------|---------|
| RU-S01 | Registrar nuevos miembros | Mantener actualizada la membresía |
| RU-S02 | Actualizar información de miembros | Corregir datos erróneos o desactualizados |
| RU-S03 | Buscar miembros rápidamente | Atender consultas inmediatas |
| RU-S04 | Generar listados filtrados | Enviar comunicaciones específicas |
| RU-S05 | Exportar datos a CSV | Compartir información con otras áreas |

#### 3.2.3 Perfil: Líder de Ministerio

| ID | Como Líder necesito... | Para... |
|----|------------------------|---------|
| RU-L01 | Ver miembros de mi ministerio | Conocer a quienes lidero |
| RU-L02 | Consultar información de contacto | Comunicarme con los miembros |
| RU-L03 | Ver estadísticas de mi grupo | Evaluar crecimiento del ministerio |

### 3.3 Requisitos Funcionales

```
┌─────────────────────────────────────────────────────────────────┐
│                    MÓDULOS DEL SISTEMA                          │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────────────┐  │
│  │   MIEMBROS   │  │  DASHBOARD   │  │     REPORTES         │  │
│  │              │  │              │  │                      │  │
│  │ • Crear      │  │ • Tarjetas   │  │ • Exportar CSV       │  │
│  │ • Leer       │  │ • Gráficos   │  │ • Imprimir           │  │
│  │ • Actualizar │  │ • KPIs       │  │ • Filtrar            │  │
│  │ • Eliminar   │  │              │  │                      │  │
│  └──────────────┘  └──────────────┘  └──────────────────────┘  │
│                                                                 │
│  ┌──────────────┐  ┌──────────────┐  ┌──────────────────────┐  │
│  │ AUTENTICACIÓN│  │    ADMIN     │  │   CONFIGURACIÓN      │  │
│  │              │  │              │  │                      │  │
│  │ • Login      │  │ • Usuarios   │  │ • Iglesia            │  │
│  │ • Logout     │  │ • Roles      │  │ • Ministerios        │  │
│  │ • Sesiones   │  │ • Permisos   │  │ • Tema               │  │
│  └──────────────┘  └──────────────┘  └──────────────────────┘  │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

### 3.4 Requisitos No Funcionales

| Categoría | Requisito | Métrica |
|-----------|-----------|---------|
| **Rendimiento** | Tiempo de carga | < 3 segundos |
| **Rendimiento** | Tiempo de respuesta | < 1 segundo |
| **Disponibilidad** | Uptime | 99% |
| **Escalabilidad** | Usuarios concurrentes | 50+ |
| **Escalabilidad** | Registros soportados | 10,000+ |
| **Seguridad** | Encriptación | HTTPS + bcrypt |
| **Seguridad** | Control de acceso | RLS + JWT |
| **Usabilidad** | Curva de aprendizaje | < 30 minutos |
| **Compatibilidad** | Navegadores | Chrome, Firefox, Safari, Edge |
| **Compatibilidad** | Dispositivos | Desktop, Tablet, Móvil |

---

## 4. Entidades de Datos

### 4.1 Modelo Conceptual

```
┌─────────────────┐       ┌─────────────────┐
│     MIEMBRO     │       │    MINISTERIO   │
├─────────────────┤       ├─────────────────┤
│ id              │       │ id              │
│ nombre          │  N:1  │ nombre          │
│ documento       │◄──────│ descripción     │
│ fecha_nacimiento│       └─────────────────┘
│ género          │
│ estado_civil    │       ┌─────────────────┐
│ teléfono        │       │      ROL        │
│ email           │       ├─────────────────┤
│ dirección       │  N:1  │ id              │
│ barrio          │◄──────│ nombre          │
│ bautizado       │       │ nivel_acceso    │
│ sellado         │       └─────────────────┘
│ fecha_ingreso   │
│ estado          │       ┌─────────────────┐
│ ministerio_id   │       │    USUARIO      │
│ rol_id          │       ├─────────────────┤
└─────────────────┘       │ id              │
                          │ email           │
                          │ password_hash   │
                          │ rol_id          │
                          │ activo          │
                          └─────────────────┘
```

### 4.2 Diccionario de Datos

Ver documento `DATABASE.md` para estructura detallada de campos.

---

## 5. Reglas de Negocio

| ID | Regla | Descripción |
|----|-------|-------------|
| RG-01 | Documento único | No pueden existir dos miembros con el mismo documento de identidad |
| RG-02 | Edad automática | La edad se calcula automáticamente a partir de la fecha de nacimiento |
| RG-03 | Rango de edad | Se asigna automáticamente: Niños (0-12), Jóvenes (13-25), Adultos (26-59), Adultos Mayores (60+) |
| RG-04 | Estado por defecto | Todo nuevo miembro inicia con estado "Activo" |
| RG-05 | Campos requeridos | Nombre, documento, fecha de nacimiento, género y teléfono son obligatorios |
| RG-06 | Formato email | El email debe tener formato válido si se proporciona |
| RG-07 | Eliminación | Solo administradores pueden eliminar registros |
| RG-08 | Auditoría | Todos los cambios deben registrar fecha de creación y actualización |

---

## 6. Interfaces del Sistema

### 6.1 Mapa de Navegación

```
┌─────────────────────────────────────────────────────────────────┐
│                         FlockTrak Hub                           │
├─────────────────────────────────────────────────────────────────┤
│                                                                 │
│  ┌──────────┐                                                   │
│  │  LOGIN   │──────────────────────────────────────────┐        │
│  └──────────┘                                          │        │
│       │                                                │        │
│       ▼                                                ▼        │
│  ┌──────────┐    ┌──────────┐    ┌──────────┐    ┌──────────┐  │
│  │DASHBOARD │◄──►│ MIEMBROS │◄──►│ REPORTES │◄──►│  ADMIN   │  │
│  └──────────┘    └──────────┘    └──────────┘    └──────────┘  │
│       │               │               │               │         │
│       │               ▼               │               ▼         │
│       │         ┌──────────┐         │         ┌──────────┐    │
│       │         │ DETALLE  │         │         │ USUARIOS │    │
│       │         │ MIEMBRO  │         │         └──────────┘    │
│       │         └──────────┘         │                         │
│       │                              │                         │
│       └──────────────────────────────┘                         │
│                      │                                         │
│                      ▼                                         │
│               ┌──────────────┐                                 │
│               │ CONFIGURACIÓN│                                 │
│               └──────────────┘                                 │
│                                                                 │
└─────────────────────────────────────────────────────────────────┘
```

### 6.2 Prototipos de Pantalla

#### Dashboard
- 4 tarjetas de estadísticas principales
- 3 gráficos: Edad (pie), Género (pie), Ministerios (barras)
- Diseño responsive en grid

#### Lista de Miembros
- Barra de búsqueda
- Filtros desplegables (4 criterios)
- Tabla paginada con acciones
- Vista móvil en tarjetas

#### Formulario de Miembro
- Modal con tabs o secciones
- Validación en tiempo real
- Campos agrupados por categoría

---

## 7. Restricciones y Supuestos

### 7.1 Restricciones

| Tipo | Restricción |
|------|-------------|
| Tecnológica | Debe desarrollarse con React + TypeScript |
| Tecnológica | Backend en Lovable Cloud (Supabase) |
| Presupuestaria | Uso de herramientas open source |
| Temporal | MVP en 4 semanas |
| Organizacional | Solo español como idioma |

### 7.2 Supuestos

- Los usuarios tienen acceso a internet estable
- Los usuarios manejan tecnología básica
- Los datos actuales serán migrados manualmente
- El pastor aprobará los requisitos finales

---

## 8. Riesgos Identificados

| ID | Riesgo | Probabilidad | Impacto | Mitigación |
|----|--------|--------------|---------|------------|
| R-01 | Resistencia al cambio por usuarios | Media | Alto | Capacitación gradual |
| R-02 | Datos actuales incompletos | Alta | Medio | Validación durante migración |
| R-03 | Pérdida de conectividad | Media | Medio | Diseño offline-first (futuro) |
| R-04 | Cambios de requisitos tardíos | Media | Alto | Sprints cortos y demos frecuentes |

---

## 9. Criterios de Aceptación del Proyecto

| # | Criterio | Verificación |
|---|----------|--------------|
| 1 | CRUD completo de miembros funcional | Demo en vivo |
| 2 | Dashboard con estadísticas correctas | Comparación con datos reales |
| 3 | Exportación CSV funcional | Archivo generado correctamente |
| 4 | Sistema responsive | Pruebas en móvil y desktop |
| 5 | Tiempo de carga < 3 segundos | Medición con herramientas |
| 6 | Documentación completa | Entrega de manuales |

---

## 10. Glosario

| Término | Definición |
|---------|------------|
| **Bautizado** | Miembro que ha recibido el sacramento del bautismo en agua |
| **Sellado** | Miembro que ha recibido el bautismo del Espíritu Santo |
| **Ministerio** | Grupo de servicio especializado dentro de la iglesia |
| **Diaconía** | Ministerio de servicio y apoyo logístico |
| **Ujier** | Persona encargada de recibir y acomodar a los asistentes |
| **Intercesión** | Ministerio dedicado a la oración |

---

## 11. Anexos

- **Anexo A:** Documento IEEE 830 (`IEEE830_SRS.md`)
- **Anexo B:** Historias de Usuario (`USER_STORIES.md`)
- **Anexo C:** Estructura de Base de Datos (`DATABASE.md`)

---

## 12. Aprobaciones

| Rol | Nombre | Firma | Fecha |
|-----|--------|-------|-------|
| Product Owner | _________________ | _______ | _______ |
| Representante Usuarios | _________________ | _______ | _______ |
| Líder Técnico | _________________ | _______ | _______ |

---

*Documento de Levantamiento de Requisitos*  
*Sistema de Gestión de Miembros - IPUC San Rafael*  
*FlockTrak Hub v1.0*
