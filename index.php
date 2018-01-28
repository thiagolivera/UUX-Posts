<link rel="icon" type="imagem/png" href="/images/uux-icon.ico" />
<link rel = "shortcut icon" type = "imagem/x-icon" href = "/images/uux-icon.ico"/>

<link rel="manifest" href="manifest.json">
<script> 
if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('sw.js')
}
</script>

<?php $tipoUsuario = 'administrador';

if(strcmp($tipoUsuario,"administrador") == 0){
    include_once("dashboardAdministrador.php");
}

?>