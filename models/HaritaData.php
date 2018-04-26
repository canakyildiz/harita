<?php

namespace kouosl\harita\models;

use Yii;

/**
 * This is the model class for table "harita_data".
 *
 * @property integer $id
 * @property string $name
 * @property integer $sample_id
 *
 * @property Harita $harita
 */
class HaritaData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'harita_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'harita_id'], 'required'],
            [['harita_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['harita_id'], 'exist', 'skipOnError' => true, 'targetClass' => Harita::className(), 'targetAttribute' => ['sample_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'harita_id' => 'harita ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSample()
    {
        return $this->hasOne(Harita::className(), ['id' => 'harita_id']);
    }
}
