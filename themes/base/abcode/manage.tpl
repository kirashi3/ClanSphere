{lang:getmsg}

<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {lang:mod_name} - {lang:manage}

            <small>{lang:total}: {lang:count}</small>
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>{sort:function} {lang:function}</th>
                    <th>{sort:pattern} {lang:pattern}</th>
                    <th>{lang:result}</th>
                    <th>{sort:order} {lang:order}</th>
                    <th colspan="2">{lang:options}</th>
                </tr>
            </thead><!--END table thead-->

            <tbody>
                {loop:abcode}
                <tr>
                    <td>{abcode:function}</td>
                    <td>{abcode:pattern}</td>
                    <td>{abcode:result}</td>
                    <td>{abcode:order}</td>
                    <td>
                        <a href="{url:abcode_edit:id={abcode:id}}" data-toggle="tooltip" data-placement="top" title="{lang:edit}">
                            <i class="fa fa-pencil-square-o fa-lg"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{url:abcode_remove:id={abcode:id}}" data-toggle="tooltip" data-placement="top" title="{lang:remove}">
                            <i class="fa fa-trash-o fa-lg text-danger"></i>
                        </a>
                    </td>
                </tr>
                {stop:abcode}
            </tbody><!--END table tbody-->
        </table><!--END table-->
    </div><!--END table-responsive-->
</div><!--END panel-->

{pages:list}
