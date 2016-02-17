<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li id="inicio" class="active"><a href="<?=base_url()?>profile"><i class="icon-dashboard"></i><span>Inicio</span> </a> </li>
        <li id="BIO"><a href="<?=base_url()?>profile/alumnos/BIO"><i class="icon-list-alt"></i><span>Biologia</span> </a> </li>
        <li id="CONTADOR"><a href="<?=base_url()?>profile/alumnos/CONTADOR"><i class="icon-list-alt"></i><span>Contador Público</span> </a> </li>
        <li id="ARQ"><a href="<?=base_url()?>profile/alumnos/ARQ"><i class="icon-list-alt"></i><span>Arquitectura</span> </a> </li>
        <li id="IAE"><a href="<?=base_url()?>profile/alumnos/IAE"><i class="icon-list-alt"></i><span>Administración</span> </a> </li>
        <li id="ISIC"><a href="<?=base_url()?>profile/alumnos/ISIC"><i class="icon-list-alt"></i><span>ISIC</span> </a> </li>
        <li id="ITIC"><a href="<?=base_url()?>profile/alumnos/ITIC"><i class="icon-list-alt"></i><span>ITIC</span> </a> </li>
        <li id="ELECTRICA"><a href="<?=base_url()?>profile/alumnos/ELECTRICA"><i class="icon-list-alt"></i><span>ELÉCTRICA</span> </a> </li>
        <li id="CIVIL"><a href="<?=base_url()?>profile/alumnos/CIVIL"><i class="icon-list-alt"></i><span>CIVIL</span> </a> </li>
        <li id="IGE"><a href="<?=base_url()?>profile/alumnos/IGE"><i class="icon-list-alt"></i><span>IGE</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Empresas</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="<?=base_url()?>empresas/admin">Administrar</a></li>
          </ul>
        </li>
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
       $("#inicio").attr('class','');
       $(c).attr('class','active');
       });
      </script>
      <?php
  }
?>