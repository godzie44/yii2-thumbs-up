<?php

namespace godzie44\yii\module\thumbsup\widgets;

use godzie44\yii\module\thumbsup;

/**
 * Class ThumbsUpWidget
 * @package godzie44\yii\module\thumbsup\widgets
 */
class ThumbsUpWidget extends \yii\base\Widget
{

    /** @var string */
    public $entity;


    /** @var string */
    public $viewFile = 'thumbs-up-form';

    /**
     * $tooltip['beforeUp']         label when mouse on unchecked thumb up button
     * $tooltip['beforeDown']       label when mouse on unchecked thumb down button
     * $tooltip['unUp']             label when mouse on checked thumb up button
     * $tooltip['unDown']           label when mouse on checked thumb down button
     *
     * @var array $tooltip (see above)
     */
    public $tooltip = [];

    /**
     * Register asset bundle
     */
    protected function registerAssets()
    {
        ThumbsUpAssets::register($this->getView());
    }

    /**
     *  Set default tooltip label's value
     */
    protected function setDefaultTooltips()
    {
        $this->tooltip = [
            'beforeUp'   => \Yii::t('app', 'Like it'),
            'beforeDown' => \Yii::t('app', 'Dislike it'),
            'unUp'       => \Yii::t('app', 'Unlike it'),
            'unDown'     => \Yii::t('app', 'Neutral now')
        ];
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerAssets();

        if (empty($this->tooltip)) {
            $this->setDefaultTooltips();
        }

        $thumbsUpModel = \Yii::createObject(thumbsup\Module::instance()->model('thumbsUp'));

        if (($thumbsUp = $thumbsUpModel::find()->byEntity($this->entity)->currentUser()->one()) === null) {
            $thumbsUp = $thumbsUpModel;
        }

        $thumbsUpFormClassData = thumbsup\Module::instance()->model(
            'thumbsUpForm', [
                'thumbsUp' => $thumbsUp,
                'entity'   => $this->entity,
            ]
        );

        /**@var $thumbsUpForm  thumbsup\forms\ThumbsUpForm */
        $thumbsUpForm = \Yii::createObject($thumbsUpFormClassData);

        return $this->render($this->viewFile, [
            'ThumbsUpForm' => $thumbsUpForm,
            'tooltips'     => $this->tooltip
        ]);
    }


}
