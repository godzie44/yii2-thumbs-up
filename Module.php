<<<<<<< HEAD
<?php

namespace godzie44\yii\module\thumbsup;

use Yii;
use yii\helpers\ArrayHelper;
use \godzie44\yii\module\thumbsup;

class Module extends \yii\base\Module
{
    /** @var string module name */
    public static $moduleName = 'thumbsup';

    /** @var bool */
    public $useRbac = true;

    public $modelMap = [];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->defineModelClasses();
    }

    /**
     * @return static
     */
    public static function instance()
    {

        return \Yii::$app->getModule(static::$moduleName);
    }

    
    public function model($name, $config = [])
    {
        $modelData = $this->modelMap[ucfirst($name)];

        if (!empty($config)) {
            if (is_string($modelData)) {
                $modelData = ['class' => $modelData];
            }

            $modelData = ArrayHelper::merge(
                $modelData,
                $config
            );
        }

        return $modelData;
    }

    /**
     * @param array $modelClasses
     */
    public function defineModelClasses($modelClasses = [])
    {
        $this->modelMap = ArrayHelper::merge(
            $this->getDefaultModels(),
            $this->modelMap,
            $modelClasses
        );
    }

    /**
     * Get default model classes
     */
    protected function getDefaultModels()
    {
        return [
            'ThumbsUp' => thumbsup\models\ThumbsUpM::className(),
            'ThumbsUpForm' => thumbsup\forms\ThumbsUpForm::className(),
            'ThumbsUpQuery' => thumbsup\models\queries\ThumbsUpQuery::className()
        ];
    }
=======
<?php

namespace app\modules\yiithumbsup;

use Yii;
use yii\helpers\ArrayHelper;
use app\modules\yiithumbsup;

class Module extends \yii\base\Module
{
    /** @var string module name */
    public static $moduleName = 'thumbsup';

    /** @var bool */
    public $useRbac = true;

    public $modelMap = [];
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->defineModelClasses();
    }

    /**
     * @return static
     */
    public static function instance()
    {
        return \Yii::$app->getModule(static::$moduleName);
    }

    
    public function model($name, $config = [])
    {
        $modelData = $this->modelMap[ucfirst($name)];

        if (!empty($config)) {
            if (is_string($modelData)) {
                $modelData = ['class' => $modelData];
            }

            $modelData = ArrayHelper::merge(
                $modelData,
                $config
            );
        }

        return $modelData;
    }

    /**
     * @param array $modelClasses
     */
    public function defineModelClasses($modelClasses = [])
    {
        $this->modelMap = ArrayHelper::merge(
            $this->getDefaultModels(),
            $this->modelMap,
            $modelClasses
        );
    }

    /**
     * Get default model classes
     */
    protected function getDefaultModels()
    {
        return [
            'ThumbsUp' => yiithumbsup\models\ThumbsUp::className(),
            'ThumbsUpForm' => yiithumbsup\forms\ThumbsUpForm::className(),
            'ThumbsUpQuery' => yiithumbsup\models\queries\ThumbsUpQuery::className()
        ];
    }
>>>>>>> 4eb156c4e71ee4fba18e827d1a2045472e58c3f7
} 