<<<<<<< HEAD
<?php


 namespace godzie44\yii\module\thumbsup\models\queries;



/**
 * Class CommentQuery
 */
class ThumbsUpQuery extends \yii\db\ActiveQuery
{

    /**
     * @param integer|array $id
     * @return static
     */
    public function byId($id)
    {
        $this->andWhere(['id' => $id]);

        return $this;
    }

    /**
     * @param string|array $entity
     * @return static
     */
    public function byEntity($entity)
    {
        $this->andWhere(['entity' => $entity]);
        return $this;
    }

    public function currentUser()
    {
        $this->andWhere(['created_by' => \Yii::$app->user->id]);
        return $this;
    }

    public function byValue($value)
    {
        $this->andWhere(['value' => $value]);
        return $this;
    }


}
=======
<?php


 namespace app\modules\yiithumbsup\models\queries;



/**
 * Class CommentQuery
 */
class ThumbsUpQuery extends \yii\db\ActiveQuery
{

    /**
     * @param integer|array $id
     * @return static
     */
    public function byId($id)
    {
        $this->andWhere(['id' => $id]);

        return $this;
    }

    /**
     * @param string|array $entity
     * @return static
     */
    public function byEntity($entity)
    {
        $this->andWhere(['entity' => $entity]);
        return $this;
    }

    public function currentUser()
    {
        $this->andWhere(['created_by' => \Yii::$app->user->id]);
        return $this;
    }

    public function byValue($value)
    {
        $this->andWhere(['value' => $value]);
        return $this;
    }


}
>>>>>>> 4eb156c4e71ee4fba18e827d1a2045472e58c3f7
