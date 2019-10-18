<?php
    include("../../../../config/conexao.php");
    include("../model/EMP.php");
    include("../model/SA1.php");
    include("../model/STO.php");
    include("../model/TSO.php");
    include("../model/PRI.php");
    include("../model/CHA.php");
    include("../model/CMS.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CHAMADOS QUANTIDADE") {
            $chamados = new CHA();
            $listar_chamados_quantidade = $chamados->listar_chamados_quantidade($_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "listar_chamados_quantidade" => $listar_chamados_quantidade, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR CHAMADOS" && isset($_POST["status"])) {
            $chamados = new CHA();
            $lista_chamados = $chamados->listar_chamados_ativos("LIMIT 10", $_POST["status"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD']);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "PROXIMO PAGINACAO CHAMADOS") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["status"])){
                $chamados = new CHA();
                $lista_chamados = $chamados->listar_chamados_pag_prox("LIMIT 10", $_POST["CHA_COD"], $_POST["status"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD']);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "ANTERIOR PAGINACAO CHAMADOS") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["status"])){
                $chamados = new CHA();
                $lista_chamados = $chamados->listar_chamados_pag_ante("LIMIT 10", $_POST["CHA_COD"], $_POST["status"], $_SESSION['A_USU_TIPO'], $_SESSION['A_USU_COD']);

                $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
                echo json_encode($retorno);
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR EMPRESA") {
            $empresa = new EMP();
            $lista_empresa = $empresa->listar_empresa_ativos("");

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_empresa" => $lista_empresa);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR SOLICITANTE" && isset($_POST["COD_EMP"])) {
            $usuario = new SA1();
            $lista_usuario = $usuario->listar_usuario_empresa($_POST["COD_EMP"]);

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_usuario" => $lista_usuario);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR SETOR") {
            $setor = new STO();
            $lista_setor = $setor->listar_setor_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_setor" => $lista_setor);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR TIPO SOLICITACAO") {
            $tsolicitacao = new TSO();
            $lista_tsolicitacao = $tsolicitacao->listar_tipo_solicitacao_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_tsolicitacao" => $lista_tsolicitacao);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR PRIORIDADE") {
            $prioridade = new PRI();
            $lista_prioridade = $prioridade->listar_prioridade_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_prioridade" => $lista_prioridade);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR ATENDENTES") {
            $atendentes = new SA1();
            $lista_atendentes = $atendentes->listar_atendentes_ativos();

            $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_atendentes" => $lista_atendentes);
            echo json_encode($retorno);
        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "BUSCAR DADOS") {
            if(isset($_POST["CHA_COD"])) {
                if(!empty($_POST["CHA_COD"])) {
                    $chamados = new CHA();
                    $lista_chamados = $chamados->buscar_dados($_POST["CHA_COD"]);

                    $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_chamados" => $lista_chamados, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }

        }else if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "LISTAR RESPOSTAS") {
            if(isset($_POST["CHA_COD"]) && isset($_POST["COD_ULTIMO_CMS"])) {
                if(!empty($_POST["CHA_COD"])) {
                    $respostas = new CMS();
                    $lista_respostas = $respostas->lista_respostas($_POST["CHA_COD"], $_POST["COD_ULTIMO_CMS"]);

                    $retorno = array("status" => 0, "mensagem" => "Listagem realizada com sucesso", "lista_respostas" => $lista_respostas, "A_USU_TIPO" => $_SESSION['A_USU_TIPO'], "A_USU_COD" => $_SESSION['A_USU_COD']);
                    echo json_encode($retorno);
                }else{
                    $retorno = array("status" => 4, "mensagem" => "Todos os campos são obrigatórios, verifique se não há nenhum vazio.");
                    echo json_encode($retorno);
                }
            }else{
                $retorno = array("status" => 3, "mensagem" => "Verifique os parametros enviados.");
                echo json_encode($retorno);
            }
        }else{
            $retorno = array("status" => 2, "mensagem" => "Ação não encontrada");
            echo json_encode($retorno);
        }
    }else{
        $retorno = array("status" => 1, "mensagem" => "Ação não encontrada");
        echo json_encode($retorno);     
    }
?>