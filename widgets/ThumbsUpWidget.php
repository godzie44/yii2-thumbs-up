<?php
/**
 * CommentFormWidget.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace godzie44\yii\module\thumbsup\widgets;

use godzie44\yii\module\thumbsup;
use yii\helpers\VarDumper;

/**
 * Class CommentFormWidget
 */
class ThumbsUpWidget extends \yii\base\Widget
{

    /** @var string */
    public $entity;


    /** @var string */
    public $viewFile = 'thumbs-up-form';

    /**
     * Register asset bundle
     */
    protected function registerAssets()
    {
        ThumbsUpAssets::register($this->getView());
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerAssets();

        $thumbsUpModel = \Yii::createObject(thumbsup\Module::instance()->model('thumbsUp'));

        if (($thumbsUp = $thumbsUpModel::find()->byEntity($this->entity)->currentUser()->one()) === null) {
            $thumbsUp = $thumbsUpModel;
        }
	
        $thumbsUpFormClassData = thumbsup\Module::instance()->model(
            'thumbsUpForm', [
                'thumbsUp' => $thumbsUp,
                'entity' => $this->entity,
            ]
        );

        /**@var $thumbsUpForm  thumbsup\forms\ThumbsUpForm         */
        $thumbsUpForm = \Yii::createObject($thumbsUpFormClassData);

        if (\Yii::$app->request->isAjax) {
            if ($thumbsUpForm->load(\Yii::$app->getRequest()->post())) {
                if ($thumbsUpForm->validate()) {
                    $thumbsUpForm->save();
                    exit;
                }
            }
        }
		
        return $this->render($this->viewFile, [
            'ThumbsUpForm' => $thumbsUpForm,
        ]);
    }


}
