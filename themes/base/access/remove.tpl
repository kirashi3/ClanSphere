<form method="post" action="{action:form}">
<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {lang:mod_name} - {lang:head_remove}
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <div class="panel-body">

        <div class="well well-lg text-center">{lang:body}</div>

        <input type="hidden" name="id" value="{access:id}" />

        <div class="row">
            <div class="col-md-6">
                <button type="submit" class="btn btn-danger btn-block" name="agree">{lang:confirm}</button>
            </div><!--END col-md-6-->

            <div class="col-md-6">
                <button type="submit" class="btn btn-default btn-block" name="cancel">{lang:cancel}</button>
            </div><!--END col-md-6-->
        </div><!--END row-->

    </div><!--END panel-body-->
</div><!--END panel-->
</form><!--END form-->
