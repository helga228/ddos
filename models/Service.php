<?php

namespace app\models;

use Yii;
use app\models\Client;
use yii\data\Pagination;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string|null $type
 * @property int|null $ip
 * @property int|null $domain
 */
class Service extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    public static function getAll($pageSize = 10)
    {
        // build a DB query to get all articles
        $query = Service::find();

        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);

        // limit the query using the pagination and retrieve the articles
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['services'] = $articles;
        $data['pagination'] = $pagination;

        return $data;
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ip', 'domain'], 'integer'],
            [['type'], 'string', 'max' => 255],
            [['client_id'],  'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'ip' => 'Ip',
            'domain' => 'Domain',
            'client_id' => 'Client ID',
        ];
    }

    public function getClient()
    {
        return $this->hasOne(Client::className(), ['id' => 'client_id']);
    }

    public function saveClient($client_id)
    {
        $client = Client::findOne($client_id);
        if($client != null)
        {
            $this->link('client', $client);
            return true;
        }
    }

    public function viewedCounter()
    {
        $this->viewed += 1;
        return $this->save(false);
    }


}
