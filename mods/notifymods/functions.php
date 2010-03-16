<?php
function notifymods_mail($mod, $users_id=0) {
  // $mail_text[$lang] = cs_translate('notifymods');
  $from = "notifymods ntm INNER JOIN {pre}_users usr ON ntm.notifymods_user = usr.users_id";
  $where = "ntm.notifymods_user != '".$users_id."'
            AND usr.users_delete != 1
            AND usr.users_active = 1
            AND ntm.notifymods_" . $mod . " = 1";
  $ntm_users = cs_sql_select(__FILE__,$from,'usr.users_lang, usr.users_email',$where,0,0,0);
  
  $pattern1 = '/\'(?<mod>.*)_text\'\] = \'(?<value>.*)\';/';
  $pattern2 = '/\'(?<mod>.*)_subject\'\] = \'(?<value>.*)\';/';
  
  foreach($ntm_users as $mail_user) {
    $lang = empty($mail_user['users_lang']) ? $cs_main['def_lang'] : $mail_user['users_lang'];
    if (empty($mail_text[$lang][$mod.'_text'])) {
      $mail_text[$lang] = cs_cache_load('lang_notifymods_'.$lang);
      if ($mail_text[$lang] === FALSE AND file_exists("lang/" . $lang . "/notifymods.php"))
      { // read lang-file and search for text- & subject-placeholder
        $fp   = fopen("lang/" . $lang . "/notifymods.php", "r");
        $file_content = '';
        while ( !feof($fp) ) {
            $file_content .= fgets($fp, 4096);
        }
        fclose($fp);
        
        preg_match_all($pattern1, $file_content, $match);
        $run = 0;
        foreach ($match['mod'] as $lang_mod) {
          $mail_text[$lang][$lang_mod.'_text'] = $match['value'][$run];
          $run++;
        }
        preg_match_all($pattern2, $file_content, $match);
        $run = 0;
        foreach ($match['mod'] as $lang_mod) {
          $mail_text[$lang][$lang_mod.'_subject'] = $match['value'][$run];
          $run++;
        }
        cs_cache_save('lang_notifymods_'.$lang, $mail_text[$lang]);
      }
    }
    cs_mail($mail_user['users_email'],$mail_text[$lang][$mod.'_subject'],$mail_text[$lang][$mod.'_text']);
  }
}