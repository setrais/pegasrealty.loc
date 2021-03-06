<?php

/**
 * This is the model class for table "realestate_properties".
 *
 * The followings are the available columns in table 'realestate_properties':
 * @property integer $id
 * @property integer $realestate_id
 * @property integer $property_id
 *
 * The followings are the available model relations:
 * @property Properties $property
 * @property Realestates $realestate
 */
class RealestateProperties extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RealestateProperties the static model class
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
		return 'realestate_properties';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('realestate_id, property_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, realestate_id, property_id', 'safe', 'on'=>'search'),
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
			'property' => array(self::BELONGS_TO, 'Properties', 'property_id'),
			'realestate' => array(self::BELONGS_TO, 'Realestates', 'realestate_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'realestate_id' => 'Realestate',
			'property_id' => 'Property',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('realestate_id',$this->realestate_id);
		$criteria->compare('property_id',$this->property_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}