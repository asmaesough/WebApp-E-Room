<?php
session_start();
$conn=new mysqli("localhost", "root", "", "hébergement");
$query1 ="SELECT * FROM demandes WHERE demande LIKE '1%' ORDER BY demande";
$result1 = $conn->query($query1);
$query2 ="SELECT * FROM demandes WHERE demande LIKE '3%' ORDER BY demande";
$result2 = $conn->query($query2);
$conn->set_charset("utf8");
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset='utf-8'>
        <link href="css/adminPage2.css" media="screen" rel="stylesheet" type="text/css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
        <script src="../js/jquery-3.4.1.min.js"></script>
	</head>
<body>

    <header>
           <img src="../img/logo.png">
            <nav>
                <ul>
                    <?php
                    // afficher un message
                echo "<p><strong> ". $_SESSION['username'] ."</strong></p>";
                echo '<img class="user" src="img/user.png" style="height: 20px; width: 20px;">';
 
                echo '<img class="logout" src="img/logout.png" style="height: 20px; width: 20px;">';

                if(isset($_GET['deconnexion']))
                { 
                   if($_GET['deconnexion']==true)
                   {  
                      session_unset();
                      header("location:http://localhost/page2.php");
                   }
                }
                ?>
        <a href='http://localhost/adminPage2.php?deconnexion=true'><span>Déconnexion</span></a>
                </ul>
            </nav>
        </header>

<h1>Liste des demandes de réservation</h1>
<table class="t1">
     <caption>
RESIDENCE R1
</caption><br/> 
<thead>
 <tr>  
	 <th>Nom</th>
	 <th>Prénom</th>
	 <th>Classe</th>
	 <th>Chambre demandée</th> 
   <th>Commentaire</th> 
	  <th>Validation</th>  
	  </tr>
	  </thead>
     <tbody>
	 <?php
     
	//donner a reservee 1
     while ($ligne = $result1->fetch_assoc())  {
		$_SESSION['chambre']=$ligne["demande"];
		$_SESSION['email']=$ligne["email"];
		$_SESSION['classe']=$ligne["classe"];
		$_SESSION['nom']=$ligne["nom"];
		$_SESSION['prenom']=$ligne["prenom"];
    $_SESSION['commentaire']=$ligne["commentaire"];
		?>  
	       <tr>  
		   <td><?php echo $_SESSION["nom"]; ?></td>  
		   <td><?php echo $_SESSION["prenom"]; ?></td>
		   <td><?php echo $_SESSION["classe"]; ?></td>  
		   <td><?php echo $_SESSION['chambre']; ?></td>
       <td><?php echo $_SESSION['commentaire']; ?></td>

		  <td> 
		  <div class="wrapper" align="center">  <br />  
                <label class="switch">
  				<?php 
  					if ($ligne['validation']==0) {
  						echo '<input type="checkbox" onclick="update(\''.$_SESSION['chambre'].'\')">';
  					} else {
  						echo '<input type="checkbox" checked>';
  					} 
  				?>
  				<span class="slider round"></span>
				</label>  
                <br />  
           </div>
   			</td>
	   		</tr>   
	<?php
     }
     ?>
</tbody>	
</table>

<table class="t2">
     <caption>
RESIDENCE R3
</caption> 
<thead>
 <tr>  
	 <th>Nom</th>
	 <th>Prénom</th>
	 <th>Classe</th>
	 <th>Chambre demandée</th>
   <th>Commentaire</th>  
	  <th>Validation</th>  
	  </tr>
	  </thead>
     <tbody>
	 <?php
     
	//donner a reservee 1
     while ($ligne = $result2->fetch_assoc())  {
		$_SESSION['chambre']=$ligne["demande"];
		$_SESSION['email']=$ligne["email"];
		$_SESSION['classe']=$ligne["classe"];
		$_SESSION['nom']=$ligne["nom"];
		$_SESSION['prenom']=$ligne["prenom"];
    $_SESSION['commentaire']=$ligne["commentaire"];
		?>  
	       <tr>  
		   <td><?php echo $_SESSION["nom"]; ?></td>  
		   <td><?php echo $_SESSION["prenom"]; ?></td>
		   <td><?php echo $_SESSION["classe"]; ?></td>  
		   <td><?php echo $_SESSION['chambre']; ?></td>
       <td><?php echo $_SESSION['commentaire']; ?></td>

		  <td> 
		  <div class="wrapper" align="center">  <br />  
                <label class="switch">
  				<?php 
  					if ($ligne['validation']==0) {
  						echo '<input type="checkbox" onclick="update(\''.$_SESSION['chambre'].'\')">';
  					} else {
  						echo '<input type="checkbox" checked>';
  					} 
  				?>
  				<span class="slider round"></span>
				</label>  
                <br />  
           </div>
   			</td>
	   		</tr>    
	<?php
     }
     ?>
</tbody>	
</table>
 <input type="button" onclick="exportTableToExcel('tableau')" class="btn" value="Télécharger le fichier excel" />

		<script type="text/javascript">
		
	function update(id_ch){
			$.ajax({
			type: 'POST',
			url: 'update.php',
			data: {chambre: id_ch},
			Success: function(){
				alert('bravo');
			}
			}).then(function(){
				$.ajax({

				})
			})	
		}

	function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
 </script>

 <table id="tableau" hidden>
	<tr>
		<th>Nom</th>
		<th>Prenom</th>
		<th>Chambre</th>
	</tr>
<?php 
		require_once("connect.php");
$db = new DB();
 $query="SELECT * FROM demandes WHERE validation='1'";
 $result= $db->runQuery($query);

foreach ($result as $demande) {
			echo '<tr><td>'.$demande['nom'].'</td><td>'.$demande['prenom'].'</td><td>'.$demande['demande'].'</td></tr>';
			}	
		?>
</table>

</body>
</html>