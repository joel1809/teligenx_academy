<?php
require_once('fonction.php');
require_once('fonctions/fnDB.php');
require_once('core/Model.php');

//UNE INSTANCE DU Model Pour l'interaction avec la Base de données
$db = new Model();
$pdo = $db->getPdo();


    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.
        $etudiant_nom = strip_tags(trim($_POST["nom"]));
        $etudiant_nom = str_replace(array("\r","\n"),array(" "," "),$etudiant_nom);
        $etudiant_prenoms = strip_tags(trim($_POST["prenoms"]));
        $etudiant_prenoms = str_replace(array("\r","\n"),array(" "," "),$etudiant_prenoms);
        $etudiant_email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        
        $etudiant_telephone = trim($_POST["telephone"]);
        $formation_id = intval($_POST["formation_id"]);

        $formation = $db->getFormation($formation_id);
        $formation_titre = $formation->formation_titre; //trim($_POST["formation_titre"]);
        
        // Check that data was sent to the mailer.
        if ( empty($etudiant_nom) OR empty($etudiant_prenoms) OR empty($etudiant_email) OR !filter_var($etudiant_email, FILTER_VALIDATE_EMAIL)) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Veuillez renseigner votre nom et votre adresse e-mail svp.";
            exit;
        }

        //Enregistrer dans la base et envoyer un mail
        //l'étudiant
        $etudiant_id = $db->saveEtudiant($etudiant_nom, $etudiant_prenoms, $etudiant_telephone, $etudiant_email);

        //son inscription à la formation
        $inscription_id = $db->saveInscription($etudiant_id, $formation_id);

        $numero_inscription = sprintf("INSC-%04d", $inscription_id);
        die("NUMERO D'INSCRIPTION: " . $numero_inscription);

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.

        // Set the email subject.
        $subject = "Inscription à la formation $formation_titre ";

        // Build the email content.
        $email_content = "Nom de l'étudiant : $etudiant_nom_prenoms\n\n";
        $email_content .= "Email : $etudiant_email\n\n";
        $email_content .= "Numéro de téléphone : $etudiant_telephone\n\n";
        $email_content .= "Formation : $formation_titre\n\n";

        // Build the email headers.
        $email_headers = "From: site@teligenx.com <$etudiant_nom_prenoms via Academy Teligenx>";
        
        
        $file = 'mailwin.txt';
		// Ecrit le contenu dans le fichier, en utilisant le drapeau
		// FILE_APPEND pour rajouter à la suite du fichier et
		// LOCK_EX pour empêcher quiconque d'autre d'écrire dans le fichier
		// en même temps
		file_put_contents($file, $email_content, FILE_APPEND | LOCK_EX);
				
        ini_set( 'display_errors', 1);
        error_reporting( E_ALL );
        $from = "";
        //$to ="dyacouba@hotmail.com,diabbyyacoubacheick@yahoo.fr,ldi@enical-group.com";
        $to ="jeanjoel272@gmail.com";
        

        // Send the email.
        if (mail($to,$subject,$email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Votre inscription a été effectué.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Erreur lors de l'envoie du mail";
        }


    }

?>