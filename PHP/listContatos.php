<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require 'config.php';

try {
    if (!$conexao) {
        echo "Não foi possivel conectar com Banco de Dados!";
    }

    $codigoUsuario1= $_GET["codigoUsuario1"];

    $query = $conexao->prepare("SELECT C.COD_CONVERSA, C.COD_USU_REMETENTE, U.NOME_USU, U.SOBRENOME_USU, C.COD_USU_DESTINATARIO, C.DATA_CONVERSA, C.CONVERSA_CONVERSA FROM conversa AS C INNER JOIN usuario AS U ON (U.COD_USU=C.COD_USU_REMETENTE) WHERE COD_USU_DESTINATARIO = $codigoUsuario1 GROUP BY COD_USU_REMETENTE ORDER BY C.COD_CONVERSA DESC");

    $query->execute();
    

    $out = "[";

    while ($result = $query->fetch()) {
        if ($out != "[") {
            $out .= ",";
        }
        $out .= '{"codigoConversa": "' . $result["COD_CONVERSA"] . '",';
        $out .= '"codigoRemetente": "' . $result["COD_USU_REMETENTE"] . '",';
        $out .= '"codigoDestinatario": "' . $result["COD_USU_DESTINATARIO"] . '",';
        $out .= '"nomeRemetente": "' . $result["NOME_USU"] . '",';        
        $out .= '"sobrenomeRemetente": "' . $result["SOBRENOME_USU"] . '",';        
        $out .= '"conteudoConversa": "' . $result["CONVERSA_CONVERSA"] . '",';
        $out .= '"dataConversa": "' . $result["DATA_CONVERSA"] . '"}';
    }
    $out .= "]";
    echo $out;
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
};