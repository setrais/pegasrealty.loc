<div class="wide form l150">

    <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'clients-form',
            'enableAjaxValidation'=>false,
            'method'=>'post',
    )); ?>

    <p class="note"><?=Yii::t('form','Fields marked <span color="red">*</span> are required for entry.');?></p>
    <?php echo $form->errorSummary($model); ?>    
  <?/*<div class="row">
        <?php echo $form->labelEx($model,'sid'); ?>
	<?php echo $form->textField($model,'sid',array('size'=>60,'maxlength'=>75)); ?>
	<?php echo $form->error($model,'sid'); ?>
    </div>*/?>

    <div class="row">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="row">
	<?php echo $form->labelEx($model,'client_type_id'); ?>
        <?php echo $form->dropDownList($model,'client_type_id',   
                     CHtml::listData(ClientTypes::model()->findAll("(ACT IS NULL OR ACT=1) AND (DEL IS NULL OR DEL=0)",
                       array("order"=>"sort")), 'id', 'title'), array('prompt'=>Yii::t('all','Select')."...")); ?>                                     
	<?php// echo $form->textField($model,'client_type_id'); ?>
	<?php echo $form->error($model,'client_type_id'); ?>
    </div>

    <div class="row">
	<?php echo $form->labelEx($model,'status_id'); ?>
        <?php echo $form->dropDownList($model,'status_id',   
                 CHtml::listData(ClientStatus::model()->findAll("(ACT IS NULL OR ACT=1) AND (DEL IS NULL OR DEL=0)",
                     array("order"=>"sort")), 'id', 'title'), array('prompt'=>Yii::t('all','Select')."...")); ?>                         
        <?php// echo $form->textField($model,'status_id'); ?>
	<?php echo $form->error($model,'status_id'); ?>
    </div>

    <div class="row">
	<?php echo $form->labelEx($model,'contact_person'); ?>
	<?php echo $form->textField($model,'contact_person',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'contact_person'); ?>
    </div>
       
    <div class="row">             
	<?php echo $form->labelEx($model,'phone'); ?>
	<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>75)); ?>
        <?php echo $form->dropDownList($model,'phone_types_id',   
                CHtml::listData(PhoneTypes::model()->findAll("(ACT IS NULL OR ACT=1) AND (DEL IS NULL OR DEL=0)",
                   array("order"=>"sort")), 'id', 'title'), array('prompt'=>Yii::t('all','Select')."...")); ?>                                     
	<?php// echo $form->error($model,'phone'); ?>            
    </div>
       
    <?/*<div class="row">
	<?php echo $form->labelEx($model,'phone_types_id'); ?>
	<?php echo $form->textField($model,'phone_types_id'); ?>
	<?php echo $form->error($model,'phone_types_id'); ?>
    </div>*/?>
       
    <div class="row">
	<?php echo $form->labelEx($model,'email'); ?>
	<?php echo $form->textField($model,'email',array('size'=>37,'maxlength'=>255)); ?>
        <?php echo $form->dropDownList($model,'email_types_id',   
                  CHtml::listData(EmailTypes::model()->findAll("(ACT IS NULL OR ACT=1) AND (DEL IS NULL OR DEL=0)",
                  array("order"=>"sort")), 'id', 'title'), array('prompt'=>Yii::t('all','Select')."...")); ?>                                                 
	<?php echo $form->error($model,'email'); ?>
    </div>

    <?/*<div class="row">
		<?php echo $form->labelEx($model,'email_types_id'); ?>
		<?php echo $form->textField($model,'email_types_id'); ?>
		<?php echo $form->error($model,'email_types_id'); ?>
    </div>*/?>

    <div class="row">
    	<?php echo $form->labelEx($model,'scope_id'); ?>
	<?php// echo $form->textField($model,'scope_id'); ?>
        <?php echo $form->dropDownList($model,'scope_id',   
            CHtml::listData(ClientScopes::model()->findAll("(ACT IS NULL OR ACT=1) AND (DEL IS NULL OR DEL=0)",
              array("order"=>"sort")), 'id', 'title'), array('prompt'=>Yii::t('all','Select')."...")); ?>                                                             
	<?php echo $form->error($model,'scope_id'); ?>
    </div>

    <div class="row">
	<?php echo $form->labelEx($model,'site'); ?>
    	<?php echo $form->textField($model,'site',array('size'=>37,'maxlength'=>255)); ?>
        <?php echo $form->dropDownList($model,'site_vids_id',   
                 CHtml::listData(SiteVids::model()->findAll("(ACT IS NULL OR ACT=1) AND (DEL IS NULL OR DEL=0)",
                    array("order"=>"sort")), 'id', 'title'), array('prompt'=>Yii::t('all','Select')."...")); ?>                                                                         
	<?php echo $form->error($model,'site'); ?>
    </div>
       
    <?/*<div class="row">
	<?php echo $form->labelEx($model,'site_vids_id'); ?>
	<?php echo $form->textField($model,'site_vids_id'); ?>
	<?php echo $form->error($model,'site_vids_id'); ?>
    </div>*/?>

    <div class="row">
	<?php echo $form->labelEx($model,'address'); ?>
	<?php echo $form->textArea($model,'address',array('rows'=>6, 'cols'=>50)); ?>
	<?php echo $form->error($model,'address'); ?>
    </div>

    <?/*<div class="row">
	<?php echo $form->labelEx($model,'sort'); ?>
	<?php echo $form->textField($model,'sort'); ?>
	<?php echo $form->error($model,'sort'); ?>
    </div>*/?>

    <?/*<div class="row">
        <?php echo $form->labelEx($model,'act'); ?>
        <?php echo $form->textField($model,'act'); ?>
        <?php echo $form->error($model,'act'); ?>
    </div>*/?>

    <?/*<div class="row">
        <?php echo $form->labelEx($model,'del'); ?>
        <?php echo $form->textField($model,'del'); ?>
        <?php echo $form->error($model,'del'); ?>
    </div>

    <div class="row">
	<?php echo $form->labelEx($model,'create_date'); ?>
	<?php echo $form->textField($model,'create_date'); ?>
	<?php echo $form->error($model,'create_date'); ?>
    </div>

    <div class="row">
	<?php echo $form->labelEx($model,'update_date'); ?>
	<?php echo $form->textField($model,'update_date'); ?>
	<?php echo $form->error($model,'update_date'); ?>
    </div>*/?>
    <?/* Begin Desc of tabs   the client*/  ob_start(); ?>       
    <div class="tabs etabs client-desc">
        <div class="row">
            <?php echo $form->labelEx($model,'desc'); ?>
            <?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'desc'); ?>
        </div>
    </div>
    <?/* End Desc of tabs the client*/ $cl_desc = ob_get_contents(); ob_end_clean(); ?>            
    <?/* Begin Contacts of tabs the client*/ ob_start(); ?>           
    <div class="tabs etabs client-contacts">
        <div class="row">
            <?php echo $form->labelEx($model,'contacts'); ?>
            <?php echo $form->textArea($model,'contacts',array('rows'=>6, 'cols'=>50)); ?>
            <?php echo $form->error($model,'contacts'); ?>
        </div>   
    </div>
    <?/* End Contacts of tabs the client*/ $cl_contacts = ob_get_contents(); ob_end_clean(); ?>    
    <? 
    $this->widget('zii.widgets.jui.CJuiTabs', array(
            //'name'=>'tabpanel-client',  
            'tabs'=>array(                 
                 Yii::t('all','Комментарии')    =>array('content'=>$cl_desc,         'id'=>'client-desc'),
                 Yii::t('all','Контакты')       =>array('content'=>$cl_contacts,     'id'=>'client-contacts'),
                 // panel 3 contains the content rendered by a partial view
                 //'AjaxTab'=>array('ajax'=>$ajaxUrl),
            ),
            // additional javascript options for the tabs plugin
            'options'=>array(
                'collapsible'=>true,
                'selected'=>0,
            ),
          ));
    ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('form','Create') : Yii::t('form','Save')); ?>
    </div>
    <?php $this->endWidget(); ?>

    </div><!-- form -->