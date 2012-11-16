<?php

/**
 * This is the model class for table "tbl_company".
 *
 * The followings are the available columns in table 'tbl_company':
 * @property string $id
 * @property string $name
 * @property integer $room_limit
 * @property integer $user_limit
 * @property string $address
 * @property string $description
 * @property string $phone
 * @property string $email
 * @property integer $owner_id
 */
class Company extends GxActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Company the static model class
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
		return 'tbl_company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('room_limit, user_limit, owner_id', 'numerical', 'integerOnly'=>true),
			array('name, address', 'length', 'max'=>400),
			array('description', 'length', 'max'=>1000),
			array('phone', 'length', 'max'=>20),
			array('email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, room_limit, user_limit, address, description, phone, email, owner_id', 'safe', 'on'=>'search'),
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
			'user'=>array(self::HAS_MANY,'User','company_id'),
			'room'=>array(self::HAS_MANY,'Room','company_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tên công ty',
			'room_limit' => 'Giới hạn phòng',
			'user_limit' => 'Giới hạn thành viên',
			'address' => 'Địa chỉ',
			'description' => 'Mô tả',
			'phone' => 'Phone',
			'email' => 'Email',
			'owner_id' => 'Người quản lý',
			'created_date'=> 'Ngày tạo',
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
		$criteria->compare('room_limit',$this->room_limit);
		$criteria->compare('user_limit',$this->user_limit);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('owner_id',$this->owner_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}