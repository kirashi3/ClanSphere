<?php

$cs_lang = cs_translate('board');

$report_id = $_GET['id'];

$report_cells = array('boardreport_done');
$report_save = array(1);
cs_sql_update(__FILE__,'boardreport',$report_cells,$report_save,$report_id);

cs_cache_delete('count_boardreport');

cs_redirect($cs_lang['done_true'],'board','reportlist');