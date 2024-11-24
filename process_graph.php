<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nodes = json_decode($_POST['nodes'], true);
    $edges = json_decode($_POST['edges'], true);

    // Aquí puedes implementar el cálculo de matrices y caminos.
    $matrix = [];
    foreach ($nodes as $node) {
        $matrix[$node['id']] = [];
        foreach ($nodes as $innerNode) {
            $matrix[$node['id']][$innerNode['id']] = 0;
        }
    }

    foreach ($edges as $edge) {
        $matrix[$edge['from']][$edge['to']] = 1;
    }

    echo '<h2>Matriz de Adyacencia</h2>';
    echo '<table border="1">';
    foreach ($matrix as $row) {
        echo '<tr>';
        foreach ($row as $cell) {
            echo '<td>' . $cell . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
?>
