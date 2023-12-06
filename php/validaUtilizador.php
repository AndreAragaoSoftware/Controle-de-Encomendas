<?php



include 'ligaBD.php';
$query = "INSERT INTO servico(folha, datainicio, nomecliente, marca, modelo, ano, cilindrada, matricula, descricao, nhoras, pecasuti, valorpec, valormao, datafin) VALUES($folha, '$datainicio', '$nomecliente', '$marca', '$modelo', '$ano', '$cilindrada', '$matricula', '$descricao', '$nhoras', '$pecasuti', '$valorpec', '$valormao', '$datafin')";
if (registaUser($query)) {
    echo "<script>alert('Utilizador registrado com sucesso!');</script>";
    header('Location: ../php/consulta.php');
} else {
    echo "<script>alert('Erro!');</script>";
    header('Location: registarUser.html');
}