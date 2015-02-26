<?php

$cs_lang = cs_translate('abcode');
$cs_get  = cs_get('start,sort');
$cs_post = cs_post('start,sort');

$abcode_func = empty($cs_post['type']) ? '' : (string)$cs_post['type'];

$start = empty($cs_get['start']) ? 0 : $cs_get['start'];
if (!empty($cs_post['start'])) $start = $cs_post['start'];

$sort = empty($cs_get['sort']) ? 5 : $cs_get['sort'];
if (!empty($cs_post['sort'])) $sort = $cs_post['sort'];

$where = empty($abcode_func) ? 0 : "abcode_func = '" . $abcode_func . "'";

$cs_sort[1] = 'abcode_func DESC';
$cs_sort[2] = 'abcode_func ASC';
$cs_sort[3] = 'abcode_pattern DESC';
$cs_sort[4] = 'abcode_pattern ASC';
$cs_sort[5] = 'abcode_order DESC';
$cs_sort[6] = 'abcode_order ASC';

$order        = $cs_sort[$sort];
$abcode_count = cs_sql_count(__FILE__,'abcode',$where);

$data['lang']['count']  = $abcode_count;
$data['pages']['list']  = cs_pages('abcode','manage',$abcode_count,$start,$abcode_func,$sort);
$data['action']['form'] = cs_url('abcode','manage');
$data['lang']['getmsg'] = cs_getmsg();

$cells       = 'abcode_func, abcode_pattern, abcode_id, abcode_order';
$cs_abcode   = cs_sql_select(__FILE__,'abcode',$cells,$where,$order,$start,$account['users_limit']);
$abcode_loop = count($cs_abcode);

$data['sort']['function'] = cs_sort('abcode','manage',$start,$abcode_func,1,$sort);
$data['sort']['pattern']  = cs_sort('abcode','manage',$start,$abcode_func,3,$sort);
$data['sort']['order']    = cs_sort('abcode','manage',$start,$abcode_func,5,$sort);

if(empty($abcode_loop))
{

    $data['abcode'] = '';
}

for($run=0; $run<$abcode_loop; $run++)
{

    if ($cs_abcode[$run]['abcode_func'] == 'str')
    {

        $data['abcode'][$run]['function'] = $cs_lang['str'];

    } else {

        $data['abcode'][$run]['function'] = $cs_lang['img'];
    }

    $data['abcode'][$run]['pattern'] = cs_secure($cs_abcode[$run]['abcode_pattern']);
    $data['abcode'][$run]['result']  = cs_secure($cs_abcode[$run]['abcode_pattern'],1,1);
    $data['abcode'][$run]['order']   = $cs_abcode[$run]['abcode_order'] == 0 ? '' : $cs_abcode[$run]['abcode_order'];
    $data['abcode'][$run]['id']      = cs_secure($cs_abcode[$run]['abcode_id']);

}

echo cs_subtemplate(__FILE__,$data,'abcode','manage');
