<?php

/**
 * This is the model class for table "{{countdown_countdown}}".
 *
 * The followings are the available columns in table '{{countdown_countdown}}':
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $settings
 */
class Countdown extends yupe\models\YModel
{
	/**
	 *
	 */
	const STATUS_BLOCKED = 0;
	/**
	 *
	 */
	const STATUS_ACTIVE = 1;
	/**
	 *
	 */
	const STATUS_DELETED = 2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{countdown_countdown}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return [
			['status', 'numerical', 'integerOnly'=>true],
			['title, widget', 'length', 'max'=>255],
			['settings', 'safe'],
			['status', 'in', 'range' => array_keys($this->getStatusList())],
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			['id, title, status, settings', 'safe', 'on'=>'search'],
		];
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id'       => Yii::t('CountdownModule.countdown', 'ID'),
			'title'    => Yii::t('CountdownModule.countdown', 'Title'),
			'status'   => Yii::t('CountdownModule.countdown', 'Status'),
			'settings' => Yii::t('CountdownModule.countdown', 'Settings'),
			'widget'   => Yii::t('CountdownModule.countdown', 'Widget'),
		);
	}

	public function attributeDescriptions()
	{
		return array(
			'id'       => Yii::t('CountdownModule.countdown', 'ID'),
			'title'    => Yii::t('CountdownModule.countdown', 'Title'),
			'status'   => Yii::t('CountdownModule.countdown', 'Status'),
			'settings' => Yii::t('CountdownModule.countdown', 'Settings'),
			'widget'   => Yii::t('CountdownModule.countdown', 'Widget'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('settings',$this->settings,true);
		$criteria->compare('widget',$this->widget,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		$this->settings = CJSON::encode($_POST["Settings"]);
		return parent::beforeSave();
	}

	public function getStatusList()
	{
		return [
			self::STATUS_BLOCKED => Yii::t('CountdownModule.countdown', 'Blocked'),
			self::STATUS_ACTIVE  => Yii::t('CountdownModule.countdown', 'Active'),
			self::STATUS_DELETED => Yii::t('CountdownModule.countdown', 'Removed'),
		];
	}

	public function getWidgets()
	{
		return Yii::app()->getModule('countdown')->getWidgets();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CountdownModule the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
