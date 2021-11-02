<?php
session_start();
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
//call iofactory instead of xlsx writer
use PhpOffice\PhpSpreadsheet\IOFactory;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;




if(isset($_POST["export"]))
{

$connect = mysqli_connect("localhost", "root", "", "hébergement");
/*
$query1 ="SELECT   DISTINCT id_chambre,chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1%A%'   ;  ";
$results1 = mysqli_query($connect, $query1);

$query2="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '1%B%' ;  ";
$results2 = mysqli_query($connect, $query2);

$query3 ="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1%C%'" ;
$results3 = mysqli_query($connect, $query3);

$query4 ="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '1%D%'" ;
$results4 = mysqli_query($connect, $query4);

$query5="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1%F%' ;  ";
$results5 = mysqli_query($connect, $query5);

$query7 ="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)  LIKE '1%G%'" ;
$results7 = mysqli_query($connect, $query7);

$query8="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1%H%'" ;
$results8 = mysqli_query($connect, $query8);

$query9 ="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '3%A%'   ;  ";
$results9 = mysqli_query($connect, $query9);

$query10="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1) LIKE '3%B%' ;  ";
$results10 = mysqli_query($connect, $query10);

$query11="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '3%C%'" ;
$results11 = mysqli_query($connect, $query11);

$query12 ="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '3%D%'" ;
$results12 = mysqli_query($connect, $query12);

$query13 ="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '3%E%'   ;  ";
$results13 = mysqli_query($connect, $query13);

$query14="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '3%F%' ;  ";
$results14 = mysqli_query($connect, $query14);

$query15="SELECT   DISTINCT chambre,demande,demandes.nom,nom1,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '3%G%'" ;
$results15 = mysqli_query($connect, $query15);

$query16="SELECT   DISTINCT chambre,demande,demandes.nom,reservationadmin.nom,nom,prenom FROM demandes FULL JOIN reservationadmin.nom ON demandes.demande=demandes.demande WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)  LIKE '3%H%'" ;
$results16 = mysqli_query($connect, $query16);
*/
$query1 ="SELECT    id_chambre,email,demande,nom,prenom,reservee FROM demandes FULL JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1A%'   ;  ";
$results1 = mysqli_query($connect, $query1);

$query2="SELECT   id_chambre,email,demande,nom,prenom,reservee  FROM demandes  FULL JOIN chambre ON demandes.demande=chambre.id_chambre  WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '1B%' ;  ";
$results2 = mysqli_query($connect, $query2);

$query3 ="SELECT    id_chambre,email,demande,nom,prenom FROM demandes  LEFT JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1C%'" ;
$results3 = mysqli_query($connect, $query3);

$query4 ="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes  FULL JOIN chambre ON demandes.demande=chambre.id_chambre  WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '1D%'" ;
$results4 = mysqli_query($connect, $query4);

$query5="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes   FULL JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1F%' ;  ";
$results5 = mysqli_query($connect, $query5);

$query7 ="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes  FULL  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)  LIKE '1G%'" ;
$results7 = mysqli_query($connect, $query7);

$query8="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes   FULL JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '1H%'" ;
$results8 = mysqli_query($connect, $query8);

$query9 ="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes  FULL  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '3A%'   ;  ";
$results9 = mysqli_query($connect, $query9);

$query10="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes  FULL  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1) LIKE '3B%' ;  ";
$results10 = mysqli_query($connect, $query10);

$query11="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes   FULL JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '3C%'" ;
$results11 = mysqli_query($connect, $query11);

$query12 ="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes FULL   JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '3D%'" ;
$results12 = mysqli_query($connect, $query12);

$query13 ="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes  FULL JOIN chambre ON demandes.demande=chambre.id_chambre  WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '3E%'   ;  ";
$results13 = mysqli_query($connect, $query13);

$query14="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee FROM demandes  FULL  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)    LIKE '3F%' ;  ";
$results14 = mysqli_query($connect, $query14);

$query15="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes  FULL  JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)   LIKE '3G%'" ;
$results15 = mysqli_query($connect, $query15);

$query16="SELECT   DISTINCT id_chambre,email,demande,nom,prenom,reservee  FROM demandes   FULL JOIN chambre ON demandes.demande=chambre.id_chambre WHERE validation=0 AND  SUBSTR(demande, 1, CHAR_LENGTH(demande) - 1)  LIKE '3H%'" ;
$results16 = mysqli_query($connect, $query16);


//call iofactory instead of xlsx writer



//load spreadsheet
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("logement2.xlsx");
if(mysqli_num_rows($results1) > 0 ||mysqli_num_rows($results2) > 0 ||mysqli_num_rows($results3) > 0 ||mysqli_num_rows($results4) > 0 ||mysqli_num_rows($results5) > 0 ||mysqli_num_rows($results6) > 0 ||mysqli_num_rows($results7) > 0 ||mysqli_num_rows($results8) > 0 ||mysqli_num_rows($results9) > 0 ||mysqli_num_rows($results10) > 0 ||mysqli_num_rows($results11) > 0 ||mysqli_num_rows($results12) > 0 ||mysqli_num_rows($results13) > 0 ||mysqli_num_rows($results14) > 0||mysqli_num_rows($results15) > 0 ||mysqli_num_rows($results16) > 0  )
 {
$sheet = $spreadsheet->getActiveSheet();

 while($row = mysqli_fetch_array($results1))
  {$s=5;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='1A01a'){
		   
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF18', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1A01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1A01c'){
		  $s+=2;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1A01d'){
		  $s+=3;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);

		  
	  }
  
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1A02a'){
		   
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1A02b'){
		 $s+=4;
		   
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1A02c'){
		  $s+=5;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1A02d'){
		  $s+=6;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);

		  
	  }
 
  }
 while($row = mysqli_fetch_array($results2))
  {$s=5;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='1B01a'){
		   
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1B01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1B01c'){
		  $s+=2;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1B01d'){
		  $s+=3;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1B02a'){
		   $s+=4;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1B02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1B02c'){
		  $s+=6;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1B02d'){
		  $s+=7;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);

		  
	  }

	
  }
     while($row = mysqli_fetch_array($results3))
  {$s=5;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='1C01a'){
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1C01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1C01c'){
		  $s+=2;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1C01d'){
		  $s+=3;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
  }}
