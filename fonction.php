<?php
	 
	 function slugify($text) {
		// Remplace les espaces par des tirets
		$text = preg_replace('/\s+/', '-', $text);
		// Supprime les caractères spéciaux et accents
		$text = iconv('UTF-8', 'ASCII//TRANSLIT', $text);
		// Convertit en minuscules
		$text = strtolower($text);
		// Supprime les caractères non alphabétiques et non numériques
		$text = preg_replace('/[^a-z0-9\-]/', '', $text);
		return $text;
	}
		
    function insertion_newletter($v_email){
			require './config/connexion.php';
			$requete="insert into newletter (email) values('.$v_email.')";
			foreach($dbh->query($requete) as $row){
				 $entries[] = $row;			
			}
			return 'ok';
		} 
		
    function LISTENEWSLETTER(){
			require './config/connexion.php';
			$requete='SELECT email,nom,newletterid from newletter';
			foreach($dbh->query($requete) as $row){
				 $entries[] = $row;			
			}
			return $entries;
		}

   

	/*function InfoConnexion($EMail,$Passwords){
        require './config/connexion.php';
        $requete ='SELECT userid FROM user WHERE email = "'.$EMail.'" AND passwords = "'.$Passwords.'"';
        foreach($dbh->query($requete) as $row){
				$entries[] = $row;					
			}
			return $entries;
     
    }*/
	
	/*function logout(){
		require './config/connexion.php';
		unset($_SESSION['iduser']);
		echo '<script type="text/javascript">
				location.replace("index.php");
			  </script>';
		
	}*/