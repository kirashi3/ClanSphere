{lang:body}

<form method="post" action="{action:form}" enctype="multipart/form-data">
<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {lang:mod_name} - {lang:create}
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <div class="panel-body">

        <div class="form-group">
            <label>{lang:function}*</label>
            <select class="form-control" name="abcode_func">
                <option value="0">---</option>
                <option value="img" {select:img}>{lang:img}</option>
                <option value="str" {select:str}>{lang:str}</option>
            </select>
        </div><!--END form-group-->

        <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="input{lang:pattern}">{lang:pattern}*</label>
                    <input type="text" class="form-control" id="input{lang:pattern}" name="abcode_pattern" value="{abcode:pattern}" {word:cut} size="40" placeholder="{lang:pattern}">
                </div><!--END form-group-->
            </div><!--END col-md-4-->

            <div class="col-md-4">
                <div class="form-group">
                    <label for="input{lang:result}">{lang:result}</label>
                    <input type="text" class="form-control" id="input{lang:result}" name="abcode_result" value="{abcode:result}" {word:cut} size="40" placeholder="{lang:result}">
                </div><!--END form-group-->
            </div><!--END col-md-4-->

            <div class="col-md-4">
                <div class="form-group">
                    <label for="input{lang:order}">{lang:order}</label>
                    <input type="text" class="form-control" id="input{lang:order}" name="abcode_order" value="{abcode:order}" size="2" maxlength="2"placeholder="{lang:order}">
                </div><!--END form-group-->
            </div><!--END col-md-4-->
        </div><!--END row-->

        <hr>

        <div class="form-group clearfix">
            <label>{lang:pic_up}</label>
            <i class="fa fa-question-circle form-help" data-toggle="tooltip" data-placement="left" title="{abcode:clip}"></i>

            <input type="file" class="form-control" name="picture" value="">
        </div><!--END form-group-->

        <button type="submit" name="submit" class="btn btn-primary">{lang:create}</button>

    </div><!--END panel-body-->
</div><!--END panel-->
</form><!--END form-->
