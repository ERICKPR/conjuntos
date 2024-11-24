<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>RELACIONES</title>

  <link rel="stylesheet" type="text/css" href="css/result-style.css" />
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.html">
            <span>TIPO DE RELACION</span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">INICIO <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="defconjunto.html"> ¿QUE ES UN CONJUNTO? </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="defproducto.html"> ¿QUE ES UN PRODUCTO CARTESIANO? </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="calculaproducto.html"> CALCULAR PRODUCTO </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="calculafuncion.html"> RELACIONES </a>
                </li>
              </ul>
              <div class="user_option">
                <a href=""><img src="images/user.png" alt=""></a>
              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>

  <!-- php section -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener las relaciones desde el formulario
    $relaciones = $_POST["relaciones"];

    // Verificar si el campo de relaciones no está vacío
    if (!empty($relaciones)) {
        // Convertir las relaciones ingresadas a un array
        $relArray = explode(";", $relaciones);
        $relArray = array_map('trim', $relArray);
        $relArray = array_filter($relArray);
        $relArray = array_map(function($rel) {
            return explode(",", trim($rel, " ()"));
        }, $relArray);

        // Mostrar las relaciones ingresadas
        echo "<h2>Relaciones ingresadas:</h2>";
        echo "<p>{$relaciones}</p>";

        // Procesar las relaciones y determinar las propiedades
        $propiedades = determinarPropiedades($relArray);

        // Muestra el resultado de las propiedades
        echo "<h2>Resultado de las propiedades:</h2>";
        echo "<div class='resultado-propiedades'>";
        echo "<p>Reflexividad: " . ($propiedades['reflexividad'] ? 'Sí' : 'No') . "</p>";
        echo "<p>Transitividad: " . ($propiedades['transitividad'] ? 'Sí' : 'No') . "</p>";
        echo "<p>Simetría: " . ($propiedades['simetria'] ? 'Sí' : 'No') . "</p>";
        echo "<p>Antisimetría: " . ($propiedades['antisimetria'] ? 'Sí' : 'No') . "</p>";
        echo "</div>";

        // Determinar tipo de relación
        if ($propiedades['reflexividad'] && $propiedades['antisimetria'] && $propiedades['transitividad'] && esComparable($relArray)) {
            echo "<h2>La relación es de orden parcial.</h2>";
        } elseif ($propiedades['reflexividad'] && $propiedades['simetria'] && $propiedades['transitividad']) {
            echo "<h2>La relación es de equivalencia.</h2>";
        } else {
            echo "<h2>La relación no es ni de equivalencia ni de orden parcial.</h2>";
        }
    } else {
        echo "<p class='error'>¡Error! Debes ingresar relaciones.</p>";
    }
}

function esComparable($relArray)
{
    $elementos = array_unique(array_merge(...$relArray));
    foreach ($elementos as $elem1) {
        foreach ($elementos as $elem2) {
            if ($elem1 != $elem2 && !in_array([$elem1, $elem2], $relArray) && !in_array([$elem2, $elem1], $relArray)) {
                return false;
            }
        }
    }
    return true;
}

// Función para determinar propiedades
function determinarPropiedades($relArray)
{
    $elementos = array_unique(array_merge(...$relArray));
    sort($elementos);

    $reflexiva = esReflexiva($relArray, $elementos);
    $simetrica = esSimetrica($relArray);
    $antisimetrica = esAntisimetrica($relArray);
    $transitiva = esTransitiva($relArray);

    return array(
        'reflexividad' => $reflexiva,
        'simetria' => $simetrica,
        'antisimetria' => $antisimetrica,
        'transitividad' => $transitiva
    );
}

function esReflexiva($relArray, $elementos)
{
    foreach ($elementos as $elem) {
        if (!in_array([$elem, $elem], $relArray)) {
            return false;
        }
    }
    return true;
}

function esSimetrica($relArray)
{
    foreach ($relArray as $par) {
        if (!in_array([$par[1], $par[0]], $relArray)) {
            return false;
        }
    }
    return true;
}

function esAntisimetrica($relArray)
{
    foreach ($relArray as $par) {
        if ($par[0] != $par[1] && in_array([$par[1], $par[0]], $relArray)) {
            return false;
        }
    }
    return true;
}

function esTransitiva($relArray)
{
    foreach ($relArray as $par1) {
        foreach ($relArray as $par2) {
            if ($par1[1] == $par2[0] && !in_array([$par1[0], $par2[1]], $relArray)) {
                return false;
            }
        }
    }
    return true;
}
?>


  </div>

  <!-- seccion del php -->
  <!-- seccion del footer -->
  <section class="container-fluid footer_section">
    <p>&copy; 2024 Todos los derechos reservados a Jaime Erick Pérez Romero</p>
  </section>
  <!-- fin del footer -->
  
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!-- owl carousel script -->
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 0,
      navText: [],
      center: true,
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        1000: {
          items: 3
        }
      }
    });
  </script>
  <!-- end owl carousel script -->

</body>

</html>
