<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {lang:mod_name} - {lang:head_view}
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th colspan="2">{lang:name}</th>
                </tr>
            </thead><!--END thead-->

            <tbody>
                <tr>
                    <th>{icon:package_system} ClanSphere</th>
                    <td>{lang:clansphere}</td>
                </tr>
                {loop:access}
                <tr>
                    <th>{access:icon} {access:name}</th>
                    <td>{access:access}</td>
                </tr>
                {stop:access}
            </tbody><!--END table tbody-->
        </table><!--END table-->
    </div><!--END table-responsive-->
</div><!--END panel-->