/*
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1C02a'){
		   $s+=4;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1C02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1C02c'){
		  $s+=6
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1C02d'){
		  $s+=7;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1C11a'){
		   $s+=8;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1C11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1C11c'){
		  $s+=10;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1C11d'){
		  $s+=11;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1C12a'){
		   $s+=12;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1C12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1C12c'){
		  $s+=14;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1C12d'){
		  $s+=15;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1C21a'){
		   $s+=16;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1C21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1C21c'){
		  $s+=18;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1C21d'){
		  $s+=19;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1C22a'){
		   $s+=20;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1C22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1C22c'){
		  $s+=22;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1C22d'){
		  $s+=23;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }
  }
    while($row = mysqli_fetch_array($results4))
  {$s=5;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='1D01a'){
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1D01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1D01c'){
		  $s+=2;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1D01d'){
		  $s+=3;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1D02a'){
		   $s+=4;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1D02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1D02c'){
		  $s+=6;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1D02d'){
		  $s+=7;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1D11a'){
		   $s+=8;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1D11b'){
		 
		   $s+=9;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1D11c'){
		  $s+=10;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1D11d'){
		  $s+=11;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
       elseif( $row["id_chambre"]=='1D12a'){
		   $s+=12;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1D12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1D12c'){
		  $s+=14;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1D12d'){
		  $s+=15;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1D21a'){
		   $s+=16;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1D21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1D21c'){
		  $s+=18;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1D21d'){
		  $s+=19;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1D22a'){
		   $s+=20;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1D22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1D22c'){
		  $s+=22;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1D22d'){
		  
		    $s+=33;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }
  }
  
  
  while($row = mysqli_fetch_array($results5))
  {$s=5;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='1E01a'){
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1E01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1E01c'){
		  $s+=2;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1E01d'){
		  $s+=3;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1E02a'){
		   $s+=4;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1E02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1E02c'){
		  $s+=6;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1E02d'){
		  $s+=7;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1E11a'){
		   $s+=8;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1E11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1E11c'){
		  $s+=10;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1E11d'){
		  $s+=11;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1E12a'){
		   $s+=12;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1E12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1E12c'){
		  $s+=14;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1E12d'){
		  $s+=15;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1E21a'){
		   $s+=16;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1E21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1E21c'){
		  $s+=18;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1E21d'){
		  $s+=19;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1E22a'){
		   $s+=20;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1E22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1E22c'){
		  $s+=22;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1E22d'){
		  $s+=23;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }
  }
  
  
    while($row = mysqli_fetch_array($results6))
  {$s=5;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='1F01a'){
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1F01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1F01c'){
		  $s+=2;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1F01d'){
		  $s+=3;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1F02a'){
		   $s+=4;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1F02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1F02c'){
		  $s+=6;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1F02d'){
		  $s+=7;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }
  
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1F11a'){
		   $s+=8;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1F11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1F11c'){
		  $s+=10;
		    $sheet->setCellValue('T'.$s.'', $row["nom"]);
$sheet->setCellValue('S'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1F11d'){
		  $s+=11;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1F12a'){
		   $s+=12;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1F12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1F12c'){
		  $s+=14;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1F12d'){
		  $s+=15;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1F21a'){
		   $s+=16;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1F21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1F21c'){
		  $s+=18;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1F21d'){
		  $s+=19;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1F22a'){
		   $s+=20;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1F22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1F22c'){
		  $s+=22;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1F22d'){
		  $s+=23;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }
  }
  
  
  
    while($row = mysqli_fetch_array($results7))
  {$s=5;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='1G01a'){
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1G01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1G01c'){
		  $s+=2;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1G01d'){
		  $s+=3;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1G02a'){
		   $s+=4;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1G02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1G02c'){
		  $s+=6;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1G02d'){
		  $s+=7;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1G11a'){
		  $s+=8; 
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1G11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1G11c'){
		  $s+=10;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1G11d'){
		  $s+=11;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1G12a'){
		   $s+=12;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1G12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1G12c'){
		  $s+=14;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1G12d'){
		  $s+=15;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1G21a'){
		   $s+=16;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1G21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1G21c'){
		  $s+=18;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1G21d'){
		  $s+=19;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1G22a'){
		   $s+=20;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1G22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1G22c'){
		  $s+=22;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1G22d'){
		  $s+=23;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }
  }
  
   while($row = mysqli_fetch_array($results8))
  {$s=5;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='1H01a'){
		   
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1H01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1H01c'){
		  $s+=2;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1H01d'){
		  $s+=3;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1H02a'){
		   $s+=4;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1H02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1H02c'){
		  $s+=6;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1H02d'){
		  $s+=7;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='1H11a'){
		   $s+=8;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='1H11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='1H11c'){
		  $s+=10;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='1H11d'){
		  $s+=11;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);

		  
	  }

	 
  }
  
  
    while($row = mysqli_fetch_array($results9))
  {$s=38;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='3A01a'){
		   
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3A01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3A01c'){
		  $s+=2;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('F'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3A01d'){
		  $s+=3;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3A02a'){
		    $s+=4;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3A02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3A02c'){
		  $s+=6;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3A02d'){
		  $s+=7;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3A11a'){
		    $s+=8;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3A11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3A11c'){
		  $s+=10;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3A11d'){
		  $s+=11;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	 
  }
    
    while($row = mysqli_fetch_array($results10))
  {$s=38;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='3B01a'){
		   
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3B01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3B01c'){
		  $s+=2;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3B01d'){
		  $s+=3;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3B02a'){
		    $s+=4;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3B02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3B02c'){
		  $s+=6;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3B02d'){
		  $s+=7;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3B11a'){
		    $s+=8;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3B11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3B11c'){
		  $s+=10;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3B11d'){
		  $s+=11;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3B12a'){
		    $s+=12;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3B12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3B12c'){
		  $s+=14;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3B12d'){
		  $s+=15;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3B21a'){
		    $s+=16;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3B21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3B21c'){
		  $s+=18;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3B21d'){
		  $s+=19;
		    $sheet->setCellValue('C'.$s.'', $row["nom"]);
$sheet->setCellValue('D'.$s.'', $row["prenom"]);

		  
	  }
  }
 
	 while($row = mysqli_fetch_array($results11))
  {$s=38;
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='3C01a'){
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3C01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3C01c'){
		  $s+=2;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3C01d'){
		  $s+=3;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3C02a'){
		    $s+=4;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3C02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3C02c'){
		  $s+=6;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3C02d'){
		  $s+=7;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3C11a'){
		    $s+=8;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3C11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3C11c'){
		  $s+=10;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3C11d'){
		  $s+=11;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3C12a'){
		    $s+=12;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3C12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3C12c'){
		  $s+=14;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3C12d'){
		  $s+=15;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3C21a'){
		    $s+=16;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3C21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3C21c'){
		  $s+=18;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3C21d'){
		  $s+=19;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3C22a'){
		  $s=20;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3C22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3C22c'){
		  $s+=22;
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3C22d'){
		  $s+=23;
		    $sheet->setCellValue('G'.$s.'', $row["nom"]);
$sheet->setCellValue('H'.$s.'', $row["prenom"]);

		  
	  }
  }
    while($row = mysqli_fetch_array($results12))
  {$s=38;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='3D01a'){
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3D01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('AE'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3D01c'){
		  $s+=2;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3D01d'){
		  $s+=3;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3D02a'){
		    $s=4;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3D02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3D02c'){
		  $s+=6;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3D02d'){
		  $s+=7;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3D11a'){
		    $s=8;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3D11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3D11c'){
		  $s+=10;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3D11d'){
		  $s+=11;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3D12a'){
		    $s=12;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3D12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3D12c'){
		  $s+=14;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3D12d'){
		  $s+=15;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3D21a'){
		    $s=16;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3D21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3D21c'){
		  $s+=18;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3D21d'){
		  $s+=19;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }
  
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3D22a'){
		    $s=20;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3D22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3D22c'){
		  $s+=22;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3D22d'){
		  $s+=23;
		    $sheet->setCellValue('K'.$s.'', $row["nom"]);
$sheet->setCellValue('L'.$s.'', $row["prenom"]);

		  
	  }
  }
    while($row = mysqli_fetch_array($results13))
  {$s=38;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='3E01a'){
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3E01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3E01c'){
		  $s+=2;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3E01d'){
		  $s+=3;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3E02a'){
		    $s=4;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3E02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3E02c'){
		  $s+=6;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3E02d'){
		  $s+=7;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3E11a'){
		    $s=8;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3E11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3E11c'){
		  $s+=10;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3E11d'){
		  $s+=11;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3E12a'){
		    $s=12;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3E12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3E12c'){
		  $s+=14;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3E12d'){
		  $s+=15;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3E21a'){
		    $s+=16;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='2E21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3E21c'){
		  $s+=18;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3E21d'){
		  $s+=19;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3E22a'){
		    $s+=20;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3E22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3E22c'){
		  $s+=22;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3E22d'){
		  $s+=23;
		    $sheet->setCellValue('O'.$s.'', $row["nom"]);
$sheet->setCellValue('P'.$s.'', $row["prenom"]);

		  
	  }
  }
    while($row = mysqli_fetch_array($results14))
  {$s=38;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='3F01a'){
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3F01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3F01c'){
		  $s+=2;
		    $sheet->setCellValue('T'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3F01d'){
		  $s+=3;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('AF'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3F02a'){
		    $s+=4;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3F02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3F02c'){
		  $s+=6;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3F02d'){
		  $s+=7;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3F11a'){
		    $s+=8;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3F11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3F11c'){
		  $s+=10;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3F11d'){
		  $s+=11;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3F12a'){
		    $s+=12;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3F12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3F12c'){
		  $s+=14;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3F12d'){
		  $s+=15;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3F21a'){
		    $s+=16;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3F21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3F21c'){
		  $s+=18;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3F21d'){
		  $s+=19;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3F22a'){
		    $s+=20;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3F22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3F22c'){
		  $s+=22;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3F22d'){
		  $s+=23;
		    $sheet->setCellValue('S'.$s.'', $row["nom"]);
$sheet->setCellValue('T'.$s.'', $row["prenom"]);

		  
	  }
  }
    while($row = mysqli_fetch_array($results15))
  {$s=5;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='3G01a'){
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3G01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3G01c'){
		  $s+=2;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3G01d'){
		  $s+=3;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3G02a'){
		    $s+=4;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3G02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3G02c'){
		  $s+=6;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3G02d'){
		  $s+=7;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3G11a'){
		   $s+=8;
 $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3G11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3G11c'){
		  $s+=10;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3G11d'){
		  $s+=11;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3G12a'){
		   $s+=12;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3G12b'){
		 $s+=13;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3G12c'){
		  $s+=14;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3G12d'){
		  $s+=15;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3G21a'){
		   $s+=16;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3G21b'){
		 $s+=17;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3G21c'){
		  $s+=18;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3G21d'){
		  $s+=19;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }
 
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3G22a'){
		   $s+=20;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3G22b'){
		 $s+=21;
		   
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3G22c'){
		  $s+=22;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3G22d'){
		  $s+=23;
		    $sheet->setCellValue('W'.$s.'', $row["nom"]);
$sheet->setCellValue('X'.$s.'', $row["prenom"]);

		  
	  }
  }

    while($row = mysqli_fetch_array($results16))
  {$s=38;
	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  if( $row["id_chambre"]=='3H01a'){
		   
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3H01b'){
		 $s+=1;
		   
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3H01c'){
		  $s+=2;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3H01d'){
		  $s+=3;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3H02a'){
		   $s+=4;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3H02b'){
		 $s+=5;
		   
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3H02c'){
		  $s+=6;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3H02d'){
		  $s+=7;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);

		  
	  }

	  //the last value of a string  :  substr("testers", -1); if nom1 defferent null  nom1
	  elseif( $row["id_chambre"]=='3H11a'){
		   $s+=8;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
  
	  }
	  
	    elseif( $row["id_chambre"]=='3H11b'){
		 $s+=9;
		   
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
    
		  
	  } elseif($row["id_chambre"]=='3H11c'){
		  $s+=10;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);
 
		  
	  } elseif( $row["id_chambre"]=='3H11d'){
		  $s+=11;
		    $sheet->setCellValue('AA'.$s.'', $row["nom"]);
$sheet->setCellValue('AB'.$s.'', $row["prenom"]);

		  
	  }

	
  }*/
  
//change it

//make an xlsx writer object using above spreadsheet

//write the file in current directory
/*

//make an xlsx writer object using above spreadsheet
$writer = new Xlsx($spreadsheet);
//write the file in current directory
$writer->save('logement2.xlsx');
//redirect to the file
 */


//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="logement.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
 

/*else{
	
//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="logement.Xlsx"');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
	
	
}*/

}
}
?>