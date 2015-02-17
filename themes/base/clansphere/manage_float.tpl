{head:message}

<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {head:mod} - {head:action}

            <small>{lang:total}: {head:total}</small>
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <section class="panel-body grid">
        <div class="row">

            {loop:content}
            <div class="col-md-3">
                <a href="{content:link_1}" title="{content:txt_1}">
                    {content:img_1} <br>
                    {content:txt_1}
                </a>
            </div><!--END col-md-3-->
            {stop:content}

        </div><!--END panel-body row-->
    </section><!--END panel-body-->
</div><!--END panel-->
