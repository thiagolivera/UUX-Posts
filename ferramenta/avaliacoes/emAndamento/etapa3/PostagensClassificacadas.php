<div class="content">
    <!-- ***************************
    *   Caixa onde fica a tabela   *
    ********************************-->
    <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0;">
        <div class="box box-body">
            <!-- ***************************
            *      Cabeçalho da tabela     *
            ********************************-->
            <div class="box-header with-border">
                <h3 class="box-title">Postagens classificadas</h3>
                <br><i>Postagens classificadas por:
                    <?php
                    while ($name = current($_POST)) {
                        if (key($_POST) != "filtros") echo key($_POST);
                        if (key($_POST) == "filtros") echo ", Customizado";
                        if (next($_POST) && key($_POST) != "filtros") echo ", ";
                    }
                    ?>
                </i>
            </div>
            <!-- ***************************
            *        corpo da tabela       *
            ********************************-->
            <table id="example" class="table table-hover no-margin text-center table-bordered table-striped"
                   style="padding-right: 20px; padding-left: 20px; padding-top: 10px">
                <thead>
                <tr>
                    <th style="width:75px">ID</th>
                    <th style="width:150px">Data</th>
                    <th>Postagem</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach (json_decode($this->getPostagens(),true) as $postagen) {
                    echo '<tr>';
                    echo "<td>" . $postagen["idPostagem"] . "</td>";
                    echo "<td>" . $postagen["data"] . "</td>";
                    echo "<td>" . $postagen["postagem"] . "</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ***************************
    *   botões a baixo da tabela   *
    ********************************-->
    <div class="row" style="display: block; padding-left: 15px; padding-right: 15px; margin-bottom: 15px">
        <div class="col-md-4 col-xs-4" id="voltar" style="padding-top: 10px;">
            <button type="button" class="btn btn-info" onclick="voltar();" style="margin-left: 10px;">Voltar
            </button>
        </div>

        <div class="col-md-4 col-xs-4" id="excluirPostagens"
             style="padding-top: 10px; display: flex; justify-content: center;">
            <button type="button" class="btn btn-info" onclick="excluirTudo();" style="margin-right: 10px;">
                Excluir todas as postagens
            </button>
        </div>

        <div class="col-md-4 col-xs-4" id="proximo" style="padding-top: 10px;">
            <button type="button" class="btn btn-info" onclick="proximo();"
                    style="margin-right: 10px; float: right">Finalizar
            </button>
        </div>
    </div>
</div>

<!-- DataTables -->
<script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<style>
    .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: middle;
        border-top: 1px solid #ddd;
    }
</style>
<script>
    $(function () {
        $('#example').DataTable({
            "language": {
                "sEmptyTable": "Nenhum registro encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Exibindo até _MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum registro encontrado",
                "sSearch": "Pesquisar: ",
                "oPaginate": {
                    "sNext": "Próximo",
                    "sPrevious": "Anterior",
                    "sFirst": "Primeiro",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            }
        })
    });

    function proximo() {
        window.location.href = "./introEtapa3.php";
    }

    function voltar() {
        window.location.href = "./introEtapa3.php";
    }

    function excluirTudo() {
        window.location.href = "postagensExtraidas.php?excluirTudo";
    }
</script>