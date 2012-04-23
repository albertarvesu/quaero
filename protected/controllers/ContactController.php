<?php

class ContactController extends Controller
{
	public function actionIndex()
	{

		$criteria = new CDbCriteria;
		$criteria->limit = 10;
		$contacts = Contact::model()->findAll($criteria);

//		$user_id = Yii::app()->session['user_id'];
//		$user = User::model()->findByPk($user_id);

//		$contacts = $user->contacts;
		$this->render('index', array('contacts'=>$contacts));
	}

	public function actionSearch()
	{
		$this->render('search');
	}

	public function actionFetch()
	{
		$response = $this->_processFB();
		$this->render('fetch', array('response' => $response));
	}

	public function actionSync()
	{
		$response = $this->_processFB();
		$this->render('sync', array('response' => $response));
	}

	private function _processFB() {

		$response = array("status"=>"failed");

		$facebook = new Facebook(array(
			'appId'  => Yii::app()->params["fbAppId"],
			'secret' => Yii::app()->params["fbAppSecret"],
		));

		try {
			$user = $facebook->getUser();

			if($user) {

				//fetch from Facebook and grab contact information
				$fields = Yii::app()->params["fbUserFields"];

				$friends = $facebook->api('/me/friends', array('fields' => implode($fields,",")));

				$friend_ids = array();
				foreach($friends["data"] as $friend) {
					$contact = $this->_saveAsContact($friend);
					$friend_ids[] = $contact->id;
				}

				//get the currently logged_in user
				$user_id = Yii::app()->session['user_id'];
				$this->_saveRelationship($user_id, $friend_ids);

				$response = array(
					"status" => "success",
					"count" => sizeOf($friends["data"])
				);

			}
		} catch(FacebookApiException $e) {}

		return $response;
	}

	private function _saveRelationship($user_id, $friend_ids) {

		if(sizeOf($friend_ids) === 0) {
			return;
		}

		foreach($friend_ids as $friend_id) {

			$params = array('user_id'=>$user_id,'contact_id'=>$friend_id);
			$relationship = UserContact::model()->findByAttributes($params);

			if( !$relationship ) {
				$relationship = new UserContact;
				$relationship->attributes  = $params;
				$relationship->save(false);
			}

		}

	}

	private function _saveAsContact($params) {

		//save in the contact table
		$contact = Contact::model()->findByPk($params["id"]);

		if(!$contact) {
			$contact = new Contact;
			$params = array_merge($params, array('created_date'=> date('Y-m-d H:i:s')));
		}

		$contact->attributes = $params;
		$contact->save(false);


		//save in the user_contact table
		return $contact;
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
