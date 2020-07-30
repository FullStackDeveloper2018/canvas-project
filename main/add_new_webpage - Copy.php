
<style>



.breadcrumbs {
//    position: relative;
//    border-bottom: 1px solid #e5e5e5;
    background-color: #f5f5f5;
    min-height: 30px;
    line-height: 30px;
//    padding: 0 12px 0 0;
    display: block;
padding: 0;
}

.breadcrumb .home-icon {
    margin-left: 4px;
    margin-right: 2px;
//    margin-bottom: 40px;
    font-size: 20px;
    position: relative;
    top: -1px;
}

</style>

<?php
session_start();



$content = '


<div class="breadcrumbs" id="breadcrumbs">
   <ul class="breadcrumb">
      <li><i style="color:#3c8dbc" class="fa fa-lg fa-home icon-home home-icon"></i> <a href="#main/dashboard">Home</a></li>
      <li data-crumb="Media&nbsp;" class="">Media&nbsp;</li>
      <li data-crumb="#main/url" class=""><a href="#main/url">Web Pages</a></li>
      <li data-crumb="#main/url/" class="active"><a href="#main/url/new">New</a></li>
   </ul>
   <!-- .breadcrumb -->
</div>	
	
	
<div class="col-xs-12">
			<div id="form_container"><form class="form-horizontal" role="form">
    <div class="form-group" id="preview-container">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-10" id="preview">
        </div>
    </div>
    <div data-fields="name,description,url,tags,duration"><div class="form-group field-name">				      <label class="col-sm-2 control-label" for="c106_name">Name</label>				      <div class="col-sm-10">				        <span data-editor=""><input id="c106_name" class="form-control" name="name" type="text"></span>				        <p class="help-block" data-error=""></p>				        <p class="help-block"><small></small></p>				      </div>				    </div><div class="form-group field-description">				      <label class="col-sm-2 control-label" for="c106_description">Description</label>				      <div class="col-sm-10">				        <span data-editor=""><input id="c106_description" class="form-control" name="description" type="text"></span>				        <p class="help-block" data-error=""></p>				        <p class="help-block"><small></small></p>				      </div>				    </div><div class="form-group field-url">				      <label class="col-sm-2 control-label" for="c106_url">Web Page</label>				      <div class="col-sm-10">				        <span data-editor=""><input id="c106_url" class="form-control" name="url" type="text"></span>				        <p class="help-block" data-error=""></p>				        <p class="help-block"><small></small></p>				      </div>				    </div><div class="form-group field-tags">				      <label class="col-sm-2 control-label" for="c106_tags">Tags</label>				      <div class="col-sm-10">				        <span data-editor=""><span class="tagscontainer" id="tagmanager_tags"><span><span class="twitter-typeahead" style="position: relative; display: inline-block;"><input type="text" class="tm-input tm-input-typeahead tt-hint" readonly="" autocomplete="off" spellcheck="false" tabindex="-1" dir="ltr" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1;"><input id="tags" type="text" name="tags" placeholder="Tags" class="tm-input tm-input-typeahead tt-input" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;"><pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre;"></pre><div class="tt-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none;"><div class="tt-dataset tt-dataset-tags"></div></div></span><input type="hidden" name="hidden-tags"></span><div><a href="#main/media_tag">Manage Tags</a></div></span></span>				        <p class="help-block" data-error=""></p>				        <p class="help-block"><small></small></p>				      </div>				    </div><div class="form-group field-duration tooltipsFlexAlignmentParentClass">				      <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_duration">Default Duration</label>				      <div class="col-sm-10 tooltipsFlexAlignment">				        <span data-editor=""><div class="btn-group spinner-container" "="" id="spinner_duration">								<div class="ace-spinner" style="width: 110px;"><div class="input-group"><input type="text" class="input-mini spinner-input form-control" maxlength="5"><div class="spinner-buttons input-group-btn btn-group-vertical">							<button type="button" class="btn spinner-up btn-xs btn-info">								<i class="icon-chevron-up"></i>							</button>							<button type="button" class="btn spinner-down btn-xs btn-info">								<i class="icon-chevron-down"></i>							</button>						</div></div></div>								</div></span>						<span class="help-button fieldTemplateTooltipAlignment3" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Default duration (in seconds) used when adding an item to a playlist and in tag based playlists">?</span>				        <p class="help-block" data-error=""></p>				      </div>				    </div></div>

