<?php
$this->breadcrumbs=array(
	Yii::t('all','Areases')=>array('index'),
	Yii::t('all','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('adm-menu','List Areas'), 'url'=>array('index')),
	array('label'=>Yii::t('adm-menu','Manage Areas'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('adm-menu','Create Areas');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>