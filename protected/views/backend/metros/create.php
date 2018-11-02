<?php
$this->breadcrumbs=array(
	Yii::t('all','Metroses')=>array('index'),
	Yii::t('all','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('adm-menu','List Metros'), 'url'=>array('index')),
	array('label'=>Yii::t('adm-menu','Manage Metros'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('adm-menu','Create Metros');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>