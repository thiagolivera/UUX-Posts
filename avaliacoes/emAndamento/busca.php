<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Google Font -->
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="select2.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="select2/translation.js" ></script>
        
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        UUX-Posts
        <small>Versão 2.0</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
	  
	  <h1>Olá, bem vindo a UUX-Posts!</h1>
          
          <div class="col-md-12 col-lg-12 col-xs-12">
            <select class="myselect" style="width:100%!important; height: 40; border-radius: 0px;">
                <option></option>
                <option>Jeferson Juliani</option>
                <option>Lavínia Matoso</option>
                <option>Marília Mendes</option>
                <option>Thiago Silva</option>
            </select>
              
              
          </div>
    </section>

  </div>

</div>
    
    <script type="text/javascript">        
        $(".myselect").select2({
            placeholder: 'Selecione um avaliador',
            selectOnClose: true,
            minimumInputLength: 3,
            language: {
              inputTooShort: function () {
                return "Digite 3 ou mais caracteres para buscar";
              },
              errorLoading: function () {
              return 'Os resultados não puderam ser carregados.';
              },
              inputTooLong: function (args) {
              var overChars = args.input.length - args.maximum;

              var message = 'Apague ' + overChars + ' caracter';

              if (overChars != 1) {
                message += 'es';
              }

              return message;
              },
              inputTooShort: function (args) {
              var remainingChars = args.minimum - args.input.length;

              var message = 'Digite ' + remainingChars + ' ou mais caracteres';

              return message;
              },
              loadingMore: function () {
              return 'Carregando mais resultados…';
              },
              maximumSelected: function (args) {
              var message = 'Você só pode selecionar ' + args.maximum + ' ite';

              if (args.maximum == 1) {
                message += 'm';
              } else {
                message += 'ns';
              }

              return message;
              },
              noResults: function () {
              return 'Nenhum resultado encontrado';
              },
              searching: function () {
              return 'Buscando…';
              }
            }
        });
    </script>
    </body>

    <style>
        .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
        position: relative;
        min-height: 1px;
        padding-right: 10px;
    }
    </style>
</html>
