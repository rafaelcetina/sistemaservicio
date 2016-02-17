<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" ><?=$app ?></a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <?php if($this->session->userdata('login')){ ?>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> <?=$this->session->userdata('nombre')?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="<?=base_url()?>login/logout">
                  <i class="fa fa-sign-out"></i> Cerrar Sesión
              </a></li>
            </ul>
          </li>
          <?php }else{?>
          <li> <a class="logout" href="<?=base_url()?>home/login"><i class="icon-large icon-signin"></i> Iniciar Sesión</a> </li>
          <?php } ?>
        </ul>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->