<?php

namespace backend\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "documents".
 *
 * @property integer $document_id
 * @property string $document_name
 * @property string $document_description
 * @property string $document_issue_date
 * @property string $document_create_date
 * @property integer $document_user
 * @property string $document_type
 * @property string $document_url
 *
 * @property User $documentUser
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['document_name', 'document_issue_date', 'document_create_date', 'document_user', 'document_type', 'document_url'], 'required'],
            [['document_description', 'document_type'], 'string'],
            [['document_issue_date', 'document_create_date'], 'safe'],
            [['document_user'], 'integer'],
            [['document_name'], 'string', 'max' => 255],
            [['document_url'], 'string', 'max' => 1024],
            [['document_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['document_user' => 'cpf']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'document_id' => 'Document ID',
            'document_name' => 'Document Name',
            'document_description' => 'Document Description',
            'document_issue_date' => 'Document Issue Date',
            'document_create_date' => 'Document Create Date',
            'document_user' => 'Document User',
            'document_type' => 'Document Type',
            'document_url' => 'Document Url',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentUser()
    {
        return $this->hasOne(User::className(), ['cpf' => 'document_user']);
    }
}
