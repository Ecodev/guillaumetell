<?php

/* Ce fichier stocke et gère les questions */

	global $questions;
	// Tableaux contenant toutes les questions
	// $questions = array(
	// 	
	// 	1 => array(
	// 		'libelle' => "De quelle couleur était la culotte de guillaume ?",
	// 		'choix' => array(
	// 			1 => 'bleu',
	// 			2 => 'rouge',
	// 			3 => 'vert',
	// 			4 => 'blanc',
	// 		),
	// 		'reponse' => 1,
	// 	),
	// 
	// 	2 => array(
	// 		'libelle' => "De quelle nationalité était Guigui?",
	// 		'choix' => array(
	// 			1 => 'belge',
	// 			2 => 'wisigoth',
	// 			3 => 'Suisse',
	// 			4 => 'Suédois',
	// 		),
	// 		'reponse' => 3,
	// 	),
	// 	
	// );
	
	$questionsFrancais = array(
		
		1 => array(
			'libelle' => "Comment s'appelle l'épouse de Guillaume Tell ?",
			'choix' => array(
				1 => 'Gertrud',
				2 => 'Hedwig',
				3 => 'Armgard',
			),
			'reponse' => 2,
		),

		2 => array(
			'libelle' => "A quel endroit Tell a-t-il tué Gessler ?",
			'choix' => array(
				1 => 'au Chemin creux',
				2 => 'au Grütli',
				3 => 'à la Tellsplatte',
			),
			'reponse' => 1,
		),
		
		3 => array(
			'libelle' => "Comment Tell meurt-il ?",
			'choix' => array(
				1 => 'en combattant les Autrichiens',
				2 => 'dans son lit',
				3 => 'en sauvant un enfant de la noyade',
			),
			'reponse' => 3,
		),
		
		4 => array(
			'libelle' => "Avec quelle arme le nidwaldien Kuoni a-t-il tué le bailli dans son bain ?",
			'choix' => array(
				1 => 'avec une arbalète',
				2 => 'avec une hache',
				3 => 'avec un morgenstern',
			),
			'reponse' => 2,
		),
		
		5 => array(
			'libelle' => "Comment s'appelle le sculpteur de la statue de Tell érigée à Altdorf ?",
			'choix' => array(
				1 => 'Kissling',
				2 => 'Rodin',
				3 => 'Stückelberg',
			),
			'reponse' => 1,
		),
		
		6 => array(
			'libelle' => "De quelle année date le premier récit sur Guillaume Tell ?",
			'choix' => array(
				1 => '1472',
				2 => '1291',
				3 => '1507',
			),
			'reponse' => 1,
		),
		
		7 => array(
			'libelle' => "Quel est le titre du libelle de Freudenberger de 1760 qui a été brûlé publiquement à Altdorf ?",
			'choix' => array(
				1 => 'Guillaume Tell, une fable suédoise',
				2 => 'Guillaume Tell, une fable danoise',
				3 => 'Guillaume Tell, un assassin',
			),
			'reponse' => 2,
		),
		
		8 => array(
			'libelle' => "Pourquoi y a-t-il une grenouille sur le vitrail de Froschauer ?",
			'choix' => array(
				1 => 'comme allusion au saut de Tell',
				2 => "elle est reprise des armoiries d'Altdorf",
				3 => 'comme allusion au nom de famille du propriétaire',
			),
			'reponse' => 3,
		),
		
		9 => array(
			'libelle' => "Où se trouve la plus ancienne illustration connue de Tell en Suisse romande ?",
			'choix' => array(
				1 => 'à Genève',
				2 => 'à Neuchâtel',
				3 => 'au Jura',
			),
			'reponse' => 2,
		),
		
		10 => array(
			'libelle' => "Guillaume Tell est-il ?",
			'choix' => array(
				1 => 'un personnage légendaire',
				2 => 'un Uranais qui a vécu au 13ème siècle',
				3 => 'un Neuchâtelois qui a vécu au 16ème siècle',
			),
			'reponse' => 1,
		),
		
	);
	
	$questionsDeutsch = array(
		
		1 => array(
			'libelle' => "Wie heisst die Ehefrau von Wilhelm Tell?",
			'choix' => array(
				1 => 'Gertrud',
				2 => 'Hedwig',
				3 => 'Armgard',
			),
			'reponse' => 2,
		),

		2 => array(
			'libelle' => "Wo hat Tell den Landvogt Gessler getötet ?",
			'choix' => array(
				1 => 'in der Hohlen Gasse',
				2 => 'auf dem Rütli',
				3 => 'bei der Tellsplatte',
			),
			'reponse' => 1,
		),
		
		3 => array(
			'libelle' => "Wie stirbt Tell ?",
			'choix' => array(
				1 => 'im Kampf gegen die Österreicher',
				2 => 'in seinem Bett',
				3 => 'bei der Rettung eines Kindes vor dem Ertrinkungstod',
			),
			'reponse' => 3,
		),
		
		4 => array(
			'libelle' => "Mit welcher Waffe hat der Nidwaldner Kuoni den Landvogt im Bad getötet ?",
			'choix' => array(
				1 => 'mit einer Armbrust',
				2 => 'mit einer Axt',
				3 => 'mit einem Morgenstern',
			),
			'reponse' => 2,
		),
		
		5 => array(
			'libelle' => "Wie heisst der Bildhauer der Tellstatue von Altdorf ?",
			'choix' => array(
				1 => 'Kissling',
				2 => 'Rodin',
				3 => 'Stückelberg',
			),
			'reponse' => 1,
		),
		
		6 => array(
			'libelle' => "Aus welchem Jahr stammt der erste Bericht über Wilhelm Tell ?",
			'choix' => array(
				1 => '1472',
				2 => '1291',
				3 => '1507',
			),
			'reponse' => 1,
		),
		
		7 => array(
			'libelle' => "Welches ist der Titel der Schrift von Freudenberger von 1760, die in Altdorf öffentlich verbrannt wurde ?",
			'choix' => array(
				1 => 'Wilhelm Tell, ein schwedisches Märchen',
				2 => 'Wilhelm Tell, ein dänisches Märchen',
				3 => 'Wilhelm Tell, ein Mörder',
			),
			'reponse' => 2,
		),
		
		8 => array(
			'libelle' => "Warum gibt es auf dem Glasfenster vom Froschauer einen Frosch ? ",
			'choix' => array(
				1 => 'als Anspielung auf den Tellssprung',
				2 => "es handelt sich um eine Übernahme aus dem Altdorfer Wappen",
				3 => 'als Anspielung auf den Familiennamen des Besitzers',
			),
			'reponse' => 3,
		),
		
		9 => array(
			'libelle' => "Wo befindet sich die älteste bildliche Darstellung Tells in der Westschweiz ?",
			'choix' => array(
				1 => 'in Genf',
				2 => 'in Neuenburg',
				3 => 'im Jura',
			),
			'reponse' => 2,
		),
		
		10 => array(
			'libelle' => "Ist Wilhelm Tell…",
			'choix' => array(
				1 => 'eine Figur aus einer Sage',
				2 => 'ein Urner, der im 13. Jahrhundert gelebt hat',
				3 => 'ein Neuenburger, der im 16. Jahrhundert gelebt hat',
			),
			'reponse' => 1,
		),
		
	);
	

	
	
	function saveAnswer($id_question, $valeur, $id_utilisateur){
		global $db;
		$db->insert('reponse', array(
			'no_question' => $id_question,
			'valeur' => $valeur,
			'id_utilisateur' => $id_utilisateur,
		));	
	}
	
	// crée un nouvel utilisateur et retourne l'id de l'utilisateur
	function addUser($nom=''){
		global $db;
		return $db->insert('utilisateur', array('nom' => $nom));
	}
	
	function rightAnswer($id_question){ // fonction qui renvoie la bonne solution d'une question sous forme de texte
	
		global $questions;
		
		if (isset($questions[$id_question])){
			
			$id_reponse = $questions[$id_question]['reponse'];
			return $questions[$id_question]['choix'][$id_reponse];
		}
		
	}
	
	function getNumberOfAnswers($question, $choix){
	
		global $db;
		
		$query = "select count(*) from reponse where no_question = ".$question." and valeur = ".$choix;

		$result = $db->Query($query);
		$resultat = $db->getRowArrays($result);
		return $resultat[0];
	
	}
	
	function getNumberOfPlayers(){
	
		global $db;
		
		$query = "select count(*) from utilisateur";

		$result = $db->Query($query);
		$resultat = $db->getRowArrays($result);
		return $resultat[0];
	
	}
?>


