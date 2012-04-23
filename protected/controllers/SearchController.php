<?php

class SearchController extends Controller
{

	private $_indexFiles = 'runtime.search';

	public function init(){
		Yii::import('application.vendors.*');
		require_once('Zend/Search/Lucene.php');
		parent::init(); 
	}

	public function actionCreate()
	{
		$index = new Zend_Search_Lucene(Yii::getPathOfAlias('application.' . $this->_indexFiles), true);

		$contacts = Contact::model()->findAll();

		foreach($contacts as $contact) {

			$doc = new Zend_Search_Lucene_Document();

			$doc->addField(Zend_Search_Lucene_Field::Text('contact_id', CHtml::encode($contact->id), 'utf-8'));
			$doc->addField(Zend_Search_Lucene_Field::Text('username', CHtml::encode($contact->username), 'utf-8'));
			$doc->addField(Zend_Search_Lucene_Field::Text('name', CHtml::encode($contact->name), 'utf-8'));
			$doc->addField(Zend_Search_Lucene_Field::Text('first_name', CHtml::encode($contact->first_name), 'utf-8'));
			$doc->addField(Zend_Search_Lucene_Field::Text('last_name', CHtml::encode($contact->last_name), 'utf-8'));
			$doc->addField(Zend_Search_Lucene_Field::Text('middle_name', CHtml::encode($contact->middle_name), 'utf-8'));

			$index->addDocument($doc);
		}

		$index->commit();

		echo 'Lucene index created';
		//$this->render('create');
	}


	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
