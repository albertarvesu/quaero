<?php

class SiteController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		// if session is here, redirect to home, else index
		//Yii::app()->session->destroy();
		$user = Yii::app()->session['user'];

		if($user || 1) {
			$this->render('home', array('profile'=>$user));
		}
		else {
			$this->render('index');
		}
	}

}
