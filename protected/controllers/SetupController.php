<?php

/**
 * PrizesController is the controller to handle prizes admin page.
 */
class SetupController extends Controller
{
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		//$model=Prize::model()->with('category');
		//var_dump($this->getCompanyId());die();
		$model=Widget::model()->getAll();
		//var_dump($model);
    	$this->render('view',array(
       		'prizes'=>$model
    	));
	}
}