<!DOCTYPE html>
<html>

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

  <title>PRODUCTO CARTESIANO</title>

  <!-- slider stylesheet -->
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
            <span>
            PRODUCTO CARTESIANO 
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">INICIO  <span class="sr-only">(current)</span></a>
                </li>
                                <li class="nav-item">
                  <a class="nav-link" href="defconjunto.html"> ¿QUE ES UN CONJUNTO? </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="defproducto.html"> ¿QUE ES UN PRODUCTO CARTESIANO?
                   </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="calculaproducto.html"> CALCULAR PRODUCTO </a>
                </li>
                                                <li class="nav-item">
                  <a class="nav-link" href="defmodular.html"> ARITMETICA MODULAR </a>
                </li>
                                <li class="nav-item">
                  <a class="nav-link" href="grafos.html"> GRAFOS </a>
                </li>
              </ul>
              <div class="user_option">
                <a href="">
                  <img src="images/user.png" alt="">
                </a>

              </div>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- php section -->

<h1>Resultado del Producto Cartesiano</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conjuntoA = explode(',', $_POST['conjuntoA']);
    $conjuntoB = explode(',', $_POST['conjuntoB']);

    function productoCartesiano($conjuntoA, $conjuntoB) {
        $resultado = array();

        foreach ($conjuntoA as $elementoA) {
            foreach ($conjuntoB as $elementoB) {
                $resultado[] = array($elementoA, $elementoB);
            }
        }

        return $resultado;
    }

    $resultadoCartesiano = productoCartesiano($conjuntoA, $conjuntoB);
?>

    <p>Conjunto A: [<?php echo implode(', ', $conjuntoA); ?>]</p>
    <p>Conjunto B: [<?php echo implode(', ', $conjuntoB); ?>]</p>

    <p>Producto Cartesiano:</p>
    <ul>
        <?php foreach ($resultadoCartesiano as $parOrdenado): ?>
            <li>(<?php echo $parOrdenado[0]; ?>, <?php echo $parOrdenado[1]; ?>)</li>
        <?php endforeach; ?>
    </ul>

<?php
}
?>

  <!-- end php section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; 2024 Todos los derechos reservados a Jaime Erick Pérez Romero
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- owl carousel script 
    -->
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