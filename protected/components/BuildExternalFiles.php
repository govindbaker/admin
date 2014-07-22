<?php
	class BuildExternalFiles {
		public static function createFiles($company,$widgetData,$saveFolder) {
			
			$widgetData = self::convertWidgetData($widgetData);
			
			//$saveDir = Yii::getPathOfAlias('webroot') . ;
			//var_dump(Yii::app()->baseUrl); die();

			//$directory = '';

			//$retVal = ($saveType == 'tmp') ? a : b ;

			self::getJS($company,$saveFolder,$widgetData);

			self::getCSS($company,$saveFolder,$widgetData);

			self::getIframe($company,$saveFolder,$widgetData);

			//return array('JS' => $theJS,'CSS' => $theCSS);
		}

		public static function convertWidgetData($widgetData)
		{
			$widgetStruct['initial_height'] = (isset($widgetData['Widget']['auto_open']) && $widgetData['Widget']['auto_open']) ? '180px' : '40px';
			var_dump($widgetData);
			var_dump($widgetStruct);
			die();
			return $widgetStruct;
		}

		public static function getJS($company,$saveFolder,$widgetData)
		{
			$jsContent = "loadJquery = false;
							if (typeof jQuery != 'undefined') {  
								// jQuery is loaded => print the version
								//alert(jQuery.fn.jquery);
								loadedJquery();
							} else {
							  var jq = document.createElement('script');
							  jq.type = 'text/javascript';
							  jq.src = '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js';
							  document.getElementsByTagName('head')[0].appendChild(jq);
							  jqueryAvailable();
							}

							function jqueryAvailable(){
								if (typeof jQuery != 'undefined') {  
									loadedJquery();
								} else {
								        setTimeout('jqueryAvailable()', 50);
								}
							}


							function loadedJquery(){
								$('head').append('<link href=\"" . Yii::app()->params['jsdomain'] . '/' . $saveFolder . "/styles.css\" type=\"text/css\" rel=\"stylesheet\" />');
								$('<div id=\"cc-wrap\" class=\"cc-right\" style=\"height:40px;display:block; background-color:red;\"><div id=\"cc-header\"><a href=\"javascript:;\" id=\"cc-header-slider\">Win Win Win Loads</a></div><iframe id=\"cc-iframe\" src=\"" . Yii::app()->params['jsdomain'] . '/' . $saveFolder . "/iframe.html\"></iframe></div>').appendTo('body');

								$('#cc-header-slider').click(function() {
									theHeight = ($('#cc-wrap').height() > 50 ? '40px' : '180px');
									$('#cc-wrap').animate({
										height: theHeight
									}, 200, null)
								  /*
								  if ( $('#cc-iframe').is( ':hidden' ) ) {
								    $('#cc-iframe').show( 'slow' );
								  } else {
								    $('#cc-iframe').slideUp();
								  }
								  */
								});
							}";
			self::saveContent($company,$saveFolder,'cloud.js',$jsContent);
		    return $jsContent;
		}


		public static function getCSS($company,$saveFolder,$widgetData)
		{
			$cssContent = "#cc-wrap.cc-right {right: 20px;}
			#cc-wrap {position: fixed;bottom: 0px;z-index: 99999999999;padding: 0px;margin: 0px;width: 300px;height: 0px;background: transparent;}
			#cc-header{background-color:" . $widgetData['WidgetSetting']['id'][1] . "; color:" . $widgetData['WidgetSetting']['id'][2] . "; height:40px;font-size:30px;}
			#cc-header a{color:" . $widgetData['WidgetSetting']['id'][2] . ";}
			iframe#cc-iframe{border:none;height:180px;}";

			self::saveContent($company,$saveFolder,'styles.css',$cssContent);

			return $cssContent;
		}

		public static function getIframe($company,$saveFolder,$widgetData)
		{
			//var_dump(); die();
			$iframeContent = "<html>
				<head>
					<style type='text/css'>
						body{background-color:" . $widgetData['WidgetSetting']['id'][1] . "; color:" . $widgetData['WidgetSetting']['id'][2] . ";}
					</style>
				</head>
				<body>
					<h2>This is external content</h2>
					<h3>Any information can appear here</h3>
					<form action='iframeresult.html'>
						<p>Email: <input type='text' name='email' value=''><input type='submit' name='submit' value='submit'></p>
					</form>
				</body>
			</html>";

			self::saveContent($company,$saveFolder,'iframe.html',$iframeContent);

			return $iframeContent;
		}

		public static function saveContent($company,$saveFolder,$saveFile,$jsContent) {
			$parts = explode('/', $saveFolder);
			$dir = '';
			foreach($parts as $part){
				if(!is_dir(Yii::getPathOfAlias('webroot') . $dir .= "/$part")){
					mkdir(Yii::getPathOfAlias('webroot') . $dir);
				}
			}
			$fullFile = Yii::getPathOfAlias('webroot') . $dir . '/' . $saveFile;
			file_put_contents("$fullFile", $jsContent);
		}

	}