<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li id="inicio" class="active"><a href="<?=base_url()?>profile"><i class="icon-dashboard"></i><span>Inicio</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Empresas</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="admin">Administrar</a></li>
            <li><a href="faq.html">Solicitudes</a></li>
            <li><a href="pricing.html">Vacantes</a></li>
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