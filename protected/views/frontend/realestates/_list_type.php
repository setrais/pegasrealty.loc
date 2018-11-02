<?php 
$short = true;
$is_list = false;

$this->pageTitle=Yii::t('all','Коммерческая недвижимость')
                .($model->realestateType 
                  ? ($property->is_ceil 
                     ? ' | Аренда '.mb_strtolower($property->namewhats,'UTF-8').' в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' без посредников по стоимости аренды'
                      .' от собственника Москвы.'
                     : ' | Аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,"UTF-8").' Москвы без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,"UTF-8")
                      .' без посредников по стоимости аренды от собственника в Москве.')
                  : ($property->is_ceil 
                     ? ' | Аренда '.mb_strtolower($property->namewhats,'UTF-8').' целиком в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' без посредников по стоимости аренды от собственника Москвы.' 
                     : ' | Аренда '.mb_strtolower($property->namewhats,'UTF-8').' по размещению в зданиях без комиссии в Москве.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' в бизнес центре, особняке, банке, административном здании, жилом доме, комлексе, парке,'
                      .' торговом центре различных классов, без посредников по стоимости аренды от собственника Москвы.'));
                  //.($property->seo_title ? ', '.$property->seo_title : '');
                  //." - ".str_replace('офисов','офиса', Yii::t('all',Yii::app()->name));   

if ($model->realestateType) $this->pageDescription= trim($model->realestateType->seo_desc)<>'' 
                                        ? 'Здесь отобраны предложения по аренде '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,"UTF-8")
                                          .' Москвы. '                                          
                                          .$model->realestateType->seo_desc 
                                        : 'Здесь отобраны предложения по аренде '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,"UTF-8")
                                          .' Москвы.';                   
else $this->pageDescription= 'Здесь отобраны предложения по аренде '.mb_strtolower($property->namewhats,'UTF-8').' по размещению в зданиях Москвы. ';

$this->pageDescription=$this->pageDescription.($property->seo_description ? ' '.$property->seo_description : '');

if ( !$property->seo_description && !$model->realestateType->seo_desc) {
    if ($model->realestateType) {
        $this->pageDescription = ($property->is_ceil 
                                  ? 'Предложения включают аренду '.mb_strtolower($property->namewhats,'UTF-8').' Москвы целиком.'
                                   .' Аренда '.mb_strtolower($property->namewhats,'UTF-8').' в Москве'
                                   .' отличается классом, адресом, назначением, свойствами, удаленностью от метро, площадью, стоимостью, валютой расчетов.'
                                  : 'Предложения включают аренду '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,"UTF-8").' Москвы.'
                                   .' Аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,"UTF-8")
                                   .' отличается классом, адресом, назначением, свойствами, удаленностью от метро, площадью, стоимостью, валютой расчетов.');
    }else{
        $this->pageDescription = ($property->is_ceil 
                                  ? 'Предложения включают аренду '.mb_strtolower($property->namewhats,'UTF-8').' в Москве целиком по размещению.'
                                   .' Аренда '.mb_strtolower($property->namewhats,'UTF-8').' Москвы, целиком по размещеию '
                                   .' отличается адресом, классом, назначением, свойствами, удаленностью от метро, площадью, стоимостью, валютой расчетов.'
                                  : 'Предложения включают аренду '.mb_strtolower($property->namewhats,'UTF-8').' '
                                   .' в бизнес центре, парке, жилом комплексе, доме, особняке, здании, медцентре, банке Москвы.'
                                   .' Аренда '.mb_strtolower($property->namewhats,'UTF-8').' различного размещения отличается классом, объектом размещения'
                                   .' адресом, назначением, свойствами, удаленностью от метро, площадью, стоимостью, валютой.');
        
    }
}

