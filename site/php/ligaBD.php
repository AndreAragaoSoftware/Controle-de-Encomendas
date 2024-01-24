<?php

function liga()
{
    $servername = 'localhost';
    $user = 'root';
    $pass = 'admin';
    $bd = 'projeto_programacao';
    $liga = mysqli_connect($servername, $user, $pass, $bd);
    if (!$liga) {
    die("Erro na conexão: " . mysqli_connect_error());
}
    if ($liga) {
        return $liga;
    } else {
        echo "<script>alert('Erro ao tentar ligar à base de dados!')</script>";

        return null;
    }
}
function registaUser($query)
{
    $liga = liga();
    if ($liga) {
        if (mysqli_query($liga, $query)) {
            mysqli_close($liga);

            return true;
        } else {
            echo "Erro na query: " . mysqli_error($liga); // Adicionado para depuração
            return false;
        }
    } else {
        return false;
    }
}
function mostraDados($query)
{
    $liga = liga();

    return $resultado = mysqli_query($liga, $query);
}
function apagaDados($query){
    $liga = liga();

    if ($liga) {
        $resultado = mysqli_query($liga, $query);

        if (!$resultado) {
            echo "Erro na query: " . mysqli_error($liga);
            return false;
        }

        return true;
    }

    return false;
}

function inserirEncomenda($idFornecedor, $dataEncomenda, $horaChegada)
{
    $liga = liga();

    if ($liga) {
        $idFornecedor = mysqli_real_escape_string($liga, $idFornecedor);
        $dataEncomenda = mysqli_real_escape_string($liga, $dataEncomenda);
        $horaChegada = mysqli_real_escape_string($liga, $horaChegada);

        $query = "INSERT INTO encomendas (idFornecedor, dataEncomenda, horaChegada)
                  VALUES ('$idFornecedor', '$dataEncomenda', '$horaChegada')";

        if (mysqli_query($liga, $query)) {
            mysqli_close($liga);
            return true;
        } else {
            echo "Erro na query: " . mysqli_error($liga);
            return false;
        }
    } else {
        return false;
    }
}


