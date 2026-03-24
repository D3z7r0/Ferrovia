@extends('layouts.erp')

@section('title', 'Rutas y Horarios | Ferrovia')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    
    <div class="mb-6 flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4">
        <div class="w-full lg:w-auto">
            <h1 class="text-2xl font-bold text-gray-800">Llegadas y Salidas</h1>
            <p class="text-sm text-gray-500 mt-1">Estimación de tiempo (ETA) en la red troncal.</p>
        </div>
        
        <div class="flex flex-col sm:flex-row items-center gap-3 w-full lg:w-auto">
            <div class="relative w-full sm:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </div>
                <input type="text" placeholder="Buscar tren o estación..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent sm:text-sm transition-all">
            </div>
            <button class="w-full sm:w-auto bg-white border border-gray-200 text-gray-600 px-4 py-2 rounded-lg hover:bg-gray-50 transition-colors shadow-sm text-sm font-medium flex items-center justify-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                </svg>
                Filtrar
            </button>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID del Tren</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Estación Actual</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Próxima Estación</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ETA</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Estatus</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded bg-blue-50 flex items-center justify-center text-ferrovia-blue font-bold text-xs border border-blue-100">TR</div>
                                <div class="ml-3">
                                    <p class="text-sm font-semibold text-gray-800">TRN-045</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Buenavista</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">Fortuna</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-600">04:30 min</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                A tiempo
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-ferrovia-blue hover:text-blue-800">Detalles</a>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded bg-blue-50 flex items-center justify-center text-ferrovia-blue font-bold text-xs border border-blue-100">TR</div>
                                <div class="ml-3">
                                    <p class="text-sm font-semibold text-gray-800">TRN-012</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">San Rafael</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">Tlalnepantla</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-600">02:15 min</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                A tiempo
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-ferrovia-blue hover:text-blue-800">Detalles</a>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded bg-red-50 flex items-center justify-center text-red-600 font-bold text-xs border border-red-100">TR</div>
                                <div class="ml-3">
                                    <p class="text-sm font-semibold text-gray-800">TRN-089</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Lechería</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">Tultitlán</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-red-600 font-medium">08:45 min</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800 border border-red-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>
                                Retraso
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-ferrovia-blue hover:text-blue-800">Detalles</a>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 rounded bg-blue-50 flex items-center justify-center text-ferrovia-blue font-bold text-xs border border-blue-100">TR</div>
                                <div class="ml-3">
                                    <p class="text-sm font-semibold text-gray-800">TRN-104</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Cuautitlán</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">Tultitlán</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-gray-600">01:20 min</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 border border-green-200">
                                <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>
                                A tiempo
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-ferrovia-blue hover:text-blue-800">Detalles</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4">
            <p class="text-sm text-gray-500 text-center sm:text-left">
                Mostrando <span class="font-medium text-gray-800">1</span> a <span class="font-medium text-gray-800">4</span> de <span class="font-medium text-gray-800">14</span>
            </p>
            <nav class="inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Anterior</a>
                <a href="#" class="px-4 py-2 border border-gray-300 bg-blue-50 text-blue-600 text-sm font-medium">1</a>
                <a href="#" class="px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 text-sm font-medium">2</a>
                <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">Siguiente</a>
            </nav>
        </div>
    </div>
</div>
@endsection