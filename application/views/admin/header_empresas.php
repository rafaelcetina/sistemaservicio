<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li id="inicio" ><a href="<?=base_url()?>profile"><i class="icon-dashboard"></i><span>Inicio</span> </a> </li>
        <li id="empresas" class="active"><a href="<?=base_url()?>empresas/admin"><i class="icon-list-alt"></i><span>Lista de Empresas</span> </a> </li>
        <li id="add" ><a href="<?=base_url()?>empresas/add"><i class="icon-plus"></i><span>Agregar Empresa</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<?php 
  if(isset($cc)){
      ?>
      <script type="text/javascript">
      $(document).ready(function(){
       var c = <?=$cc?>;
       $("#empresas").attr('class','');
       $(c).attr('class','active');
       });
      </script>
      <?php
  }
?>