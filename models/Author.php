<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property int $ID_AUTHOR
 * @property string $FULL_NAME
 * @property string $DATE_OF_BIRTH
 * @property string $DATE_OF_DEATH
 *
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FULL_NAME', 'DATE_OF_BIRTH', 'DATE_OF_DEATH'], 'required'],
            [['DATE_OF_BIRTH', 'DATE_OF_DEATH'], 'safe'],
            [['FULL_NAME'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_AUTHOR' => 'Id Author',
            'FULL_NAME' => 'Full Name',
            'DATE_OF_BIRTH' => 'Date Of Birth',
            'DATE_OF_DEATH' => 'Date Of Death',
        ];
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::class, ['ID_AUTHOR' => 'ID_AUTHOR']);
    }
}
