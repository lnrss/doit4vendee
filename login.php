<?php
session_start();
define('BASEPATH', true);
$title = 'Do It 4 Vendée - Inscription';
require('assets/template/header.php');
require('assets/template/head.php');
require('assets/constante.php');
//! Uncomment in prod
include('assets/googleOauth/googleOauth.php');
// include('assets/facebookOauth/facebookOauth.php');
$_SESSION['user'] = '';
if(isset($_POST['submit'])){
    try{
        $userLogin = !empty($_POST['email']) ? ($_POST['email']) :null;
        $passwordAttempt = !empty($_POST['pass']) ? ($_POST['pass']) :null;
        $query = $PDO->prepare("SELECT email, password, passwordTemp FROM users WHERE email = :email");
        $query->bindValue(':email', $userLogin);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user === false){
            echo '<script>errorModal("error", "Raté...", "Email incorrect !", "Réessayer", "<span style=\'opacity:.3\' onclick=\'emailModal('.$_SESSION['firstName'].')\'>Mot de passe oublié</span>");</script>';
        }else{
            $validPassword = password_verify($passwordAttempt, $user['password']);
            $validPasswordTemp = password_verify($passwordAttempt, $user['passwordTemp']);
            if($validPassword || $validPasswordTemp){
                $query = $PDO->prepare("SELECT * FROM users WHERE email = :email");
                $query->bindValue(':email', $userLogin);
                $query->execute();
                $row = $query->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user'] = $userLogin;
                $_SESSION['firstName'] = $row['firstName'];
                $_SESSION['lastName'] = $row['lastName'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['idClient'] = $row['idClient'];
                if($validPasswordTemp){
                    $query = $PDO->prepare('UPDATE users SET password=?, passwordTemp=? WHERE email=?');
                    $query->execute([$user['passwordTemp'], null, $row['email']]);
                }
                echo '<script>window.location.replace("profile")</script>';
            }else{
                echo '<script>errorModal("error", "Raté...", "Mot de passe incorrect !", "Réessayer", "<span style=\'opacity:.3\' onclick=\'emailModal('.$_SESSION['firstName'].')\'>Mot de passe oublié</span>");</script>';
            }
        }
    }catch(PDOException $e){
        echo '<script>alert("'.$error.'");errorModal("error", "Oops...", "'.$e->getMessage().'", "Ok", "");</script>';
    }
}
?>

