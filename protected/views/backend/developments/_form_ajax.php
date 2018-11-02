<div class="wide form l150">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'developments-form',
        'htmlOptions'=>array('class'=>'developments'), 
        'enableClientValidation'=>true,
        'clientOptions'=>array(
                    'validateOnSubmit'=>true,
        ),

      )); ?>

	<p class="note"><?=Yii::t('form','Fields marked <span color="red">*</span> are required for entry.');?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::hiddenField('cid',$cid ); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'abbr'); ?>
		<?php echo $form->textField($model,'abbr',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'abbr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort'); ?>
		<?php echo $form->textField($model,'sort'); ?>
		<?php echo $form->error($model,'sort'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'act'); ?>
		<?php echo $form->checkBox($model,'act'); ?>
		<?php echo $form->error($model,'act'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'del'); ?>
		<?php echo $form->checkBox($model,'del'); ?>
		<?php echo $form->error($model,'del'); ?>
	</div>

	<div class="row">
        	<?php echo $form->labelEx($model,'createdate'); ?>
		<?php// echo $form->textField($model,'createdate'); ?>
                <?php $langs = array_flip(Yii::app()->params->languages); 
                      if ($model->createdate) 
                          $model->createdate = date('d.m.Y',  strtotime($model->createdate))
                ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'language'=> $langs[Yii::app()->language],                                        
                        'model'=>$model,
                        'attribute'=>'createdate',   
                        'theme'=>'ui-lightness',
                        'options'=>array(
                            'showAnim'=>'fold',
                            'dateFormat'=>'dd.mm.yy',  
                            'defaultDate'=>date('d.m.Y'),                                                
                            'showButtonPanel'=>true,
                            'showOn'=> "button",
                            'buttonImage'=> "/images/calendar.gif",
                            'buttonImageOnly'=> true,
                            //set calendar z-index higher then UI Dialog z-index 
                            'beforeShow'=>"js:function() {
                                $('.ui-datepicker').css('font-size', '0.8em');
                                $('.ui-datepicker').css('z-index', parseInt($(this).parents('.ui-dialog').css('z-index'))+1);
                    }",

                         ),   
                        'htmlOptions'=>array('size'=>8 ),
                    )); ?>            
		<?php echo $form->error($model,'createdate'); ?>
                <?php echo $form->labelEx($model,'createuser',array('class'=>'w-auto p-l8')); ?>
                <?php// echo $form->textField($model,'createuser'); ?>
                <?php echo $form->dropDownList($model,'createuser',                           
                           CHtml::listData( Users::model()->findAll("(ACT IS NULL OR ACT=1) AND (DEL IS NULL OR DEL=0)",
                             array("order"=>"sort")), 'id', 'username'), array('prompt'=>Yii::t('all','Select')."...")); ?>                                                                     
                <?php echo $form->error($model,'createuser'); ?>
	</div>

	<div class="row">
            <?php echo $form->labelEx($model,'updatedate'); ?>
            <?php// echo $form->textField($model,'updatedate'); ?>
            <?php $langs = array_flip(Yii::app()->params->languages); 
                  if ($model->updatedate) 
                      $model->updatedate = date('d.m.Y',  strtotime($model->updatedate))
            ?>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'language'=> $langs[Yii::app()->language],                                        
                    'model'=>$model,
                    'attribute'=>'updatedate',   
                    'theme'=>'ui-lightness',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'dd.mm.yy',  
                        'defaultDate'=>date('d.m.Y'),                                                
                        'showButtonPanel'=>true,
                        'showOn'=> "button",
			'buttonImage'=> "/images/calendar.gif",
			'buttonImageOnly'=> true,
                        //set calendar z-index higher then UI Dialog z-index 
                        'beforeShow'=>"js:function() {
                            $('.ui-datepicker').css('font-size', '0.8em');
                            $('.ui-datepicker').css('z-index', parseInt($(this).parents('.ui-dialog').css('z-index'))+1);
                }",

                     ),   
                    'htmlOptions'=>array('size'=>8 ),
                )); ?>            
		<?php echo $form->error($model,'updatedate'); ?>
                <?php echo $form->labelEx($model,'updateuser',array('class'=>'w-auto p-l8')); ?>
                <?php// echo $form->textField($model,'updateuser'); ?>
                <?php echo $form->dropDownList($model,'updateuser',                           
                           CHtml::listData( Users::model()->findAll("(ACT IS NULL OR ACT=1) AND (DEL IS NULL OR DEL=0)",
                             array("order"=>"sort")), 'id', 'username'), array('prompt'=>Yii::t('all','Select')."...")); ?>                                                                     
                <?php echo $form->error($model,'updateuser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc'); ?>
	</div>
	<div class="row buttons">
            <?php echo CHtml::ajaxSubmitButton($model->isNewRecord ? Yii::t('form','Create') : Yii::t('form','Save'),
                    Yii::app()->controller->createUrl("developments/".( $model->isNewRecord ? "ajaxcreate" : "ajaxupdate"), array("id"=>$cid) ),
                    array('success'=>"js:function(data){
                                      $('#editbox-development').dialog('close');                                      
                                      $.fn.yiiGridView.update('client-developments-grid');
                                      
                                      $('#ClientDevelopmets_createdate').datepicker($.datepicker.regional['".Yii::app()->params->language."']);
                                      $('#ClientDevelopmets_createdate').datepicker( 'option', 'altFormat', 'dd.mm.yy' );                                
                                      $('#ClientDevelopmets_createdate').datepicker( 'option', 'dateFormat', 'dd.mm.yy' );
                                
                                      $('#ClientDevelopmets_updatedate').datepicker($.datepicker.regional['".Yii::app()->params->language."']);
                                      $('#ClientDevelopmets_updatedate').datepicker( 'option', 'altFormat', 'dd.mm.yy' );                                
                                      $('#ClientDevelopmets_updatedate').datepicker( 'option', 'dateFormat', 'dd.mm.yy' );

                                      var val = $.parseJSON(data);
                                      $.pnotify({
                                            pnotify_width: 100,
                                            pnotify_nonblock: true,
                                            pnotify_title: 'Информация', 
                                            pnotify_text: val.mess+'<br/>успешно сохранено!',
                                            pnotify_animation: {
                                                effect_in: function(status, callback, pnotify) {
                                                    var source_note = 'Always call the callback when the animation completes.';
                                                    var cur_angle = 0;
                                                    var cur_opacity_scale = 0;
                                                    var timer = setInterval(function() {
                                                        cur_angle += 10;
                                                        if (cur_angle == 360) {
                                                            cur_angle = 0;
                                                            cur_opacity_scale = 1;
                                                            clearInterval(timer);
                                                        } else {
                                                            cur_opacity_scale = cur_angle / 360;
                                                        }
                                                        pnotify.css({
                                                            '-moz-transform': ('rotate(' + cur_angle + 'deg) scale(' + cur_opacity_scale + ')'),
                                                            '-webkit-transform': ('rotate(' + cur_angle + 'deg) scale(' + cur_opacity_scale + ')'),
                                                            '-o-transform': ('rotate(' + cur_angle + 'deg) scale(' + cur_opacity_scale + ')'),
                                                            '-ms-transform': ('rotate(' + cur_angle + 'deg) scale(' + cur_opacity_scale + ')'),
                                                            'filter': ('progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (cur_angle / 360 * 4) + ')')
                                                        }).fadeTo(0, cur_opacity_scale);
                                                        if (cur_angle == 0) callback();
                                                    }, 20);
                                                },
                                                effect_out: function(status, callback, pnotify) {
                                                    var source_note = 'Always call the callback when the animation completes.';
                                                    var cur_angle = 0;
                                                    var cur_opacity_scale = 1;
                                                    var timer = setInterval(function() {
                                                        cur_angle += 10;
                                                        if (cur_angle == 360) {
                                                            cur_angle = 0;
                                                            cur_opacity_scale = 0;
                                                            clearInterval(timer);
                                                        } else {
                                                            cur_opacity_scale = cur_angle / 360;
                                                            cur_opacity_scale = 1 - cur_opacity_scale;
                                                        }
                                                        pnotify.css({
                                                            '-moz-transform': ('rotate(' + cur_angle + 'deg) scale(' + cur_opacity_scale + ')'),
                                                            '-webkit-transform': ('rotate(' + cur_angle + 'deg) scale(' + cur_opacity_scale + ')'),
                                                            '-o-transform': ('rotate(' + cur_angle + 'deg) scale(' + cur_opacity_scale + ')'),
                                                            '-ms-transform': ('rotate(' + cur_angle + 'deg) scale(' + cur_opacity_scale + ')'),
                                                            'filter': ('progid:DXImageTransform.Microsoft.BasicImage(rotation=' + (cur_angle / 360 * 4) + ')')
                                                        }).fadeTo(0, cur_opacity_scale);
                                                        if (cur_angle == 0) {
                                                            pnotify.hide();
                                                            callback();
                                                        }
                                                    }, 20);
                                                }
                                            }
                                        });
                                        //document.onselectstart=function(){return false}                                            
                                        //document.onmousedown=function(){return false}
                                    }",'name'=>'save','style'=>'width:80px;')); ?>
            
		<?php// echo CHtml::submitButton($model->isNewRecord ? Yii::t('form','Create') : Yii::t('form','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->