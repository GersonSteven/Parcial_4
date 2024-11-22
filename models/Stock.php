<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $ID_STOCK
 * @property int $ID_BOOK
 * @property int $TOTAL_STOCK
 * @property string $NOTES
 * @property string $LAST_INVENTARY
 *
 * @property Book $bOOK
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ID_BOOK', 'TOTAL_STOCK', 'NOTES', 'LAST_INVENTARY'], 'required'],
            [['ID_BOOK', 'TOTAL_STOCK'], 'integer'],
            [['LAST_INVENTARY'], 'safe'],
            [['NOTES'], 'string', 'max' => 255],
            [['ID_BOOK'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['ID_BOOK' => 'ID_BOOK']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID_STOCK' => 'Id Stock',
            'ID_BOOK' => 'Id Book',
            'TOTAL_STOCK' => 'Total Stock',
            'NOTES' => 'Notes',
            'LAST_INVENTARY' => 'Last Inventary',
        ];
    }

    /**
     * Gets query for [[BOOK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBOOK()
    {
        return $this->hasOne(Book::class, ['ID_BOOK' => 'ID_BOOK']);
    }
}
