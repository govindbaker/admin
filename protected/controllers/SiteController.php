<?php

/**
 * SiteController is the default controller to handle user requests.
 */
class SiteController extends Controller
{
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		echo 'Hello World';
		//var_dump(Yii::app()->controller->module->user());
	}
}