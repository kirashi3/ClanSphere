<?php

$cs_lang = cs_translate('squads');

$op_squads = cs_sql_option(__FILE__,'squads');

$mod_info['name']    = $cs_lang[$op_squads['label'].'s'];
$mod_info['version']  = $cs_main['version_name'];
$mod_info['released']  = $cs_main['version_date'];
$mod_info['creator'] = 'ClanSphere';
$mod_info['team']    = 'ClanSphere';
$mod_info['url']    = 'www.clansphere.net';
$mod_info['text']    = $cs_lang['modtext'];
$mod_info['icon']    = 'yast_group_add';
$mod_info['show']    = array('clansphere/admin' => 3,'users/settings' => 2,'options/roots' => 5);
$mod_info['categories']  = FALSE;
$mod_info['comments']  = FALSE;
$mod_info['protected']  = FALSE;
$mod_info['tables']    = array('squads');