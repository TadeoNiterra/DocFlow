<div class="mb-6 w-full">
    <!-- Contenedor Principal Adaptable -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 w-full">

        <!-- Título Principal -->
        <div class="flex-1 text-center md:text-left">
            <h1 class="text-2xl font-bold tracking-tight text-gray-950 dark:text-white">
                Registro de restauración de base de datos
            </h1>
        </div>

        <!-- Bloque SGSI Adaptativo -->
        <div
            class="flex items-center justify-center border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-sm divide-x divide-gray-300 dark:divide-gray-700">
            <div
                class="px-3 py-1.5 text-xs font-semibold text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-800/50">
                F-IT-13
            </div>
            <div
                class="px-3 py-1.5 text-xs font-semibold text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-800/50">
                Rev. 0
            </div>
            <div
                class="px-3 py-1.5 text-xs font-semibold text-gray-800 dark:text-gray-200 bg-gray-50 dark:bg-gray-800/50">
                21-03-2025
            </div>
        </div>

    </div>

    <!-- Acciones / Botones -->
    @if (count($actions))
        <div class="flex justify-end gap-3 mt-4">
            @foreach ($actions as $action)
                {{ $action }}
            @endforeach
        </div>
    @endif
</div>
