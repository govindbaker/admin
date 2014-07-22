<?php

/**
 * PrizesController is the controller to handle prizes admin page.
 */
class PrizesController extends Controller
{
	/**
	 * Index action is the default action in a controller.
	 */
	public function actionIndex()
	{
		//$model=Prize::model()->with('category');
		//var_dump($this->getCompanyId());die();
		$model=$this->loadModels()->findAll();
    	$this->render('view',array(
       		'prizes'=>$model
    	));
	}

	public function loadModels()
	{
		$models=Prize::model();
		return $models;
	}

}