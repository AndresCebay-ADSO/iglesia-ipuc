<!-- Modal de Confirmación de Exportación -->
<div id="exportModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 p-4" role="dialog" aria-modal="true" aria-labelledby="exportModalTitle">
    <div class="relative top-10 sm:top-20 mx-auto p-5 border w-full max-w-sm shadow-lg rounded-md bg-white dark:bg-gray-800">
        <div class="mt-3 text-center">
            <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 mb-4">
                <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <h3 id="exportModalTitle" class="text-lg font-medium text-gray-900 dark:text-white mb-2">Confirmar Exportación</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    ¿Desea descargar la lista de miembros en formato CSV?
                </p>
                <p class="text-xs text-gray-400 dark:text-gray-500 mt-2">
                    El archivo incluirá todos los datos de los miembros registrados.
                </p>
            </div>
            <div class="flex items-center px-4 py-3 space-x-3">
                <button onclick="hideExportModal()" class="flex-1 px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 text-base font-medium rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition-colors">
                    Cancelar
                </button>
                <a href="{{ route('export.index') }}" onclick="hideExportModal()" class="flex-1 px-4 py-2 bg-blue-600 text-white text-base font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors text-center">
                    Descargar
                </a>
            </div>
        </div>
    </div>
</div>
