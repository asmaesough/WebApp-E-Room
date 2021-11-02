 
<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "hebergement");
$query1 ="SELECT   email,demande,nom,prenom FROM demandes WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1A%'   ;  ";
$results1 = mysqli_query($connect, $query1);

$query2="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes JOIN chambre ON demandes.demande=chambre.id_chambre  WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '1%B%' ;  ";
$results2 = mysqli_query($connect, $query2);

$query3 ="SELECT    email,demande,nom,prenom,reservee  FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1C%'" ;
$results3 = mysqli_query($connect, $query3);

$query4 ="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes JOIN chambre ON demandes.demande=chambre.id_chambre  WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '1%D%'" ;
$results4 = mysqli_query($connect, $query4);

$query5="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1%F%' ;  ";
$results5 = mysqli_query($connect, $query5);

$query7 ="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)  LIKE '1%G%'" ;
$results7 = mysqli_query($connect, $query7);

$query8="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1%H%'" ;
$results8 = mysqli_query($connect, $query8);

$query9 ="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '3%A%'   ;  ";
$results9 = mysqli_query($connect, $query9);

$query10="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1) LIKE '3%B%' ;  ";
$results10 = mysqli_query($connect, $query10);

$query11="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '3%C%'" ;
$results11 = mysqli_query($connect, $query11);

$query12 ="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '3%D%'" ;
$results12 = mysqli_query($connect, $query12);

$query13 ="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes JOIN chambre ON demandes.demande=chambre.id_chambre  WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '3%E%'   ;  ";
$results13 = mysqli_query($connect, $query13);

$query14="SELECT   DISTINCT email,demande,nom,prenom,reservee FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '3%F%' ;  ";
$results14 = mysqli_query($connect, $query14);

$query15="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '3%G%'" ;
$results15 = mysqli_query($connect, $query15);

$query16="SELECT   DISTINCT email,demande,nom,prenom,reservee  FROM demandes JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)  LIKE '3%H%'" ;
$results16 = mysqli_query($connect, $query16);

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
	
		<meta charset="UTF-8">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
		<script >  
		/*function switch(id) {
			if(document.getElementById("check" + id).value = "0") {
				document.getElementById("check" + id).value = "1"
				document.getElementById("switch" + id).class = "switchOn"
			} else {
				document.getElementById("check" + id).value = "0"
				document.getElementById("switch" + id).class = "switch"
			}
		}*/
		
       $(document).ready(function(){  
                $('.switch').click(function(){  
                     $(this).toggleClass("switchOn");  
                });  
		});  
		</script>
	
		<script type="text/javascript">
		
		function update(id_ch){
		
			$.ajax({
			type: 'POST',
			url: 'update.php'
			});
			
	  <?php $query = "UPDATE demandes 
                    SET validation='1' WHERE demande=val ; ";
			$results3 = mysqli_query($connect, $query);
			
			
				$e=$_SESSION['email'];

                  $headers = "From: $e" ;
                 mail("$e","Success","votre demande a été acceptée ",$headers);
			
			?>
			
		}
           </script>  
		   

		   
		   <script>
		   function sql($i){
var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "hebergement"
});

con.connect(function(err) {
  if (err) throw err;
  //Select all customers and return the result object:
  con.query("UPDATE demandes SET validation='1' and reservee= '1'WHERE demande='$r' FROM customers", function (err, result, fields) {
    if (err) throw err;
    console.log(result);
  });
});
		   }
</script>
		    
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset='utf-8'>
      <link href="../htdocs2/css/pageadmin4.css" media="screen" rel="stylesheet" type="text/css">
        
       

</head>
<body>

    <header>
           <img src="../img/logo.png">
            <nav>
                <ul>
                    <?php
                    // afficher un message
                echo "<p><strong> ". $_SESSION['prenom'] ." " . $_SESSION['nom'] ."</strong></p>";
                echo '<img class="user" src="../img/user.png" style="height: 20px; width: 20px;">';
 
                echo '<img class="logout" src="../img/logout.png" style="height: 20px; width: 20px;">';

                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:http://localhost/htdocs2/page2.php");
                   }
                }
        ?>
        <a href='http://localhost/htdocs2/page4.php?deconnexion=true'><span>Déconnexion</span></a>
                </ul>
            </nav>
        </header>

<h1><font size="6px"> Liste des demandes de réservation</font></h1>

   <table calss="t1">
     <caption>
BLOC R1-A
</caption>
<thead>
 <tr>  
	 <th>nom</th>
	 <th>prenom</th>
	 <th>id_chambre</th>  
	  <th>validation</th>  
	  </tr>
	  </thead>
     <tbody>
	 <?php


	//donner a reservee 1
     while($row = mysqli_fetch_array($results1))  {
		 $_SESSION['chambre']=$row["demande"];
		$_SESSION['email']=$row["email"];
		?>
		<script type="text/javascript">
		val id_ch=  $_SESSION['chambre'];
		</script><?php
        echo '  
       <tr>  
	   <td>'.$row["nom"].'</td>  
	   <td>'.$row["prenom"].'</td>  
	   <td>'. $_SESSION['chambre'].'</td>  
	  <td> 
		<div class="wrapper" align="center">  
                <br />  
                <label>  
                    <button class="switch" id="'.$_SESSION['chambre'].'" onclick="update('. id_ch.')"></ button>; 
					
					
					
                </label>  
                <br />  
           </div>
   </td>
   
	   </tr>  
        '; ?> 
		
		<script type="text/javascript">
		
		function update(id_ch){
		
			$.ajax({
			type: 'POST',
			url: 'update.php',
			data: {chambre: id_ch}
			
			});
			
	
			
		}
           </script>  
	<?php
     }
     ?>
</tbody>	
</table>




  <table calss="t3">
   <caption>
BLOC R1-C
</caption>
 <tr>  
	 <th>nom</th>
	 <th>prenom</th>
	 <th>id_chambre</th>  
	 <th>validation</th>  
	 </tr>
     <?php
	
	
	  
     while($row = mysqli_fetch_array($results3))  {		 
		$_SESSION['chambre'] =$row["demande"] ;
		$_SESSION['email']=$row["email"];
        echo '  
       <tr>  
	   <td>'.$row["nom"].'</td>  
	   <td>'.$row["prenom"].'</td>  
	   <td>'.$row["demande"].'</td>  
	  <td> 
		
                <br />  
                <label>  
                    <button class="switch"   onclick="update('.$_SESSION['chambre'].')"></ button>  
                </label>  
                <br />  
           </div></a>
   </td>
   
	   </tr>  
        ';  
	
     }
	
	 
     ?>
	

</table>

<form method="post" action="../phpspreadshet/excel.php">
     <input type="submit" name="valider" class="btn btn-success" value="download excel file" />
    </form>
</body>
</html>