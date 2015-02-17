{head:message}

<div class="panel panel-default">
    <header class="panel-heading">
        <h3 class="panel-title">
            {head:mod} - {head:action}

            <small>{lang:total}: {head:total}</small>
        </h3><!--END panel-title-->
    </header><!--END panel-heading-->

    <section class="panel-body grid">

        {loop:content}
        <div class="col-md-3">
            <a href="{content:link_1}" title="{content:txt_1}">
                {content:img_1} <br>
                {content:txt_1}
            </a>
        </div><!--END col-md-2-->
        {stop:content}

    </section><!--END panel-body-->
</div><!--END panel-->
