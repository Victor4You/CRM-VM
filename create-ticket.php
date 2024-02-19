<?php
session_start();
//echo $_SESSION['id'];
//$_SESSION['msg'];
include("dbconnection.php");
include("checklogin.php");
check_login();
if(isset($_POST['send']))
{
$count_my_page = ("hitcounter.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp);
$tid=$hits[0];
$email=$_SESSION['login'];
$subject=$_POST['subject'];
$tt=$_POST['tasktype'];
$priority=$_POST['priority'];
$ticket=$_POST['description'];
$res=$_SESSION['login'];
$proye=$_POST['proyecto'];
$des=$_POST['Destinatario'];
$st="Open";
$fct=$_POST["Fecha_entrega"];
$pdate=date('Y-m-d H:i:s');
$a=mysqli_query($con,
"INSERT into ticket
(ticket_id,email_id,subject,res_pon,task_type,proyecto,prioprity,ticket,status,posting_date,Fecha_entrega,Destinatario)
values
('$tid','$email','$subject','$res','$tt','$proye','$priority','$ticket','$st','$pdate','$fct','$des')");
if($a)
{
echo "<script>alert('Ticket Genrated');</script>";
}
}
if ($con){
    $option_del_select="";
    $Sql1="SELECT * FROM user ORDER BY name";
    if ($resultado=mysqli_query($con, $Sql1)){
        $count_user=mysqli_num_rows($resultado);
        if($count_user>0){
            while ($lsdatos=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                $email= $lsdatos["email"];
                $name=$lsdatos["name"];
                $option_del_select .=" <option value=\"$email\">$name</option>";
            }
        }else{
            $option_del_select .=" <option value=\"0\">no hay usuarios</option>";
        }
    }else{
            $option_del_select .=" <option value=\"0\">No se obtuvieron datos</option>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html" />
<meta charset="UTF-8" />
<title>CRM | Crear ticket</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
</head>
<body class="">
<?php include("header.php");?>
<div class="page-container row-fluid">	
	<?php include("leftbar.php");?>
	<div class="clearfix"></div>
    <!-- END SIDEBAR MENU --> 
  </div>
  </div>
  <a href="#" class="scrollup">Scroll</a>
   <div class="footer-widget">		
	<div class="progress transparent progress-small no-radius no-margin">
		<div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>		
	</div>
	<div class="pull-right">
	</div>
  </div>
  <!-- END SIDEBAR --> 
  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">  
      <ul class="breadcrumb">
        <li>
          <a href="dashboard.php"><p>Tablero</p></a>
        </li>
        <li><a href="#" class="active">Crear ticket</a></li>
      </ul>
    
		<div class="page-title">
			<h3>Crear ticket</h3>
     
	
             <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" name="form1" method="post" action="" onSubmit="return valid();">
                            <div class="panel panel-default">
                             
                                <div class="panel-body">                                                                        
                                    <p aling="center" style="color:#FF0000"><?=$_SESSION['msg1'];?><?=$_SESSION['msg1']="";?></p>
                               <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Titulo</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                <input type="text" name="subject" id="subject" value="" required class="form-control"/>
                                            </div>            
                                        
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Proyecto</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select  name="proyecto" class="form-control select" required>
                                                <option> Selecciona un proyecto</option>
                                                <option value="billing">SEO</option>
                                                <option value="ot1">Malpaso </option>
                                                <option value="ot2">Isla 3</option>
                                                <option value="ot3">Red petroil</option>
                                            </select>
                                           </div>
                                        </div>
                                    </div>
									
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Asignar a:</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select  name="Destinatario" class="form-control select" required>
                                                <option> Selecciona un usuario</option>
                                                <?php echo $option_del_select;?>
                                            </select>
                                           </div>
                                        </div>
                                    </div>
									
									 <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Tipo de tarea</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select  name="tasktype" class="form-control select" required>
                                                <option> Selecciona un tipo de tarea</option>
                                                <option value="billing">Billing</option>
                                                <option value="ot1">Option 1</option>
                                                <option value="ot2">Option 2</option>
                                                <option value="ot3">Option 3</option>
                                            </select>
                                           </div>
                                    </div>
									
										 <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Prioridad</label>
                                        <div class="col-md-6 col-xs-12">                                                                                            
                                            <select name="priority" class="form-control select">
                                                <option value="">Selecciona el nivel de prioridad</option>
                                                <option value="important">Importante</option>
                                                <option value="urgent(functional problem)">Urgente (Problema)</option>
                                                <option value="non-urgent">No urgente</option>
                                                <option value="question">Pregunta</option>
                                            </select>
                                           </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Fecha de entrega</label>
                                        <div class="col-md-6 col-xs-12">
                                            <input type="datetime-local" name="Fecha_entrega" value="fct">
                                        </div>
                                    </div>

									
									  
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Descripción</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <textarea name="description" required class="form-control" rows="5"></textarea>
                                        </div>  
                                            
                                    </div>
                                    <div class="form-group">
                                        
                                    </div>
									
								
                                    </div>
                                        

                                </div>
								
                                <div class="panel-footer">
                                    <input type="reset" value="Limpiar campos" class="btn btn-default">                                    
                                    <input type="submit" value="Enviar" name="send" class="btn btn-primary pull-right">
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>                    
                                   
                                   
                                    
                               
                                    
                                    
                                      
             
            	
		</div>
    </div>
  </div>

 </div>
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script> 
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/js/core.js" type="text/javascript"></script> 
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script> 

</body>
</html>