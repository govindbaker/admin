<?php

class LogoutController extends Controller
{

	public function filters(){
	    return array('accessControl');
	}
	
	public function accessRules()
	{
	    return array(
	        array('allow',
	            'users'=>array('*'),
	        ),
	    );
	}

	public $defaultAction = 'logout';
	
	/**
	 * Logout the current user and redirect to returnLogoutUrl.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->controller->module->returnLogoutUrl);
	}

}