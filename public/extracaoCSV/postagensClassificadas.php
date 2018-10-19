<?php
    include_once 'classificacaoCSV.php';
    
    $padroes = array(); //array que guarda os padroes utilizados para ser exibido na página

    //padrões de extração sendo adicionados na variavel de stringBusca
    //Padrões gramaticais
    if(isset($_POST["verbos"]) && strcmp($_POST["verbos"], "on") == 0){
        array_push($padroes, "Verbos");
    }

    if(isset($_POST["substantivos"]) && strcmp($_POST["substantivos"], "on") == 0){
        array_push($padroes, "Substantivos");
    }

    if(isset($_POST["adjetivos"]) && strcmp($_POST["adjetivos"], "on") == 0){
        array_push($padroes, "Adjetivos");
    }

    if(isset($_POST["adverbios"]) && strcmp($_POST["adverbios"], "on") == 0){
        array_push($padroes, "Advérbios");
    }


    //Tipos de PRU
    if(isset($_POST["elogio"]) && strcmp($_POST["elogio"], "on") == 0){
        array_push($padroes, "Elogio");
    }

    if(isset($_POST["critica"]) && strcmp($_POST["critica"], "on") == 0){
        array_push($padroes, "Crítica");
    }

    if(isset($_POST["duvida"]) && strcmp($_POST["duvida"], "on") == 0){
        array_push($padroes, "Dúvida");
    }

    if(isset($_POST["comparacao"]) && strcmp($_POST["comparacao"], "on") == 0){
        array_push($padroes, "Comparação");
    }

    if(isset($_POST["sugestao"]) && strcmp($_POST["sugestao"], "on") == 0){
        array_push($padroes, "Sugestão");
    }


    //Facetas UUX
    if(isset($_POST["afeto"]) && strcmp($_POST["afeto"], "on") == 0){
        array_push($padroes, "Afeto");
    }

    if(isset($_POST["aprendizado"]) && strcmp($_POST["aprendizado"], "on") == 0){
        array_push($padroes, "Aprendizado");
    }

    if(isset($_POST["confianca"]) && strcmp($_POST["confianca"], "on") == 0){
        array_push($padroes, "Confiança");

    }

    if(isset($_POST["eficacia"]) && strcmp($_POST["eficacia"], "on") == 0){
        array_push($padroes, "Eficácia");
    }

    if(isset($_POST["eficiencia"]) && strcmp($_POST["eficiencia"], "on") == 0){
        array_push($padroes, "Eficiência");
    }

    if(isset($_POST["estetica"]) && strcmp($_POST["estetica"], "on") == 0){
        array_push($padroes, "Estética");
    }

    if(isset($_POST["frustracao"]) && strcmp($_POST["frustracao"], "on") == 0){
        array_push($padroes, "Frustração");
    }

    if(isset($_POST["motivacao"]) && strcmp($_POST["motivacao"], "on") == 0){
        array_push($padroes, "Motivação");
    }

    if(isset($_POST["satisfacao"]) && strcmp($_POST["satisfacao"], "on") == 0){
        array_push($padroes, "Satisfação");
    }

    if(isset($_POST["seguranca"]) && strcmp($_POST["seguranca"], "on") == 0){
        array_push($padroes, "Segurança");
    }

    if(isset($_POST["suporte"]) && strcmp($_POST["suporte"], "on") == 0){
        array_push($padroes, "Suporte");
    }

    if(isset($_POST["utilidade"]) && strcmp($_POST["utilidade"], "on") == 0){
        array_push($padroes, "Utilidade");
    }
    
    if(isset($_POST["padroesPersonalizados"])){
        array_push($padroes, $_POST["padroesPersonalizados"]);
    }
    
    $classificador = new ClassificacaoBD();
    session_start();
    $post = $classificador->classificacaoBooleana($_SESSION['idAvaliacao'], $padroes);
    $_SESSION['postagens'] = $post;

?>

    <div class="card-body" style="padding-left: 20px; padding-right: 20px;">
        <section class="content"> 
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="box box-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">Postagens classificadas com padrões para: 
                        <?php
                        for($i=0; $i < count($padroes); $i++){
                            if($i == (count($padroes) - 1)){
                                echo $padroes[$i] . '.';
                            } else{
                                echo $padroes[$i] . ',';
                            }
                        }
                        ?>
                        </h3>
                    </div>

                    <div class="table" style="padding-right: 20px; padding-left: 20px; padding-top: 10px">
                        <table id="example1" class="table table-hover no-margin text-center table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Postagem</th>
                                </tr>
                            </thead>

                            <tbody>
                              <?php
                                for($i = 0; $i < count($post); $i++){
                                ?>
                                <tr>
                                    <td><?php echo $i + 1; ?></td>
                                    <td><?php echo $post[$i]["postagem"]; ?></td>
                                </tr>
                                <?php
                                }
                              ?>
                          </tbody>
                        </table>
                    </div>
                </div>

                <form action="extracaoTwitterControle.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-info" onclick="voltar();" style="margin-left: 10px;">Voltar</button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-info" onclick="exportarPostagens();" style="margin-right: 10px;">Exportar postagens para CSV</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

<script>
    function voltar(){
        window.location.href = "classificacaoPosts.php";
    }
    
    function exportarPostagens(){
        window.location.href = "exportarCSV.php?exportarCSVBD";
    }
</script>