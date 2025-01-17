<?php
    include("../config/conexao.php");
    $conexao = new Conexao();
    $con = $conexao->conectar();

    $click_id = $_REQUEST['ID'];
    $click_tipo = $_REQUEST['TIPO'];
    $click_nota = $_REQUEST['NOTA'];
    $click_data = date('Y-m-d');
    $click_hora = date('H:i:s');
    $click_dia = date('w');

    if($click_tipo == "BAN"){
        $sql = "UPDATE BAN SET BAN_CLICKS = BAN_CLICKS + 1 WHERE BAN_ID = $click_id";
        if($con->query($sql)){
            $sqlClick = "INSERT INTO CLI (CLI_BAN, CLI_DTCLICK, CLI_HRCLICK, CLI_DAYCLICK, CLI_TIPO) VALUES ($click_id, '$click_data', '$click_hora', $click_dia, '$click_tipo')";
            if($con->query($sqlClick)){
                echo '0';
            }
        }else{
            echo '1';
        }
    }else if($click_tipo == "CTT"){
        $sql = "UPDATE CTA SET CTA_QNTCLICK = CTA_QNTCLICK + 1 WHERE CTA_COD = $click_id";
        if($con->query($sql)){
            $sqlClick = "INSERT INTO CLI (CLI_CTA, CLI_DTCLICK, CLI_HRCLICK, CLI_DAYCLICK, CLI_TIPO) VALUES ($click_id, '$click_data', '$click_hora', $click_dia, '$click_tipo')";
            if($con->query($sqlClick)){
                echo '0';
            }
        }else{
            echo '1';
        }
    }else if($click_tipo == "BLO"){
        $sql = "UPDATE BLO SET BLO_AVALIACOES = BLO_AVALIACOES + 1 WHERE BLO_COD = $click_id";
        if($con->query($sql)){
            $sqlClick = "INSERT INTO CLI (CLI_BAN, CLI_CTA, CLI_DTCLICK, CLI_HRCLICK, CLI_DAYCLICK, CLI_TIPO) VALUES ($click_id, $click_nota, '$click_data', '$click_hora', $click_dia, '$click_tipo')";
            if($con->query($sqlClick)){
                echo '0';
            }
        }else{
            echo '1';
        }
    }else if($click_tipo == "PES"){
        $click_mensagem = utf8_decode($_REQUEST['MENSAGEM']);
        $sql = "UPDATE CTA SET CTA_QNTCLICK = CTA_QNTCLICK + 1 WHERE CTA_COD = $click_id";
        if($con->query($sql)){
            $sqlClick = "INSERT INTO CLI (CLI_CTA, CLI_DTCLICK, CLI_HRCLICK, CLI_DAYCLICK, CLI_TIPO, CLI_COMENTARIO) VALUES ($click_id, '$click_data', '$click_hora', $click_dia, '$click_tipo', '$click_mensagem')";
            if($con->query($sqlClick)){
                echo '0';
            }
        }else{
            echo '1';
        }
    }
?>