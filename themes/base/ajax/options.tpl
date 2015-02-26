{lang:errors_here}

<form method="post" id="ajax_options" action="{url:ajax_options}" enctype="multipart/form-data" class="noajax">
<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {lang:mod_name} - {lang:options}
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <div class="panel-body">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{lang:ajax}</label>
                    <select name="ajax" class="form-control" onchange="document.getElementById('ajax_reload_div').style.display=this.value==0?'none':'block';document.getElementById('ajax_navlists').style.display=this.value==0?'none':'block'">
                        <option value="1"{options:ajax_on}>{lang:on}</option>
                        <option value="0"{options:ajax_off}>{lang:off}</option>
                    </select>
                </div><!--END form-group-->
            </div><!--END col-md-6-->

            <div class="col-md-6">
                <div class="form-group">
                    <label>{lang:activation_for}</label>
                    <select name="for" class="form-control">
                        <option value="1"{options:for_severals}>{lang:severals}</option>
                        <option value="2"{options:for_all}>{lang:all}</option>
                    </select>
                </div><!--END form-group-->
            </div><!--END col-md-6-->
        </div><!--END row-->

        <hr>

        <div class="form-group clearfix">
            <label>{lang:loading_icon}</label>

            <p class="text-center">
                <img src="{page:path}uploads/ajax/loading.gif" alt="-">
            </p>

            <input type="file" class="form-control" name="loading">
        </div><!--END form-group-->

        <hr>

        <div class="form-group clearfix">
            <label>{lang:reload_navlists}</label>

            <div id="ajax_reload_div" style="{switch:ajax_on}">
                {lang:every} <input type="text" name="ajax_reload" value="{options:ajax_reload}" size="3" maxlength="3"> {lang:seconds}
            </div>
        </div><!--END form-group-->

        <input type="submit" name="submit" class="btn btn-primary" value="{lang:edit}">

    </div><!--END panel-body-->
</div><!--END panel-->
</form>
