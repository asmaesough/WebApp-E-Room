 
<?php
session_start();
require_once("connect.php");
$db = new DB();
$query ="SELECT * FROM residence";
$results = $db->runQuery($query);
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset='utf-8'>
        <link href="css/page4.css" media="screen" rel="stylesheet" type="text/css">
        <a href='http://localhost/page4.php?deconnexion=true'><span>Déconnexion</span></a>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
        <script src="../js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript">
                function getResid(val) {
                    $.ajax({
                    type: "POST",
                    url: "getResid.php",
                    data:'id_resid='+val,
                    success: function(data){
                        $("#sexe").html(data);
                    }
                    });
                }

                function selectGender(val) {
                    $("#search-box").val(val);
                    $("#suggesstion-box").hide();
                }
                
                function getGender(val) {
                    $.ajax({
                    type: "POST",
                    url: "getGender.php",
                    data:'id_sexe='+val,
                    success: function(data){
                        $("#bloc").html(data);
                    }
                    });
                }

                function selectBloc(val) {
                    $("#search-box").val(val);
                    $("#suggesstion-box").hide();
                }

                function getBloc(val) {
                    $.ajax({
                    type: "POST",
                    url: "getBloc.php",
                    data:'id_bloc='+val,
                    success: function(data){
                        $("#appartement").html(data);
                    }
                    });
                }

                function selectAppart(val) {
                    $("#search-box").val(val);
                    $("#suggesstion-box").hide();
                }
                 function getAppart(val) {
                    $.ajax({
                    type: "POST",
                    url: "getAppart.php",
                    data:'id_appart='+val,
                    success: function(data){
                        $("#chambre").html(data);
                    }
                    });
                }

                function selectChambre(val) {
                    $("#search-box").val(val);
                    $("#suggesstion-box").hide();
                }
                function getChambre(val) {
                    $.ajax({
                    type: "POST",
                    url: "getChambre.php",
                    data:'id_cham='+val,
                    });
                }
            </script>

</head>
<body>
    <header>
           <img src="../img/logo.png">
            <nav>
                <ul>
                    <?php
                    // afficher un message
                echo "<p><strong> ". $_SESSION['prenom'] ." " . $_SESSION['nom'] ."</strong></p>";
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
        <a href='http://localhost/page4.php?deconnexion=true'><span>Déconnexion</span></a>
                </ul>
            </nav>
        </header>
    <div class="zone" style="background-color: rgba(17,17,17,0.3)"> 
    <h1>Réservez votre chambre<br /> maintenant!</h1>
    
    <div class="residence">
        <select name="residence" id="residence" onChange="getResid(this.value);" STYLE="background-image:url('https://image.flaticon.com/icons/png/512/59/59809.png'); background-repeat: no-repeat; background-size: 35px 35px; background-position: left 4px top 4px;">
            <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez une résidence </option>
           <?php
        foreach($results as $residence) {
        ?>
        <option value="<?php echo $residence["id"]; ?>"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; echo $residence["nom_resid"]; ?></option>
        <?php
        }
        ?>
        </select>
    </div><br /><br />

    <div class="sexe">
        <select name="sexe" id="sexe"  onChange="getGender(this.value);" STYLE="background-image:url('https://image.flaticon.com/icons/png/512/23/23159.png'); background-repeat: no-repeat; background-size: 35px 35px; background-position: left 4px top 4px;">
            <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez votre sexe</option>
        </select>
    </div><br /><br />

    <div class="bloc">
        <select name="bloc" id="bloc" onChange="getBloc(this.value);" STYLE="background-image:url('https://image.flaticon.com/icons/png/512/13/13180.png'); background-repeat: no-repeat; background-size: 35px 35px; background-position: left 4px top 4px;">
            <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez un bloc</option>   
        </select>
    </div><br /><br />

    <div class="appartement">
        <select name="appartement" id="appartement" onChange="getAppart(this.value);" STYLE="background-image:url('https://image.flaticon.com/icons/png/512/69/69524.png'); background-repeat: no-repeat; background-size: 35px 35px; background-position: left 4px top 4px;">
            <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez un appartement</option>   
        </select>
    </div><br /><br />

    <div class="chambre">
        <select name="chambre" id="chambre" onChange="getChambre(this.value);" STYLE="background-image:url('https://image.flaticon.com/icons/png/512/59/59801.png'); background-repeat: no-repeat; background-size: 35px 35px; background-position: left 4px top 4px;">
            <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choisissez une chambre</option>   
        </select>
    </div> <br /><br />
    <div id="error"></div>
</div> <br /><br />
<form action="http://localhost/page5.php" method="POST">
<INPUT style="width: 170px; height: 40px;" TYPE="button" NAME="envoyer" VALUE=" Envoyer " onclick="validateForm()" >
</form>
</div> 
<script src="../js/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script type='text/javascript'>

    
function validateForm() {
    if (document.getElementById('residence').selectedIndex==0 || document.getElementById('sexe').value==0 || document.getElementById('bloc').value==0 || document.getElementById('appartement').value==0 || document.getElementById('chambre').value==0) 
    {
        document.getElementById('error').innerHTML = '<img class="err" id="error" style="width:20px; height: 20px;" src="https://s3.amazonaws.com/totalsystemcare-s3/www.driverassist.com/wp-content/uploads/2016/11/01112829/Emblem-important-yellow.svg_.png"> <h5 style="color:#D5C500">Remplissez d\'abord tous les champs</h5>'
    } else {  
                   swal({
          title: "An input!",
          text: "Write something interesting:",
          type: "input",
          showCancelButton: true,
          closeOnConfirm: false,
          inputPlaceholder: "Write something"
        }, function (inputValue) {
          if (inputValue === false) return false;
          if (inputValue === "") {
            swal.showInputError("You need to write something!");
            return false
          }
          swal("Nice!", "You wrote: " + inputValue, "success");
        });
    }
}
</script>

</FORM>
</body>
</html>