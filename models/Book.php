<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property int $ID_BOOK
 * @property string $TITLE
 * @property string $DESCRIPTION
 * @property string $YEAR_PUBLICATION
 * @property int $ID_AUTHOR
 * @property int $ID_GENRE
 *
 * @property Author $aUTHOR
 * @property Genre $gENRE
 * @property Stock[] $stocks
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TITLE', 'DESCRIPTION', 'YEAR_PUBLICATION', 'ID_AUTHOR', 'ID_GENRE'], 'required'],
            [['YEAR_PUBLICATION'], 'safe'],
            [['ID_AUTHOR', 'ID_GENRE'], 'integer'],
            [['TITLE', 'DESCRIPTION'], 'string', 'max' => 255],
            [['ID_AUTHOR'], 'exist', 'skipOnError' => true, 'targetClass' => Author::class, 'targetAttribute' => ['ID_AUTHOR' => 'ID_AUTHOR']],
            [['ID_GENRE'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::class, 'targetAttribute' => ['ID_GENRE' => 'ID_GENRE']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_BOOK' => 'Id Book',
            'TITLE' => 'Title',
            'DESCRIPTION' => 'Description',
            'YEAR_PUBLICATION' => 'Year Publication',
            'ID_AUTHOR' => 'Id Author',
            'ID_GENRE' => 'Id Genre',
        ];
    }

    /**
     * Gets query for [[AUTHOR]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAUTHOR()
    {
        return $this->hasOne(Author::class, ['ID_AUTHOR' => 'ID_AUTHOR']);
    }

    /**
     * Gets query for [[GENRE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGENRE()
    {
        return $this->hasOne(Genre::class, ['ID_GENRE' => 'ID_GENRE']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::class, ['ID_BOOK' => 'ID_BOOK']);
    }
}
