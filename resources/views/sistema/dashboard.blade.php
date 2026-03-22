@extends('layouts.erp')

@section('title', 'Dashboard KPIs | Ferrovia')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Panel de Control General</h1>
        <p class="text-sm text-gray-500 mt-1">Visión general en tiempo real de la red ferroviaria.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        
        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 flex items-center transition-transform hover:-translate-y-1 duration-300">
            <div class="w-14 h-14 rounded-full bg-blue-50 flex items-center justify-center mr-4 border border-blue-100">
                <svg class="w-7 h-7 text-ferrovia-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Trenes en Operación</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1">14</h3>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 flex items-center transition-transform hover:-translate-y-1 duration-300">
            <div class="w-14 h-14 rounded-full bg-green-50 flex items-center justify-center mr-4 border border-green-100 relative">
                <span class="absolute flex h-4 w-4 top-0 right-0 -mt-1 -mr-1">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-ferrovia-neon opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-ferrovia-neon border-2 border-white"></span>
                </span>
                <svg class="w-7 h-7 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Estatus del Servidor (HA)</p>
                <h3 class="text-xl font-bold text-green-600 mt-1">Óptimo</h3>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6 flex items-center transition-transform hover:-translate-y-1 duration-300">
            <div class="w-14 h-14 rounded-full bg-gray-50 flex items-center justify-center mr-4 border border-gray-100">
                <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-medium text-gray-500 uppercase tracking-wider">Incidentes Activos</p>
                <h3 class="text-3xl font-bold text-gray-800 mt-1">0</h3>
            </div>
        </div>

    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-bold text-gray-800">Afluencia de Pasajeros del Día</h2>
            <span class="px-3 py-1 bg-blue-50 text-ferrovia-blue text-xs font-semibold rounded-full border border-blue-100">Hoy</span>
        </div>
        
        <div class="relative w-full h-80">
            <canvas id="afluenciaChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('afluenciaChart').getContext('2d');

            // Crear un gradiente azul elegante para el área bajo la curva
            let gradient = ctx.createLinearGradient(0, 0, 0, 400);
            gradient.addColorStop(0, 'rgba(0, 86, 179, 0.4)'); // ferrovia-blue con 40% opacidad
            gradient.addColorStop(1, 'rgba(0, 86, 179, 0.0)'); // Transparente al fondo

            const afluenciaChart = new Chart(ctx, {
                type: 'line',
                data: {
                    // Eje X: Horas del día simuladas
                    labels: ['05:00', '07:00', '09:00', '11:00', '13:00', '15:00', '17:00', '19:00', '21:00', '23:00'],
                    datasets: [{
                        label: 'Pasajeros por hora',
                        // Eje Y: Datos simulados (picos en hora pico)
                        data: [1200, 4500, 9800, 5200, 4800, 5500, 10200, 7100, 3000, 800],
                        borderColor: '#0056b3', // ferrovia-blue
                        backgroundColor: gradient, // El gradiente que creamos
                        borderWidth: 3,
                        pointBackgroundColor: '#ffffff',
                        pointBorderColor: '#39FF14', // ferrovia-neon en los puntos
                        pointBorderWidth: 2,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        fill: true, // Habilitar el relleno bajo la línea
                        tension: 0.4 // Esto hace que la línea sea curva y fluida
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false // Ocultamos la leyenda para más minimalismo
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            padding: 12,
                            titleFont: { size: 13 },
                            bodyFont: { size: 14, weight: 'bold' },
                            displayColors: false,
                            callbacks: {
                                label: function(context) {
                                    return context.parsed.y + ' pasajeros';
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#f3f4f6', // Gris muy claro para la cuadrícula
                                borderDash: [5, 5] // Líneas punteadas
                            },
                            ticks: { color: '#6b7280' }
                        },
                        x: {
                            grid: {
                                display: false // Sin líneas verticales para mayor limpieza
                            },
                            ticks: { color: '#6b7280' }
                        }
                    }
                }
            });
        });
    </script>
@endsection