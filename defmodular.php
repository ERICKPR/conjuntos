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

  <title>ARITMETICA MODULAR</title>

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
                <a class="nav-link" href="calculafuncion.html"> RELACIONES </a>
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


  <!-- who section -->

  <section class="who_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="img-box">
            <img src="images/arit.png" alt="">
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
              ARITMETICA MODULAR
              </h2>
            </div>
            <p>
              La aritmética modular es una rama de las matemáticas que se centra en el estudio de las propiedades y operaciones de los números enteros en relación con un número fijo llamado módulo. En la aritmética modular, dos números se consideran equivalentes si su diferencia es un múltiplo entero del módulo dado.
              En otras palabras, en aritmética modular, se trabaja con el concepto de congruencia, donde dos números son congruentes (se escriben a ≡ b (mod m)) si al dividir la diferencia entre ellos por el módulo se obtiene un número entero. Esta noción de congruencia es fundamental en la aritmética modular y se utiliza para resolver una variedad de problemas matemáticos, como ecuaciones diofánticas, teorema chino del resto, criptografía, entre otros.
            </p>
            <div>
              <h5>
              Dato curioso 
              </h5> <p>
              La aritmética modular tiene diversas aplicaciones en la informática, la criptografía, la teoría de números y otros campos de las matemáticas y la ciencia. Es una herramienta poderosa y versátil que permite abordar problemas de una manera estructurada y eficiente, aprovechando las propiedades únicas de los números enteros en relación con un módulo específico.
            </div>
          </div>
        </div>

      </div>
    </div>
                   <form method="post"> <center> 
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="num1" required><br><br>

        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="num2" required><br><br>

        <label for="modulo">Módulo:</label>
        <input type="number" id="modulo" name="modulo" required><br><br>

        <label for="operacion">Operación:</label>
        <select id="operacion" name="operacion">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicación</option>
            <option value="exponenciacion">Exponenciación</option>
        </select><br><br>

        <input type="submit" value="Calcular">
    </form> </center>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $modulo = $_POST['modulo'];
        $operacion = $_POST['operacion'];

        switch ($operacion) {
            case 'suma':
                $resultado = ($num1 + $num2) % $modulo;
                echo "El resultado de la suma modular es: $resultado";
                break;
            case 'resta':
                $resultado = ($num1 - $num2) % $modulo;
                echo "El resultado de la resta modular es: $resultado";
                break;
            case 'multiplicacion':
                $resultado = ($num1 * $num2) % $modulo;
                echo "El resultado de la multiplicación modular es: $resultado";
                break;
            case 'exponenciacion':
                $resultado = bcpowmod($num1, $num2, $modulo); // Función para exponenciación modular en PHP
                echo "El resultado de la exponenciación modular es: $resultado";
                break;
            default:
                echo "Operación no válida.";
                break;
        }
    }
    ?>
  </section>

  <!-- end who section -->

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