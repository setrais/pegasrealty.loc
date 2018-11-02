<?php
$this->breadcrumbs=array(
	Yii::t('all','Clients')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('adm-menu','List Clients'), 'url'=>array('index')),
        //array('label'=>Yii::t('adm-menu','Complex View Clients'), 'url'=>array('complexview', 'id'=>$model->id)), 
	array('label'=>Yii::t('adm-menu','Create Clients'), 'url'=>array('create')),
	array('label'=>Yii::t('adm-menu','Update Clients'), 'url'=>array('update', 'id'=>$model->id)),
        //array('label'=>Yii::t('adm-menu','Complex Update Clients'), 'url'=>array('complexupdate', 'id'=>$model->id)),
	array('label'=>Yii::t('adm-menu','Delete Clients'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('adm-menu','Manage Clients'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('adm-menu','View Clients'); ?> #<?php echo $model->id; ?></h1>

 <?php $this->widget('zii.widgets.CDetailView', array(
            'data'=>$model,
            'attributes'=>array(
                    array('name'=>'id'),                          
                    array('name'=>'sid'),
                    array('name'=>'name'),                                    
                    array('name'=>'contact_person'),                                                                        
                    array('name'=>'phone'),                                                            
                    array('name'=>'email',
                          'type'=>'email',
                         ),                                                                                    
                    array('name'=>'site',
                          'type'=>'html',
                          'value'=>CHtml::link($model->site, $model->site)),                                                                                                            
                    array('name'=>'address'),                                                                                                                                    
                    array('name'=>'contacts'),                                                                                                                                                              
                    array('name'=>'status_id',
                          'value'=>($model->status_id ? $model->status->title : 'не установлен'), 
                    ),
                    array('name'=>'scope_id',
                          'value'=>($model->scope_id ? $model->scope->title : 'не установлен')
                    ),
                    array('name'=>'site_vids_id',
                          'value'=>($model->site_vids_id ? $model->siteVids->title : 'не установлен')
                    ),
                    array('name'=>'client_type_id',
                          'value'=>($model->client_type_id ? $model->clientType->title : 'не установлен')
                    ),                        
                    array('name'=>'email_types_id',
                          'value'=>($model->email_types_id ? $model->emailTypes->title : 'не установлен')
                    ),                                                
                    array('name'=>'phone_types_id',
                          'value'=>($model->phone_types_id ? $model->phoneTypes->title : 'не установлен')
                    ),                                                                        
                    array('name'=>'sort'),
                    array('name'=>'act',    
                          'value'=>($model->act ? 'да' : 'нет')
                    ),    
                    array('name'=>'del',    
                          'value'=>($model->del ? 'да' : 'нет')
                    ),                            
                    array('name'=>'desc'),          
                    array('name'=>'create_date',
                          'value'=>($model->create_date) ? $model->create_date : "" 
                    ),    
                    array('name'=>'update_date',
                          'value'=>($model->update_date) ? $model->update_date : ""                         
                    ),                                                                                         
            ),
    )); ?> 
