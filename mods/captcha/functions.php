<?php
// ClanSphere 2010 - www.clansphere.net
// $Id$

/*====================================================================================================================
  ADD CODE - public and private keys
  ================================================================================================================= */
global $recaptcha_site_key; $recaptcha_site_key = "PUBLIC_KEY";
global $recaptcha_private_key; $recaptcha_private_key = "PRIVATE_KEY";
/*====================================================================================================================
  END MODIFICATIONS
  ================================================================================================================= */

global $available_captchas, $captcha_option;
$captcha_option['options'] = cs_sql_option(__FILE__,'captcha');
$available_captchas = array(
    'standard',
    'recaptcha',
    'recaptchav2'
);

function cs_captchashow($mini = 0)
{
  global $cs_main,$captcha_option,$com_lang;
  if(check_captcha_methode() == 'recaptchav2')
  {
    require_once('recaptchav2_autoload.php');
    $lang= $com_lang['short'];

/*====================================================================================================================
  ORIGINAL CODE - public key
  ====================================================================================================================
   return '<div class="g-recaptcha" data-sitekey="'.$captcha_option['options']['recaptcha_public_key'].'"></div>
            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl='.$lang.'"></script>';
  ================================================================================================================= */
    global $recaptcha_site_key;
    return '<div class="g-recaptcha" data-sitekey="'.$recaptcha_site_key.'"></div>
            <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl='.$lang.'"></script>';
/*====================================================================================================================
  END MODIFICATIONS
  ================================================================================================================= */
  }
  elseif(check_captcha_methode() == 'recaptcha')
  {
    require_once('recaptchalib.php');
    $error = isset($cs_main['captcha_error']) ? $cs_main['captcha_error'] : '';
    return recaptcha_get_html($captcha_option['options']['recaptcha_public_key'], $error);
  }
  else
  {
    $mini = $mini != 0 ? '&mini' : '';
    $data['captcha']['img'] = cs_html_img('mods/captcha/generate.php?time=' . cs_time().$mini);
    $data['captcha']['size'] = empty($mini) ? 8 : 3;
    return cs_subtemplate(__FILE__,$data,'captcha','captcha');
  }
}

function cs_captchaverify($mini = 0)
{
  global $cs_main,$captcha_option;

  if(check_captcha_methode() == 'recaptchav2')
  {
    require_once('recaptchav2_autoload.php');
    if (isset($_POST["g-recaptcha-response"])) {
/*====================================================================================================================
  ORIGINAL CODE - private key
  ====================================================================================================================
  $recaptcha = new \ReCaptcha\ReCaptcha($captcha_option['options']['recaptcha_private_key']);
  ================================================================================================================= */
      global $recaptcha_private_key;
      $recaptcha = new \ReCaptcha\ReCaptcha($recaptcha_private_key);
/*====================================================================================================================
  END MODIFICATIONS
  ================================================================================================================= */
      // If file_get_contents() is locked down on your PHP installation to disallow
      // its use with URLs, then you can use the alternative request method instead.
      // This makes use of fsockopen() instead.
      //  $recaptcha = new \ReCaptcha\ReCaptcha($secret, new \ReCaptcha\RequestMethod\SocketPost());
      $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);


      if ($resp->isSuccess()) {
        return true;
      } else {
        return false;
      }
    }
  }
  elseif(check_captcha_methode() == 'recaptcha')
  {
    require_once('recaptchalib.php');
    if (isset($_POST["recaptcha_response_field"])) {
      $resp = recaptcha_check_answer ($captcha_option['options']['recaptcha_private_key'],
          $_SERVER["REMOTE_ADDR"],
          $_POST["recaptcha_challenge_field"],
          $_POST["recaptcha_response_field"]);

      if ($resp->is_valid) {
        return true;
      } else {
        $cs_main['captcha_error'] = $resp->error;
        return false;
      }
    }
  }
  else
  {
    return cs_captchacheck($_POST['captcha'], $mini);
  }
}

function check_captcha_methode()
{
  global $captcha_option;
/*====================================================================================================================
  ORIGINAL CODE - private key
  ====================================================================================================================
  if($captcha_option['options']['method'] == 'recaptchav2' AND !empty($captcha_option['options']['recaptcha_private_key']) AND !empty($captcha_option['options']['recaptcha_public_key']))
  {
    return 'recaptchav2';
  }
  elseif($captcha_option['options']['method'] == 'recaptcha' AND !empty($captcha_option['options']['recaptcha_private_key']) AND !empty($captcha_option['options']['recaptcha_public_key']))
  {
    return 'recaptcha';
  }
  else
  {
    return 'standard';
  }
  ================================================================================================================= */
  return 'recaptchav2';
/*====================================================================================================================
  END MODIFICATIONS
  ================================================================================================================= */
}
