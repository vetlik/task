<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $image
 * @property integer $published
 * @property string $created_at
 * @property string $updated_at
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required', 'message' => 'Это поле не может быть пустым'],
            [['published'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'text'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            'image' => 'Image',
            'published' => 'Published',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return NewsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new NewsQuery(get_called_class());
    }

    /**
     * @return News[]|array
     */

    public static function getAllPublished()
    {
        $allPublishedNews = self::find()->where(['published' => 1])->orderBy('id DESC')->all();

        return $allPublishedNews;
    }

    /**
     * @param $id
     * @return News|array|null
     */
    public static function getOneNews($id)
    {
        $oneNews = self::find()->where(['id' => $id])->one();

        return $oneNews;
    }
}
