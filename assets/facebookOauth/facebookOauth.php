<?php
    require_once('vendor/autoload.php');
    $facebook = new \Facebook\Facebook([
        'app_id' => '841324053224163',
        'app_secret' => 'a050c7324187a56cff45b5e3ae3549a7',
        'default_graph_version' => 'v2.10'

    ]);
    $facebook_output = '';
    $facebook_helper = $facebook->getRedirectLoginHelper();
    if(isset($_GET['code'])){
        if(isset($_SESSION['access_token'])){
            $access_token = $_SESSION['access_token'];
        }else{
            $access_token = $facebook_helper->getAccessToken();
            $_SESSION['access_token'] = $access_token;
            $facebook->setDefaultAccessToken($_SESSION['access_token']);
        }
        $graph_response = $facebook->get("/me?fields=name,email", $access_token);
        $facebook_user_info = $graph_response->getGraphUser();
        if(!empty($facebook_user_info['name'])){
            $_SESSION['firstName'] = $facebook_user_info['name'];
        }
        if(!empty($facebook_user_info['email'])){
            $_SESSION['email'] = $facebook_user_info['email'];
        }
    }else {
        $facebook_permissions = ['email'];
        $facebook_login_url = $facebook_helper->getLoginUrl('https://doit4vendee.fr', $facebook_permissions);
        // $facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'">Ici</a></div>';
    }
?>