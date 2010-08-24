<?php
// ClanSphere 2010 - www.clansphere.net
// $Id$

function cs_cache_clear() {

  apc_clear_cache('user');

  $unicode = extension_loaded('unicode') ? 1 : 0;
  $where = "options_mod = 'clansphere' AND options_name = 'cache_unicode'";
  cs_sql_update(__FILE__, 'options', array('options_value'), array($unicode), 0, $where); 
 }

function cs_cache_delete($name) {

  if(apc_exists($name))
    apc_delete($name);
}

function cs_cache_info() {

  $info = apc_cache_info('user');
  $form = array();
  foreach($info['cache_list'] AS $num)
    $form[$num['info']] = array('name' => $num['info'], 'time' => $num['mtime'], 'size' => $num['mem_size']);

  ksort($form);
  $form = array_values($form);
  if(count($info['cache_list']) != count($form))
    cs_error('APC User Cache', 'cs_cache_info - Duplicate entries found: ' . (count($info['cache_list']) - count($form)));

  return $form;
}

function cs_cache_load($name) {

  if(apc_exists($name))
    return apc_fetch($name);
  else
    return false;
}

function cs_cache_save($name, $content) {

  if(is_bool($content))
    cs_error($name, 'cs_cache_save - It is not allowed to just store a boolean');
  elseif(apc_exists($name))
    cs_error($name, 'cs_cache_save - This name is already placed in the cache');
  else
    apc_store($name, $content);

  return $content;
}