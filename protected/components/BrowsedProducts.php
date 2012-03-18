<?php

Yii::import('zii.widgets.CPortlet');

/**
 * Created by JetBrains PhpStorm.
 * User: evgenijnasyrov
 * Date: 17.03.12
 * Time: 18:48
 * To change this template use File | Settings | File Templates.
 */
class BrowsedProducts extends CPortlet
{

	public $limit = 20;

	public function getProducts()
	{
		$browsedProducts = isset(Yii::app()->request->cookies['browsedProducts']->value) ?
			Yii::app()->request->cookies['browsedProducts']->value :
			array();

		$products = array();
		if (!empty($browsedProducts))
		{
			$browsedProductsIds = explode(',', $browsedProducts);
			$browsedProductsIds = array_reverse($browsedProductsIds);
			if ($this->limit > 0)
				$browsedProductsIds = array_slice($browsedProductsIds, 0, $this->limit);

			$criteria = new CDbCriteria;
			$criteria->with = array('variants', 'images');
			$criteria->condition = 't.status=' . Product::STATUS_ENABLED;
			$criteria->addInCondition('t.id', $browsedProductsIds);

			$products = Product::model()->findAll($criteria);
		}

		return $products;
	}

	public function renderContent()
	{
		$this->render('browsedProducts');
	}

}
