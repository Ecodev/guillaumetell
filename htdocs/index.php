<?php
header('Content-Type: text/html; charset=UTF-8');
date_default_timezone_set('Europe/Zurich');
/* Alfred a acheté un petit canard bleu, mais ceci est une autre histoire...
  Ce fichier est les controleur de l'application pour le questionnaire sur Guillaume Tell. */

//initialise plein de choses
//	ob_start("ob_gzhandler");
//	session_start();
//	header('Content-Type: text/html; charset=UTF-8');
//	date_default_timezone_set('Europe/Zurich');

include 'DBMysql.php';
include 'questionsManager.php';

$db = require 'database.php';

// si une langue est définie dans un cookie.. utilise celle-ci
if (isset($_COOKIE['lang'])) {
    $langueCourante = $_COOKIE['lang'];
} else {
    $langueCourante = 'fr'; // si aucun cookie n'existe on prend le français
}

// Permet de définir la valeur de la langue dans le cookie
if (isset($_GET['langue'])) {
    $langueCourante = $_GET['langue'];
    setcookie('lang', $langueCourante, time() + 60 * 60 * 24 * 90, '/');
}

// importe le bon fichier de langue
include 'langue_' . $langueCourante . '.php';

// questions dans des langues différentes.
// par défaut en français
if ($langueCourante == 'de') {
    $questions = $questionsDeutsch;
} else {
    $questions = $questionsFrancais;
}

$action = '';
if (isset($_GET['correction'])) {
    $action = 'correction';
}

if (isset($_GET['score'])) {
    $action = 'score';
}

if (isset($_GET['stat'])) {
    $action = 'stat';
}

