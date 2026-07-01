<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>DocFlow - Visor Local</title>
    <script src="https://unpkg.com/jszip/dist/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/docx-preview@0.1.15/dist/docx-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

    <style>
        body {
            margin: 0;
            background-color: #f3f4f6;
            font-family: sans-serif;
        }

        #toolbar {
            background: #1e293b;
            color: white;
            padding: 12px 20px;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #toolbar-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        /* Botón de descarga elegante */
        .btn-download {
            background-color: #22c55e;
            color: white;
            border: none;
            padding: 8px 16px;
            font-size: 13px;
            font-weight: bold;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: background-color 0.2s;
        }

        .btn-download:hover {
            background-color: #16a34a;
        }

        #canvas-container {
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        #viewer {
            background: white;
            width: 100%;
            max-width: 900px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            padding: 40px;
            min-height: 800px;
            border-radius: 4px;
            overflow-x: auto;
        }

        /* Estilos para tablas de Excel */
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #cbd5e1;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f1f5f9;
        }
    </style>
</head>

<body>

    <div id="toolbar">
        <span>📄 {{ $fileName }}</span>
        <div id="toolbar-actions">
            <span style="font-size: 12px; opacity: 0.8; margin-right: 10px;">Modo Inmutable - DocFlow</span>
            <button onclick="descargarArchivo()" class="btn-download">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                    <polyline points="7 10 12 15 17 10"></polyline>
                    <line x1="12" y1="15" x2="12" y2="3"></line>
                </svg>
                Descargar Original
            </button>
        </div>
    </div>

    <div id="canvas-container">
        <div id="viewer">Cargando y procesando documento localmente...</div>
    </div>

    <script>
        const fileUrl = "{{ $fileUrl }}";
        const extension = "{{ $extension }}";
        const fileName = "{{ $fileName }}";
        const viewerContainer = document.getElementById("viewer");

        // 1. Descargar el archivo binario para renderizarlo visualmente en la pestaña
        fetch(fileUrl)
            .then(response => {
                if (!response.ok) throw new Error("No se pudo obtener el archivo del servidor IIS.");
                return response.blob();
            })
            .then(blob => {
                viewerContainer.innerHTML = "";

                if (extension === 'docx' || extension === 'doc') {
                    docx.renderAsync(blob, viewerContainer)
                        .catch(err => viewerContainer.innerHTML = "❌ Error al estructurar el Word visualmente: " + err);
                } else if (extension === 'xlsx' || extension === 'xls') {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const data = new Uint8Array(e.target.result);
                        const workbook = XLSX.read(data, {
                            type: 'array'
                        });
                        const firstSheetName = workbook.SheetNames[0];
                        const worksheet = workbook.Sheets[firstSheetName];
                        viewerContainer.innerHTML = XLSX.utils.sheet_to_html(worksheet);
                    };
                    reader.readAsArrayBuffer(blob);
                }
            })
            .catch(error => {
                viewerContainer.innerHTML = "❌ Error en el visor: " + error.message;
            });

        // 🔥 2. FUNCIÓN PARA EL BOTÓN DE DESCARGA
        function descargarArchivo() {
            // Creamos un enlace invisible temporal apuntando al archivo binario crudo
            const link = document.createElement('a');
            link.href = fileUrl; // Reutiliza la URL con el parámetro ?raw=1
            link.download = fileName; // Fuerza al navegador a guardarlo con su extensión y nombre original
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>
</body>

</html>
