<?php

namespace app\models;

use yii\data\Pagination;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    public static function getAll($pageSize = 5)
    {
        $query = Client::find();

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);

        $clients = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['clients'] = $clients;
        $data['pagination'] = $pagination;

        return $data;
    }

    public static function getServicesByClient($id)
    {
        $query = Service::find()->where(['client_id'=>$id]);

        $count = $query->count();

        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>6]);

        $services = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['services'] = $services;
        $data['pagination'] = $pagination;

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name'], 'string', 'max' => 35],
            [['first_name', 'last_name'], 'required'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
        ];
    }


}