if ($action == 'correction') {
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        <head>
            <title>Guillaume Tell</title>
            <link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />
            <script type="text/javascript" src="jquery-1.6.2.min.js"></script>
            <script type="text/javascript" src="toto.js"></script>
            <script src="jquery.metadata.js" type="text/javascript"></script>
            <script src="jquery.validate.js" type="text/javascript"></script>

            <meta http-equiv="refresh" content="50;url=index.php">
        </head>

        <body>

            <div class="triche">
                <?php
                // on enregiste les réponses de l'utilisateur.

                $id_user = addUser();

    foreach ($questions as $id_question => $question) { // Boucle qui survole toutes les questions
                    $reponse = $_POST['question_' . $id_question];

                    // echo "Q".$id_question." : ".$reponse."\n"; // debug
                    if ($reponse) {
                        saveAnswer($id_question, $reponse, $id_user);
                    }
    }

                // on obtient les réponses de l'utilisateur dans un tableau
                $query = "SELECT * from reponse where id_utilisateur=" . $id_user;
    $result = $db->query($query);
    $userAnswers = $db->getAssocArrays($result);

                // on affiche une page avec la correction

                $reponsesJustes = 0;
    $reponsesFausses = 0;

    $htmlOutput = "";

    foreach ($questions as $id_question => $question) { // Boucle qui survole toutes les questions
                    $htmlOutput .= " <div id=\"question_" . $id_question . "\" class=\"question\"> ";
        $htmlOutput .= " <h2> " . $question["libelle"] . " </h2> ";

        $idChoixReponse = $userAnswers[$id_question - 1]['valeur'];
        $idReponseCorrecte = $question['reponse'];

                    // compte les bonnes réponses
                    if ($idChoixReponse == $idReponseCorrecte) {
                        $reponsesJustes++;
                    } else {
                        $reponsesFausses++;
                    }

                    // affiche les choix et leur états
                    $htmlOutput .= "<ul>";

        foreach ($question["choix"] as $key => $choice) { // boucle qui survole tout les choix de réponse
                        $htmlOutput .= "<li>";

                        // si la réponse est correcte => vert
                        if ($key == $idReponseCorrecte) {
                            $htmlOutput .= "<span class=\"juste\">" . $choice . "</span>";
                        } else {

                            // si la réponse était celle de l'utilateur la signaler fausse
                            if ($key == $idChoixReponse) {
                                $htmlOutput .= "<span class=\"faux\">" . $choice . "</span>";
                            } else {
                                // choix neutre
                                $htmlOutput .= "<span class=\"neutre\">" . $choice . "</span>";
                            }
                        }

            $htmlOutput .= "</li>";
        }
        $htmlOutput .= "</ul>";

        $htmlOutput .= "</div>";
    }

                // score personnel

                echo "<div class=\"resultats\">";
    echo "<h1>" . $langue['corrections'] . "</h1>";
    echo "<p>" . $langue['Votre score est de'] . ": ";
    echo "<strong class=\"score\">" . $reponsesJustes . "/" . count($questions) . "</strong></p>";

    if ($reponsesJustes == count($questions)) {
        echo "<p> <em class=\"conseil\">" . $langue["bien"] . "</em></p>";
    } elseif ($reponsesJustes >= $reponsesFausses && $reponsesJustes < count($questions)) {
        echo "<p> <em class=\"conseil\">" . $longue["moyen"] . "</em></p>";
    } elseif ($reponsesJustes < $reponsesFausses) {
        echo "<p> <em class=\"conseil\">" . $longue["nul"] . "</em></p>";
    }
    echo "</div>";

    echo $htmlOutput;

    echo "<p class=\"boutonRecommencer\">";
    echo "<a href=\"index.php\">" . $langue['Recommencer le quizz'] . "</a>";
    echo "</p>";
    ?>
            </div>
            <p id="LienStatistiques"><a href="index.php?stat">Stat</a></p>
        </body>
    </html>

    <?php

} elseif ($action == 'score') {
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
        <head>
            <title>Guillaume Tell</title>
            <link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />
            <script type="text/javascript" src="jquery-1.6.2.min.js"></script>
            <script type="text/javascript" src="toto.js"></script>
            <script src="jquery.metadata.js" type="text/javascript"></script>
            <script src="jquery.validate.js" type="text/javascript"></script>
        </head>

        <body>
            <div class="triche">
                <h1>
                    Bravo!
                </h1>

                <?php
                // va chercher les réponses de l'utilisateurs dont l'id_utilisateur est fourni en paramètre

                if (isset($_GET['score'])) {
                    $id_user = $_GET['score'];
                }

    $query = "SELECT * from reponse where id_utilisateur=" . $id_user;

    $result = $db->query($query);

    $userAnswers = $db->getAssocArrays($result);

    $reponsesJustes = 0;
    $reponsesFausses = 0;
    foreach ($questions as $id_question => $question) { // Boucle qui survole toutes les questions
                    if ($question['reponse'] == $userAnswers[$id_question - 1]['valeur']) {
                        $reponsesJustes++;
                    } else {
                        $reponsesFausses++;
                    }
    }

    echo "<div class=\"resultats\">";
    echo "<p>Votre score est de: </p>";
    echo "<h2 class=\"score\">" . $reponsesJustes . "/" . count($questions) . "</h2>";
    if ($reponsesJustes == count($questions)) {
        echo "<p> Vous connaissez déjà Guillaume Tell sur le bout des doigts! Espérons que l'exposition ne soit pas trop longue...!</p>";
    } elseif ($reponsesJustes >= $reponsesFausses && $reponsesJustes < count($questions)) {
        echo "<p> Vous avez déjà de bonnes bases, profitez de l'exposition pour les améliorer!</p>";
    } elseif ($reponsesJustes < $reponsesFausses) {
        echo "<p> L'histoire de Guillaume Tell n'est pas votre fort! Tentez d'améliorez vos connaissances dans cette exposition</p>";
    }

    echo "<a href=\"index.php\">Jouer!</a>";

    echo "</div>";
    ?>
            </div>
        </body>
    </html>
    <?php

} elseif ($action == 'stat') {
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
        <head>
            <title>Guillaume Tell</title>
            <link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />

        </head>

        <body>
            <div class="triche">
                <h1>
                    STATISTIQUES
                </h1>

                <?php
                $nbParticipants = getNumberOfPlayers();
    echo " <p>Il y a eu " . $nbParticipants . " participants </p>";
    foreach ($questions as $id_question => $question) { // Boucle qui survole toutes les questions
                    echo " <div id=\"question_" . $id_question . "\" class=\"question\"> ";
        echo " <h2> " . $question["libelle"] . " </h2> ";

        echo "<ul>";
        foreach ($question["choix"] as $key => $choice) { // boucle qui survole tout les choix de réponse
                        $nbReponses = getNumberOfAnswers($id_question, $key);
            $pourcentage = ($nbReponses / $nbParticipants) * 100;
            echo " <li> " . $nbReponses . " personnes ont trouvé <strong>" . $choice . "</strong>, donc <strong>" . round($pourcentage, 2) . " % </strong></li>";
        }
        echo "</ul>";
        echo "</div>";
    }

    echo "<p class=\"boutonRecommencer\">";
    echo "<a href=\"index.php\"> Recommencer le quizz</a>";
    echo "</p>";
    ?>

            </div>
        </body>
    </html>


    <?php

} else {
    ?>

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
        <head>
            <title>Guillaume Tell</title>
            <link rel="stylesheet" media="screen" type="text/css" title="Design" href="style.css" />
            <script type="text/javascript" src="jquery-1.6.2.min.js"></script>
            <script src="jquery.validate.js" type="text/javascript"></script>
            <script>
                $(document).ready(function() {
                    $("#formulaire").validate();
                });
            </script>


        </head>

        <body>
            <div id="blocLangue">
                <a href="?langue=fr"><img src="fr.png" alt="fr" /></a>
                <a href="?langue=de"><img src="de.png" alt="de" /></a>
            </div>

            <div class="triche">
                <h1 id="titrePrincipal">
                    <?php echo $langue['Connaissez-vous Guillaume Tell ?'] ?>
                </h1>

                <div id="blocPortraitGuillaume">
                    <img id="portraitGuillaume" src="guillaume-doigt.png" alt="guillaume tell" />
                </div>

                <form action="index.php?correction" method="post" id="formulaire" class="cmxform">

                    <?php
                    foreach ($questions as $id_question => $question) { // Boucle qui survole toutes les questions
                        echo " <div id=\"question_" . $id_question . "\" class=\"question\"> ";
                        echo " <h2> " . $question["libelle"] . " </h2> ";
                        echo "<ul>";

                        foreach ($question["choix"] as $key => $choice) { // boucle qui survole tout les choix de réponse
                            if ($key == 1) {
                                echo " <li><label for=\"question_" . $id_question . "_" . $choice . "\"><input type=\"radio\" name=\"question_" . $id_question . "\" id=\"question_" . $id_question . "_" . $choice . "\" value=\"" . $key . "\" class=\"required\" />" . $choice . "</label></li>";
                            } else {
                                echo " <li><label for=\"question_" . $id_question . "_" . $choice . "\"><input type=\"radio\" name=\"question_" . $id_question . "\" id=\"question_" . $id_question . "_" . $choice . "\" value=\"" . $key . "\" />" . $choice . "</label></li>";
                            }
                        }
                        echo "</ul>";
                        echo '<label for="question_' . $id_question . '" class="error">' . $langue["pas de reponse"] . '</label>';
                        echo "</div>";
                    }
    ?>

                    <p class="boutonCorriger">
                        <input id="boutonCorriger" type="submit" value="<?php echo $langue['Voir votre score'] ?>" class="submit" />
                    </p>

                </form>
            </div>
        </body>
    </html>

    <?php

} // if action
?>
