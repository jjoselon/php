<?php

$matriz = array(
    [(int)$_GET["row1"][0], (int)$_GET["row1"][1], (int)$_GET["row1"][2]],
    [(int)$_GET["row2"][0], (int)$_GET["row2"][1], (int)$_GET["row2"][2]],
    [(int)$_GET["row3"][0], (int)$_GET["row3"][1], (int)$_GET["row3"][2]],
);

$B = array((int)$_GET["b1"][0], (int)$_GET["b1"][1], (int)$_GET["b1"][2]);

// Duplicamos las 2 primeras columnas de la matriz original
$matriz2 = array(
    [(int)$_GET["row1"][0], (int)$_GET["row1"][1], (int)$_GET["row1"][2], (int)$_GET["row1"][0], (int)$_GET["row1"][1]],
    [(int)$_GET["row2"][0], (int)$_GET["row2"][1], (int)$_GET["row2"][2], (int)$_GET["row2"][0], (int)$_GET["row2"][1]],
    [(int)$_GET["row3"][0], (int)$_GET["row3"][1], (int)$_GET["row3"][2], (int)$_GET["row3"][0], (int)$_GET["row3"][1]],
);


// Diagonal principal
$sumaDiagonalPrincipal = 0;
for ($c = 0; $c <= 2; $c++) {
    $sumaDiagonalPrincipal += $matriz2[0][$c] * $matriz2[1][$c+1] * $matriz2[2][$c+2]; 
}


// Diagonal secundaria
$sumaDiagonalSecundaria = 0;
for ($c = 4; $c >= 2; $c--) {
    $sumaDiagonalSecundaria += $matriz2[0][$c] * $matriz2[1][$c-1] * $matriz2[2][$c-2]; 
}

// RESTAMOS DIAGONALES PARA OBTENER INVERSA
$inversa = ($sumaDiagonalPrincipal) - ($sumaDiagonalSecundaria);

if ($inversa === 0) {
    $return = array(
        'OK' => false,
        'Message' => "La matriz entrante no tiene inversa"
    );
    echo json_encode($return);die;
}

// Matriz transpuesta filas a columnas
$matrizT = array(
    [(int)$_GET["row1"][0], (int)$_GET["row2"][0], (int)$_GET["row3"][0]],
    [(int)$_GET["row1"][1], (int)$_GET["row2"][1], (int)$_GET["row3"][1]],
    [(int)$_GET["row1"][2], (int)$_GET["row2"][2], (int)$_GET["row3"][2]]
);

// INICO CALCULOS COFACTORES EN DIAGONAL...

// Primera fila:
$determinantesPrimer = array();

// Columna ignorar
$cI = 0;
// Fila ignorar
$fI = 0;
for ($n = 0; $n <= 2; $n++) {
    $determinantesPrimer[$n] = array();
    for ($f = 0; $f <= 2; $f++) {
        if ($f !== $fI) {
            for ($c = 0; $c <= 2; $c++) {
                if ($c !== $cI) {
                    array_push($determinantesPrimer[$n], $matrizT[$f][$c]);
                }
            }
        }
    }
    $cI++;
}

// Segunda fila:
$determinantesSegundo = array();

// Columna ignorar
$cI = 0;
// Fila ignorar
$fI = 1;
for ($n = 0; $n <= 2; $n++) {
    $determinantesSegundo[$n] = array();
    for ($f = 0; $f <= 2; $f++) {
        if ($f !== $fI) {
            for ($c = 0; $c <= 2; $c++) {
                if ($c !== $cI) {
                    array_push($determinantesSegundo[$n], $matrizT[$f][$c]);
                }
            }
        }
    }
    $cI++;
}

// Tercera fila:
$determinantesTercer = array();

// Columna ignorar
$cI = 0;
// Fila ignorar
$fI = 2;
for ($n = 0; $n <= 2; $n++) {
    $determinantesTercer[$n] = array();
    for ($f = 0; $f <= 2; $f++) {
        if ($f !== $fI) {
            for ($c = 0; $c <= 2; $c++) {
                if ($c !== $cI) {
                    array_push($determinantesTercer[$n], $matrizT[$f][$c]);
                }
            }
        }
    }
    $cI++;
}

// FIN CALCULOS COFACTORES EN DIAGONAL...

// Operation determinantes

$adjuntaA = array();

foreach ($determinantesPrimer as $key => $value) {
    // MULTIPLICAMOS EN DIAGONAL PRINCIPAL Y RESTAMOS LA DIAGONAL SECUNDARIA
    $adjuntaA[0][] = ($value[0] * $value[3]) - ($value[1] * $value[2]); 
}

foreach ($determinantesSegundo as $key => $value) {
    $adjuntaA[1][] = ($value[0] * $value[3]) - ($value[1] * $value[2]); 
}

foreach ($determinantesTercer as $key => $value) {
    $adjuntaA[2][] = ($value[0] * $value[3]) - ($value[1] * $value[2]); 
}

// Celda impar mantiene el signo, celda impar se multiplica por menos (-)
$itemNumber = 1;
$incognitasValor = array();
$HTMLprocedure = array();
$showProcedure = $_GET["showProcedure"] ?? false;
foreach($adjuntaA as $key => $value) {
    $incognitasValor[$key] = 0;
    $HTMLprocedure[$key] = "";
    foreach($value as $key2 => $n) {
        if ($itemNumber % 2 == 0) {
            // par
            $adjuntaA[$key][$key2] = $adjuntaA[$key][$key2] * (-1); 
        }
        if ($adjuntaA[$key][$key2] % $inversa == 0) {
            $adjuntaA[$key][$key2] = $adjuntaA[$key][$key2] / $inversa; 
        }
        // Multiplicamos por $B
        $adjuntaA[$key][$key2] = $adjuntaA[$key][$key2] * $B[$key2];

        if ($showProcedure) {
            $HTMLprocedure[$key] .= $adjuntaA[$key][$key2] . "/" . $inversa;
            if ((count($value) -1) > $key2) {
                $HTMLprocedure[$key] .= " + ";
            } else {
                $HTMLprocedure[$key] .= " = ";
            }
        }
        
        // Sumamos las fracciones:
        $adjuntaA[$key][$key2] = $adjuntaA[$key][$key2] / $inversa;

        $incognitasValor[$key] += $adjuntaA[$key][$key2]; 
        

        $itemNumber++;
    }
}

$return = array(
    'OK' => true,
    'Data' => array(
        "X" => (string) $HTMLprocedure[0] . (string) $incognitasValor[0],
        "Y" => (string) $HTMLprocedure[1] . (string) $incognitasValor[1],
        "Z" => (string) $HTMLprocedure[2] . (string) $incognitasValor[2],
        "Determinante" => $inversa
    )
);
echo json_encode($return);
