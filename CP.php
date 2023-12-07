<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Empresas de Alquiler de Vehículos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    .filtro {
      margin-bottom: 10px;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      border: 1px solid ;
      padding: 10px;
      text-align: left;
    }

  </style>
</head>
<body>

<h2>Listado de Empresas de Alquiler de Vehículos</h2>

<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="filtro">
    <label for="codigoPostal">Filtrar por Código Postal:</label>
    <select name="codigoPostal">
      <option value="">Todos</option>
      <option value="07160" <?php echo ($_GET['codigoPostal'] ?? '') === '07160' ? 'selected' : ''; ?>>07160</option>
      <option value="07610" <?php echo ($_GET['codigoPostal'] ?? '') === '07610' ? 'selected' : ''; ?>>07610</option>
      <option value="07181" <?php echo ($_GET['codigoPostal'] ?? '') === '07181' ? 'selected' : ''; ?>>07181</option>
      <option value="07300" <?php echo ($_GET['codigoPostal'] ?? '') === '07300' ? 'selected' : ''; ?>>07300</option>
      <option value="07180" <?php echo ($_GET['codigoPostal'] ?? '') === '07180' ? 'selected' : ''; ?>>07180</option>
      <option value="07589" <?php echo ($_GET['codigoPostal'] ?? '') === '07589' ? 'selected' : ''; ?>>07589</option>
      <option value="07600" <?php echo ($_GET['codigoPostal'] ?? '') === '07600' ? 'selected' : ''; ?>>07600</option>
      <option value="07015" <?php echo ($_GET['codigoPostal'] ?? '') === '07015' ? 'selected' : ''; ?>>07015</option>
      <option value="07014" <?php echo ($_GET['codigoPostal'] ?? '') === '07014' ? 'selected' : ''; ?>>07014</option>
      <option value="07400" <?php echo ($_GET['codigoPostal'] ?? '') === '07400' ? 'selected' : ''; ?>>07400</option>
      <option value="07670" <?php echo ($_GET['codigoPostal'] ?? '') === '07670' ? 'selected' : ''; ?>>07670</option>
      <option value="07141" <?php echo ($_GET['codigoPostal'] ?? '') === '07141' ? 'selected' : ''; ?>>07141</option>
      <option value="07579" <?php echo ($_GET['codigoPostal'] ?? '') === '07579' ? 'selected' : ''; ?>>07579</option>
      <option value="07011" <?php echo ($_GET['codigoPostal'] ?? '') === '07011' ? 'selected' : ''; ?>>07011</option>
      <option value="07560" <?php echo ($_GET['codigoPostal'] ?? '') === '07560' ? 'selected' : ''; ?>>07560</option>
      <option value="07458" <?php echo ($_GET['codigoPostal'] ?? '') === '07458' ? 'selected' : ''; ?>>07458</option>
      <option value="07688" <?php echo ($_GET['codigoPostal'] ?? '') === '07688' ? 'selected' : ''; ?>>07688</option>
      <option value="07590" <?php echo ($_GET['codigoPostal'] ?? '') === '07590' ? 'selected' : ''; ?>>07590</option>
      <option value="07659" <?php echo ($_GET['codigoPostal'] ?? '') === '07659' ? 'selected' : ''; ?>>07659</option>
      <option value="07181" <?php echo ($_GET['codigoPostal'] ?? '') === '07181' ? 'selected' : ''; ?>>07181</option>
      <option value="07660" <?php echo ($_GET['codigoPostal'] ?? '') === '07660' ? 'selected' : ''; ?>>07660</option>
    </select>
  </div>

  <div class="filtro">
    <label>Filtrar por Municipio:</label>
    <select name="municipio">
      <option value="">Todos</option>
      <option value="CALVIÀ" <?php echo ($_GET['municipio'] ?? '') === 'CALVIÀ' ? 'selected' : ''; ?>>CALVIÀ</option>
      <option value="PALMA" <?php echo ($_GET['municipio'] ?? '') === 'PALMA' ? 'selected' : ''; ?>>PALMA</option>
      <option value="INCA" <?php echo ($_GET['municipio'] ?? '') === 'INCA' ? 'selected' : ''; ?>>INCA</option>
      <option value="CAPDEPERA" <?php echo ($_GET['municipio'] ?? '') === 'CAPDEPERA' ? 'selected' : ''; ?>>CAPDEPERA</option>
      <option value="ALCÚDIA" <?php echo ($_GET['municipio'] ?? '') === 'ALCÚDIA' ? 'selected' : ''; ?>>ALCÚDIA</option>
      <option value="FELANITX" <?php echo ($_GET['municipio'] ?? '') === 'FELANITX' ? 'selected' : ''; ?>>FELANITX</option>
      <option value="MARRATXÍ" <?php echo ($_GET['municipio'] ?? '') === 'MARRATXÍ' ? 'selected' : ''; ?>>MARRATXÍ</option>
      <option value="ARTÀ" <?php echo ($_GET['municipio'] ?? '') === 'ARTÀ' ? 'selected' : ''; ?>>ARTÀ</option>
      <option value="SANT LLORENÇ DES CARDASSAR" <?php echo ($_GET['municipio'] ?? '') === 'SANT LLORENÇ DES CARDASSAR' ? 'selected' : ''; ?>>SANT LLORENÇ DES CARDASSAR</option>
      <option value="SANTANYÍ" <?php echo ($_GET['municipio'] ?? '') === 'SANTANYÍ' ? 'selected' : ''; ?>>SANTANYÍ</option>
      <option value="POLLENÇA" <?php echo ($_GET['municipio'] ?? '') === 'POLLENÇA' ? 'selected' : ''; ?>>POLLENÇA</option>
    </select>
  </div>

  <div class="filtro">
    <label for="nombreFiltro">Filtrar por Nombre:</label>
    <input type="text" name="nombreFiltro" value="<?= $_GET['nombreFiltro'] ?? '' ?>">
  </div>

  <input type="submit" value="Filtrar">