<h5 class="header lighter purple">Advanced Features</h5>
<div class="form-horizontal">
	<div data-fields="valid_after,valid_before,fallback"><div class="form-group field-valid_after">				      <label class="col-sm-2 control-label" for="c106_valid_after">Play From</label>				      <div class="col-sm-10">				        <span data-editor=""><div id="dateteimepicker_valid_after">				  <div class="datetimepicker input-group col-xs-12 col-sm-6 no-padding" style="max-width:300px;">					  <input class="form-control date-picker" type="text" data-date-format="YYYY-MM-DD HH:mm:ss" disabled="">					    <span class="input-group-addon add-on">					      <i class="icon-time bigger-110">					      </i>					    </span>				  </div>				  <span class="help-inline col-xs-12 col-sm-6">				  <label class="middle" src="">				  			<input class="ace" type="checkbox" name="toggle_datetimepicker">							<span class="lbl">&nbsp;Always</span>				  </label>				  </span>				</div></span>				        <p class="help-block" data-error=""></p>				        <p class="help-block"><small></small></p>				      </div>				    </div><div class="form-group field-valid_before">				  <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_valid_before">Play Until</label>				  <div class="col-sm-10">					<span data-editor=""><div id="dateteimepicker_valid_before">				  <div class="datetimepicker input-group col-xs-12 col-sm-6 no-padding" style="max-width:300px;">					  <input class="form-control date-picker" type="text" data-date-format="YYYY-MM-DD HH:mm:ss" disabled="">					    <span class="input-group-addon add-on">					      <i class="icon-time bigger-110">					      </i>					    </span>				  </div>				  <span class="help-inline col-xs-12 col-sm-6 display-flex">				  <label class="middle" src="">				  			<input class="ace" type="checkbox" name="toggle_datetimepicker">							<span class="lbl">&nbsp;Forever</span>				  </label>				  <span class="help-button" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Use for media you want to show for a specific period of time only">?</span></span>				</div></span>										<p class="help-block" data-error=""></p>				  </div>				</div><div class="form-group field-fallback tooltipsFlexAlignmentParentClass">				      <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_fallback">Fallback Image</label>				      <div class="col-sm-10 tooltipsFlexAlignment">				        <div data-editor="" style="display: inline-block;"><div class="imageSelector">				  <div id="no-value" class="ace-file-input ace-file-multiple">                   <label class="file-label" data-title="Click to select an image from your assets">                   <span class="file-name" data-title="No file...">                   </span>				   </label>				  </div>				  <div id="has-value" class="ace-file-input ace-file-multiple" image-id="-1" style="display: none;">				   <label style="height:60px;" class="file-label hide-placeholder selected">					<span class="file-name">					 <img class="middle" style="float:left; margin:4px; width:50px; height:50px;" src="">					 <p class="image-name" style="margin-top:14px;"> </p>					 </span>				   </label>				   <a class="remove"> <i class="icon-remove"></i></a>				  </div>				</div></div>										<div class="help-button" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Select an image to be displayed if web page fails to load.">?</div>										<p class="help-block" data-error=""></p>									  </div>									</div></div>

</div>
<div class="space-24"></div>
<div class="form-horizontal">
	<div id="advanced_options">
    <!--<div><div class="text-center">
            <h5>
                <a href="#advanced_options" data-toggle="collapse"
                    class="accordion-toggle collapsed"> <i
                    class="icon-chevron-down"
                    data-icon-hide="icon-chevron-up"
                    data-icon-show="icon-chevron-down"></i>
                    <span>&nbsp; Advanced Options</span>
                </a>
            </h5>
            </div>
             <h4 class="header lighter purple">&nbsp; Advanced Options</h4>
            <div class="collapse in" id="advanced_options">
                <div>
                <div data-editors="arguments"></div>
			</div></div></div>-->
