<?php $this->pageTitle=Yii::app()->name . ' – Ошибка'; ?>

<h2>Ошибка <?php echo $code; ?></h2>

<div class="error">
	<?php echo CHtml::encode($message); ?>
</div>