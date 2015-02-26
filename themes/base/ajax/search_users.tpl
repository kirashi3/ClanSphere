<div class="list-group" style="position: absolute; margin-top: 5px;">
    {loop:result}
    <a href="javascript:abc_set('{data:old}{result:users_nick}', '{data:target}')" class="list-group-item" onclick="document.getElementById('search_users').style.visibility = 'hidden'">
        {result:users_nick}
    </a>
    {stop:result}
</div>