</form>

<div id="empresas-lista">
  <table>
    <thead>
      <tr>
        <th>Licencia de rentacar</th>
        <th>Nombre comercial</th>
        <th>Dirección completa</th>
        <th>Número de vehículos</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $empresas = [
        ['Licencia de rentacar' => 'RC/1', 'Nombre comercial' => 'AUTOS MAR AZUL', "Dirección completa" => "Carrer PEGUERA, 49 local 12. 07160 Peguera, CALVIÀ, Mallorca", 'numeroVehiculos' => 50],
        ['Licencia de rentacar' => 'RC/2', 'Nombre comercial' => 'BLAURENT', "Dirección completa" => "Carrer LLAUT, 22 pis BAIXOS. 07610 Can Pastilla, PALMA, Mallorca", 'numeroVehiculos' => 44],
        ['Licencia de rentacar' => 'RC/3', 'Nombre comercial' => 'AUTOS SEMA', "Dirección completa" => "Passeig ILLETAS, 32. 07181 Cas Català-Illetes, CALVIÀ, Mallorca",  'numeroVehiculos' => 24],
        ['Licencia de rentacar' => 'RC/4', 'Nombre comercial' => 'QUALITY RENT', "Dirección completa" => "Carrer DELS SABATERS, 111. 07300 INCA, Mallorca", 'numeroVehiculos' => 82],
    	  ['Licencia de rentacar' => 'RC/5', 'Nombre comercial' => 'ROSSLIND', "Dirección completa" => "Carrer PUIG DES TEIX, 6 local 1. 07180 Santa Ponça, CALVIÀ, Mallorca" ,  'numeroVehiculos' => 67],
    	  ['Licencia de rentacar' => 'RC/6', 'Nombre comercial' => 'AUTOS SA CALA', "Dirección completa" => "Avinguda provensals, 1. 07589 Font De La Cala, CAPDEPERA, Mallorca" , 'numeroVehiculos' => 32],
    	  ['Licencia de rentacar' => 'RC/7', 'Nombre comercial' => 'SERVIAUTO', "Dirección completa" => "Carrer MARBELLA, 43. 07610 PALMA, Mallorca", 'numeroVehiculos' => 54],
    	  ['Licencia de rentacar' => 'RC/8', 'Nombre comercial' => 'BELMIAUTOS', "Dirección completa" => "Carrer LLIBANYA, 10 pis BAIXOS. 07600 Arenal (L'), PALMA, Mallorca", 'numeroVehiculos' => 6],
    	  ['Licencia de rentacar' => 'RC/9', 'Nombre comercial' => 'AUTOS BONSAI', "Dirección completa" => "Carrer atalaya, 1. 07160 Peguera, CALVIÀ, Mallorca", 'numeroVehiculos' => 34],
   	  ['Licencia de rentacar' => 'RC/10', 'Nombre comercial' => 'RENT A BIKE', "Dirección completa" => "Avinguda JOAN MIRO, 330 pis BAIXOS porta D. 07015 PALMA, Mallorca",  'numeroVehiculos' => 37],
    	  ['Licencia de rentacar' => 'RC/11', 'Nombre comercial' => 'SERVICIO LUCKY', "Dirección completa" => "Carrer Oliver, 20. 07014 PALMA, Mallorca",  'numeroVehiculos' => 42],
  	  	  ['Licencia de rentacar' => 'RC/12', 'Nombre comercial' => 'AUTOS VICENS', "Dirección completa" => "Avinguda PERE MAS I REUS, 34 local 2. 07400 ALCÚDIA, Mallorca",  'numeroVehiculos' => 12],
   	  ['Licencia de rentacar' => 'RC/13', 'Nombre comercial' => 'AUTOS BARCELO', "Dirección completa" => "Carrer CALA MARSAL, 18. 07670 Portocolom, FELANITX, Mallorca" ,  'numeroVehiculos' => 3],
   	  ['Licencia de rentacar' => 'RC/14', 'Nombre comercial' => 'BOSCH RENT A CAR', "Dirección completa" => "Carrer LICORERS, 2 pis BAIXO. 07141 MARRATXÍ, Mallorca" , 'numeroVehiculos' => 58],
   	  ['Licencia de rentacar' => 'RC/15', 'Nombre comercial' => 'XOROI CARS', "Dirección completa" => "Carrer MAJOR, 28 local 3. 07579 Colònia De Sant Pere, ARTÀ, Mallorca" ,  'numeroVehiculos' => 53],
   	  ['Licencia de rentacar' => 'RC/16', 'Nombre comercial' => 'TRAVITGO', "Dirección completa" => "Carrer FRANCESC VALLDUVI, 3. 07011 Polígon Industrial De Can Valero, PALMA, Mallorca" ,  'numeroVehiculos' => 22],
   	  ['Licencia de rentacar' => 'RC/17', 'Nombre comercial' => 'AUTOS MALLORCA', "Dirección completa" => "Carrer MARBELLA, 53. 07610 Arenal (L'), PALMA, Mallorca" ,  'numeroVehiculos' => 69], 
   	  ['Licencia de rentacar' => 'RC/18', 'Nombre comercial' => 'TRIP CARS', "Dirección completa" => "Avinguda SA COMA, 24 lletra A-B. 07560 Cala Millor, SANT LLORENÇ DES CARDASSAR, Mallorca" ,  'numeroVehiculos' => 140], 
   	  ['Licencia de rentacar' => 'RC/19', 'Nombre comercial' => 'STARCAR RENTAL', "Dirección completa" => "Carrer MARBELLA, 61. 07610 Arenal (L'), PALMA, Mallorca" ,'numeroVehiculos' => 35], 
   	  ['Licencia de rentacar' => 'RC/20', 'Nombre comercial' => 'FERNANDO CARO (FC)', "Dirección completa" => "Avinguda NOTARIO ALEMANY, 30. 07181 Magaluf, CALVIÀ, Mallorca" , 'numeroVehiculos' => 196],
   	  ['Licencia de rentacar' => 'RC/21', 'Nombre comercial' => 'SOL&MAR', "Dirección completa" => "Carrer MARBELLA, 20 local 92. 07610 Arenal (L'), PALMA, Mallorca" , 'numeroVehiculos' => 108], 
   	  ['Licencia de rentacar' => 'RC/22', 'Nombre comercial' => 'LIFE CARS', "Dirección completa" => "Carrer SANT ANDREU, 95. 07590 Cala Rajada, CAPDEPERA, Mallorca" ,'numeroVehiculos' => 52], 
   	  ['Licencia de rentacar' => 'RC/23', 'Nombre comercial' => 'HIPER RENT A CAR', "Dirección completa" => "Camí de CAN PASTILLA, 41. 07610 Can Pastilla, PALMA, Mallorca" ,  'numeroVehiculos' => 2056],   
		  ['Licencia de rentacar' => 'RC/24', 'Nombre comercial' => 'VIMA RENT A CAR', "Dirección completa" => "Carrer LA MARINA, 25. 07659 Cala Figuera, SANTANYÍ, Mallorca" ,  'numeroVehiculos' => 267],   
		  ['Licencia de rentacar' => 'RC/25', 'Nombre comercial' => 'AUTO MURADA', "Dirección completa" => "Carrer COMUNITAT VALENCIANA, 311. 07688 Cala Murada, MANACOR, Mallorca" ,  'numeroVehiculos' => 37],
		  ['Licencia de rentacar' => 'RC/26', 'Nombre comercial' => 'BORDOY VIDAL', "Dirección completa" => "Carrer HERNAN CORTES, 7. 07458 Can Picafort, SANTA MARGALIDA, Mallorca" ,  'numeroVehiculos' => 32],
		  ['Licencia de rentacar' => 'RC/27', 'Nombre comercial' => 'LAS MARAVILLAS', "Dirección completa" => "Plaça DELS NINS, 16. 07600 PALMA, Mallorca" ,  'numeroVehiculos' => 52], 
		  ['Licencia de rentacar' => 'RC/28', 'Nombre comercial' => 'ROYAL RENT', "Dirección completa" => "Camí CAN PASTILLA, 110. 07610 PALMA, Mallorca" ,  'numeroVehiculos' => 242], 
		  ['Licencia de rentacar' => 'RC/29', 'Nombre comercial' => 'FORMENTOR', "Dirección completa" => "Passeig SARALEGUI, 106. 07470 Port De Pollença, POLLENÇA, Mallorca" ,  'numeroVehiculos' => 225], 
		  ['Licencia de rentacar' => 'RC/30', 'Nombre comercial' => 'AUTHOMAR', "Dirección completa" => "Avinguda SON RIGO, 25. 07610 PALMA, Mallorca" ,  'numeroVehiculos' => 54], 
		  ['Licencia de rentacar' => 'RC/31', 'Nombre comercial' => 'PROTUCARS', "Dirección completa" => "Avinguda SA COMA, 14. 07560 Cala Millor, SANT LLORENÇ DES CARDASSAR, Mallorca" ,  'numeroVehiculos' => 100],
		  ['Licencia de rentacar' => 'RC/32', 'Nombre comercial' => 'AUTO TRANSPORTE TURÍSTICO ESPAÑOL(ATESA) (ENTERPRISE, NATIONAL,ALAMO)', "Dirección completa" => "Avinguda GABRIEL ROCA, s/n. 07014 PALMA, Mallorca" ,  'numeroVehiculos' => 3463],
		  ['Licencia de rentacar' => 'RC/33', 'Nombre comercial' => 'HERTZ//DOLLAR', "Dirección completa" => "Carrer ferrers, 1. 07500 MANACOR, Mallorca" ,  'numeroVehiculos' => 5814],
		  ['Licencia de rentacar' => 'RC/34', 'Nombre comercial' => 'ANY TRAVEL', "Dirección completa" => "Carrer JAIME I, 86. 07180 Santa Ponça, CALVIÀ, Mallorca" ,  'numeroVehiculos' => 16],
		  ['Licencia de rentacar' => 'RC/35', 'Nombre comercial' => "AUTOS RIGO", "Dirección completa" => "Avinguda BIENVENIDOS, 54. 07660 Cala D'Or, SANTANYÍ, Mallorca" ,  'numeroVehiculos' => 35],
		  ['Licencia de rentacar' => 'RC/36', 'Nombre comercial' => "DRIVALIA", "Dirección completa" => "Carrer CANAL DE SANT JORDI, 9-13. 07610 PALMA, Mallorca" ,  'numeroVehiculos' => 727], 
		  ['Licencia de rentacar' => 'RC/37', 'Nombre comercial' => "CLICK&RENT", "Dirección completa" => "Carrer CAMP FRANC, 27. 07199 Can Pastilla, PALMA, Mallorca" ,  'numeroVehiculos' => 2537],
		  ['Licencia de rentacar' => 'RC/38', 'Nombre comercial' => "AUTOS NIFERS", "Dirección completa" => "Carrer BALANDRE, 2 local 7. 07610 PALMA, Mallorca" ,  'numeroVehiculos' => 20], 
		  ['Licencia de rentacar' => 'RC/39', 'Nombre comercial' => "RENT AUTO L'AGULLA", "Dirección completa" => "Carrer DE L'AGULLA, 116. 07590 Cala Rajada, CAPDEPERA, Mallorca" ,  'numeroVehiculos' => 21],    
		  ['Licencia de rentacar' => 'RC/40', 'Nombre comercial' => "AVIS BUDGET", "Dirección completa" => "Carretera llucmajor Saranjasa Km. 9,9, 9,9. 07610 PALMA, Mallorca" ,  'numeroVehiculos' => 21],  
		  ['Licencia de rentacar' => 'RC/41', 'Nombre comercial' => "AUTOS ALCINA", "Dirección completa" => "Avinguda INGENIERO GABRIEL ROCA, 16. 07014 PALMA, Mallorca" ,  'numeroVehiculos' => 23],    
		  ['Licencia de rentacar' => 'RC/42', 'Nombre comercial' => "CARPAY", "Dirección completa" => "Avinguda INGENIERO GABRIEL ROCA, 16. 07014 PALMA, Mallorca" ,  'numeroVehiculos' => 38],  
		  ['Licencia de rentacar' => 'RC/43', 'Nombre comercial' => "AUTOS CARPAY", "Dirección completa" => "Passeig COLON, 149. 07458 Can Picafort, SANTA MARGALIDA, Mallorca" ,  'numeroVehiculos' => 5],   
		  ['Licencia de rentacar' => 'RC/44', 'Nombre comercial' => "RECORD GO", "Dirección completa" => "Zona AEROPUERTO SON SANT JOAN, S/N. 07611 Son Sant Joan, PALMA, Mallorca" ,  'numeroVehiculos' => 5224],   
		  ['Licencia de rentacar' => 'RC/45', 'Nombre comercial' => "AVANCE", "Dirección completa" => "Carrer Benito Feijoo, 2 local 9. 07181 Portals Nous, CALVIÀ, Mallorca" ,  'numeroVehiculos' => 85],  
		  ['Licencia de rentacar' => 'RC/46', 'Nombre comercial' => "AUTOS RIERA", "Dirección completa" => "Carrer SIRENAS, 36-38. 07184 Cala Vinyes, CALVIÀ, Mallorca" ,  'numeroVehiculos' => 111],   
		  ['Licencia de rentacar' => 'RC/47', 'Nombre comercial' => "AUTOS CANYAMEL", "Dirección completa" => "Via de las cuevas, s/n. 07589 Canyamel, CAPDEPERA, Mallorca" ,  'numeroVehiculos' => 54],   
        ['Licencia de rentacar' => 'RC/48', 'Nombre comercial' => "BALEAR CAR", "Dirección completa" => "Carrer GRAN VIA ASIMA, 13. 07009 PALMA, Mallorca" ,  'numeroVehiculos' => 77],   
        ['Licencia de rentacar' => 'RC/49', 'Nombre comercial' => "CENTAURO", "Dirección completa" => "Camí SON FANGOS (SOM OMS PARCELA 2Y 3), 147. 07199 Can Pastilla, PALMA, Mallorca" ,  'numeroVehiculos' => 2513],   
        ['Licencia de rentacar' => 'RC/50', 'Nombre comercial' => "AUTOS CASTELLO", "Dirección completa" => "Carrer BERENGUER DE TORNAMIRA, 7 pis BAIX. 07012 PALMA, Mallorca" ,  'numeroVehiculos' => 37],   
        ['Licencia de rentacar' => 'RC/51', 'Nombre comercial' => "SALESCA", "Dirección completa" => "Avinguda ALBUFERA. DE S', 57B. 07458 MURO, Mallorca" ,  'numeroVehiculos' => 111],  
        ['Licencia de rentacar' => 'RC/52', 'Nombre comercial' => "EUROPCAR / INTERRENT", "Carretera AEROPUERTO SON SANT JOAN, S/N. 07611 Son Sant Joan, PALMA, Mallorca" => 6138],  
        ['Licencia de rentacar' => 'RC/53', 'Nombre comercial' => "AVIS", "Dirección completa" => "Avinguda BIENVENIDOS, 74. 07660 Cala D'Or, SANTANYÍ, Mallorca" ,  'numeroVehiculos' => 40],  
        ['Licencia de rentacar' => 'RC/54', 'Nombre comercial' => "ISCAR", "Dirección completa" => "Carretera PALMA A ANDRATX, 32. 07181 CALVIÀ, Mallorca" ,  'numeroVehiculos' => 97],  
        ['Licencia de rentacar' => 'RC/55', 'Nombre comercial' => "CONSTRUAUTO", "Dirección completa" => "Avinguda SON NOGUERA, 5 lletra D. 07620 LLUCMAJOR, Mallorca" ,  'numeroVehiculos' => 89],  
        ['Licencia de rentacar' => 'RC/56', 'Nombre comercial' => "IBERAUTO", "Dirección completa" => "Passeig INGENIERO GABRIEL ROCA, 13. 07014 PALMA, Mallorca" ,  'numeroVehiculos' => 59],  
        ['Licencia de rentacar' => 'RC/57', 'Nombre comercial' => "TRANSFER RENT", "Dirección completa" => "Camí CAN PASTILLA, 74. 07610 Can Pastilla, PALMA, Mallorca" ,  'numeroVehiculos' => 75],  
        ['Licencia de rentacar' => 'RC/58', 'Nombre comercial' => "ROIG RENT A CAR-HASSO", "Dirección completa" => "Avinguda BIENVENIDOS, 64. 07660 Cala D'Or, SANTANYÍ, Mallorca" ,  'numeroVehiculos' => 1509],  
        ['Licencia de rentacar' => 'RC/59', 'Nombre comercial' => "AUTOS LAGOON", "Dirección completa" => "Avinguda PEDRO MAS Y REUS, 18. 07400 ALCÚDIA, Mallorca" ,  'numeroVehiculos' => 200], 
        ['Licencia de rentacar' => 'RC/60', 'Nombre comercial' => "AUTOS COLONIA", "Dirección completa" => "Avinguda MARQUES DE PALMER, 8. 07638 Colònia De Sant Jordi, SES SALINES, Mallorca" ,  'numeroVehiculos' => 143],  
      ];

      foreach ($empresas as $empresa) {
        $codigoPostalFiltro = $_GET['codigoPostal'] ?? '';
        $municipioFiltro = $_GET['municipio'] ?? '';
        $nombreFiltro = strtolower($_GET['nombreFiltro'] ?? '');

        if (
          ($codigoPostalFiltro === '' || strpos($empresa['Dirección completa'], $codigoPostalFiltro) !== false) &&
          ($municipioFiltro === '' || strpos(strtolower($empresa['Dirección completa']), strtolower($municipioFiltro)) !== false) &&
          ($nombreFiltro === '' || strpos(strtolower($empresa['Nombre comercial']), $nombreFiltro) !== false)
        ) {
          echo '<tr>';
          echo '<td>' . $empresa['Licencia de rentacar'] . '</td>';
          echo '<td>' . $empresa['Nombre comercial'] . '</td>';
          echo '<td>' . $empresa['Dirección completa'] . '</td>';
          echo '<td>' . $empresa['numeroVehiculos'] . '</td>';
          echo '</tr>';
        }
      }
      ?>
    </tbody>
  </table>
</div>

</body>
</html>
