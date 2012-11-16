<?php

/**
 * This is the model class for table "tbl_rooms".
 *
 * The followings are the available columns in table 'tbl_rooms':
 * @property string $id
 * @property string $name
 * @property integer $company_id
 * @property text $description
 * @property string $attendee_pw
 * @property string $moderator_pw
 * @property integer $user_limit
 */
class Rooms extends GxActiveRecord
{
	 public $company_name;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Rooms the static model class
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
		return 'tbl_rooms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('name, user_limit, attendee_pw, moderator_pw', 'required'),
			array('name, user_limit', 'required'),
			array('company_id, user_limit', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>400),
			//array('attendee_pw, moderator_pw', 'length', 'max'=>50),
			array('description, company', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			//array('id, name, company_id, attendee_pw, moderator_pw, user_limit, company_name', 'safe', 'on'=>'search'),
			array('id, name, company_id, user_limit, company_name', 'safe', 'on'=>'search'),
			//array('moderator_pw', 'compare', 'compareAttribute'=>'attendee_pw', 'operator'=>'!=', 'message' =>"Mật khẩu điều phối viên phải khác mật khẩu thường."),
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
			'company'=> array(self::BELONGS_TO,'Company','company_id'),
			
			'room_dir' => array(self::HAS_MANY,'RoomDirectory', 'room_id') 
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => Yii::t('conference','Tên phòng'),
			'company_id' => Yii::t('conference','Thuộc công ty'),
			'attendee_pw' => Yii::t('conference','Mật khẩu'),
			'moderator_pw' => Yii::t('conference','Mật khẩu điều phối viên'),
			'user_limit' => Yii::t('conference','Giới hạn số lượng thành viên'),
			'created_date'=> Yii::t('conference','Ngày tạo'),
			'description' => Yii::t('conference','Thông tin chi tiết'),
			'company' => Yii::t('conference','Tên công ty'),
		);
	}
	public static function label($n = 1) {
		return Yii::t('app', 'Room', $n);
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
		$criteria->with = array('company');
		$criteria->compare('id',$this->id,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('company.name',$this->company_name, true);
		//$criteria->compare('attendee_pw',$this->attendee_pw,true);
		//$criteria->compare('moderator_pw',$this->moderator_pw,true);
		$criteria->compare('user_limit',$this->user_limit);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
       		 'attributes'=>array(
         	   'company_name'=>array(
                'asc'=>'company.name',
                'desc'=>'company.name DESC',
            	),
            '*',
        	),
        	)
		));
	}
}