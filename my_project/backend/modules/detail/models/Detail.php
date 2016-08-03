<?php

namespace backend\modules\detail\models;

use Yii;

/**
 * This is the model class for table "detail".
 *
 * @property integer $id
 * @property integer $id_quotation
 * @property integer $id_receipt
 * @property string $product_description
 * @property string $quantity
 * @property double $unit_price
 *
 * @property Quotation $idQuotation
 * @property Receipt $idReceipt
 */
class Detail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_quotation', 'id_receipt', 'product_description', 'quantity', 'unit_price'], 'required'],
            [['id_quotation', 'id_receipt'], 'integer'],
            [['unit_price'], 'number'],
            [['product_description'], 'string', 'max' => 500],
            [['quantity'], 'string', 'max' => 45],
            //[['id_quotation'], 'exist', 'skipOnError' => true, 'targetClass' => Quotation::className(), 'targetAttribute' => ['id_quotation' => 'id']],
            //[['id_receipt'], 'exist', 'skipOnError' => true, 'targetClass' => Receipt::className(), 'targetAttribute' => ['id_receipt' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสรายละเอียด',
            'id_quotation' => 'รหัสใบเสนอราคา',
            'id_receipt' => 'รหัสใบเสร็จ',
            'product_description' => 'รายละเอียดงาน',
            'quantity' => 'จำนวนงานที่ทำ',
            'unit_price' => 'ราคา/หน่วย',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdQuotation()
    {
        return $this->hasOne(Quotation::className(), ['id' => 'id_quotation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdReceipt()
    {
        return $this->hasOne(Receipt::className(), ['id' => 'id_receipt']);
    }
}
