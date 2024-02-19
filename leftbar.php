 <!-- BEGIN SIDEBAR -->
  <div class="page-sidebar" id="main-menu">
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper">
        <div class="profile-wrapper"> <img src="assets/img/user.png"  alt="" data-src="assets/img/user.png" data-src-retina="assets/img/user.png" width="69" height="69" /> </div>
        <div class="user-info">
          <div class="greeting" style="font-size:14px;">Bienvenido</div>
          <div class="username" style="font-size:12px;"><?php echo $_SESSION['name'];?></div>
          <div class="status" style="font-size:10px;"><a href="#">
            <div class="status-icon green"></div>
            En línea</a></div>
        </div>
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      <p class="menu-title">Refrescar <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
   
    <ul>	
      <li class="start"> <a href="dashboard.php"> <i class="icon-custom-home"></i> <span class="title">Tablero</span> <span class="selected"></span>  </a> 
		    </li>
    
          <li><a href="change-password.php"><span class="fa fa-file-text-o"></span> Cambiar contraseña</a></li>
                            <li><a href="profile.php"><span class="fa fa-user"></span> Perfil</a></li>
                         
                            
                              <li ><a href="get-quote.php"> <span class="fa fa-tasks"></span> Cotizar</a></li>
							     <li ><a href="create-ticket.php"><span class="fa fa-ticket"></span> Crear Ticket</a></li>
                                <li ><a href="view-tickets.php"><span class="fa fa-ticket"></span> Ver Tickets</a></li>
                           
    </ul>
    
	