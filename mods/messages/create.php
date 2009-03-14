<?php
// ClanSphere 2008 - www.clansphere.net
// $Id$
// cs_notify($email='', $title='title', $message='test', $users_id=1, $notification_name = 'notifications_pm');
$cs_lang = cs_translate('messages');
require_once('mods/messages/functions.php');
$messages_form = 1;
$messages_to = !empty($_REQUEST['to']) ? $_REQUEST['to'] : '';

$messages_subject = '';
$messages_text = '';
$time = cs_time();
$users_id = $account['users_id'];
$messages_error = '';
$errormsg = '';
$messages_archiv = '0';
$messages_show_receiver = '1';

/*+-------------------------------------------------------------+*/
/*|  Pre Sample:  @                        |*/
/*|  Clan:test clan 1; test user 1; Squad:test clan 1 squad 1  |*/
/*+-------------------------------------------------------------+*/

if (!empty($_POST['messages_to'])) {

  $messages_to = $_POST['messages_to'];
  $temp = explode(';', $messages_to);
  $loop_temp = count($temp);
  $where = '';
  
  for($run=0; $run<$loop_temp; $run++) {
    $a = substr($temp[$run], 0, 6); //check is this a squad
    $b = substr($temp[$run], 0, 5); //check is this a clan
    if($a == 'Squad:') {
      if(!empty($where)) {
        $where = $where . ' OR ';
      }
      $z = substr($temp[$run], 6);
      $where .= "squ.squads_name = '" . cs_sql_escape($z) . "'";
    } elseif($b == 'Clan:') {
      if(!empty($where)) {
        $where = $where . ' OR ';
      }
      $z = substr($temp[$run], 5);
      $where .= "cla.clans_name = '" . cs_sql_escape($z) . "'";
    } else {
      if(!empty($where)) {
        $where .= ' OR ';
      }
      $where .= "usr.users_nick = '" . cs_sql_escape($temp[$run]) . "'";
      $z = $temp[$run];
    }
  }

  $from = 'users usr LEFT JOIN {pre}_members mem ON usr.users_id = mem.users_id ';
  $from .= 'LEFT JOIN {pre}_squads squ ON mem.squads_id = squ.squads_id ';
  $from .= 'LEFT JOIN {pre}_clans cla ON squ.clans_id = cla.clans_id';
  $select = 'usr.users_id AS users_id, usr.users_nick AS users_nick, usr.users_email AS users_email';
  $order = '';
  $cs_messages = cs_sql_select(__FILE__,$from,$select,$where,0,0,0);
  $cs_messages_loop = count($cs_messages);

  if(empty($cs_messages_loop) OR empty($where)) {
    $messages_error++;
    $errormsg .= $cs_lang['error_to'] . cs_html_br(1);
    $error_to = '1';
  } else {
    $cs_messages = remove_dups($cs_messages,'users_nick');
    $cs_messages_loop = count($cs_messages);
  }

  if(empty($cs_messages_loop) AND empty($error_to)) {
    $messages_error++;
    $errormsg .= $cs_lang['error_to'] . cs_html_br(1);
  }
} else {
  $messages_error++;
  $errormsg .= $cs_lang['error_to'] . cs_html_br(1);
}
if (!empty($_POST['messages_subject'])) {
  $_POST['messages_subject'] = preg_replace("=\<script\>(.*?)\</script\>=si","",$_POST['messages_subject']);
}
if (!empty($_POST['messages_subject'])) {
	$messages_subject = $_POST['messages_subject'];
} else {
  $messages_error++;
  $errormsg .= $cs_lang['error_subject'] . cs_html_br(1);
}
if (!empty($_POST['messages_text'])) {
  $messages_text = $_POST['messages_text'];
} else {
  $messages_error++;
  $errormsg .= $cs_lang['error_text'] . cs_html_br(1);
}
if (!empty($_POST['messages_show_sender'])) {
  $messages_show_sender = $_POST['messages_show_sender'];
} else {
  $messages_show_sender = '0';
}


if (isset($_POST['submit']) && empty($messages_error)) {
  
  for($run=0; $run<$cs_messages_loop; $run++) {
    $users_id_to = $cs_messages[$run]['users_id'];
    $messages_cells = array('users_id','messages_time','messages_subject','messages_text',
      'users_id_to','messages_show_receiver','messages_show_sender');
    $messages_save = array($users_id,$time,$messages_subject,$messages_text,$users_id_to,
      $messages_show_receiver,$messages_show_sender);
    cs_sql_insert(__FILE__,'messages',$messages_cells,$messages_save);

    $where = "users_id = '" . $users_id_to . "'";
    $select = 'users_id,autoresponder_subject,autoresponder_text,autoresponder_close,autoresponder_mail';
    $autoresponder = cs_sql_select(__FILE__,'autoresponder',$select,$where);
    $auto_subject = $autoresponder['autoresponder_subject'];
    $auto_text = $autoresponder['autoresponder_text'];
    $auto_mail = $autoresponder['autoresponder_mail'];

    if(!empty($autoresponder['autoresponder_close'])) {
      $messages_cells = array('users_id','messages_time','messages_subject','messages_text','users_id_to','messages_show_receiver');
      $messages_save = array($users_id_to,$time,$auto_subject,$auto_text,$users_id,'1');
      cs_sql_insert(__FILE__,'messages',$messages_cells,$messages_save);
    }
    if(!empty($autoresponder['autoresponder_mail']))
    {
      echo $cs_messages[$run]['users_email'];
      if(!empty($cs_messages[$run]['users_email']))
      {
        $email = $cs_messages[$run]['users_email'];
        $title = $cs_lang['mail_titel'];
        $message = $cs_lang['mail_text'] . $cs_messages[$run]['users_nick'];
        $message .= $cs_lang['mail_text_2'] . $cs_main['def_title'] . $cs_lang['mail_text_3'];
        $message .= $cs_main['def_org'] . $cs_lang['mail_text_4'];
        cs_mail($email,$title,$message);
      }
    }
  }

  cs_redirect($cs_lang['msg_create_done'],'messages','center');
}

$data = array();
$data['if']['preview'] = false;

$data['lang']['body_create'] = empty($messages_error) ? nl2br($cs_lang['body_create']) : $cs_lang['error_occured'] . cs_html_br(1) . $errormsg;


if (isset($_POST['preview']) && empty($messages_error))
{
  $data['if']['preview'] = true;
  
  $data['var']['subject'] = cs_secure($_POST['messages_subject']);
  $data['var']['date'] = cs_date('unix',$time,1);
  $data['to'] = $cs_messages;
  $data['var']['text'] = cs_secure($_POST['messages_text'],1,1);
	
}

$data['msg']['to'] = $messages_to;
$data['msg']['subject'] = $messages_subject;
$data['msg']['smileys'] = cs_abcode_smileys('messages_text');
$data['msg']['abcode'] = cs_abcode_features('messages_text');
$data['msg']['text'] = $messages_text;
$data['checked']['show_sender'] = empty($messages_show_sender) ? '' : ' checked="checked"';

echo cs_subtemplate(__FILE__, $data, 'messages', 'create');

?>