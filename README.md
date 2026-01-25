# 🏰 FlockTrak Hub - Sistema de Gestión de Miembros

> **Sistema integral de gestión de miembros para la Iglesia Pentecostal Unida de Colombia - IPUC Avenida Libertadores**

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)](https://www.php.net)
[![License](https://img.shields.io/badge/License-MIT-green?style=flat-square)](LICENSE)

---

## 📋 Tabla de Contenidos

- [Características](#características)
- [Requisitos](#requisitos)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Uso](#uso)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Base de Datos](#base-de-datos)
- [API y Controladores](#api-y-controladores)
- [Tecnologías](#tecnologías)
- [Contribución](#contribución)
- [Licencia](#licencia)

---

## ✨ Características

### 👥 Gestión de Miembros
- ✅ Registro completo de miembros con información personal y religiosa
- ✅ Búsqueda y filtrado avanzado por:
  - Nombre o documento de identidad
  - Rango de edad (Niños, Jóvenes, Adultos, Adultos Mayores)
  - Género
  - Ministerio asignado
  - Estado (Activo/Inactivo)
- ✅ Edición y eliminación de registros
- ✅ Seguimiento de bautismo y selladura con Espíritu Santo
- ✅ Asignación de roles eclesiásticos (Obispo, Pastor, Diácono, etc.)

### 📊 Reportes y Estadísticas
- 📈 Dashboard interactivo con gráficos dinámicos
- 📊 Análisis completos por:
  - Distribución por edad
  - Distribución por género
  - Miembros por ministerio
  - Tasas de actividad, bautismo y selladura
- 🎯 Estadísticas en tiempo real
- 🖨️ Exportación a PDF y Excel (preparado)

### 📥 Importación y Exportación
- 📤 Exportar lista completa de miembros a CSV
- 📝 Exportar con filtros aplicados
- 🔐 Descarga segura de datos

### 🔒 Seguridad y Control de Acceso
- 🔐 Autenticación de usuarios
- 👤 Sistema de roles (Admin, Secretario, Miembro)
- 🛡️ Control de permisos por módulo
- 🔑 Gestión segura de credenciales

### 🎨 Interfaz de Usuario
- 💎 Diseño moderno y responsivo
- 🌓 Soporte para tema oscuro
- 📱 Adaptado para dispositivos móviles
- ⚡ Interfaz intuitiva y fácil de usar

---

## 🖥️ Requisitos

### Sistema
- **PHP**: 8.2 o superior
- **Composer**: Últimas versiones
- **Node.js**: 18.x o superior (para desarrollo frontend)
- **Base de Datos**: MySQL 8.0+ o MariaDB 10.4+
- **Servidor Web**: Apache, Nginx o similar

### Dependencias PHP
- Laravel 11.x
- Pest (Testing)
- Carbon (Manejo de fechas)

### Dependencias Frontend
- Tailwind CSS
- Chart.js (para gráficos)

---

## 📦 Instalación

### 1. Clonar el repositorio
```bash
git clone https://github.com/tu-usuario/flocktrak-hub-church.git
cd flocktrak-hub-church
```

### 2. Instalar dependencias PHP
```bash
composer install
```

### 3. Instalar dependencias Node (opcional, si usas npm)
```bash
npm install
```

### 4. Copiar archivo de entorno
```bash
cp .env.example .env
```

### 5. Generar clave de aplicación
```bash
php artisan key:generate
```

### 6. Configurar base de datos
Edita el archivo `.env` con tus credenciales:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=flocktrak_hub
DB_USERNAME=root
DB_PASSWORD=
```

### 7. Ejecutar migraciones
```bash
php artisan migrate
```

### 8. Ejecutar seeders (datos de ejemplo)
```bash
php artisan db:seed
```

### 9. Servir la aplicación
```bash
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

---

## ⚙️ Configuración

### Credenciales Iniciales

Después de ejecutar los seeders, usa estas credenciales:

| Usuario | Contraseña | Rol |
|---------|-----------|-----|
| admin@ipuc.com | password | Admin |
| secretary@ipuc.com | password | Secretario |

⚠️ **Nota**: Cambia estas credenciales en producción.

### Variables de Entorno Importantes

```env
APP_NAME=FlockTrak Hub
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tu-dominio.com

DB_CONNECTION=mysql
DB_DATABASE=flocktrak_hub

MAIL_FROM_ADDRESS=noreply@ipuc.com
MAIL_FROM_NAME="FlockTrak Hub"
```

### Configurar Correo (Opcional)
Para enviar notificaciones por correo, configura en `.env`:
```env
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=tu_usuario
MAIL_PASSWORD=tu_contraseña
```

---

## 🚀 Uso

### Flujo Principal

#### 1. **Iniciar Sesión**
- Accede a la aplicación con tus credenciales
- Selecciona tu rol (Admin, Secretario o Miembro)

#### 2. **Dashboard**
- Vista general del estado de la iglesia
- Estadísticas rápidas de miembros
- Accesos directos a funciones principales

#### 3. **Gestionar Miembros**
- **Ver Lista**: Accede a `Miembros` en el menú lateral
- **Buscar**: Usa la barra de búsqueda por nombre o documento
- **Filtrar**: Aplica filtros por edad, género, ministerio y estado
- **Agregar**: Haz clic en "Agregar Miembro" para registrar uno nuevo
- **Editar**: Haz clic en "Editar" en la fila del miembro
- **Eliminar**: Solo administradores pueden eliminar miembros

#### 4. **Ver Reportes**
- Accede a `Reportes` en el menú lateral (Admin/Secretario)
- Visualiza gráficos e estadísticas
- Analiza datos por categoría

#### 5. **Exportar Datos**
- Opción "Exportar" en la página de miembros
- Opción "Exportar" en el menú lateral
- Descarga CSV con los datos actuales

### Ejemplos de Uso

#### Crear un nuevo miembro
```
1. Dashboard → Miembros
2. Click en "Agregar Miembro"
3. Completa el formulario
4. Click en "Guardar"
```

#### Buscar miembros activos de un ministerio
```
1. Miembros → Filtros
2. Selecciona ministerio deseado
3. Selecciona estado "Activo"
4. Click en "Filtrar"
```

#### Generar reporte de miembros por edad
```
1. Dashboard → Reportes
2. Visualiza "Distribución por Edad"
3. Haz clic en "Exportar PDF" si es necesario
```

---

## 📁 Estructura del Proyecto

```
flocktrak-hub-church/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php          # Autenticación
│   │   │   ├── DashboardController.php     # Dashboard
│   │   │   ├── MemberController.php        # CRUD de miembros
│   │   │   ├── ReportController.php        # Reportes
│   │   │   └── ExportController.php        # Exportación
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   │   ├── User.php                        # Modelo de usuario
│   │   └── Members.php                     # Modelo de miembros
│   ├── Services/
│   │   ├── MemberService.php               # Lógica de miembros
│   │   ├── StatisticsService.php           # Cálculo de estadísticas
│   │   └── ExportService.php               # Servicios de exportación
│   └── Providers/
│
├── config/
│   ├── app.php                             # Configuración general
│   ├── auth.php                            # Configuración de autenticación
│   ├── database.php                        # Configuración de BD
│   └── ...
│
├── database/
│   ├── migrations/                         # Migraciones de BD
│   ├── factories/                          # Factories para testing
│   └── seeders/                            # Seeders de datos
│
├── public/
│   ├── index.php                           # Punto de entrada
│   ├── images/
│   │   └── LOGO-IPUC.svg                   # Logo del proyecto
│   └── robots.txt
│
├── resources/
│   ├── views/
│   │   ├── auth/                           # Vistas de autenticación
│   │   ├── layouts/                        # Layouts base
│   │   ├── dashboard/                      # Vistas del dashboard
│   │   ├── members/                        # Vistas de miembros
│   │   └── reports/                        # Vistas de reportes
│   ├── css/
│   │   └── app.css                         # Estilos personalizados
│   └── js/
│       ├── app.js                          # Scripts principales
│       └── bootstrap.js                    # Bootstrap de la app
│
├── routes/
│   ├── web.php                             # Rutas web
│   └── console.php                         # Comandos de consola
│
├── storage/                                # Almacenamiento de archivos
├── tests/                                  # Tests automatizados
├── vendor/                                 # Dependencias Composer
│
├── .env.example                            # Ejemplo de configuración
├── .gitignore                              # Archivos ignorados por Git
├── artisan                                 # CLI de Laravel
├── composer.json                           # Dependencias PHP
├── composer.lock                           # Lock de dependencias
├── phpunit.xml                             # Configuración de testing
├── vite.config.js                          # Configuración de Vite
├── package.json                            # Dependencias Node
├── tailwind.config.js                      # Configuración de Tailwind
├── README.md                               # Este archivo
└── LICENSE                                 # Licencia del proyecto
```

---

## 🗄️ Base de Datos

### Tabla: `members`
Almacena información completa de los miembros de la iglesia.

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | UUID | Identificador único |
| `fullname` | string | Nombre completo |
| `document_id` | string | Documento de identidad |
| `birth_date` | date | Fecha de nacimiento |
| `age` | integer | Edad calculada |
| `age_range` | enum | Rango (niños, jóvenes, adultos, adultos_mayores) |
| `gender` | enum | Género (masculino, femenino) |
| `marital_status` | enum | Estado civil |
| `ministry` | enum | Ministerio asignado |
| `ministry_role` | string | Rol en ministerio |
| `church_role` | enum | Rol eclesiástico |
| `phone` | string | Teléfono de contacto |
| `email` | string | Correo electrónico |
| `address` | string | Dirección |
| `neighborhood` | string | Barrio |
| `is_baptized` | boolean | ¿Está bautizado? |
| `is_sealed` | boolean | ¿Está sellado? |
| `friend_relation` | string | Quién lo invitó |
| `join_date` | date | Fecha de ingreso |
| `status` | enum | Estado (activo, inactivo) |
| `created_at` | timestamp | Fecha de creación |
| `updated_at` | timestamp | Última actualización |

### Tabla: `users`
Almacena información de usuarios que pueden acceder al sistema.

| Campo | Tipo | Descripción |
|-------|------|-------------|
| `id` | UUID | Identificador único |
| `name` | string | Nombre de usuario |
| `email` | string | Correo electrónico |
| `password` | string | Contraseña hasheada |
| `role` | enum | Rol (admin, secretary, member) |
| `created_at` | timestamp | Fecha de creación |
| `updated_at` | timestamp | Última actualización |

---

## 🎛️ API y Controladores

### AuthController
```
POST   /login                 # Iniciar sesión
POST   /logout                # Cerrar sesión (requiere autenticación)
```

### DashboardController
```
GET    /dashboard             # Ver dashboard (requiere autenticación)
```

### MemberController
```
GET    /members               # Listar miembros
POST   /members               # Crear miembro
GET    /members/{id}          # Ver detalle
GET    /members/{id}/edit     # Formulario editar
PUT    /members/{id}          # Actualizar miembro
DELETE /members/{id}          # Eliminar miembro (solo admin)
```

### ReportController
```
GET    /reports               # Ver reportes (admin/secretary)
```

### ExportController
```
GET    /export                # Descargar CSV (admin/secretary)
```

---

## 🛠️ Tecnologías

### Backend
- **Framework**: Laravel 11.x
- **Base de Datos**: MySQL 8.0+
- **PHP**: 8.2+
- **Testing**: Pest PHP

### Frontend
- **CSS**: Tailwind CSS 4.x
- **JS**: Vanilla JavaScript + Alpine.js
- **Gráficos**: Chart.js
- **Iconos**: SVG inline

### DevOps
- **Control de versiones**: Git
- **Build tool**: Vite
- **Package managers**: Composer, npm

---

## 🔧 Comandos Útiles

```bash
# Desarrollo
php artisan serve                          # Servir app en desarrollo
npm run dev                                # Compilar assets en watch mode

# Base de Datos
php artisan migrate                        # Ejecutar migraciones
php artisan migrate:rollback               # Revertir última migración
php artisan db:seed                        # Ejecutar seeders
php artisan db:seed --class=UserSeeder     # Ejecutar seeder específico

# Testing
php artisan test                           # Ejecutar todos los tests
php artisan test --filter=TestNombre       # Ejecutar test específico

# Producción
php artisan config:cache                   # Cachear configuración
php artisan route:cache                    # Cachear rutas
php artisan view:cache                     # Cachear vistas
npm run build                              # Compilar assets para producción

# Mantenimiento
php artisan storage:link                   # Crear link simbólico storage
php artisan clear-compiled                 # Limpiar archivos compilados
php artisan cache:clear                    # Limpiar caché
```

---

## 📋 Mejoras Futuras

- [ ] Implementar exportación a PDF con generación de reportes
- [ ] Implementar exportación a Excel
- [ ] Sistema de notificaciones por correo
- [ ] Dashboard personalizado por rol
- [ ] Integración con Google Calendar
- [ ] Módulo de eventos y asistencia
- [ ] Generación de gafetes/carnés
- [ ] Sistema de permisos más granular
- [ ] API REST para aplicación móvil
- [ ] Historial de cambios en miembros

---

## 🤝 Contribución

Las contribuciones son bienvenidas. Para reportar bugs o sugerir mejoras:

1. Abre un **Issue** en el repositorio
2. Proporciona detalles claros del problema o sugerencia
3. Si es posible, incluye pasos para reproducir

Para contribuir código:
1. Haz un fork del repositorio
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

---

## 📝 Licencia

Este proyecto está bajo la licencia MIT. Ver archivo [LICENSE](LICENSE) para más detalles.

---

## 📧 Contacto

Para preguntas o soporte:

- **Email**: info@ipuc-avenidallibertadores.com
- **Teléfono**: +57 (código de área) 
- **Dirección**: Avenida Libertadores, [ciudad]

---

## 📚 Documentación Adicional

- [Base de Datos](docs/DATABASE.md) - Detalles de la estructura de BD
- [Historias de Usuario](docs/USER_STORIES.md) - Requisitos funcionales
- [Especificaciones](docs/IEEE830_SRS.md) - Documento SRS completo
- [Recopilación de Requisitos](docs/REQUIREMENTS_GATHERING.md) - Análisis de requisitos

---

## 🎉 Créditos

Desarrollado para la **Iglesia Pentecostal Unida de Colombia - IPUC Avenida Libertadores**

**Versión**: 1.0.0  
**Última actualización**: Enero 2026

---

<div align="center">

**[⬆ Volver al inicio](#flocktrack-hub---sistema-de-gestión-de-miembros)**

Hecho con ❤️ para la comunidad de fe

</div>

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
