<?php

class UserController extends Controller
{
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		header('Content-type: application/json');
		$users = User::model()->findAll();
		echo CJSON::encode($users);
		Yii::app()->end();
	}

	public function actionSearch()
	{
		header('Content-type: application/json');
		if(isset($_GET['q'])) {
			$match = addcslashes($_GET['q'], '%_');
			$user = User::model()->findAll( 
				'username LIKE :match',
				array(':match' => "%$match%")
			);
			echo CJSON::encode($user);
		}
		Yii::app()->end();
	}

}
