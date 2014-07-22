<?php

class EntryController extends Controller
{
	public $pageTitle = 'Your Competition Entries';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'modelQuestions'=>$this->loadModelQuestions($id),
		));
	}

	public function actionViewDetails($id)
	{
		$this->renderPartial('_view',array(
			'model'=>$this->loadModel($id),
			'modelQuestions'=>$this->loadModelQuestions($id),
		));
	}

	public function actionCsvExport()
	{

		if(isset($_GET["filter"]) && $_GET["filter"] == 'AllEntries'){
			$data = Entry::model()->getEntries();
		}	
		else if (isset($_GET["filter"]) && $_GET["filter"] == 'LastXMonthsEntries'){
			$data = Entry::LastXMonthsEntries(1);
		}	
		else {
			$CurrentDraw = Draw::model()->getCurrentDraw();
			$data = Entry::model()->getEntries($CurrentDraw->id);
		}

		//$CurrentDraw = Draw::model()->getCurrentDraw();
		//var_dump(Entry::model()->getEntries()); die();
		//$data=Entry::model()->getEntries();
        CsvExport::export(
            $data, // a CActiveRecord array OR any CModel array
            array(
               'email'=>array(),
               'no_of_entries'=>array(),
            )
        ,true,'registros-hasta--'.date('d-m-Y H-i').".csv",",");
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Entry;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Entry']))
		{
			$model->attributes=$_POST['Entry'];
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Entry']))
		{
			$model->attributes=$_POST['Entry'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$dataProvider=new CActiveDataProvider('Entry');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */

	public function actionAdmin()
	{
		$widgets=Widget::model()->with('prize')->findAll();
		$model=new Entry('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Entry']))
			$model->attributes=$_GET['Entry'];


		// Get the current draw number
		$CurrentDraw = Draw::model()->getCurrentDraw();

		//var_dump($CurrentDraw); die();

		//$summary = array('currentDraw'=>0,'allEntries'=>0,'lastMonths'=>0);

		$pagination = array('entriesPerPage'=>10,'page'=>(isset($_GET["page"])) ? $_GET["page"] : 1);
		$pagination['start_record'] = ($pagination['page'] * $pagination['entriesPerPage']) - $pagination['entriesPerPage'];

		$summary['allEntries'] = Entry::model()->getEntries(0,'count');			
		$summary['currentDraw'] = Entry::model()->getEntries($CurrentDraw->id,'count');			
		$summary['lastMonths'] = Entry::LastXMonthsEntries(1,'count');	

		if(isset($_GET["filter"]) && $_GET["filter"] == 'AllEntries'){
			$DrawEntries = Entry::model()->getEntries(0,'records',$pagination);
			$count=$summary['allEntries'];
			$entriesHeading = "Entries in all Draws";	
		}
		else if (isset($_GET["filter"]) && $_GET["filter"] == 'LastXMonthsEntries'){
			$DrawEntries = Entry::LastXMonthsEntries(1,'records',$pagination);
			$count=$summary['lastMonths'];
			$entriesHeading = "Entries in the last month";
		}
		else {
			$DrawEntries = Entry::model()->getEntries($CurrentDraw->id,'records',$pagination);
			$count=$summary['currentDraw'];
			$entriesHeading = "Entries in the Next Draw";
		}	


		// Do pagination
		$pagcriteria = new CDbCriteria();
	    //$count=count($DrawEntries);
	    $pages=new CPagination($count);
    	// results per page
    	$pages->pageSize=$pagination['entriesPerPage'];
    	$pages->applyLimit($pagcriteria);


		//count($CurrentDrawEntries);

				//$myDate = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
		//var_dump($myDate);
		//$criteria=new CDbCriteria;
		//$criteria->condition = "entry_date > " . $myDate;

		//var_dump(count($CurrentDrawEntries)); die();

//var_dump($DrawEntries); die();




		$this->render('admin',array(
			'model'=>$model,
			'DrawEntries'=>$DrawEntries,
			'summary'=>$summary,
			'entriesHeading'=>$entriesHeading,
         	'pages' => $pages,

		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Entry the loaded model
	 * @throws CHttpException
	 */

	public function loadModel($id)
	{
		$model=Entry::model()->with('entryAnswers')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function loadModelQuestions($id)
	{
		$criteria=new CDbCriteria;
		//$criteria->order = "id desc";
		$criteria->condition = "entry_id = " . $id;
		//var_dump($id);die();
		$modelQuestion=EntryAnswer::model()->with('question','questionOption')->FindAll($criteria);
		return $modelQuestion;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Entry $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='entry-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
