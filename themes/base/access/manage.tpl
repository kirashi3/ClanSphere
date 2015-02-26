{lang:getmsg}

<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {lang:mod_name} - {lang:head_manage}

            <small>{lang:total}: {lang:count}</small>
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>{sort:name} {lang:name}</th>
                    <th>{sort:access} {lang:access}</th>
                    <th>{sort:clansphere} ClanSphere</th>
                    <th colspan="3">{lang:options}</th>
                </tr>
            </thead><!--END table thead-->

            <tbody>
                {loop:access}
                <tr>
                    <td>{access:name}</td>
                    <td>{access:access}</td>
                    <td>{access:clansphere}</td>
                    <td>
                        <a href="{url:access_users:id={access:id}}" data-toggle="tooltip" data-placement="top" title="{lang:user_list}">
                            <i class="fa fa-users"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{url:access_edit:id={access:id}}" data-toggle="tooltip" data-placement="top" title="{lang:edit}">
                            <i class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{url:access_remove:id={access:id}}" data-toggle="tooltip" data-placement="top" title="{lang:remove}">
                            <i class="fa fa-trash-o fa-lg text-danger"></i>
                        </a>
                    </td>
                </tr>
                {stop:access}
            </tbody><!--END table tbody-->
        </table><!--END table-->
    </div><!--END table-responsive-->
</div><!--END panel-->

{pages:list}
