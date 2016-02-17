<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body>

<div id="col-lg-12">
	<h1>Home!</h1>
	<button class="btn btn-primary">Aceptar</button>
	<div id="body">
		<h3><?= $mensaje?></h3>
		<!--<a href="<?= base_url() ?>link">link</a>-->
	</div>

 	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>

</div>

</body>
</html>