<?php
session_start();
require('conf.php');

$mail->addAddress($_POST['email']);  

// ⚙️ Votre nouveau mot de passe est prêt !
// 📦 Votre commande est en préparation !
// 🚀 Votre commande prend son envol !
// ⭐ Do it 4 Vendée vous remercie !

$mail->Subject = '=?UTF-8?B?' . base64_encode("📦 Votre commande est en préparation !") . '?='; 

ob_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <meta name='viewport' content='width=device-width'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name="format-detection" content="telephone=no"/>
    <style>
        @font-face {
            font-family: "Apercu Pro";
            src: url("../font/Apercu-Pro-Medium.otf") format("opentype");
        }

        @font-face {
            font-family: "Apercu Pro";
            src: url("../font/Apercu-Pro-Regular.otf") format("opentype");
            font-weight: 100;
        }

        @font-face {
            font-family: "Apercu Pro";
            src: url("../font/Apercu-Pro-Bold.otf") format("opentype");
            font-weight: bold;
        }

        @font-face {
            font-family: "Apercu Pro";
            src: url("../font/Apercu-Pro-Bold-Italic.otf") format("opentype");
            font-weight: bold;
            font-style: italic;
        }
        table{
            padding: 20px 10px;
        }
        td{
            text-align: center;
            font-family: 'Apercu Pro', Roboto, Arial, Helvetica, sans-serif;
        }
        a{
            text-decoration:none;
            color: #000;
        }
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }
        #logoD4V{
            width: 201px;
            text-align: center;
        }
        #title{
            font-size: 21px;
            text-transform: uppercase;
            font-weight: bold;
            color: #000;
        }
        #redBold{
            color: #D10000;
            font-weight: bold;
        }
        .container{
            display: block;
            margin: 1em 0;
        }
        #linkButtonContainer{
            display: block;
            margin: 1em 0 2em 0;
        }
        #linkButton{
            background: #D10000;
            background: linear-gradient(42deg, rgba(209,0,0,1) 0%, rgba(209,0,0,1) 100%);
            border: none;
            color: #fff;
            border-radius: 4px;
            padding: 12px 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: .4px;
        }
        #idCommande{
            font-size: 17px;
            text-transform: uppercase;
            font-weight: bold;
            color: #000;
        }
        #dateOrder, #faq{
            color: #9C9C9C;
        }
        #secondLink{
            margin: 0 20px;
        }
        #svgContainer{
            display: block;
            margin: 2em 0 1em 0;
        }
        #linkBottomContainer{
            font-size: 12px;
        }
    </style>
</head>
<body>
    <center>
        <table width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <img id="logoD4V" src="https://doit4vendee.fr/assets/img/logo.png" alt="Logo de la société Do It 4 Vendée"></img>
                    </td>
                </tr>
                <tr>
                    <td id="title">Votre commande est valid&eacute;e !</td>
                </tr>
                <tr>
                    <td>
                        <p>Bonjour L&eacute;o,</p>
                        <p>Votre commande a bien &eacute;t&eacute; re&ccedil;ue ! Toute l&rsquo;&eacute;quipe <span id="redBold">Do It 4 Vend&eacute;e</span> est ravis de prendre en charge votre commande.</p>
                    </td>
                </tr>
                <tr>
                    <td id="linkButtonContainer">
                       <a id="linkButton" href="#">Mon espace client</a>
                    </td>
                </tr>
                <tr>
                    <td id="idCommande">Votre num&eacute;ro de commande #4325643</td>
                </tr>
                <tr>
                    <td id="dateOrder">Commandé le 16 Nov. 2021</td>
                </tr>
                <tr>
                    <td class="container" id="faq">Pour toute question sur la livraison ou le paiement, contactez-nous par e-mail (<a href="mailto:contact@doit4vendee.fr" target="_blank" x-apple-data-detectors="true"><font color="#9C9C9C">contact@doit4vendee.fr</font></a>) ou au +33 7 63 73 84 87.</td>
                </tr>
                <tr>
                    <td id="svgContainer">
                        <a href="https://g.page/r/CWJIQ9YiThY2EAE"><img style="width:30px" src="https://doit4vendee.fr/assets/img/googleIcon.png" alt="Logo du logo de la société Google"></img></a>
                        <a href="https://www.instagram.com/doit4vendee/"><img style="width:30px" id="secondLink" src="https://doit4vendee.fr/assets/img/instagramIcon.png" alt="Logo du logo de la société Instagram"></img></a>
                        <a href="https://www.facebook.com/doit4vendee/"><img style="width:30px" src="https://doit4vendee.fr/assets/img/facebookIcon.png" alt="Logo du logo de la société Facebook"></img></a>
                    </td>
                </tr>
                <tr>
                    <td id="linkBottomContainer">
                        <a href="https://doit4vendee.fr/" target="_blank" class="linkBottom"><font color="#000">A propos de</font></a><a href="https://doit4vendee.fr/legal" target="_blank" class="linkBottom" id="secondLink"><font color="#000">Conditions g&eacute;n&eacute;rales</font></a><a href="https://doit4vendee.fr/login" target="_blank" class="linkBottom"><font color="#000">Connexion</font></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </center>
</body>
</html>
<?php
$mail->Body = ob_get_contents();
ob_end_clean();
echo ($mail->send() ? 'OK' : 'KO');