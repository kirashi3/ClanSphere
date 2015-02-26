{lang:getmsg}

<form method="post" id="abcode_options" action="{url:abcode_options}">
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
                    <label>{lang:rte_html}</label>
                    {dropdown:rte_html}
                    <p class="help-block">{lang:html_info}</p>
                </div><!--END form-group-->
            </div><!--END col-md-6-->

            <div class="col-md-6">
                <div class="form-group">
                    <label>{lang:rte_more}</label>
                    {dropdown:rte_more}
                </div><!--END form-group-->
            </div><!--END col-md-6-->
        </div><!--END row-->

        <hr>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputMax_width">{lang:max_width} ({lang:pixel})</label>
                    <input type="text" class="form-control"  id="inputMax_width" name="max_width" value="{options:max_width}" size="4" maxlength="4" placeholder="{lang:max_width}">
                </div><!--END form-group-->
            </div><!--END col-md-4-->

            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputMax_height">{lang:max_height} ({lang:pixel})</label>
                    <input type="text" class="form-control"  id="inputMax_height" name="max_height" value="{options:max_height}" size="4" maxlength="4" placeholder="{lang:max_height}">
                </div><!--END form-group-->
            </div><!--END col-md-4-->

            <div class="col-md-4">
                <div class="form-group">
                    <label for="inputMax_size">{lang:max_size} ({lang:bytes})</label>
                    <input type="text" class="form-control"  id="inputMax_size" name="max_size" value="{options:max_size}" size="8" maxlength="20" placeholder="{lang:max_size}">
                </div><!--END form-group-->
            </div><!--END col-md-4-->
        </div><!--END row-->

        <div class="form-group">
            <label>{lang:def_func}</label>
            {dropdown:def_func}
        </div><!--END form-group-->

        <hr>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputImage_height">{lang:image_height} ({lang:pixel})</label>
                    <input type="text" class="form-control"  id="inputImage_height" name="image_height" value="{options:image_height}" size="4" maxlength="4" placeholder="{lang:image_height}">
                </div><!--END form-group-->
            </div><!--END col-md-4-->

            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputImage_width">{lang:image_width} ({lang:pixel})</label>
                    <input type="text" class="form-control"  id="inputImage_width" name="image_width" value="{options:image_width}" size="4" maxlength="4" placeholder="{lang:image_width}">
                </div><!--END form-group-->
            </div><!--END col-md-4-->
        </div><!--END row-->

        <div class="form-group">
            <label for="inputWord_cut">{lang:cut}</label>
            <input type="text" class="form-control"  id="inputWord_cut" name="word_cut" value="{options:word_cut}" size="4" maxlength="5" placeholder="{lang:word_cut}">
            <p class="help-block">{lang:cut_more}</p>
        </div><!--END form-group-->

        <hr>

        <div class="form-group">
            <label>{lang:comments}</label>

            <div class="checkbox">
                <label>
                    <input type="checkbox" name="def_abcode" value="1"{checked:def_abcode}/>
                    {lang:def_abcode}
                </label>
            </div><!--END checkbox-->
        </div><!--END form-group-->

        <button type="submit" name="submit" class="btn btn-primary">{lang:save}</button>

    </div><!--END panel-body-->
</div><!--END panel-->
</form><!--END form-->
