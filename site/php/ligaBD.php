<?php

function liga()
{
    $servername = 'localhost';
    $user = 'root';
    $pass = 'mysql2023';
    $bd = 'projeto_programacao';
    $liga =  mysqli_connect($servername, $user, $pass, $bd);
    if ($liga) {
        return $liga;
    } else {
        echo "<script>alert('Erro ao tentar ligar à base de dados!')";

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