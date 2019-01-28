<?php
    include_once './public/extracaoCSV/Banco.php';
    $banco = new Banco();

    $sql = "SELECT * FROM `publicacoes` ORDER BY `anoPublicacao` DESC, `titulo`ASC;";
    $rtn = $banco->Executar($sql);

    $publicacoes = array();

    while($row = mysqli_fetch_assoc($rtn)){
        $publicacoes[] = $row;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UUX-Posts</title>
    <meta name="description" content="Uma ferramenta de avaliação de sistemas por meio de textos dos usuários">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <div></div>
    <div class="geral">
        <div class="header-blue" style="padding-bottom:0;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.html">UUX-Posts</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="./">Página inicial</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="./extrairPosts">Extrair posts</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="./funcionalidades">Funcionalidades</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="./sobre">Sobre o projeto</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="./contato">Contato</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self"></form><span class="navbar-text"> <a href="login.php" class="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="ferramenta/login/registro.php">Cadastre-se</a></div>
                </div>
            </nav>
        </div>
        
        <div class="row" style="margin-right: 0">
            <div class="card-header col-md-12" style="padding-top: 25px; padding-bottom: 20px;">
                <h4 style="text-align: center">Sobre o projeto</h4>
            </div>
            
             <div class="container">
                <br>
                <!--<div class="card col-md-12">-->
                    <div class="card-body">
                      <!--<h3 class="card-title">Sobre o UUX Posts<p></p></h3>-->
                       <!--<h6 class="card-subtitle mb-2 textmuted">&nbsp&nbsp&nbspO Que é o UUX Posts?</h6>-->
                       <ul>
                       
                           <li class="card-subtitle mb-2 textmuted"><h5>O que é a UUX-Posts?</h5></li>
                                <p align="justify">
                                A UUX-Posts é um buscador de postagens relacionadas a Usabilidade
                                e Experiência do Usuário (UX). As postagens são coletadas de perfis públicos de 
                                Sites de Redes Sociais, como o Twitter, Facebook ou outro similar. 
                                A ferramenta ainda permite o upload de um banco de postagens em formato csv. 
                                A busca (default) é realizada usando um conjunto de padrões relacionados a UUX, 
                                no entanto, possibilita uma busca avançada no qual o próprio usuário poderá alterar
                                e definir seus próprios padrões de busca.</p>
                            <li class="card-subtitle mb-2 textmuted"><h5>Para quem serve? Qual o objetivo?</h5></li>
                            <p align="justify">
                                A UUX-Posts é destinado a estudiosos e profissionais da área de Usabilidade e Experiência do Usuário (UX) 
                                e tem como objetivo apoiar a avaliação de sistemas de redes sociais fornecendo percepções do usuário a 
                                respeito do sistema em uso.
                            </p>
                            <li class="card-subtitle mb-2 textmuted"><h5>Como a UUX-Posts funciona?</h5></li>
                            <p align="justify">
                                O usuário coloca o Site de Rede Social que deseja avaliar ou faz o upload de um banco de postagens 
                                e utiliza o filtro de buscas. Se o usuário preferir, ele poderá realizar sua própria busca nas postagens
                                e analisar os resultados provenientes da busca.
                            </p>
                            <li class="card-subtitle mb-2 textmuted"><h5>Por que analisar postagens relacionadas a UUX?</h5></li>
                            <p align="justify">
                                Porque os usuários de Sites de Redes Sociais postam mensagens sobre o sistema durante seu uso,
                                reclamando, elogiando ou relatando erros, ou dúvidas sobre o sistema. Tais postagens são úteis para
                                entender a percepção do usuário sobre o sistema. Se ele está satisfeito ou não e suas principais
                                dúvidas e funcionalidades com erros no sistema. A vantagem desta técnica é que em Redes Sociais 
                                o usuário é espontâneo e posta mensagens  no momento em que ele está utilizando o sistema,
                                tornando a coleta mais realista possível.
                            </p>
                            <li class="card-subtitle mb-2 textmuted"><h5>De quem é a iniciativa?</h5></li>
                            <p align="justify">
                                A UUX-Posts é um projeto oriundo do Laboratório de estudos do Usuário e da Qualidade de Uso dos Sistemas (LUQS), localizado na Universidade de Fortaleza (Unifor), 
                                sob a coordenação da professora Elizabeth Furtado, com incentivos à pesquisa oriundos do CNPQ.                                
                                O projeto é resultado da pesquisa de doutorado de Marília Soares Mendes, no Programa de Pós-graduação
                                (mestrado acadêmico e doutorado) em Ciência da Computação (MDCC) na Universidade Federal do Ceará (UFC),
                                sob a orientação do Prof. Dr. Miguel Franklin de Castro (UFC) e co-orientação da Profa. Dra. Elizabeth Furtado (UNIFOR).
                                O time também contou com o bolsista Fábio Theophilo (estudante da graduação – UNIFOR).
                                <br><br>
                                Atualmente, o projeto se encontra em desenvolvimento na Universidade Federal do Ceará - Campus Russas, sob a coordenação da profa. Dra. Marília S. Mendes.
                                O time conta com o apoio de professores da UNIFOR, UFC - Quixadá e Russas, 8 alunos voluntários e 2 estagiários.
                                
                            </p>
                            <li class="card-subtitle mb-2 textmuted"><h5>Qual a política de privacidade?</h5></li>
                            <div class="card-body" style="line-height: 16px; padding-top: 8px">
                                    <li>
                                        <p align="justify">
                                            A UUX-Posts coleta apenas postagens de usuários cujos perfis são públicos.
                                        </p>
                                    </li>
                                    <li>
                                        <p align="justify">
                                            Os dados coletados do usuário são referentes a informação disponibilizada pelo 
                                            usuário no site de rede social, como idade, sexo e localização.
                                        </p>
                                    </li>
                                    <li>
                                        <p align="justify">
                                            A UUX-Posts não coleta imagens.
                                        </p>
                                    </li>
                                    <li>
                                        <p align="justify">
                                            Em postagens com nomes de usuários, os nomes são omitidos.
                                        </p>
                                    </li>
                                </div>
                        </ul>
                    </div>
                </div>
                <br>
            </div>
            
            <div class="card-header col-md-12" style="padding-top: 25px; padding-bottom: 20px;">
                <h4 style="text-align: center">Publicações</h4>
            </div>
            <div class="container">
                <?php
                foreach ($publicacoes as $publicacoes){
                ?>
                    <br>
                    <div class="card col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">(<?php echo $publicacoes["anoPublicacao"]; ?> - <i><?php echo $publicacoes["tipo"]; ?></i>) <?php echo $publicacoes["titulo"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $publicacoes["autores"]; ?></h6>
                            <p class="card-text"><?php echo $publicacoes["conferencia"]; ?></p>
                            <a href="<?php echo $publicacoes["linkPublicacao"]; ?>" target="_blank" class="card-link">Acessar publicação</a>
                            <?php 
                                if($publicacoes["linkBibtex"] == ""){
                                ?>
                                    <a class="card-link disabled">Bibtex indisponível</a>
                                <?php
                                } else{
                                ?>
                                    <a href="<?php echo $publicacoes["linkBibtex"]; ?>" class="card-link">Baixar bibtex</a>
                                <?php
                                }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>