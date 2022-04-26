<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client_services".
 *
 * @property int $id
 * @property int|null $service_id
 * @property int|null $client_id
 */
class ClientServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'client_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_id' => 'Service ID',
            'client_id' => 'Client ID',
        ];
    }
}
