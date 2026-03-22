<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ferrovia ERP')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-ferrovia-bg text-gray-800 font-sans antialiased overflow-hidden">

    <div class="flex h-screen w-full">
        
        <aside class="w-64 bg-ferrovia-surface border-r border-gray-200 flex flex-col shadow-sm">
            <div class="h-16 flex items-center px-6 border-b border-gray-100">
                <img src="{{ asset('Ferrovia.jpeg') }}" alt="Logotipo Ferrovia" class="w-8 h-8 object-contain mr-3">
            </div>

            <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-ferrovia-blue font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-ferrovia-blue' }} transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Inicio (Dashboard)
                </a>

                <a href="{{ route('telemetria') }}" class="flex items-center px-4 py-2.5 rounded-lg {{ request()->routeIs('telemetria') ? 'bg-blue-50 text-ferrovia-blue font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-ferrovia-blue' }} transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    Telemetría (Mapa)
                </a>

                <a href="{{ route('rutas') }}" class="flex items-center px-4 py-2.5 rounded-lg {{ request()->routeIs('rutas') ? 'bg-blue-50 text-ferrovia-blue font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-ferrovia-blue' }} transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    Rutas y Horarios
                </a>

                <a href="{{ route('monitoreo') }}" class="flex items-center px-4 py-2.5 rounded-lg {{ request()->routeIs('monitoreo') ? 'bg-blue-50 text-ferrovia-blue font-semibold' : 'text-gray-600 hover:bg-gray-50 hover:text-ferrovia-blue' }} transition-colors">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01"></path></svg>
                    Monitoreo Servidores
                </a>
            </nav>

            <div class="p-4 border-t border-gray-100">
                <a href="{{ route('login') }}" class="flex items-center text-sm text-red-500 hover:text-red-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Cerrar Sesión
                </a>
            </div>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="h-16 bg-ferrovia-surface border-b border-gray-200 flex items-center justify-between px-8 shadow-sm z-10">
                
                <div class="flex items-center text-sm font-medium text-gray-500 bg-gray-50 px-3 py-1.5 rounded-md border border-gray-100">
                    <svg class="w-4 h-4 mr-2 text-ferrovia-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    <span id="reloj-sistema">Cargando hora...</span>
                </div>

                <div class="flex items-center space-x-6">
                    <button class="relative text-gray-400 hover:text-ferrovia-blue transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        <span class="absolute top-0 right-0 block h-2.5 w-2.5 rounded-full bg-ferrovia-neon ring-2 ring-white"></span>
                    </button>

                    <div class="h-8 w-px bg-gray-200"></div> <div class="flex items-center cursor-pointer">
                        <div class="w-9 h-9 rounded-full bg-blue-100 flex items-center justify-center text-ferrovia-blue font-bold mr-3 border border-blue-200">
                            A
                        </div>
                        <div class="flex flex-col">
                            <span class="text-sm font-semibold text-gray-700">Administrador Centro</span>
                            <span class="text-xs text-green-600 font-medium flex items-center">
                                <span class="w-1.5 h-1.5 rounded-full bg-ferrovia-neon mr-1"></span> En línea
                            </span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-ferrovia-bg p-8">
                @yield('content')
            </main>

        </div>
    </div>

    <script>
        function actualizarReloj() {
            const ahora = new Date();
            const opcionesFecha = { weekday: 'long', year: 'numeric', month: 'short', day: 'numeric' };
            const fecha = ahora.toLocaleDateString('es-ES', opcionesFecha);
            const hora = ahora.toLocaleTimeString('es-ES', { hour12: false });
            
            // Capitalizar la primera letra del día
            const fechaCapitalizada = fecha.charAt(0).toUpperCase() + fecha.slice(1);
            
            document.getElementById('reloj-sistema').textContent = `${fechaCapitalizada} | ${hora}`;
        }

        setInterval(actualizarReloj, 1000);
        actualizarReloj(); // Llamada inicial para no esperar 1 segundo
    </script>
</body>
</html>