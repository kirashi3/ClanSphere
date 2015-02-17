{head:message}

<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {head:mod} - {head:action}

            <small>{lang:total}: {head:total}</small>
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>{lang:modul}</th>
                <th>{lang:create}</th>
                <th>{lang:manage}</th>
                <th>{lang:options}</th>
            </tr>
        </thead><!--END table thead-->

        <tbody>
            {loop:content}
            <tr>
                <td>{content:img_1} &nbsp; {content:txt_1}</td>
                <td>{content:create_1}</td>
                <td>{content:manage_1}</td>
                <td>{content:options_1}</td>
            </tr>
            {stop:content}
        </tbody><!--END table tbody-->
    </table><!--END table-->
</div><!--END panel-->
