<?php
	class GetExternalPage {
		public static function get_site_content($url) {
			try {
				$ch = curl_init();
				$timeout = 500;
				$userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
				$data = curl_exec($ch);
				curl_close($ch);

				$data = self::relToAbs($data, $url);
				//GetExternalPage::relToAbs($siteContent, $site);
				return $data;

			} catch(Exception $e) {
				var_dump(1); die();
			    trigger_error(sprintf(
			        'Curl failed with error #%d: %s',
			        $e->getCode(), $e->getMessage()),
			        E_USER_ERROR);

			}
		}


		public static function relToAbs($content, $base)
		{
			if (empty($base))
				return $content;
			// base url needs trailing /
			if (substr($base, -1, 1) != "/")
				$base .= "/";

			//$g = preg_match_all($pattern, $content, $h);
			//var_dump($h);

			// Replace links
			$pattern = "/<a([^>]*) " . "href=(\"|')([^http|ftp|https|mailto][^\"|^']*)(\"|')/";
			$replace = "<a\${1} href=\"" . $base . "\${3}\"";
			$content = preg_replace($pattern, $replace, $content);

			// Replace css
			$pattern = "/<link([^>]*) " . "href=(\"|')([^http|ftp|https|mailto][^\"|^']*)(\"|')/";
			$replace = "<link\${1} href=\"" . $base . "\${3}\"";
			$content = preg_replace($pattern, $replace, $content);

			// Replace images
			$pattern = "/<img([^>]*) " . "src=(\"|')([^http|ftp|https][^\"|^']*)(\"|')/";
			$replace = "<img\${1} src=\"" . $base . "\${3}\"";
			$content = preg_replace($pattern, $replace, $content);

			// Replace input images
			$pattern = "/<input([^>]*) " . "src=(\"|')([^http|ftp|https][^\"|^']*)(\"|')/";
			$replace = "<input\${1} src=\"" . $base . "\${3}\"";
			$content = preg_replace($pattern, $replace, $content);

			// Replace script
			$pattern = "/<script([^>]*) " . "src=(\"|')([^http|ftp|https][^\\/\\/][^\"|^']*)(\"|')/";
			$replace = "<script\${1} src=\"" . $base . "\${3}\"";
			$content = preg_replace($pattern, $replace, $content);

			$hideFunction = "document.getElementById('monsterboost_preview_bar').style.display='none';";
			//$hideFunction = "javascript:alert(document.getElementById('monsterboost_preview_bar').style);";
			// Add in title bar after body tag    style="position: absolute; top: 50px;width: 100%;"
			$content = preg_replace('(<body[^>]*>)', '$1<div id="monsterboost_preview_bar" style="position: absolute;top: 0;height: 45px;background-color:#FFF;border-bottom:5px solid black; width: 100%; z-index:99999;"><h1>Widget Preview from MonsterBoost</h1><div style="position:absolute;top:10px;right:10px;"><a href="#" onclick="' . $hideFunction . '">Hide this bar</div></div><div>', $content);
			// add closing div
			$pos = strrpos($content, "</body>");
			if($pos !== false)
			{
		    	$content = substr_replace($content,'</div></body>',$pos);
		    }
		    return $content;
		}

		public static function insertScript($company,$siteContent,$widgetData) {
			$saveFolder = 'assets/company/tmp/' . $company['id'] . '/' . $widgetData['id'];
			$includeContent = BuildExternalFiles::createFiles($company,$widgetData,$saveFolder);

			$newContent = "<script type='text/javascript'>
			/* <![CDATA[ */
			var iv_tkn='M2M5YTC0OGI3NDC3NZG4ZJU4MZFKYMQ2YTZMYJZH';
			(function(){
			var script_tag=document.getElementsByTagName('script')[0];
			var iv=document.createElement('script');
			iv.type='text/javascript';
			iv.async=true;
			iv.src='" . Yii::app()->params['jsdomain'] . "/" . $saveFolder . "/cloud.js';
			script_tag.parentNode.insertBefore(iv,script_tag);
			})();/* ]]> */
			</script></div></body>";

			$pos = strrpos($siteContent, "</body>");
			if($pos !== false)
			{
		    	$siteContent = substr_replace($siteContent,$includeContent['CSS'] . $newContent,$pos);
		    }

			return $siteContent;
		}
	}