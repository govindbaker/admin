<?php

class CompanyController extends Controller
{
	public $pageTitle = 'Manage Account';
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */



	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 //* @return array access control rules
	 */
	/*
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}*/

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Company;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Company']))
		{
			$model->attributes=$_POST['Company'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		//var_dump($model); 		var_dump($model->companySettings);die();
		//$user=$this->loadUser();
		//var_dump($user->profile);die();
		
		// load the user model as User::model()->findByPk(Controller::getUserId();
		//pass it into update view file.
		//output the fields that you want
		// In the save look for it and save it in the same way as company

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		/*
		if(isset($_POST['User']))
		{
			$user->attributes=$_POST['User'];
			if($user->save())
				//$this->redirect(array('view','id'=>$model->id));
		}


*/
		if(isset($_POST['CompanySetting']))
		{
			//var_dump($model->companySettings); die();
			foreach ($model->companySettings as $key => $companySetting) {
				if (isset($_POST['CompanySetting'][$companySetting['id']])) {
					//var_dump(1); die();
					$companySetting->setAttribute('value',$_POST['CompanySetting'][$companySetting['id']]);
					$savedCompanySettings = $companySetting->save();
				}
				//$companySetting->attributes=$_POST['CompanySetting'];
				//var_dump($companySetting->attributes);
				//var_dump($_POST['CompanySetting']);
				//$companySetting->save();
			}
			
			 //die();
			//if($model->companySettings->save())
				//nothing
		}

		if(isset($_POST['Company']))
		{
			$model->attributes=$_POST['Company'];
			if($model->save())
				$this->redirect(array('update'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Company');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{

		$model=$this->loadModel();

		//$model=Company::model()->getAccountDetails();
		//$model->unsetAttributes();  // clear any default values
		//if(isset($_GET['Company']))
		//	$model->attributes=$_GET['Company'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Company the loaded model
	 * @throws CHttpException
	 */
	public function loadModel()
	{
		$model=Company::model()->with('companySettings')->findByPk(Controller::getCompanyId());

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadUser()
	{
		$user=User::model()->with('profile')->findByPk($this->getUserId());
		return $user;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Company $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='company-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
