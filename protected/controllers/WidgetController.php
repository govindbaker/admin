<?php

class WidgetController extends Controller
{
	public $pageTitle = 'Manage Your Widgets';
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */

	/*
	public $layout='//layouts/column2';
	*/

	/**
	 * @return array action filters
	 */
	/*
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	*/
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
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
	}
	*/

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

  public function defaultScope() {
    if ($this->hasAttribute('company_id')){
      return array(
        'condition'=>'(company_id>0)',
      );
    }
  }


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Widget;

		$extraItems=$this->loadExternals();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Widget']))
		{
			var_dump($_POST); die();
			$model->attributes=$_POST['Widget'];
			if($model->save())
				Yii::app()->user->setFlash('mainContentSucess','Widget ' . CHtml::encode($model->name) . ' has been created');
				$this->redirect('admin');
		}

		$this->render('create',array(
			'model'=>$model,
			'extraItems'=>$extraItems,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$extraItems=$this->loadExternals($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Widget']))
		{
			$model->attributes=$_POST['Widget'];

			if($model->save()){
				//if (isset($_POST['WidgetSetting'])) {
				foreach ($_POST['WidgetSetting'] as $index => $WidgetSettingData) {
					foreach ($WidgetSettingData as $index2 => $WidgetSettingValue) {
						if ($index == 'id') {
							$widgetModel=WidgetSetting::model()->findByPk($index2);
							$widgetModel->setAttribute('value',$WidgetSettingValue);
							$saveWidget = $widgetModel->save();
						} else {
							//$widgetModel = new WidgetSetting();
						}
					}
				}
				//var_dump($_POST); die();
				// lets write them a javascript file and css

				Yii::app()->user->setFlash('mainContentSucess','Widget ' . CHtml::encode($model->name) . ' has been updated');
				$this->redirect('admin');
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'extraItems'=>$extraItems,
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
		$this->actionAdmin();
	}


	public function actionPreview($widgetId=0)
	{
		// we either need to have an id or we need to have a load of values
		if ($widgetId || isset($_GET['inline'])) {
			// Get the company details
			$company = Company::model()->findByPk(Controller::getCompanyId());
			//var_dump(); die();

			//var_dump($_GET["site"]);

			if ($widgetId) {
				//get the data for this widget
				$widgetData = array();
			} else {
				$widgetData = $_GET;
				$widgetData['id'] = (isset($_GET['id'])) ? $_GET['id'] : 0 ;
			}
			
			//var_dump($widgetData);die();

			$site = $company['website'];
			$site = (isset($_GET["site"])) ? $_GET["site"] : $site;

			$siteContent = GetExternalPage::get_site_content($site);
			//$siteContent = GetExternalPage::relToAbs($siteContent, $site);
			$siteContent = GetExternalPage::insertScript($company,$siteContent,$widgetData);
		} else {
			$siteContent = 'Cannot preview this widget as there is not enough information to do so';
		}
		
		$this->layout='//layouts/preview';

		$this->render('preview',array(
			'content'=>$siteContent,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$this->pageSubTitle = "Current Widgets";
		$widgets=Widget::model()->with('prize')->findAll();

		//Client::model()->with('brands')->findAll

		$this->render('admin',array(
			'widgets'=>$widgets,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Widget the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Widget::model()->with('questions')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadExternals($id=0)
	{
		$externals = array('prizes'=>Prize::model()->with('categories')->findAll());
		$externals['questions'] = Question::model()->with('questionOptions')->findAll();
		$externals['settings'] = WidgetSetting::model()->getSettingStruct($id);
		//var_dump($externals['questions']); die();
		return $externals;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Widget $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='widget-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