if ($model->realestateType->title) $this->pageKeywords= trim($model->realestateType->seo_keywords)<>'' 
                                        ? array_merge( explode(',', //' аренда в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'
                                                                  ' аренда в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы'                                                                 
                                                                  //.', аренда в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москва'
                                                                  .', аренда в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москва'
                                                                  //.', аренда в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' в москве'
                                                                  .', аренда в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' в москве'                                                                                                                                         
                                                                  .', '.mb_strtolower($model->realestateType->abbr,'UTF-8')                                                                            
                                                                  .', '.mb_strtolower($model->realestateType->title,'UTF-8')  
                                                                  .($property->title                                                                             
                                                                       ?  //', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'                                                                            
                                                                         ($property->namewhats->is_ceil ? '' : ', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы')                                                                            
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'    
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы'     
                                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' в москве'                                                                            
                                                                         .($property->namewhats->is_ceil ? '' : ', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' в москве')                                                                            
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').'в москве'    
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').'в москве' 
                                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москва'                                                                            
                                                                         .($property->namewhats->is_ceil ? '' : ', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москва')                                                                            
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москва'    
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москва' 
                                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве '.mb_strtolower($model->realestateType->title,'UTF-8')                                                
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в москве '.mb_strtolower($model->realestateType->title,'UTF-8') 
                                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' москва '.mb_strtolower($model->realestateType->title,'UTF-8') 
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' москва '.mb_strtolower($model->realestateType->title,'UTF-8')                                                                                                                                                      
                                                                         .($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8'))
                                                                         .($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8')) 
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' в москве'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' в москве' 
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москве'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москве'   
                                                                         .($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' в москве'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' москве'  
                                                                         //.($property->namewhats->is_ceil ? '' : ', аренда москва '.mb_strtolower($property->title,'UTF-8').' '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         //.($property->namewhats->is_ceil ? '' : ', аренда москва '.mb_strtolower($property->nameov,'UTF-8').' '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         .($property->namewhats->is_ceil ? '' : ', аренда '.mb_strtolower($property->namewhat,'UTF-8').' москва в '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         .", аренда ".mb_strtolower($property->title,'UTF-8')     
                                                                         .", аренда ".mb_strtolower($property->namewhats,'UTF-8').' в москве'     
                                                                         .", ".mb_strtolower($property->title,'UTF-8')        
                                                                      : "")          
                                                                  .($property->abbr 
                                                                      ?   ($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8'))
                                                                         .($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8')) 
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' в москве'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' в москве' 
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москве'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москве'   
                                                                         //.($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' в москве'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' москве'  
                                                                         //.($property->namewhats->is_ceil ? '' : ', аренда москва '.mb_strtolower($property->abbr,'UTF-8').' '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         .", аренда ".mb_strtolower($property->abbr,'UTF-8')         
                                                                         .", ".mb_strtolower($property->abbr,'UTF-8')            
                                                                        : "")                                                                       
                                                                  .', снять, недвижимость, коммерческая недвижимость, аренда, москва, в москве, москвы, район, метро, от метро, планировка, парковка, вид, класс, налоговая, налогообложение, отдельный вход, кк, свойства, арендная ставка, стоимость в месяц'),
                                                                  // Отсеиваиваем ключевые слова для короткой формы
                                                                  $short ? HRu::iskeyintxt(explode(',',$model->realestateType->seo_keywords),                                                   
                                                                           HRu::cutstr($model->realestateType->anons,750, false, '.','. ')
                                                                      .' '.HRu::cutstr($model->realestateType->detile,1500, false, '.','. ')
                                                                      .' '.HRu::cutstr($model->realestateType->description,1000, false, '.','. '))
                                                                  : explode(',',$model->realestateType->seo_keywords)                                                          
                                                  )
                                        : explode(',', //' аренда в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'
                                                                  ' аренда в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы'                                                                 
                                                                  //.', аренда в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москва'
                                                                  .', аренда в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москва'
                                                                  //.', аренда в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' в москве'
                                                                  .', аренда в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' в москве'                                                                                                                                         
                                                                  .', '.mb_strtolower($model->realestateType->abbr,'UTF-8')                                                                            
                                                                  .', '.mb_strtolower($model->realestateType->title,'UTF-8')  
                                                                  .($property->title                                                                             
                                                                       ?  //', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'                                                                            
                                                                         ($property->namewhats->is_ceil ? '' : ', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы')                                                                            
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'    
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы'     
                                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' в москве'                                                                            
                                                                         .($property->namewhats->is_ceil ? '' : ', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' в москве')                                                                            
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').'в москве'    
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').'в москве' 
                                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москва'                                                                            
                                                                         .($property->namewhats->is_ceil ? '' : ', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москва')                                                                            
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москва'    
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москва' 
                                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве '.mb_strtolower($model->realestateType->title,'UTF-8')                                                
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в москве '.mb_strtolower($model->realestateType->title,'UTF-8') 
                                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' москва '.mb_strtolower($model->realestateType->title,'UTF-8') 
                                                                         //.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' москва '.mb_strtolower($model->realestateType->title,'UTF-8')                                                                                                                                                      
                                                                         .($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8'))
                                                                         .($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8')) 
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' в москве'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' в москве' 
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москве'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москве'   
                                                                         .($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' в москве'  
                                                                         //.', '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' москве'  
                                                                         //.($property->namewhats->is_ceil ? '' : ', аренда москва '.mb_strtolower($property->title,'UTF-8').' '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         //.($property->namewhats->is_ceil ? '' : ', аренда москва '.mb_strtolower($property->nameov,'UTF-8').' '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         .($property->namewhats->is_ceil ? '' : ', аренда '.mb_strtolower($property->namewhat,'UTF-8').' москва в '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         .", аренда ".mb_strtolower($property->title,'UTF-8')     
                                                                         .", аренда ".mb_strtolower($property->namewhats,'UTF-8').' в москве'     
                                                                         .", ".mb_strtolower($property->title,'UTF-8')        
                                                                      : "")          
                                                                  .($property->abbr 
                                                                      ?   ($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8'))
                                                                         .($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8')) 
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' в москве'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' в москве' 
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,'UTF-8').' москве'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,'UTF-8').' москве'   
                                                                         //.($property->namewhats->is_ceil ? '' : ', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' москвы'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' в москве'  
                                                                         //.', '.mb_strtolower($property->abbr,'UTF-8').' в '.mb_strtolower($model->realestateType->abbr,'UTF-8').' москве'  
                                                                         //.($property->namewhats->is_ceil ? '' : ', аренда москва '.mb_strtolower($property->abbr,'UTF-8').' '.mb_strtolower($model->realestateType->abbr,'UTF-8'))
                                                                         .", аренда ".mb_strtolower($property->abbr,'UTF-8')         
                                                                         .", ".mb_strtolower($property->abbr,'UTF-8')            
                                                                        : "")                                                                       
                                                                  .', снять, недвижимость, коммерческая недвижимость, аренда, москва, в москве, москвы, район, метро, от метро, планировка, парковка, вид, класс, налоговая, налогообложение, отдельный вход, кк, свойства, арендная ставка, стоимость в месяц');                   
else $this->pageKeywords=explode(',', 'снять, снять в аренду, аренда в москве, недвижимость, коммерческая недвижимость, аренда недвижимости, аренда коммерческой недвижимости, аренда коммерческой недвижимости в москве, аренда коммерческой недвижимости москвы, аренда коммерческая недвижимость москва, аренда, в москве, москва, москвы, класс, класса, коммерческой недвижимости, округ, район, метро, удаленность, вид, тип, свойства, площадь, м2, планировка, парковка, стоимость в месяц, налогооблажение');    

$this->pageKeywords=$property->seo_keywords 
                        ? array_merge($this->pageKeywords,
                                      // Отсеиваиваем ключевые слова для короткой формы
                                      $short ? HRu::iskeyintxt( explode(',',$property->seo_keywords),                                                   
                                                        HRu::cutstr($property->anons,750, false, '.','. ')
                                                   .' '.HRu::cutstr($property->detile,1500, false, '.','. ')
                                                   .' '.HRu::cutstr($property->description,1000, false, '.','. '))
                                             : explode(',',$property->seo_keywords)) 
                        : $this->pageKeywords;

$this->pageKeywords= array_unique($this->pageKeywords);
natsort($this->pageKeywords);

if ($model->realestateType&&$property->namewhats) {
     if ($property->namewhats->is_ceil) {
         $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'по размещению'=>array('realestates/type'),
             " в ".mb_strtolower($model->realestateType->namewheres,'UTF-8')=>Yii::app()->createUrl('realestates/type',array('id'=>$model->realestateType->id)),
             'по видам'=>array('realestates/vid'),
              mb_strtolower($property->nameov,'UTF-8')=>Yii::app()->createUrl('realestates/vid',array('id'=>$model->realestateVid->id)),
             'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' Москвы целиком'
        ); 
     } else {
        $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'по размещению'=>array('realestates/type'),
             " в ".mb_strtolower($model->realestateType->namewheres,'UTF-8')=>Yii::app()->createUrl('realestates/type',array('id'=>$model->realestateType->id)),
             'по видам'=>array('realestates/vid'),
              mb_strtolower($property->nameov,'UTF-8')=>Yii::app()->createUrl('realestates/vid',array('id'=>$model->realestateVid->id)),
             'Аренда '.mb_strtolower($property->namewhats,'UTF-8')." в ".$model->realestateType->namewheres." Москвы"
        );
     }   

} else if (!$model->realestateType && $property->namewhats) {
    if ($property->namewhats->is_ceil) {
        $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'по размещению '=>array('realestates/type'),
             'по видам'=>array('realestates/vid'),
              mb_strtolower($property->nameov,'UTF-8')=>Yii::app()->createUrl('realestates/vid',array('id'=>$model->realestateVid->id)),
             'Аренда '.mb_strtolower($property->namewhats,'UTF-8')." Москвы целиком"
        );
    }else{
        $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'по размещению '=>array('realestates/type'),
             'по видам'=>array('realestates/vid'),
              mb_strtolower($property->nameov,'UTF-8')=>Yii::app()->createUrl('realestates/vid',array('id'=>$model->realestateVid->id)),
             'Аренда '.mb_strtolower($property->namewhats,'UTF-8')." по размещению в зданиях Москвы"
        );
    }    
} else if ($model->realestateType && !$property->namewhats) {

        $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'по размещению '=>array('realestates/type'),
             " в ".mb_strtolower($model->realestateType->namewheres,'UTF-8')=>Yii::app()->createUrl('realestates/type',array('id'=>$model->realestateType->id)),
             'по видам'=>array('realestates/vid'),
             'Аренда коммерческой недвижимости в '.$model->realestateType->namewheres.' Москвы'
        );    
} else {
        $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'по размещению '=>array('realestates/type'),
             'по видам'=>array('realestates/vid'),
             'Аренда коммерческой недвижимости по размещению в зданиях Москвы'
        );
}

?>

<?php  
    // Подключение скрипта обработки url для нормализации передачи параметров
    $this->renderPartial('/realestates/include/_script_geturl');
?>

<?php
    // Переменная $extraRowExpression    
    include __DIR__ . '/include/_var_fav.php';
?>

<div id="content"  >
<div class="content fs-13 ff-tahoma" >   
<h1>
    <?php  echo //Yii::t('all','Коммерческая недвижимость')
                ($model->realestateType
                  ? ($property->is_ceil 
                     ? 'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' без посредников по стоимости аренды'
                      .' от собственника Москвы.'
                     : 'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' в '.mb_strtolower($model->realestateType->namewheres,"UTF-8").' Москвы без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' в '.mb_strtolower($model->realestateType->namewhere,"UTF-8")
                      .' без посредников по стоимости аренды от собственника в Москве.')
                  : ($property->is_ceil 
                     ? 'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' целиком в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' без посредников по стоимости аренды от собственника Москвы.' 
                     : 'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' по размещению в зданиях без комиссии в Москве.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' в бизнес центре, особняке, банке, административном здании, жилом доме, комлексе, парке,'
                      .' торговом центре различных классов, без посредников по стоимости аренды от собственника Москвы.'));?>                        
</h1>    
    
<?php if ( $model->realestateType->anons || $property->anons) {  ?>    
<div class="desc anons m-b18 fs-11 ff-Arial justify">    
    <?php if ( $model->realestateType->anons ) {  ?>      
    <div>
    <?php if ($short) { ?>    
    <?php echo str_replace(",","",HRu::cutstr($model->realestateType->anons,750, false, '.','. ')); ?>    
    <?php } else { ?>    
    <?php echo $model->realestateType->anons; ?>
    <?php } ?>    
    </div>    
    <?php } ?>
    <?php if ( $property->anons ) {  ?>    
    <div <?php echo ($model->realestateType->anons ? 'class="m-t10"' : '') ?>>
    <?php if ($short) { ?>    
    <?php echo str_replace(",","",HRu::cutstr($property->anons,750, false, '.','. ')); ?>    
    <?php } else { ?>    
    <?php echo $property->anons; ?>
    <?php } ?>        
    </div>    
    <?php } ?>
</div>
<? } ?>       
    
<?php 

    //$model->search()->pagination->route = Yii::app()->createUrl('/realestates/type', array('id'=>$model->realestateType->id)); 
    $model->search()->pagination->route = Yii::app()->createUrl('/ru/realestates/type/'.$model->realestateType->id.'/vid/'.$model->realestateVid->id); 
    
    //$model->search()->pagination->setPageSize(20);  не срабатывает  
    //$model->search()->sort = 'unit.title';
?>
<?php $this->renderPartial('/realestates/_social',array('model'=>(object)array('title'=>$this->pageTitle)));?>
    
<?php
    // Переменная $beforeAjaxUpdate       
    include __DIR__ . '/include/_var_aftajaxupdate_list.php';
?> 

<?php
    // Переменная $beforeAjaxUpdate       
    include __DIR__ . '/include/_var_befajaxupdate_list.php';
?>
    
<?php $this->widget('application.components.widgets.DSizerListView', array(
        'dataProvider'=>$model->search($short ? 10 : 16,
                array(
                        'unit'=>array(                                
                                'asc'=>'unit.title ASC',
                                'desc'=>'unit.title DESC',
                                'default'=>'desc',
                        ),
                        'areas'=>array(                                
                                'asc'=>'areas.title ASC',
                                'desc'=>'areas.title DESC',
                                'default'=>'desc',
                        ),
                        'district'=>array(                                
                                'asc'=>'district.title ASC',
                                'desc'=>'district.title DESC',
                                'default'=>'desc',
                        ),
                        /*'realestateVid'=>array(                                
                                'asc'=>'realestateVid.title ASC',
                                'desc'=>'realestateVid.title DESC',
                                'default'=>'desc',
                        ),*/
                        /*'realestateType'=>array(                                
                                'asc'=>'realestateType.title ASC',
                                'desc'=>'realestateType.title DESC',
                                'default'=>'desc',
                        ),*/                    
                        'realestateClass'=>array(                                
                                'asc'=>'realestateClass.title ASC',
                                'desc'=>'realestateClass.title DESC',
                                'default'=>'desc',
                        ),   
                        'valute'=>array(                                
                                'asc'=>'valute.title ASC',
                                'desc'=>'valute.title DESC',
                                'default'=>'desc',
                        ), 
                        'street'=>array(                                
                                'asc'=>'street.title ASC',
                                'desc'=>'street.title DESC',
                                'default'=>'desc',
                        ),                                              
                        'metro'=>array(                                
                                'asc'=>'metro.title ASC',
                                'desc'=>'metro.title DESC',
                                'default'=>'desc',
                        ),                          
                        'title',
                        'area',
                        'remoteness',
                        'price',                        
                        //'create_date'
                    )),                
	'itemView'=>'_view_column',
        'summaryText'=>Yii::t('core',                 
                                'Displaying Items {start} - {end} of {count} results', 
                                 $model->search()->getTotalItemCount()),
        'emptyText'=>Yii::t('core','No results found.'),
        'pager'=>array(
                'header' => Yii::t('grid','Перейти к странице:'),
                //'firstPageLabel' => '&lt;&lt;',
                'prevPageLabel'  => Yii::t('grid','< Вперед'),//'<img src="images/pagination/left.png">',
                'nextPageLabel'  => Yii::t('grid','Назад >'),//'<img src="images/pagination/left.png">',
                //'nextPageLabel'  => '<img src="images/pagination/right.png">',
                //'lastPageLabel'  => '&gt;&gt;'
                //'pageSize'=>20, не сработает
        ),         
        'sortableAttributes'=>array(
            'title',
            //'create_date',
            'area',
            'remoteness',
            'price',
            'valute'=>'Валюта',
            'unit'=>'Способ',
            'district'=>'Округ',
            'areas'=>'Район',
            'metro'=>'Метро',
            //'realestateVid'=>'Вид',
            //'realestateType'=>'В/цел',
            'realestateClass'=>'Класс', 
            'street'=>'Улица',
        ),
        'sorterHeader'=>'Сортировать по:',
        'template'=>"<hr class='m-t5 m-b5' />{sizer}{sorter}\n<div style='float:left;display:inline-block;'>{pager}</div>{summary}\n<br/>{items}\n<div style='clear:both'></div><div style='float:left;display:inline-block;'>{pager}</div>{summary}",        
        'sizerVariants'=>  HRu::cutarray(array(6, 8, 10, 12, 16, 20, 24, 30),$model->search()->getTotalItemCount()),
        'sizerAttribute'=>'size',
        'sizerHeader'=>'Выводить по: ',
        'short'=>$short,
        'beforeAjaxUpdate'=>$beforeAjaxUpdate,
        'afterAjaxUpdate'=>$afterAjaxUpdate,    
        //'ajaxUrl'=>Yii::app()->createUrl('/ru/realestates/type/'.$model->realestateType->id.'/vid/'.$model->realestateVid->id),
)); ?>    

   <?php   $this->renderPartial('_send',array('model'=>$model_claim));?>

    </div>
    <hr class="m-t10 m-b8" />
    
    <?php if (!$is_list) { ?>
    <?php   $this->renderPartial('/site/_list_metros', array('model'=>$model)); ?>  
    <?php } ?>
    
    <?php if ( $model->realestateType->detile || $property->detile ) {  ?>    
    <div class="desc detile m-t8 m-b14 fs-10 ff-tahoma">    
        <?php if ( $model->realestateType->detile ) {  ?>      
            <div>
            <?php if ($short) { ?>    
            <?php echo str_replace(",","",HRu::cutstr($model->realestateType->detile,1500, false, '.','. ')); ?>    
            <?php } else { ?>    
            <?php echo $model->realestateType->detile; ?>
            <?php } ?>                             
            </div>    
        <?php } ?>
        <?php if ( $property->detile ) {  ?>    
            <div <?php echo ($model->realestateType->detile ? 'class="m-t10"' : '') ?>>
            <?php if ($short) { ?>    
            <?php echo str_replace(",","",HRu::cutstr($property->detile,1500, false, '.','. ')); ?>    
            <?php } else { ?>    
            <?php echo $property->detile; ?>
            <?php } ?>                   
            </div>    
        <?php } ?>        
    </div>
    <? } ?>  
    
    <?php if (!$is_list) { ?>
    <?php   $this->renderPartial('/site/_list_streets', array('model'=>$model)); ?>  
    <?php } ?> 
    
    <?php if ( $model->realestateType->description || $property->description ) {  ?>    
    <div class="desc detile m-b18 fs-10 ff-tahoma">    
        <?php if ( $model->realestateType->description ) {  ?>      
            <div>
            <?php if ($short) { ?>    
            <?php echo str_replace(",","",HRu::cutstr($model->realestateType->description,1000, false, '.','. ')); ?>    
            <?php } else { ?>    
            <?php echo $model->realestateType->description; ?>
            <?php } ?>                 
            </div>    
        <?php } ?>
        <?php if ( $property->description ) {  ?>    
            <div <?php echo ($model->realestateType->description ? 'class="m-t10"' : '') ?>>
            <?php if ($short) { ?>    
            <?php echo str_replace(",","",HRu::cutstr($property->description,1000, false, '.','. ')); ?>    
            <?php } else { ?>    
            <?php echo $property->description; ?>
            <?php } ?>                 
            </div>    
        <?php } ?>                
    </div>
    <? } ?>  
    
    <?php if (!$is_list) { ?>
    <?php   $this->renderPartial('/site/_list_areas', array('model'=>$model)); ?>              
    <?php } ?>
    
</div>
<? $this->renderPartial('/realestates/include/_script_vimg_i_sec_list'); ?>  