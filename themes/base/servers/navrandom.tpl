<table class="forum" cellpadding="0" cellspacing="{page:cellspacing}" style="width:100%">
	<tr>
    	<td class="centerb">{servers:hostname}</td>
  	</tr>   
  	<tr>
    	<td class="centerb"><img src="{page:path}{servers:mappic}" alt="" /></td>
  	</tr> 
  	{if:live}
  		<tr>
    		<td class="leftb"><b>{lang:host_navlist}</b><br />
      			<a href="{servers:proto}{servers:servers_ip}:{servers:servers_port}">{servers:servers_ip}:{servers:servers_port}</a>
    		</td>
  		</tr>
  		<tr>
    		<td class="leftb"><b>{lang:game_navlist}</b><br />{servers:game_descr}</td>
  		</tr>
  		<tr>
    		<td class="leftb"><b>{lang:map_navlist}</b><br />{servers:map}</td>
  		</tr>
  		<tr>
    		<td class="leftb"><b>{lang:players_navlist}</b><br />{servers:num_players} / {servers:max_players}</td>
  		</tr>
  		<tr>
    		<td class="centerb"><a href="{url:servers_list}&id={servers:id}">Weitere Infos</a>
    	</tr>
	{stop:live}
  	{unless:live}
  		<tr>
    		<td class="centerb">{lang:no_connect}</td>
  		</tr>
  	{stop:live}
</table>
