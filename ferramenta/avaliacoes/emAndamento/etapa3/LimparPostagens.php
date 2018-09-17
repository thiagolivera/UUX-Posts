<div class="content">
    <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0;">
        <div class="box box-body">
            <!-- ***************************
            *      Cabeçalho da tabela     *
            ********************************-->
            <div class="box-header with-border">
                <h3 class="box-title">Limpar postagens usando:</h3>
                <br>
            </div>
            <!-- ***************************
            *        corpo da tabela       *
            ********************************-->
            <table id="example" class="table no-margin text-center"
                   style="padding-right: 20px; padding-left: 20px; padding-top: 10px">
                <thead>
                <tr>
                    <th style="width: 50px">Selecionar</th>
                    <th>Tipos de filtros</th>
                </tr>
                </thead>
                <tbody class="bg-gray-light">
                <form action="Classificacao.php?c=FachadaLimparPostagens&m=limparPostagens" method="post" name="filtro"
                      id="filtra">
                    <tr>
                        <td>
                            <label>
                                <input name="filtro[]" type="checkbox">
                            </label>
                        </td>
                        <td style="text-align: left">
                            <label>Sentenças</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>
                                <input name="filtro[]" type="checkbox">
                            </label>
                        </td>
                        <td style="text-align: left">
                            <label>Sentenças</label>
                        </td>
                    </tr>
                </form>
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
            <button type="button" class="btn btn-info" onclick="$('#filtra').submit();"
                    style="margin-right: 10px; float: right">Salvar e próximo
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

    function voltar() {
        window.location.href = "Classificacao.php";
    }

    function excluirTudo() {
        window.location.href = "postagensExtraidas.php?excluirTudo";
    }
</script>