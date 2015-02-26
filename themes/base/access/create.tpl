<form method="post" action="{action:form}">
<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {lang:mod_name} - {lang:head_create}
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tbody>
                <tr>
                    <th>
                        {lang:name}*
                    </th>
                    <td>
                        <input type="text" class="form-control"  id="input{lang:name}" name="access_name" value="{access2:name}" size="40" maxlength="40" placeholder="{lang:name}">
                    </td>
                </tr>
                <tr>
                    <th>
                        {icon:package_system}
                        {access2:clansphere}
                    </th>
                    <td>
                        <select class="form-control" name="access_clansphere">
                            <option value="0">0 - {lang:clansphere_0}</option>
                            <option value="3">3 - {lang:clansphere_3}</option>
                            <option value="4">4 - {lang:clansphere_4}</option>
                            <option value="5">5 - {lang:clansphere_5}</option>
                        </select>
                    </td>
                </tr>
                {loop:access}
                <tr>
                    <th>{access:icon} {access:name}</th>
                    <td>{access:select}</td>
                </tr>
                {stop:access}
            </tbody><!--END table tbody-->
        </table><!--END table-->
    </div><!--END table-responsive-->

    <div class="panel-body">
        <input type="hidden" name="id" value="{access2:id}">
        <button type="submit" name="submit" class="btn btn-primary">{lang:create}</button>
    </div><!--END panel-body-->
</div><!--END panel-->
</form><!--END form-->
