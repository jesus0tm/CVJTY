<?php

$url = "https://catalegdades.caib.cat/resource/rjfm-vxun.xml";

try {
    // Cargar el contenido XML desde la URL
    $xml = simplexml_load_file($url);

    // Obtener parámetros de filtro
    $filtro_codigo_postal = isset($_GET['codigo_postal']) ? $_GET['codigo_postal'] : '';
    $filtro_municipio = isset($_GET['municipio']) ? $_GET['municipio'] : '';
    $filtro_nombre_comercial = isset($_GET['nombre_comercial']) ? $_GET['nombre_comercial'] : '';

    // Procesar y mostrar el formulario HTML con filtros desplegables
    echo '<html>';
    echo '<head>';
    echo '<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 12px;
        }
        th {
            background-color: #f4f4f4;
        }
        select, input {
            padding: 8px;
            margin: 4px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: #ffffff;
            cursor: pointer;
        }
        .recuento {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>';
    echo '</head>';
    echo '<body>';

    echo '<form method="get" action="">';

    // Filtro de Códigos Postales
    echo 'Código Postal: ';
    echo '<select name="codigo_postal">';
    echo '<option value="">Todos</option>';
    $codigos_postales = array();

    foreach ($xml->xpath('//row') as $row) {
        $direccion_completa = (string)$row->adre_a_de_l_establiment;
        // Extraer el código postal de la dirección completa
        preg_match('/\b\d{5}\b/', $direccion_completa, $matches);
        if (!empty($matches)) {
            $codigo_postal = $matches[0];
            if (!in_array($codigo_postal, $codigos_postales)) {
                $codigos_postales[] = $codigo_postal;
                $selected = ($filtro_codigo_postal == $codigo_postal) ? 'selected' : '';
                echo "<option value=\"$codigo_postal\" $selected>$codigo_postal</option>";
            }
        }
    }

    echo '</select>';

    // Filtro de Municipios
    echo 'Municipios: ';
    echo '<select name="municipio">';
    echo '<option value="">Todos</option>';
    $municipios = array();

    foreach ($xml->xpath('//row/municipi') as $municipio_element) {
        $municipio = (string)$municipio_element;

        if (!in_array($municipio, $municipios) && !empty($municipio)) {
            $municipios[] = $municipio;
            $selected = ($filtro_municipio == $municipio) ? 'selected' : '';
            echo "<option value=\"$municipio\" $selected>$municipio</option>";
        }
    }

    echo '</select>';

    // Filtro de Nombre Comercial (antes Empresa)
    echo 'Nombre Comercial: <input type="text" name="nombre_comercial" value="' . htmlspecialchars($filtro_nombre_comercial) . '">';

    echo '<input type="submit" value="Filtrar">';
    echo '</form>';

    // Procesar y mostrar la información en una tabla HTML
    echo '<table>';
    echo '<tr><th>Signatura</th><th>Nombre Comercial</th><th>Dirección Completa</th><th>Número de Vehículos</th></tr>';

    $recuento = 0;

    foreach ($xml->xpath('//row') as $row) {
        $nombre_comercial = (string)$row->denominaci_comercial; // Utilizando la información del nombre comercial
        $direccion_completa = (string)$row->adre_a_de_l_establiment;
        // Extraer el código postal de la dirección completa
        preg_match('/\b\d{5}\b/', $direccion_completa, $matches);
        $codigo_postal = (!empty($matches)) ? $matches[0] : '';
        $sigantura = (string)$row->signatura;
        $num_vehiculos = (string)$row->nombre_de_vehicles;
        $municipio = (string)$row->municipi; // Utilizando la información del municipio

        // Aplicar filtros
        $filtro_nombre_comercial = strtolower($filtro_nombre_comercial);
        $nombre_comercial_lower = strtolower($nombre_comercial);

        if (
            (empty($filtro_codigo_postal) || $filtro_codigo_postal == $codigo_postal) &&
            (empty($filtro_municipio) || $filtro_municipio == $municipio) &&
            (empty($filtro_nombre_comercial) || strpos($nombre_comercial_lower, $filtro_nombre_comercial) !== false)
        ) {
            echo "<tr><td>$sigantura</td><td>$nombre_comercial</td><td>$direccion_completa</td><td>$num_vehiculos</td></tr>";
            $recuento += (int)$num_vehiculos;
        }
    }

    echo '</table>';

    // Mostrar el recuento
    echo '<div class="recuento">Recuento Total de Vehículos: ' . $recuento . '</div>';

    echo '</body>';
    echo '</html>';

} catch (Exception $e) {
    echo "Error al cargar o procesar el archivo XML: " . $e->getMessage();
}

?>
