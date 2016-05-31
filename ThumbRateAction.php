<?php

namespace godzie44\yii\module\thumbsup;



use godzie44\yii\module\thumbsup;
use yii\base\Action;
use yii\base\ErrorException;

class ThumbRateAction extends Action {
    public function run(){

        if (\Yii::$app->request->isAjax) {
            $thumbsUpModel = \Yii::createObject(thumbsup\Module::instance()->model('thumbsUp'));

            $entity = \Yii::$app->getRequest()->post('ThumbsUpForm')['entity'];

            if (($thumbsUp = $thumbsUpModel::find()->byEntity($entity)->currentUser()->one()) === null) {
                $thumbsUp = $thumbsUpModel;
            }

            $thumbsUpFormClassData = thumbsup\Module::instance()->model(
                'thumbsUpForm', [
                    'thumbsUp' => $thumbsUp,
                    'entity' => $entity,
                ]
            );

            /**@var $thumbsUpForm  forms\ThumbsUpForm */
            $thumbsUpForm = \Yii::createObject($thumbsUpFormClassData);


            if ($thumbsUpForm->load(\Yii::$app->getRequest()->post())) {
                if ($thumbsUpForm->validate() && $thumbsUpForm->save()) {
                    return ;
                } else {
                    throw new ErrorException('save failed');
                }
            }
        }
    }
}