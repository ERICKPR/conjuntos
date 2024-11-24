<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nodos = $_POST['nodos'];
  $aristas = $_POST['aristas'];

  // Validación básica de nodos y aristas
  if (empty($nodos) || empty($aristas)) {
    echo "Por favor, introduce nodos y aristas válidos.";
    exit;
  }

  // Convertir nodos y aristas a JSON para ser utilizados en el script JavaScript
  $nodos_json = json_encode($nodos);
  $aristas_json = json_encode($aristas);

  echo "
    <h2>Nodos y Aristas</h2>
    <div id='graph-container' style='width: 100%; height: 500px; border: 1px solid #ccc; margin-bottom: 20px;'></div>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js'></script>
    <script type='text/javascript'>
      var nodos = $nodos_json;
      var aristas = $aristas_json;
      
      var nodes = new vis.DataSet([]);
      var edges = new vis.DataSet([]);
      
      nodos.forEach(function(nodo, index) {
        nodes.add({ id: index + 1, label: nodo });
      });
      
      aristas.forEach(function(arista) {
        var nodes = arista.split(',');
        if (nodes.length === 2) {
          edges.add({ from: parseInt(nodes[0]), to: parseInt(nodes[1]) });
        }
      });
      
      var container = document.getElementById('graph-container');
      var data = { nodes: nodes, edges: edges };
      var options = {};
      var network = new vis.Network(container, data, options);
    </script>
  ";
}
?>
