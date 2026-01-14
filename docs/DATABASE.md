# 📊 Informe de Base de Datos - IPUC San Rafael

## Sistema de Gestión de Miembros

---

## 📋 Tabla Principal: `members`

### Descripción
Almacena la información completa de todos los integrantes de la iglesia IPUC – San Rafael.

### Estructura de Campos

| Campo | Tipo | Descripción | Requerido |
|-------|------|-------------|-----------|
| `id` | `string` | Identificador único del miembro | ✅ |
| `fullName` | `string` | Nombre completo del miembro | ✅ |
| `documentId` | `string` | Documento de identidad (cédula) | ✅ |
| `age` | `number` | Edad calculada automáticamente | ✅ |
| `birthDate` | `string` (ISO date) | Fecha de nacimiento | ✅ |
| `ageRange` | `AgeRange` | Rango de edad categorizado | ✅ |
| `gender` | `Gender` | Género del miembro | ✅ |
| `maritalStatus` | `MaritalStatus` | Estado civil | ✅ |
| `ministry` | `Ministry` | Ministerio o grupo asignado | ✅ |
| `role` | `ChurchRole` | Rol dentro de la iglesia | ✅ |
| `phone` | `string` | Número de celular | ✅ |
| `email` | `string` | Correo electrónico | ✅ |
| `address` | `string` | Dirección de residencia | ✅ |
| `neighborhood` | `string` | Barrio de residencia | ✅ |
| `baptized` | `boolean` | ¿Está bautizado? | ✅ |
| `sealed` | `boolean` | ¿Está sellado con el Espíritu Santo? | ✅ |
| `friendRelation` | `string` | Amigo o relación que lo invitó | ❌ |
| `joinDate` | `string` (ISO date) | Fecha de ingreso a la iglesia | ✅ |
| `status` | `MemberStatus` | Estado actual (activo/inactivo) | ✅ |
| `createdAt` | `string` (ISO datetime) | Fecha de creación del registro | ✅ |
| `updatedAt` | `string` (ISO datetime) | Fecha de última actualización | ✅ |

---

## 🏷️ Tipos Enumerados

### `AgeRange` - Rango de Edad
| Valor | Descripción | Rango |
|-------|-------------|-------|
| `niños` | Niños | 0 - 12 años |
| `jóvenes` | Jóvenes | 13 - 25 años |
| `adultos` | Adultos | 26 - 59 años |
| `adultos_mayores` | Adultos Mayores | 60+ años |

### `Gender` - Género
| Valor | Descripción |
|-------|-------------|
| `masculino` | Masculino |
| `femenino` | Femenino |

### `MaritalStatus` - Estado Civil
| Valor | Descripción |
|-------|-------------|
| `soltero` | Soltero(a) |
| `casado` | Casado(a) |
| `viudo` | Viudo(a) |
| `divorciado` | Divorciado(a) |

### `Ministry` - Ministerios
| Valor | Descripción |
|-------|-------------|
| `alabanza` | Ministerio de Alabanza |
| `jóvenes` | Ministerio de Jóvenes |
| `niños` | Ministerio de Niños |
| `líderes` | Líderes |
| `intercesión` | Ministerio de Intercesión |
| `ujieres` | Ujieres |
| `diaconía` | Diaconía |
| `multimedia` | Multimedia |
| `ninguno` | Sin ministerio asignado |

### `ChurchRole` - Roles en la Iglesia
| Valor | Descripción |
|-------|-------------|
| `pastor` | Pastor |
| `líder` | Líder |
| `diácono` | Diácono |
| `miembro` | Miembro |
| `visitante` | Visitante |

### `MemberStatus` - Estado del Miembro
| Valor | Descripción |
|-------|-------------|
| `activo` | Miembro activo |
| `inactivo` | Miembro inactivo |

---

## 🔍 Filtros Disponibles

El sistema permite filtrar los miembros por:

| Filtro | Opciones |
|--------|----------|
| Búsqueda | Por nombre o documento |
| Rango de Edad | Todos, Niños, Jóvenes, Adultos, Adultos Mayores |
| Género | Todos, Masculino, Femenino |
| Ministerio | Todos los ministerios disponibles |
| Estado | Todos, Activo, Inactivo |

---

## 📈 Estadísticas Generadas

El sistema calcula automáticamente:

- **Total de miembros** registrados
- **Miembros activos** vs inactivos
- **Distribución por rango de edad** (gráfico de torta)
- **Distribución por género** (gráfico de torta)
- **Miembros por ministerio** (gráfico de barras)
- **Miembros bautizados** y **sellados**

---

## 📤 Exportación de Datos

Los datos pueden exportarse en formato **CSV** con las siguientes columnas:

```
Nombre, Documento, Fecha Nac., Edad, Género, Estado Civil, 
Celular, Email, Dirección, Barrio, Bautizado, Sellado, 
Amigo/Relación, Ministerio, Rol, Fecha Ingreso, Estado
```

---

## 🔐 Consideraciones de Seguridad

Para una implementación con base de datos real (Lovable Cloud), se recomienda:

1. **Autenticación** - Control de acceso por roles
2. **RLS (Row Level Security)** - Políticas de seguridad a nivel de fila
3. **Encriptación** - Datos sensibles cifrados
4. **Auditoría** - Registro de cambios (createdAt, updatedAt)

---

## 📱 Estado Actual

> ⚠️ **Nota**: Actualmente el sistema utiliza datos de demostración (mock data) almacenados en memoria. Para persistencia real, se requiere activar **Lovable Cloud**.

---

*Documento generado para IPUC – San Rafael*  
*Sistema de Gestión de Miembros v1.0*
