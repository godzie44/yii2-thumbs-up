<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = \yii\widgets\ActiveForm::begin(['id' => 'thumbsUpForm']);

echo Html::activeHiddenInput($ThumbsUpForm, 'id');

/**@var $ThumbsUpForm \app\modules\yiithumbsup\forms\ThumbsUpForm */
//var_dump($ThumbsUpForm); exit;
echo $form->field($ThumbsUpForm, 'value')->radioList([$ThumbsUpForm->upValue => $ThumbsUpForm->thumbsUpCount, $ThumbsUpForm->downValue => $ThumbsUpForm->thumbsDownCount],
    [
        'item' => function ($index, $label, $name, $checked, $value) use ($ThumbsUpForm) {
            $return = Html::checkbox($name, $checked, [
                    'class' => 'thumbsControl',
                    'disabled' => $ThumbsUpForm->isModifyDisabled,
                    'value' => $value,
                    'label' =>
                        "<span class='thumb'>" .
                        ($value === $ThumbsUpForm->upValue ? '<i class="glyphicon glyphicon-thumbs-up" ></i>' : '<i class="fa fa-thumbs-down" ></i>') .
                        '</span>' .
                        "<span class='thumbsCount'>$label</span>"
                ]
            );
            return $return;
        },
    ]
)->label(false);;


ActiveForm::end();


