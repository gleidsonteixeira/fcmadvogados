<?php

    include("../../../../config/conexao.php");
    include("../model/USU.php");
    include("../model/SA1.php");
    include("../model/MNU.php");
    include("../model/EMP.php");
    session_start();

    if(isset($_POST["ACAO"])) {
        if(!empty($_POST["ACAO"]) && $_POST["ACAO"] == "CREATE") {
            if(isset($_POST["usuario-nome"]) && isset($_POST["usuario-email"]) && 
                isset($_POST["usuario-senha"]) && isset($_POST["usuario-cpf"]) && 
                isset($_POST['usuario-telefone']) && isset($_POST["usuario-empresa"]) && 
                isset($_POST['usuario-menu'])
            ) {
                if(!empty($_POST["usuario-nome"]) && !empty($_POST["usuario-email"]) && 
                   !empty($_POST["usuario-senha"]) && !empty($_POST["usuario-cpf"]) && 
                   !empty($_POST["usuario-telefone"]) && !empty($_POST["usuario-empresa"]) &&  
                   !empty($_POST["usuario-menu"]) 
                ) {
                    $usuario_nome = utf8_decode($_POST["usuario-nome"]);
                    $usuario_email = utf8_decode($_POST["usuario-email"]);
                    $usuario_senha = utf8_decode($_POST["usuario-senha"]);
                    $usuario_cpf =  $_POST["usuario-cpf"]; 
                    $usuario_telefone = $_POST["usuario-telefone"];
                    $usuario_empresa =  $_POST["usuario-empresa"]; 
                    $usuario_menu = explode(",", $_POST["usuario-menu"]);

                    $usuario = new USU();
                    $usuario->setUSU_EMAIL($usuario_email);
                    $usuario->setUSU_SENHA($usuario_senha);
                    $usuario->setUSU_STATUS(1);

                    $empresa = new EMP();
                    $usuario->setUSU_TIPO($empresa->buscar_tipo($usuario_empresa));

                    $usuario->setUSU_DTCAD(date("Y-m-d"));
                    $usuario->setUSU_HRCAD(date("H:i:s"));
                    $usuario->setUSU_USUCAD($_SESSION['A_USU_COD']);

                    $retorno = $usuario->create();
                    if($retorno['status'] == 0){
                        $usuario_sa1 = new SA1();
                        $usuario_sa1->setSA1_NOME($usuario_nome);
                        $usuario_sa1->setSA1_EMAIL($usuario_email);
                        $usuario_sa1->setSA1_CPF($usuario_cpf);
                        $usuario_sa1->setSA1_TELEFONE($usuario_telefone);
                        $usuario_sa1->setSA1_EMP($usuario_empresa);
                        $usuario_sa1->setSA1_USU($retorno['codigo']);
                        $usuario_sa1->setSA1_STATUS(1);
                        $usuario_sa1->setSA1_TIPO($usuario->getUSU_TIPO());
                        $usuario_sa1->setSA1_DTCAD(date("Y-m-d"));
                        $usuario_sa1->setSA1_HRCAD(date("H:i:s"));
                        $usuario_sa1->setSA1_USUCAD($_SESSION['A_USU_COD']);

                        $retorno_sa1 = $usuario_sa1->create();
                        if($retorno_sa1['status'] == 0){
                            $retorno['mensagem'] = $retorno_sa1['mensagem'];
                            $menu = new MNU();
                            for ($i = 0; $i < count($usuario_menu); $i++) { 
                                $retorno_mnuusu = $usuario->createMNUUSU($menu->buscar_ctm_cod($usuario_menu[$i]), $usuario_menu[$i], $retorno['codigo']);
                                if($retorno_mnuusu != 0){
                                    $i = count($usuario_menu);
                                    
                                    $retornoRollBack = $usuario->delete_rollback();
                                    if($retornoRollBack['status'] == 0){

                                        $retornoRollBack = $usuario_sa1->delete_rollback();
                                        if($retornoRollBack['status'] == 0){
                                            $retorno['mensagem'] = "Erro no processo de cadastro, RollBack foi executado com Sucesso. #0002";
                                        }else{
                                            $retorno['mensagem'] = "Erro no processo de cadastro, Erro ao executar o RollBack. COD: #0002";
                                        }

                                    }else{
                                        $retorno['mensagem'] = "Erro no processo de cadastro, Erro ao executar o RollBack. COD: #0001";
                                    }
                                }
                            }
                        }else{
                            $retornoRollBack = $usuario->delete_rollback();
                            if($retornoRollBack['status'] == 0){
                                $retorno['mensagem'] = "Erro no processo de cadastro, RollBack foi executado com Sucesso. #0001";
                            }else{
                                $retorno['mensagem'] = "Erro no processo de cadastro, Erro ao executar o RollBack. COD: #0003";
                            }
                        }
                    }

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