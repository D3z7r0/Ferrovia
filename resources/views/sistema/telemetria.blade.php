@extends('layouts.erp')

@section('title', 'Telemetría y Mapa | Ferrovia')

@section('content')
    <div class="mb-6 flex justify-between items-end">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Telemetría en Tiempo Real</h1>
            <p class="text-sm text-gray-500 mt-1">Monitoreo GPS de la flota del Tren Suburbano.</p>
        </div>
        <div class="flex space-x-3">
            <span class="flex items-center text-sm text-gray-600 bg-white px-3 py-1.5 rounded-lg border border-gray-200 shadow-sm">
                <span class="w-2.5 h-2.5 rounded-full bg-ferrovia-neon mr-2 animate-pulse"></span>
                Conexión Satelital Activa
            </span>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-2">
        <div id="mapa-ferrovia" class="w-full h-[650px] rounded-lg z-0 relative"></div>
    </div>

    <style>
        .tren-marker-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .tren-marker {
            width: 14px;
            height: 14px;
            background-color: var(--color-ferrovia-neon); /* Usa la variable de Tailwind */
            border-radius: 50%;
            border: 2px solid #ffffff;
            box-shadow: 0 0 0 rgba(57, 255, 20, 0.4);
            animation: pulse-ring 2s infinite;
        }

        /* Etiqueta de texto debajo del marcador */
        .tren-label {
            position: absolute;
            top: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 10px;
            font-weight: bold;
            white-space: nowrap;
            pointer-events: none;
        }

        @keyframes pulse-ring {
            0% { box-shadow: 0 0 0 0 rgba(57, 255, 20, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(57, 255, 20, 0); }
            100% { box-shadow: 0 0 0 0 rgba(57, 255, 20, 0); }
        }

        /* Ajustes para los popups de Leaflet para que combinen con el tema */
        .leaflet-popup-content-wrapper {
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .leaflet-popup-content {
            margin: 12px 16px;
            font-family: inherit;
        }
    </style>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Centrar el mapa en la zona del Tren Suburbano (Tlalnepantla de Baz aprox)
            // Coordenadas: [Latitud, Longitud], Zoom
            const map = L.map('mapa-ferrovia', {
                zoomControl: false // Ocultamos el control por defecto para ponerlo a la derecha
            }).setView([19.5404, -99.1895], 12);

            // Mover el control de zoom a la esquina inferior derecha
            L.control.zoom({ position: 'bottomright' }).addTo(map);

            // Capa base limpia y corporativa (CartoDB Light)
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
                subdomains: 'abcd',
                maxZoom: 19
            }).addTo(map);

            // Crear el icono personalizado usando HTML
            const crearIconoTren = (idTren) => {
                return L.divIcon({
                    className: 'custom-div-icon',
                    html: `
                        <div class="tren-marker-container">
                            <div class="tren-marker"></div>
                            <div class="tren-label">${idTren}</div>
                        </div>
                    `,
                    iconSize: [20, 20],
                    iconAnchor: [10, 10], // Centrar exactamente el pulso en la coordenada
                    popupAnchor: [0, -10]
                });
            };

            // Simulación de ubicaciones a lo largo de la ruta del Suburbano
            const trenes = [
                {
                    id: 'TRN-045',
                    lat: 19.4561, // Saliendo de Buenavista
                    lng: -99.1556,
                    velocidad: '45 km/h',
                    estatus: 'A tiempo',
                    destino: 'Cuautitlán'
                },
                {
                    id: 'TRN-012',
                    lat: 19.5404, // Por la estación Tlalnepantla
                    lng: -99.1895,
                    velocidad: '80 km/h',
                    estatus: 'A tiempo',
                    destino: 'Cuautitlán'
                },
                {
                    id: 'TRN-089',
                    lat: 19.6219, // Cerca de Lechería / Tultitlán
                    lng: -99.1722,
                    velocidad: '65 km/h',
                    estatus: 'Retraso leve (2m)',
                    destino: 'Buenavista'
                }
            ];

            // Renderizar los marcadores en el mapa
            trenes.forEach(tren => {
                // Generar contenido del Popup con Tailwind en línea
                const popupContent = `
                    <div class="min-w-[150px]">
                        <div class="font-bold text-ferrovia-blue border-b pb-1 mb-2">${tren.id}</div>
                        <div class="text-xs text-gray-600 space-y-1">
                            <p><b>Destino:</b> ${tren.destino}</p>
                            <p><b>Velocidad:</b> ${tren.velocidad}</p>
                            <p><b>Estatus:</b> 
                                <span class="${tren.estatus.includes('Retraso') ? 'text-red-500' : 'text-green-600'} font-semibold">
                                    ${tren.estatus}
                                </span>
                            </p>
                        </div>
                    </div>
                `;

                L.marker([tren.lat, tren.lng], { icon: crearIconoTren(tren.id) })
                    .addTo(map)
                    .bindPopup(popupContent);
            });
        });
    </script>
@endsection