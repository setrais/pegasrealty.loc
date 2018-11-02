<?php
$this->breadcrumbs=array(
	Yii::t('all','Districts')=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('adm-menu','List Districts'), 'url'=>array('index')),
	array('label'=>Yii::t('adm-menu','Create Districts'), 'url'=>array('create')),
	array('label'=>Yii::t('adm-menu','Update Districts'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('adm-menu','Delete Districts'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('adm-menu','Manage Districts'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('adm-menu','View Districts').' № '.$model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sid',
		'abbr',
		'title',
		'sort',
		array( 'name'=>'act',
                       'value'=>($model->act ? 'да' : 'нет') ), 
                array( 'name'=>'del',
                       'value'=>($model->del ? 'да' : 'нет') ),
                array( 'name'=>'desc',
                       'label'=>'Расшифровка аббривиатуры',
                     ),
                array( 'name'=>'anons',
                       'type'=>'text', 
                     ),
                array( 'name'=>'detile',
                       'type'=>'html', 
                     ),            
                array( 'name'=>'description',
                       'type'=>'html', 
                     ),
                array( 'name'=>'seo_title',
                       'label'=>'SEO заголовок', 
                       'type'=>'text', 
                     ),                        
                array( 'name'=>'seo_desc',
                       'label'=>'SEO описание',                    
                       'type'=>'text', 
                     ),                          
                array( 'name'=>'seo_keywords',
                       'label'=>'SEO ключевые слова',                                        
                       'type'=>'text', 
                     )             
	),
)); ?>
