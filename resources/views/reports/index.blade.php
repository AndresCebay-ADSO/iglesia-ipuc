@extends('layouts.app')

@section('title', 'Reportes')

@section('content')
<div>
    <!-- Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Reportes</h1>
            <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Estadísticas y análisis de los miembros</p>
        </div>
        <div class="flex gap-3">
            <button onclick="window.print()" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                </svg>
                Exportar PDF
            </button>
            <a href="#" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                Exportar Excel
            </a>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Members -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Total Miembros</p>
                    <p class="text-4xl font-bold text-gray-900 dark:text-white mt-2">{{ $stats['total'] }}</p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-900 rounded-lg">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Active Members -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Activos</p>
                    <p class="text-4xl font-bold text-green-600 dark:text-green-400 mt-2">{{ $stats['active'] }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $activityRate }}% de actividad</p>
                </div>
                <div class="p-3 bg-green-100 dark:bg-green-900 rounded-lg">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Inactive Members -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Inactivos</p>
                    <p class="text-4xl font-bold text-red-600 dark:text-red-400 mt-2">{{ $stats['inactive'] }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ 100 - $activityRate }}% inactividad</p>
                </div>
                <div class="p-3 bg-red-100 dark:bg-red-900 rounded-lg">
                    <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Activity Rate -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Tasa de Actividad</p>
                    <p class="text-4xl font-bold text-yellow-600 dark:text-yellow-400 mt-2">{{ $activityRate }}%</p>
                </div>
                <div class="p-3 bg-yellow-100 dark:bg-yellow-900 rounded-lg">
                    <svg class="w-8 h-8 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Distribution by Age -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Distribución por Edad</h3>
            <canvas id="ageChart"></canvas>
        </div>

        <!-- Distribution by Gender -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Distribución por Género</h3>
            <canvas id="genderChart"></canvas>
        </div>

        <!-- Members by Ministry -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Miembros por Ministerio</h3>
            <canvas id="ministryChart"></canvas>
        </div>
    </div>

    <!-- Detailed Statistics -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- By Age Range -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Por Rango de Edad</h3>
            <div class="space-y-3">
                @php
                    $ageLabels = [
                        'niños' => 'Niños (0-12)',
                        'jóvenes' => 'Jóvenes (13-24)',
                        'adultos' => 'Adultos (25-59)',
                        'adultos_mayores' => 'Adultos Mayores (60+)'
                    ];
                @endphp
                @foreach($ageLabels as $key => $label)
                    <div class="flex justify-between items-center pb-2 border-b border-gray-200 dark:border-gray-700">
                        <span class="text-sm text-gray-600 dark:text-gray-400">{{ $label }}</span>
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $stats['by_age_range'][$key] ?? 0 }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- By Gender -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Por Género</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center pb-2 border-b border-gray-200 dark:border-gray-700">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Masculino</span>
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $stats['by_gender']['masculino'] ?? 0 }}</span>
                </div>
                <div class="flex justify-between items-center pb-2 border-b border-gray-200 dark:border-gray-700">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Femenino</span>
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $stats['by_gender']['femenino'] ?? 0 }}</span>
                </div>
            </div>
        </div>

        <!-- By Ministry -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Por Ministerio</h3>
            <div class="space-y-3">
                @forelse($stats['by_ministry'] as $ministry => $count)
                    <div class="flex justify-between items-center pb-2 border-b border-gray-200 dark:border-gray-700">
                        <span class="text-sm text-gray-600 dark:text-gray-400 capitalize">{{ ucfirst(str_replace('_', ' ', $ministry)) }}</span>
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $count }}</span>
                    </div>
                @empty
                    <p class="text-sm text-gray-500 dark:text-gray-400">Sin datos disponibles</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Baptism & Sealed Stats -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Miembros Bautizados</p>
                    <p class="text-4xl font-bold text-purple-600 dark:text-purple-400 mt-2">{{ $stats['baptized'] }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $baptismRate }}% del total</p>
                </div>
                <div class="p-3 bg-purple-100 dark:bg-purple-900 rounded-lg">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h12a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zm14 1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border-l-4 border-pink-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 dark:text-gray-400 text-sm font-medium">Sellados con Espíritu Santo</p>
                    <p class="text-4xl font-bold text-pink-600 dark:text-pink-400 mt-2">{{ $stats['sealed'] }}</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">{{ $sealedRate }}% del total</p>
                </div>
                <div class="p-3 bg-pink-100 dark:bg-pink-900 rounded-lg">
                    <svg class="w-8 h-8 text-pink-600 dark:text-pink-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const chartOptions = {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                labels: {
                    color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151',
                    font: {
                        family: "'Inter', sans-serif"
                    }
                }
            }
        }
    };

    // Age Distribution Chart
    const ageCtx = document.getElementById('ageChart').getContext('2d');
    new Chart(ageCtx, {
        type: 'doughnut',
        data: {
            labels: ['Niños', 'Jóvenes', 'Adultos', 'Adultos Mayores'],
            datasets: [{
                data: [
                    {{ $stats['by_age_range']['niños'] ?? 0 }},
                    {{ $stats['by_age_range']['jóvenes'] ?? 0 }},
                    {{ $stats['by_age_range']['adultos'] ?? 0 }},
                    {{ $stats['by_age_range']['adultos_mayores'] ?? 0 }}
                ],
                backgroundColor: [
                    '#FBBF24',
                    '#60A5FA',
                    '#34D399',
                    '#F87171'
                ]
            }]
        },
        options: chartOptions
    });

    // Gender Distribution Chart
    const genderCtx = document.getElementById('genderChart').getContext('2d');
    new Chart(genderCtx, {
        type: 'doughnut',
        data: {
            labels: ['Masculino', 'Femenino'],
            datasets: [{
                data: [
                    {{ $stats['by_gender']['masculino'] ?? 0 }},
                    {{ $stats['by_gender']['femenino'] ?? 0 }}
                ],
                backgroundColor: ['#1E3A8A', '#FBBF24']
            }]
        },
        options: chartOptions
    });

    // Ministry Bar Chart
    const ministryCtx = document.getElementById('ministryChart').getContext('2d');
    const ministryLabels = {!! json_encode(array_map(function($k) { return ucfirst(str_replace('_', ' ', $k)); }, array_keys($stats['by_ministry']))) !!};
    const ministryData = {!! json_encode(array_values($stats['by_ministry'])) !!};
    
    new Chart(ministryCtx, {
        type: 'bar',
        data: {
            labels: ministryLabels,
            datasets: [{
                label: 'Cantidad de Miembros',
                data: ministryData,
                backgroundColor: '#1E40AF',
                borderColor: '#1E40AF',
                borderWidth: 1
            }]
        },
        options: {
            ...chartOptions,
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    grid: {
                        color: document.documentElement.classList.contains('dark') ? 'rgba(75, 85, 99, 0.2)' : 'rgba(0, 0, 0, 0.05)'
                    },
                    ticks: {
                        color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151'
                    }
                },
                y: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: document.documentElement.classList.contains('dark') ? '#e5e7eb' : '#374151'
                    }
                }
            }
        }
    });
</script>
@endsection
