<link rel="manifest" href="manifest.json">
<script> 
if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('sw.js')
}
</script>

<?php $tipoUsuario = 'administrador';

if(strcmp($tipoUsuario,"administrador") == 0){
    include_once("dasboardAdministrador.php");
}

?>