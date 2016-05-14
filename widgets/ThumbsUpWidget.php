<<<<<<< HEAD
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
=======
<?php
/**
 * CommentFormWidget.php
 * @author Revin Roman
 * @link https://rmrevin.ru
 */

namespace app\modules\yiithumbsup\widgets;

use app\modules\yiithumbsup;
use yii\helpers\VarDumper;

/**
 * Class CommentFormWidget
 * @package rmrevin\yii\module\Comments\widgets
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
        $thumbsUpModel = \Yii::createObject(yiithumbsup\Module::instance()->model('thumbsUp'));

        if (($thumbsUp = $thumbsUpModel::find()->byEntity($this->entity)->currentUser()->one()) === null) {
            $thumbsUp = $thumbsUpModel;
        }

        $thumbsUpFormClassData = yiithumbsup\Module::instance()->model(
            'thumbsUpForm', [
                'thumbsUp' => $thumbsUp,
                'entity' => $this->entity,
            ]
        );

        /**@var $thumbsUpForm  yiithumbsup\forms\ThumbsUpForm         */
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
>>>>>>> 4eb156c4e71ee4fba18e827d1a2045472e58c3f7
