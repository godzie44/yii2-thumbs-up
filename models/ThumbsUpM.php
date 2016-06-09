<?php

namespace godzie44\yii\module\thumbsup\models;

use godzie44\yii\module\thumbsup;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;


/**
 * Class ThumbsUp
 * @property integer $value
 * @property integer $id
 * @property string $entity
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_at
*/
class ThumbsUpM extends \yii\db\ActiveRecord
{
    const THUMBS_DELETE = 0;
    const THUMBS_UP = 1;
    const THUMBS_DOWN = 2;


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'updatedByAttribute' => null,
                'createdByAttribute' => 'created_by',
        ],
            'timestamp' => TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_by', 'entity'], 'unique','targetAttribute' => ['created_by', 'entity']],
            [['created_by', 'created_at', 'updated_at'], 'integer'],
            ['value', 'in', 'range' => [static::THUMBS_DELETE, static::THUMBS_UP, static::THUMBS_DOWN]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => \Yii::t('app', 'ID'),
            'entity' => \Yii::t('app', 'Entity'),
            'value' => \Yii::t('app', 'Value'),
            'created_by' => \Yii::t('app', 'Created by'),
            'created_at' => \Yii::t('app', 'Created at'),
            'updated_at' => \Yii::t('app', 'Updated at'),
        ];
    }

    /**
     * @return object
     * @throws \yii\base\InvalidConfigException
     */
    public static function find()
    {
        return \Yii::createObject(
            thumbsup\Module::instance()->model('thumbsUpQuery'),
            [get_called_class()]
        );
    }
    
    /**
     * @return bool
     */
    public static function canChange()
    {
        return thumbsup\Module::instance()->useRbac === true
            ? \Yii::$app->getUser()->can(thumbsup\Permission::CHANGE) && !\Yii::$app->getUser()->isGuest
            : !\Yii::$app->getUser()->isGuest;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%thumbsup}}';
    }

}