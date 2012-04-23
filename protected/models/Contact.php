<?php

/**
 * This is the model class for table "tbl_contact".
 *
 * The followings are the available columns in table 'tbl_contact':
 * @property string $id
 * @property string $name
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $link
 * @property string $username
 * @property string $provider
 * @property string $gender
 * @property integer $timezone
 * @property string $locale
 * @property string $picture
 * @property string $birthday
 * @property string $logged_in
 * @property string $created_date
 * @property string $updated_date
 */
class Contact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Contact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, name, first_name, last_name, username, logged_in, created_date, updated_date', 'required'),
			array('timezone', 'numerical', 'integerOnly'=>true),
			array('id', 'length', 'max'=>100),
			array('name, first_name, middle_name, last_name, username', 'length', 'max'=>255),
			array('provider', 'length', 'max'=>8),
			array('gender', 'length', 'max'=>11),
			array('locale', 'length', 'max'=>50),
			array('logged_in', 'length', 'max'=>1),
			array('link, picture, birthday', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, first_name, middle_name, last_name, link, username, provider, gender, timezone, locale, picture, birthday, logged_in, created_date, updated_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'user'=>array(self::MANY_MANY, 'User',
				'tbl_user_contact(contact_id, user_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'link' => 'Link',
			'username' => 'Username',
			'provider' => 'Provider',
			'gender' => 'Gender',
			'timezone' => 'Timezone',
			'locale' => 'Locale',
			'picture' => 'Picture',
			'birthday' => 'Birthday',
			'logged_in' => 'Logged In',
			'created_date' => 'Created Date',
			'updated_date' => 'Updated Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('provider',$this->provider,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('timezone',$this->timezone);
		$criteria->compare('locale',$this->locale,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('logged_in',$this->logged_in,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('updated_date',$this->updated_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