<div data-editors="arguments"><div id="c106_arguments" name="arguments" class="no-form-control"><form class="form-horizontal" role="form" data-fieldsets=""><fieldset data-fields="">          <div class="form-group field-zoom_factor tooltipsFlexAlignmentURLParentClass">				      <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_arguments_zoom_factor">Zoom Factor (%)</label>				      <div class="col-sm-10 tooltipsFlexAlignmentURL">				        <span data-editor=""><input id="c106_arguments_zoom_factor" class="form-control" name="zoom_factor" step="0.01" min="0.01" max="999" type="number"></span>						<span class="help-button" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Zooms in (>100) or out (<100) the web page by the given percentage.">?</span>				        <p class="help-block" data-error=""></p>				      </div>				    </div><div class="form-group field-auto_zoom_enable tooltipsFlexAlignmentParentClass">				      <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_arguments_auto_zoom_enable">Auto Adjust Zoom</label>				      <div class="col-sm-10 tooltipsFlexAlignment">				        <span data-editor=""><div class="boolean-switch" style="padding-top: 5px; ">				<input type="checkbox" class="boolean ace ace-switch" value="true" name="auto_zoom_enable" id="boolean_auto_zoom_enable">				<span class="lbl"></span></div></span>						<span class="help-button fieldTemplateTooltipAlignment3" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Adjusts zoom for monitors with width other than 1920 pixel, so that they look the same.">?</span>				        <p class="help-block" data-error=""></p>				      </div>				    </div><div class="form-group field-refresh_rate">				  <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_arguments_refresh_rate">Refresh Web Page</label>				  <div class="col-sm-10 tooltipsFlexAlignment">					<span data-editor="" style="max-width: 100%;"><div class="refreshtime-editor-container">			<div class="boolean-switch">				<input id="toggle-for-refresh-editor" type="checkbox" class="boolean ace ace-switch" value="true">				<span class="lbl"></span>				<span class="help-button" data-rel="tooltip" style="margin-left: 6px !important;" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Set a refresh interval for the Web Page. Any Script Code that you may have defined will only be executed on the first load of the page and not on each successive refresh.">?</span>			</div>			<div class="refreshtime-container" style="display: none;">				<div>					<span class="refreshtime-hour-title refreshtime-title">Hours</span>					<div class="refreshtime-hour-container">						<span class="refreshtime-hour-plus refreshtime-plus"><i class="fa fa-angle-up"></i></span>						<span contenteditable="true" class="refreshtime-hour-value refreshtime-value"> 0 </span>						<span class="refreshtime-hour-minus refreshtime-minus"><i class="fa fa-angle-down"></i></span>					</div>				</div>				<div class="refreshtime-seperator"><span>:</span></div>				<div>					<span class="refreshtime-minutes-title refreshtime-title">Minutes</span>					<div class="refreshtime-minutes-container">						<span class="refreshtime-minutes-plus refreshtime-plus"><i class="fa fa-angle-up"></i></span>						<span contenteditable="true" class="refreshtime-minutes-value refreshtime-value"> 0 </span>						<span class="refreshtime-minutes-minus refreshtime-minus"><i class="fa fa-angle-down"></i></span>					</div>				</div>				<div class="refreshtime-seperator"><span>:</span></div>				<div>					<span class="refreshtime-seconds-title refreshtime-title">Seconds</span>					<div class="refreshtime-seconds-container">						<span class="refreshtime-seconds-plus refreshtime-plus"><i class="fa fa-angle-up"></i></span>						<span contenteditable="true" class="refreshtime-seconds-value refreshtime-value"> 0 </span>						<span class="refreshtime-seconds-minus refreshtime-minus"><i class="fa fa-angle-down"></i></span>					</div>				</div>			</div>		</div></span>					<p class="help-block" data-error=""></p>				  </div>				</div><div class="form-group field-disable_private_browsing tooltipsFlexAlignmentParentClass">				      <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_arguments_disable_private_browsing">Disable Private Browsing</label>				      <div class="col-sm-10 tooltipsFlexAlignment">				        <span data-editor=""><div class="boolean-switch" style="padding-top: 5px; ">				<input type="checkbox" class="boolean ace ace-switch" value="true" name="disable_private_browsing" id="boolean_disable_private_browsing">				<span class="lbl"></span></div></span>						<span class="help-button fieldTemplateTooltipAlignment3" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Web pages by default open in private browsing mode to prevent caching issues, toggle to change.">?</span>				        <p class="help-block" data-error=""></p>				      </div>				    </div><div class="form-group field-enable_chromium tooltipsFlexAlignmentParentClass">				      <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_arguments_enable_chromium">Enable Chromium</label>				      <div class="col-sm-10 tooltipsFlexAlignment">				        <span data-editor=""><div class="boolean-switch" style="padding-top: 5px; ">				<input type="checkbox" class="boolean ace ace-switch" value="true" name="enable_chromium" id="boolean_enable_chromium">				<span class="lbl"></span></div></span>						<span class="help-button fieldTemplateTooltipAlignment3" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Toggle for modern pages that don"t work on WebKit. Using Chromium does not allow the webpage to have transparency.">?</span>				        <p class="help-block" data-error=""></p>				      </div>				    </div><div class="form-group field-keep_session_data tooltipsFlexAlignmentParentClass">				      <label class="col-sm-2 control-label col-sm-offset-1" for="c106_arguments_keep_session_data">Retain Session Data</label>				      <div class="col-sm-8 tooltipsFlexAlignment">				        <span data-editor=""><div class="boolean-switch disabled" style="padding-top: 5px; ">				<input type="checkbox" class="boolean ace ace-switch" value="true" name="keep_session_data" id="boolean_keep_session_data">				<span class="lbl"></span></div></span>						<span class="help-button" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Must set Enable Chromium to On in order to use the Retain Session Data feature.">?</span>				        <p class="help-block" data-error=""></p>				      </div>				    </div><div class="form-group field-enable_flash_player tooltipsFlexAlignmentParentClass">				      <label class="col-sm-2 control-label col-sm-offset-1" for="c106_arguments_enable_flash_player">Enable Flash</label>				      <div class="col-sm-8 tooltipsFlexAlignment">				        <span data-editor=""><div class="boolean-switch disabled" style="padding-top: 5px; ">				<input type="checkbox" class="boolean ace ace-switch" value="true" name="enable_flash_player" id="boolean_enable_flash_player">				<span class="lbl"></span></div></span>						<span class="help-button" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Flash player is by default disabled in chromium, toggle to enable.">?</span>				        <p class="help-block" data-error=""></p>				      </div>				    </div><div class="form-group field-user_agent tooltipsFlexAlignmentURLParentClass">				      <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_arguments_user_agent">User Agent</label>				      <div class="col-sm-10 tooltipsFlexAlignment">				        <span data-editor="" style="max-width:800px; width:100%"><input id="c106_arguments_user_agent" class="form-control" name="user_agent" type="text"></span>						<span class="help-button" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="Enforce a specific user agent header to ensure proper in-browser display">?</span>				        <p class="help-block" data-error=""></p>				      </div>				    </div><div class="form-group field-disable_cert_checks">				      <label class="col-sm-2 control-label" for="c106_arguments_disable_cert_checks">Ignore Certificate Errors</label>				      <div class="col-sm-10">				        <span data-editor=""><div class="boolean-switch" style="padding-top: 5px; ">				<input type="checkbox" class="boolean ace ace-switch" value="true" name="disable_cert_checks" id="boolean_disable_cert_checks">				<span class="lbl"></span></div></span>				        <p class="help-block" data-error=""></p>				        <p class="help-block"><small></small></p>				      </div>				    </div><div class="form-group field-run_script tooltipsFlexAlignmentParentClass">				      <label class="col-sm-2 control-label tooltipsLabelAlignment" for="c106_arguments_run_script">Run Custom Script</label>				      <div class="col-sm-10 tooltipsFlexAlignment">				        <span data-editor=""><div class="boolean-switch" style="padding-top: 5px; ">				<input type="checkbox" class="boolean ace ace-switch" value="true" name="run_script" id="boolean_run_script">				<span class="lbl"></span></div></span>						<span class="help-button fieldTemplateTooltipAlignment3" data-rel="tooltip" type="text" title="" data-trigger="hover" data-placement="top" data-original-title="You can add a script to run after the web page has loaded to perfom actions like click, type…">?</span>				        <p class="help-block" data-error=""></p>				      </div>				    </div><div class="form-group field-script_code">				      <label class="col-sm-2 control-label" for="c106_arguments_script_code">Script Code</label>				      <div class="col-sm-10">				        <span data-editor=""><div class="codemirror-container ui-resizable disabled" id="codemirror_script_code"><a id="script-help" href="https://www.yodeck.com/docs/pages/viewpage.action?pageId=327770" target="_blank"><i class="fa fa-question-circle-o fa-3" aria-hidden="true"></i></a><div class="CodeMirror cm-s-default"><div style="overflow: hidden; position: relative; width: 3px; height: 0px; top: 5.06665px; left: 37.0667px;"><textarea autocorrect="off" autocapitalize="off" spellcheck="false" tabindex="0" style="position: absolute; bottom: -1em; padding: 0px; width: 1000px; height: 1em; outline: none;"></textarea></div><div class="CodeMirror-vscrollbar" cm-not-content="true"><div style="min-width: 1px; height: 0px;"></div></div><div class="CodeMirror-hscrollbar" cm-not-content="true"><div style="height: 100%; min-height: 1px; width: 0px;"></div></div><div class="CodeMirror-scrollbar-filler" cm-not-content="true"></div><div class="CodeMirror-gutter-filler" cm-not-content="true"></div><div class="CodeMirror-scroll" tabindex="-1"><div class="CodeMirror-sizer" style="margin-left: 32px; margin-bottom: -23px; border-right-width: 7px; min-height: 29px; min-width: 7px; padding-right: 0px; padding-bottom: 0px;"><div style="position: relative; top: 0px;"><div class="CodeMirror-lines"><div style="position: relative; outline: none;"><div class="CodeMirror-measure"><span><span>​</span>x</span></div><div class="CodeMirror-measure"></div><div style="position: relative; z-index: 1;"></div><div class="CodeMirror-cursors"><div class="CodeMirror-cursor" style="left: 4px; top: 0px; height: 20.2667px;">&nbsp;</div></div><div class="CodeMirror-code"><div style="position: relative;"><div class="CodeMirror-gutter-wrapper" style="left: -32px;"><div class="CodeMirror-linenumber CodeMirror-gutter-elt" style="left: 0px; width: 22px;">1</div></div><pre class=" CodeMirror-line "><span style="padding-right: 0.1px;"><span cm-text="">​</span></span></pre></div></div></div></div></div></div><div style="position: absolute; height: 7px; width: 1px; border-bottom: 0px solid transparent; top: 29px;"></div><div class="CodeMirror-gutters" style="height: 36px;"><div class="CodeMirror-gutter CodeMirror-linenumbers" style="width: 31px;"></div></div></div></div><div class="ui-resizable-handle ui-resizable-e" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-s" style="z-index: 90;"></div><div class="ui-resizable-handle ui-resizable-se ui-icon ui-icon-gripsmall-diagonal-se" style="z-index: 90;"></div></div></span>				        <p class="help-block" data-error=""></p>				      </div>				    </div></fieldset></form></div></div>
</div></div>

<div class="form-horizontal">
    <div class="form-actions">
        <div id="edit-form-actions-buttons">
            <button type="submit" class="submit-model btn btn-success btn-sm">Save</button>
            <button class="cancel-model btn btn-primary btn-sm" href="#">Cancel</button>
        </div>
        <a id="is-read-only-form-action-button" class="cancel-model btn btn-primary btn-sm hidden" href="#">Back</a>
        <a id="media-reference" style="display: none;"> See where this web page is being used</a>
    </div>
</div>

</form></div>
		</div>	
	

';
  include('master.php');
?>

	
	
<script type="text/javascript">



</script>
