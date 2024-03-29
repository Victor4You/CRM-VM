<?php
session_start();
include("dbconnection.php");
include("checklogin.php");
check_login();

if ($con){
    $sql3=$con->query("SELECT ticket_id,subject,ticket,posting_date,Fecha_entrega,res_pon 
    FROM ticket 
    WHERE (email_id='".$_SESSION['login']."'OR Destinatario='".$_SESSION['login']."')
    AND Fecha_entrega>=NOW()
    AND status='Open'");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <script src="assets/js/moment.min.js"></script>
    <link rel="stylesheet" href="assets/css/fullcalendar.css">
    <!--<link rel="stylesheet" href="assets/css/style.css">-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src='assets/js/locale/es.js'></script>
    <!--<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
    -->
    <script>
        $(document).ready(function(){
            $("#calendar").fullCalendar({
                //weekNumbers: true,
                //weekNumbersWithinDays: true,
                header: { center: 'month,agendaWeek,listWeek' },
                events:[
                    <?php
                    foreach($sql3 as $row){
                        $fecha_entrega = new DateTime($row["Fecha_entrega"]);
                        $hoy = new DateTime();
                        $diferencia = $hoy->diff($fecha_entrega)->days;
                        if ($diferencia<=1){
                            $color="red";
                        }elseif ($diferencia<= 3){
                            $color= "yellow";
                        }else{
                            $color= "green";
                        }
                    ?>
                    {
                        id:"<?php echo $row ["ticket_id"]; ?>",
                        title:"<?php echo $row ["subject"]; ?>",
                        description:"<?php echo $row ["ticket"]; ?>",
                        start:"<?php echo $row ["posting_date"]; ?>",
                        end:"<?php echo $row ["Fecha_entrega"]; ?>",
                        color:"<?php echo $color; ?>",
                        textColor:"black",
                    },
                    <?php
                    }
                    ?>
                ],
            });
        });
    </script>
</head>
<body>
<div class="content">
      <ul class="breadcrumb">
        <li>
          <a href="dashboard.php"><p>Home</p></a>
        </li>
        <li><a href="view-tickets.php" >View Ticket</a></li>
        <li><a href="calendario.php" class="active">Calendario</a></li>
      </ul>
</div>
<div id="calendar"></div>
</body>
</html>