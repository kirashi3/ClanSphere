<div class="alert alert-info text-center" role="alert">
    <strong>{head:msg}</strong>
</div><!--END alert-->

<form method="post" action="{url:access_users}">
<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {lang:mod_name} - {lang:add_user}
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <div class="panel-body">

        <div class="form-group">
            <label>{lang:name}</label>
            <input type="text" name="users_nick" id="users_nick" class="form-control" autocomplete="off" onkeyup="Clansphere.ajax.user_autocomplete('users_nick', 'search_users_result' ,'{page:path}')" maxlength="80" size="40" placeholder="{lang:name}">
            <div id="search_users_result"></div>
        </div><!--END form-group-->

        <input type="hidden" name="id" value="{access:id}" />
        <button type="submit" name="submit" class="btn btn-primary">{lang:submit}</button>

    </div><!--END panel-body-->

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>
                        {access:name} - {lang:user_list}
                    </th>
                </tr>
            </thead><!--END thead-->

            <tbody>
                {loop:users}
                <tr>
                    <th>{users:nick}</th>
                </tr>
                {stop:users}
            </tbody><!--END table tbody-->
        </table><!--END table-->
    </div><!--END table-responsive-->
</div><!--END panel-->
</form>
