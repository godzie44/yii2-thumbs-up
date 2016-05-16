<?php
use \yii\widgets\ActiveForm;
use yii\helpers\Html;


$form = \yii\widgets\ActiveForm::begin(['id' => 'thumbsUpForm']);

echo Html::activeHiddenInput($ThumbsUpForm, 'id');

/**@var $ThumbsUpForm godzie44\yii\module\thumbsup\forms\ThumbsUpForm */

echo $form->field($ThumbsUpForm, 'value')->radioList([$ThumbsUpForm->upValue => $ThumbsUpForm->thumbsUpCount, $ThumbsUpForm->downValue => $ThumbsUpForm->thumbsDownCount],
    [
        'item' => function ($index, $label, $name, $checked, $value) use ($ThumbsUpForm, $tooltips) {

            $return = Html::checkbox($name, $checked, [
                    'class' => 'thumbsControl',
                    'disabled' => $ThumbsUpForm->isModifyDisabled,
                    'value' => $value,
                    'label' =>
                        "<span class='thumb' data-toggle='tooltip'>"
                        . "<span class='un-active-label'>" . ($value === $ThumbsUpForm->upValue ? $tooltips['beforeUp'] : $tooltips['beforeDown']) . '</span>'
                        . "<span class='active-label'>" . ($value === $ThumbsUpForm->upValue ? $tooltips['unUp'] : $tooltips['unDown']) . '</span>'
                        . ($value === $ThumbsUpForm->upValue ? '<i class="glyphicon glyphicon-thumbs-up" ></i>' : '<i class="glyphicon glyphicon-thumbs-down" ></i>') . '</span>'
                        . "<span class='thumbsCount'>$label</span>"

                ]
            );
            return $return;
        },
    ]
)->label(false);;


ActiveForm::end();

