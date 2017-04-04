<?php
require_once('../connections/db-settings.php');

$db = pdoConnect();

if($_POST['fecha']!=NULL){
	
    echo '<div class="col-md-4"><div class="row"><div class="col-md-6">
                                  <div class="form-group">
                                     <div class="alert alert-default text-center">Hora Inicio</div>
                                     <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input id="hora_inicio" type="text" required data-plugin-timepicker class="form-control" data-plugin-options=\'{ "showMeridian": false, "minuteStep": 30 }\' name="hora_inicio">
									</div>
                                  </div>
                                 </div>
                                 <div class="col-md-6">
                                  <div class="form-group">
                                     <div class="alert alert-default text-center">Hora Fin</div>
                                     <div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-clock-o"></i>
														</span>
														<input id="hora_fin" type="text" required data-plugin-timepicker class="form-control" data-plugin-options=\'{ "showMeridian": false, "minuteStep": 30 }\' name="hora_fin">
									</div>
                                  </div>
                                 </div>
								</div>
							   </div>	
								 <script>(function( $ ) {

	"use strict";

	if ( $.isFunction($.fn[ "timepicker" ]) ) {

		$(function() {
			$("[data-plugin-timepicker]").each(function() {
				var $this = $( this ),
					opts = {};

				var pluginOptions = $this.data("plugin-options");
				if (pluginOptions)
					opts = pluginOptions;

				$this.themePluginTimePicker(opts);
			});
		});

	}

}).apply(this, [ jQuery ]);</script>';	
	
	
}



?>



