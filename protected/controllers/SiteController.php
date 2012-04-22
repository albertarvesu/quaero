<?php

class SiteController extends Controller
{

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$facebook = new Facebook(array(
			'appId'  => Yii::app()->params["fbAppId"],
			'secret' => Yii::app()->params["fbAppSecret"],
		));

		try {
			$user = $facebook->getUser();
			if($user) {

				$me = $facebook->api('/me');
				$me = array_merge($me, array('logged_in'=>'1'));
				//$this->_process($me);

				//process friends
				$friends = $facebook->api('/me/friends', array('fields'=>implode(Yii::app()->params["fbUserFields"], ",")) );
				foreach($friends["data"] as $user) {
					//$this->_process($user);
				}

				$this->render('home', array('profile'=>$me));
			} else {
				$this->render('index');
			}
		} catch(FacebookApiException $e) {
			$this->render('index');
		}

	}

	public function actionAuth()
	{
		$facebook = new Facebook(array(
			'appId'  => Yii::app()->params["fbAppId"],
			'secret' => Yii::app()->params["fbAppSecret"],
		));

		$user = $facebook->getUser();
		print_r($user);
	}

	private function _process($params) {
		$model = User::model()->findByPk($params["id"]);
		if(!$model) {
			$model = new User;
			$params = array_merge($params, array('created_date'=> date('Y-m-d H:i:s')));
		}
		$model->attributes = $params;
		$model->save(false);
		return $model;
	}

}
