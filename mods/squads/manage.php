<?php

$cs_lang = cs_translate('squads');
$cs_post = cs_post('start,sort');
$cs_get = cs_get('start,sort');
$data = array();

$op_squads = cs_sql_option(__FILE__,'squads');
$op_clans = cs_sql_option(__FILE__,'clans');

$start = empty($cs_get['start']) ? 0 : $cs_get['start'];
if (!empty($cs_post['start']))  $start = $cs_post['start'];
$sort = empty($cs_get['sort']) ? 2 : $cs_get['sort'];
if (!empty($cs_post['sort']))  $sort = $cs_post['sort'];

$cs_sort[1] = 'sqd.squads_name DESC';
$cs_sort[2] = 'sqd.squads_name ASC';
$cs_sort[3] = 'cln.clans_name DESC';
$cs_sort[4] = 'cln.clans_name ASC';
$order = $cs_sort[$sort];
$squads_count = cs_sql_count(__FILE__,'squads');


$data['head']['mod'] = $cs_lang[$op_squads['label'].'s'];
$data['lang']['new_label'] = $cs_lang['new_'.$op_squads['label']];
$data['head']['count'] =$squads_count;
$data['head']['pages'] = cs_pages('squads','manage',$squads_count,$start,0,$sort);
$data['head']['getmsg'] = cs_getmsg();

$data['sort']['squads_name'] = cs_sort('squads','manage',$start,0,1,$sort);
$data['lang']['squad_label'] = $cs_lang[$op_squads['label']];
$data['sort']['clans_name'] = cs_sort('squads','manage',$start,0,3,$sort);
$data['lang']['clans_label'] = $cs_lang[$op_clans['label']];

$select = 'sqd.squads_name AS squads_name, sqd.clans_id AS clans_id, cln.clans_name AS ';
$select .= 'clans_name, sqd.squads_id AS squads_id';
$from = 'squads sqd LEFT JOIN {pre}_clans cln ON sqd.clans_id = cln.clans_id';
$data['squads'] = cs_sql_select(__FILE__,$from,$select,0,$order,$start,$account['users_limit']);
$squads_loop = count($data['squads']);


for($run=0; $run<$squads_loop; $run++) {

  $data['squads'][$run]['id'] = $data['squads'][$run]['squads_id'];
   $data['squads'][$run]['squads_name'] = cs_secure($data['squads'][$run]['squads_name']);
  $data['squads'][$run]['clans_name'] = cs_secure($data['squads'][$run]['clans_name']);
}

echo cs_subtemplate(__FILE__,$data,'squads','manage');
