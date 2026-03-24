<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferrovia | Acceso al Sistema</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-ferrovia-bg flex items-center justify-center min-h-screen">

    <div class="bg-ferrovia-surface p-10 rounded-xl shadow-lg w-full max-w-md border border-gray-100">
        <div class="h-16 flex items-center px-6 border-b border-gray-100">
            <div class="w-8 h-8 bg-ferrovia-blue rounded flex items-center justify-center mr-3 shadow-sm">
                <span class="text-white font-bold text-lg">F</span>
            </div>
            <span class="text-xl font-bold text-gray-800 italic tracking-wide">FERROVIA</span>
        </div>

        <form action="{{ route('login.post') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Usuario</label>
                <input type="text" placeholder="admin@ferrovia.com" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-ferrovia-blue focus:border-transparent outline-none transition-all">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                <input type="password" placeholder="••••••••" 
                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-ferrovia-blue focus:border-transparent outline-none transition-all">
            </div>

            <button type="submit" 
                class="w-full bg-ferrovia-blue text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-colors shadow-md active:transform active:scale-[0.98]">
                Ingresar al Sistema Central
            </button>
        </form>

        <p class="text-center text-xs text-gray-400 mt-8 uppercase tracking-widest">
            Control de Tráfico Ferroviario v1.0
        </p>
    </div>

</body>
</html>