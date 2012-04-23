<?php

class UserController extends Controller
{
	public function actionAuth()
	{
		$facebook = $this->_getFacebook();

		try {

			$user = $facebook->getUser();

			if($user) {
				$me = $facebook->api('/me');
				Yii::app()->session['user'] = $me;
				//Insert as contact id, mapped to user
				$this->_process($me);
			}
		} catch(FacebookApiException $e) {}

		//TODO: Check if authentication failed, redirect to ERROR
		$this->redirect(Yii::app()->request->baseUrl);
	}

	private function _process($me) {

		//check if if exists in the users table
		$user = User::model()->findByAttributes(array('contact_id'=>$me["id"]));

		//if not create it
		if( !$user ) {

			$user = new User;
			$params = array('contact_id' => $me["id"],'created_date'=> date("Y-m-d H:i:s"));
			$user->attributes = $params;
			$user->save(false);
		}

		Yii::app()->session['user_id'] = $user->id;

		//create an entry in the contacts table, if not exists
		$contact = Contact::model()->findByPk($me["id"]);

		if( !$contact ) {
			$contact = new Contact;
			$me = array_merge($me, array('created_date'=> date('Y-m-d H:i:s')));
			$contact->attributes = $me;
			$contact->save(false);
		}

	}

	private function _getFacebook() {
		$facebook = new Facebook(array(
			'appId'  => Yii::app()->params["fbAppId"],
			'secret' => Yii::app()->params["fbAppSecret"],
		));
		return $facebook;
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
