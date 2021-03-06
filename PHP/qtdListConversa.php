<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require 'config.php';

try {
    if (!$conexao) {
        echo "Não foi possivel conectar com Banco de Dados!";
    }

    $codigoUsuario1= $_GET["codigoUsuario1"];
    $codigoUsuario2= $_GET["codigoUsuario2"];

    $query = $conexao->prepare("SELECT C.COD_CONVERSA, C.COD_USU_REMETENTE, U.NOME_USU, U.SOBRENOME_USU, C.COD_USU_DESTINATARIO, C.DATA_CONVERSA, C.CONVERSA_CONVERSA FROM conversa AS C INNER JOIN usuario AS U ON (U.COD_USU=C.COD_USU_REMETENTE) INNER JOIN usuario AS U2 ON (U2.COD_USU=C.COD_USU_DESTINATARIO) WHERE (COD_USU_REMETENTE = $codigoUsuario1 AND COD_USU_DESTINATARIO = $codigoUsuario2) OR (COD_USU_REMETENTE = $codigoUsuario2 AND COD_USU_DESTINATARIO = $codigoUsuario1) ORDER BY C.COD_CONVERSA");

    $query->execute();
    $quantidade = $query->rowCount();
    

    $out = "[";

    /* Issue the real SELECT statement and work with the results */
    if ($outp != "") {$outp .= ",";}
                                
    $outp ='{"msg": {"produto": "existe", "texto": "verificando"}, "dados": '.$quantidade.'}';

    /* No rows matched -- do something else */

    echo utf8_encode($outp);
    
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
};
?>