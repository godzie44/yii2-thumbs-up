<?php


namespace godzie44\yii\module\thumbsup\forms;

use godzie44\yii\module\thumbsup;

/**
 * Class CommentCreateForm
 * @package rmrevin\yii\module\Comments\forms
 */
class ThumbsUpForm extends \yii\base\Model
{

    public $id;
    public $entity;


    public $value;

    public $upValue;
    public $downValue;
    /** @var thumbsup\models\Thumbsup */
    public $thumbsUp;

    public function init()
    {
        $model = $this->thumbsUp;

        if (!$model->isNewRecord) {
            $this->id = $model->id;
            $this->entity = $model->entity;
            $this->value = $model->value;
        }

        $this->upValue = $model::THUMBS_UP;
        $this->downValue = $model::THUMBS_DOWN;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['entity'], 'required'],
            [['entity'], 'string'],
            [['value'], 'safe'],
            [['id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'entity' => \Yii::t('app', 'Entity'),
            'value' => \Yii::t('app', 'Value'),
            'upValue' => \Yii::t('app', 'Like it'),
            'downValue' => \Yii::t('app', 'Dislike it'),
        ];
    }

    /**
     * @return integer
     */
    public function getThumbsUpCount()
    {
        /**
         * @var $thumbsUpModel thumbsup\models\ThumbsUp
         */
        $thumbsUpModel = \Yii::createObject(thumbsup\Module::instance()->model('thumbsUp'));
        return $thumbsUpModel::find()->byEntity($this->entity)->byValue($thumbsUpModel::THUMBS_UP)->count();
    }

    /**
     * @return integer
     */
    public function getThumbsDownCount()
    {
        /**
         * @var $thumbsUpModel thumbsup\models\ThumbsUp
         */
        $thumbsUpModel = \Yii::createObject(thumbsup\Module::instance()->model('thumbsUp'));
        return $thumbsUpModel::find()->byEntity($this->entity)->byValue($thumbsUpModel::THUMBS_DOWN)->count();
    }

    /**
     * @return bool
     */
    public function getIsModifyDisabled()
    {
        $thumbsUpModel = \Yii::createObject(thumbsup\Module::instance()->model('thumbsUp'));
        return !$thumbsUpModel::canChange();
    }

    /**
     * @return bool
     * @throws \yii\web\NotFoundHttpException
     */
    public function save()
    {
        /**@var $thumbsUp thumbsup\models\ThumbsUp */
        $thumbsUp = $this->thumbsUp;

        if ($thumbsUp->isNewRecord) {
            $thumbsUp->entity = $this->entity;
        }

        $thumbsUp->value = $this->value;

        $result = $thumbsUp->save();

        $this->thumbsUp = $thumbsUp;

        return $result;
    }
}