<section id="registerContainer">
    <span class="titlePage">
        Connexion
    </span>
    <div class="socialContainer">
        <div class="buttonGoogleContainer">
            <label for="buttonGoogle">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.8724 6.135C11.8724 5.74 11.8374 5.365 11.7774 5H6.12744V7.255H9.36244C9.21744 7.995 8.79244 8.62 8.16244 9.045V10.545H10.0924C11.2224 9.5 11.8724 7.96 11.8724 6.135Z" fill="#4285F4"/><path d="M6.12746 12C7.74746 12 9.10246 11.46 10.0925 10.545L8.16246 9.04502C7.62246 9.40502 6.93746 9.62502 6.12746 9.62502C4.56246 9.62502 3.23746 8.57002 2.76246 7.14502H0.772461V8.69002C1.75746 10.65 3.78246 12 6.12746 12Z" fill="#34A853"/><path d="M2.76244 7.145C2.63744 6.785 2.57244 6.4 2.57244 6C2.57244 5.6 2.64244 5.215 2.76244 4.855V3.31H0.772441C0.362441 4.12 0.127441 5.03 0.127441 6C0.127441 6.97 0.362441 7.88 0.772441 8.69L2.76244 7.145Z" fill="#FBBC05"/><path d="M6.12746 2.375C7.01246 2.375 7.80246 2.68 8.42746 3.275L10.1375 1.565C9.10246 0.595001 7.74746 0 6.12746 0C3.78246 0 1.75746 1.35 0.772461 3.31L2.76246 4.855C3.23746 3.43 4.56246 2.375 6.12746 2.375Z" fill="#EA4335"/></svg>
                Google
            </label>
            <input type="button" id="buttonGoogle" onclick="window.location='<?=$client->createAuthUrl()?>'">
        </div>
        <!-- <div class="buttonFacebookContainer">
            <label for="buttonFacebook">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#3b5998 " viewBox="0 0 30 30" width="18" height="18">    <path d="M24,4H6C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h10v-9h-3v-3h3v-1.611C16,9.339,17.486,8,20.021,8 c1.214,0,1.856,0.09,2.16,0.131V11h-1.729C19.376,11,19,11.568,19,12.718V14h3.154l-0.428,3H19v9h5c1.105,0,2-0.895,2-2V6 C26,4.895,25.104,4,24,4z"/></svg>
                Facebook
            </label>
            <input type="button" id="buttonFacebook" onclick='errorModal("error", "Oops...", "Cette option est temporairement indisponible", "Ok", "")'> onclick='window.location="$facebookLoginUrl"'
        </div> -->
    </div>
    <hr style="margin: 24px 0 16px 0;">
    <form method="POST" action="login.php">
        <div class="inputModuleContainer">
            <span class="titleInputModule">Email</span><br/>
            <input name="email" type="email" class="inputModule" value="<?=$_POST['email']?>">
        </div>
        <div class="inputModuleContainer">
            <span class="titleInputModule">Mot de passe</span>
            <div id="passwordContainer">
                <input name="pass" type="password" class="inputModule" id="passwordInput3">
                <div>
                    <svg onclick="togglePassword(3)" id="eyeOpen3" class="togglePassword" width="20" height="12" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 1.45833C5.77919 1.46135 5.56002 1.49205 5.34917 1.54948C5.4467 1.69956 5.49863 1.86902 5.5 2.04167C5.5 2.17572 5.46982 2.30847 5.41119 2.43232C5.35256 2.55618 5.26662 2.66871 5.15829 2.7635C5.04995 2.8583 4.92134 2.93349 4.77979 2.98479C4.63825 3.0361 4.48654 3.0625 4.33333 3.0625C4.13602 3.0613 3.94235 3.01586 3.77083 2.93052C3.6355 3.34119 3.65127 3.7787 3.81591 4.18109C3.98055 4.58347 4.28571 4.93033 4.68816 5.17253C5.09061 5.41474 5.56995 5.54 6.05828 5.53059C6.54662 5.52118 7.01919 5.37756 7.40906 5.12008C7.79893 4.8626 8.08633 4.50432 8.23056 4.09598C8.37478 3.68764 8.36852 3.24994 8.21265 2.84489C8.05678 2.43984 7.75922 2.08797 7.3621 1.83911C6.96499 1.59026 6.48845 1.45704 6 1.45833V1.45833ZM11.9275 3.23385C10.7977 1.30503 8.56105 0 6 0C3.43895 0 1.20166 1.30594 0.0724887 3.23404C0.0248307 3.31653 0 3.40766 0 3.50009C0 3.59252 0.0248307 3.68366 0.0724887 3.76615C1.20228 5.69497 3.43895 7 6 7C8.56105 7 10.7983 5.69406 11.9275 3.76596C11.9752 3.68347 12 3.59234 12 3.49991C12 3.40748 11.9752 3.31634 11.9275 3.23385V3.23385ZM6 6.125C3.94479 6.125 2.06062 5.1224 1.04312 3.5C2.06062 1.8776 3.94458 0.875 6 0.875C8.05542 0.875 9.93938 1.8776 10.9569 3.5C9.93959 5.1224 8.05542 6.125 6 6.125Z" fill="var(--grey-color)"/></svg>
                    <svg onclick="togglePassword(3)" id="eyeClose3" class="togglePassword hideElement" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.8122 14.7068L1.12527 0.109599C1.07402 0.068594 1.01518 0.0380782 0.952123 0.0197938C0.889065 0.0015094 0.823021 -0.00418553 0.75776 0.00303418C0.6925 0.0102539 0.629302 0.0302469 0.571775 0.0618716C0.514247 0.0934963 0.463517 0.136133 0.42248 0.187348L0.10999 0.577345C0.0688564 0.628578 0.0382372 0.687412 0.0198841 0.750482C0.00153093 0.813552 -0.00419592 0.879618 0.0030312 0.944902C0.0102583 1.01019 0.0302976 1.0734 0.0620023 1.13094C0.093707 1.18848 0.136455 1.2392 0.1878 1.28021L18.8747 15.8775C18.926 15.9185 18.9848 15.949 19.0479 15.9673C19.1109 15.9855 19.177 15.9912 19.2422 15.984C19.3075 15.9768 19.3707 15.9568 19.4282 15.9252C19.4858 15.8936 19.5365 15.8509 19.5775 15.7997L19.89 15.4097C19.9311 15.3585 19.9618 15.2996 19.9801 15.2366C19.9985 15.1735 20.0042 15.1074 19.997 15.0422C19.9897 14.9769 19.9697 14.9137 19.938 14.8561C19.9063 14.7986 19.8635 14.7479 19.8122 14.7068V14.7068ZM9.27471 4.57348L13.4868 7.86395C13.4174 5.99234 11.8899 4.49636 10 4.49636C9.75621 4.49682 9.51313 4.52266 9.27471 4.57348ZM10.7253 11.4139L6.51323 8.12342C6.58292 9.99472 8.11037 11.4907 10 11.4907C10.2438 11.4902 10.4868 11.4644 10.7253 11.4139V11.4139ZM10 3.49717C13.0827 3.49717 15.9089 5.21453 17.4351 7.99353C17.061 8.67746 16.5987 9.30943 16.0601 9.87326L17.2395 10.7944C17.8961 10.0925 18.4524 9.30327 18.8925 8.4491C18.964 8.3078 19.0013 8.15169 19.0013 7.99337C19.0013 7.83505 18.964 7.67894 18.8925 7.53765C17.1963 4.23376 13.8414 1.99838 10 1.99838C8.85316 1.99838 7.75913 2.21696 6.73041 2.58572L8.18068 3.71886C8.77254 3.5846 9.37877 3.49717 10 3.49717ZM10 12.4899C6.91728 12.4899 4.09143 10.7725 2.56491 7.99353C2.93952 7.3096 3.40231 6.67773 3.94144 6.11411L2.7621 5.19298C2.1056 5.89475 1.54941 6.68389 1.10933 7.53796C1.03785 7.67925 1.0006 7.83536 1.0006 7.99368C1.0006 8.15201 1.03785 8.30811 1.10933 8.44941C2.80397 11.7533 6.15887 13.9887 10 13.9887C11.1468 13.9887 12.2409 13.7685 13.2696 13.4013L11.8193 12.2685C11.2275 12.4025 10.6215 12.4899 10 12.4899Z" fill="var(--grey-color)"/></svg>
                </div>
            </div>
        </div>
        <div class="consentCgvContainer">
            <input type="checkbox" id="checkConsent" name="checkConsent">
            <label for="checkConsent">
                Se souvenir de moi
            </label>
        </div>
        <input name="submit" type="submit" value="Se connecter" id="registerSubmitButton">
    </form>
    <span onclick="emailModal(<?=$_SESSION['idClient']?>);" class="redText" id="passwordForget">Mot de passe oublié ?</span>
    <hr style="margin: 0">
    <div class="bottomPart">
        Vous n'avez pas de compte ?<br/>
        <a href="register.php" class="redBoldText" id="loginButton">S'inscrire</a>
    </div>
</section>
        
<?php require('assets/template/footer.php'); ?>