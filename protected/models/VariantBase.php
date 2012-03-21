<?php

/**
 * This is the model class for table "variant".
 *
 * The followings are the available columns in table 'variant':
 * @property string $id
 * @property string $product_id
 * @property string $sku
 * @property string $name
 * @property double $price
 * @property double $compare_price
 * @property integer $stock
 * @property string $position
 * @property string $attachment
 */
abstract class VariantBase extends CActiveRecord
{


	/**
	 * @return string
	 */
	public function tableName()
	{
		return 'variant';
	}

	/**
	 * @return array
	 */
	public function relations()
	{
		return array(
			'product' => array(self::HAS_ONE, 'Product', 'product_id'),
		);
	}

	/**
	 * @return array
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'product_id' => 'Product',
			'sku' => 'Sku',
			'name' => 'Name',
			'price' => 'Price',
			'compare_price' => 'Compare Price',
			'stock' => 'Stock',
			'position' => 'Position',
			'attachment' => 'Attachment',
		);
	}

	/**
	 * @return array
	 */
	public function defaultScope()
	{
		return array(
			'alias' => $this->tableName(),
		);
	}

}