@extends('layouts.erp')

@section('title', 'Monitoreo de Servidores | Ferrovia')

@section('content')
    <div class="mb-6 flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Estado de la Infraestructura</h1>
            <p class="text-sm text-gray-500 mt-1">Monitoreo de nodos, bases de datos y balanceadores de carga.</p>
        </div>
        <div>
            <button class="bg-ferrovia-blue text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors shadow-sm text-sm font-medium flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                Actualizar Métricas
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                    <h3 class="font-bold text-gray-800">SRV-DB-MAIN</h3>
                </div>
                <span class="flex items-center text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">
                    <span class="w-2 h-2 rounded-full bg-green-500 mr-1.5 animate-pulse"></span> Online
                </span>
            </div>
            <div class="p-5 space-y-4">
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">Métricas de Rendimiento</p>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-gray-700">CPU (16 Cores)</span>
                        <span class="text-gray-600">32%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-ferrovia-blue h-2 rounded-full" style="width: 32%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-gray-700">Memoria RAM</span>
                        <span class="text-gray-600">420GB / 832GB</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-yellow-400 h-2 rounded-full" style="width: 51%"></div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4 pt-4 border-t border-gray-100 text-sm">
                    <div>
                        <span class="block text-gray-400 text-xs">Sistema Operativo</span>
                        <span class="font-medium text-gray-800">Ubuntu Server 24.04</span>
                    </div>
                    <div>
                        <span class="block text-gray-400 text-xs">Uptime</span>
                        <span class="font-medium text-gray-800">45d 12h 30m</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-red-200 shadow-sm overflow-hidden relative">
            <div class="absolute top-0 left-0 w-1 h-full bg-red-500"></div>
            <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-red-50">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    <h3 class="font-bold text-gray-800">SRV-API-TELEMETRIA</h3>
                </div>
                <span class="flex items-center text-xs font-medium text-red-600 bg-red-100 px-2 py-1 rounded-full border border-red-200">
                    <span class="w-2 h-2 rounded-full bg-red-500 mr-1.5 animate-pulse"></span> Carga Alta
                </span>
            </div>
            <div class="p-5 space-y-4">
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">Métricas de Rendimiento</p>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-gray-700">CPU (8 Cores)</span>
                        <span class="text-red-600 font-bold">92%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-red-500 h-2 rounded-full" style="width: 92%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-gray-700">Memoria RAM</span>
                        <span class="text-gray-600">192GB / 640GB</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-red-400 h-2 rounded-full" style="width: 30%"></div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4 pt-4 border-t border-gray-100 text-sm">
                    <div>
                        <span class="block text-gray-400 text-xs">Sistema Operativo</span>
                        <span class="font-medium text-gray-800">Ubuntu Server 24.04</span>
                    </div>
                    <div>
                        <span class="block text-gray-400 text-xs">Uptime</span>
                        <span class="font-medium text-gray-800">12d 04h 15m</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
            <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"></path></svg>
                    <h3 class="font-bold text-gray-800">SRV-LOAD-BALANCER</h3>
                </div>
                <span class="flex items-center text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">
                    <span class="w-2 h-2 rounded-full bg-green-500 mr-1.5 animate-pulse"></span> Online
                </span>
            </div>
            <div class="p-5 space-y-4">
                <p class="text-xs text-gray-500 uppercase tracking-wider mb-2">Métricas de Rendimiento</p>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-gray-700">CPU (4 Cores)</span>
                        <span class="text-gray-600">18%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-ferrovia-blue h-2 rounded-full" style="width: 18%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="font-medium text-gray-700">Memoria RAM</span>
                        <span class="text-gray-600">60GB / 100GB</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-ferrovia-neon h-2 rounded-full" style="width: 60%"></div>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mt-4 pt-4 border-t border-gray-100 text-sm">
                    <div>
                        <span class="block text-gray-400 text-xs">Sistema Operativo</span>
                        <span class="font-medium text-gray-800">Ubuntu Server 24.04</span>
                    </div>
                    <div>
                        <span class="block text-gray-400 text-xs">Uptime</span>
                        <span class="font-medium text-gray-800">120d 08h 00m</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection