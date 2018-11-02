<?php
$short = true;
$is_list = false;
   
//echo Yii::app()->getRequest()->getParam('id');
if (Yii::app()->getRequest()->getParam('price-to')&&Yii::app()->getRequest()->getParam('valute')) {
    $offer = FstavkaOffers::model()->find('final_value='.Yii::app()->getRequest()->getParam('price-to').' AND valute_id='.Yii::app()->getRequest()->getParam('valute'));
} 
if (Yii::app()->getRequest()->getParam('id')) {
    $offer = FstavkaOffers::model()->findByPk(Yii::app()->getRequest()->getParam('id'));
}   

$this->pageTitle=Yii::t('all','Коммерческая недвижимость')
                .($offer 
                  ? ($property->is_ceil 
                     ? ' | Аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой в год до '
                             .$offer->final_value.' руб. '.'в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' с арендной ставкой до '
                             .$offer->final_value.' руб./год целиком, без посредников по стоимости аренды от собственника Москвы.'
                     : ' | Аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой в год до '
                             .$offer->final_value.' руб. '.'в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' с арендной ставкой '
                      .$offer->final_value.' руб./год в торговом, бизнес центре, парке, особняке, банке, здании, жилом доме,'
                      .' комлексе без посредников от собственника Москвы.')
                  : ($property->is_ceil 
                     ? ' | Аренда '.mb_strtolower($property->namewhats,'UTF-8').' до арендной ставки в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' по арендную ставку в год, без посредников по стоимости аренды от собственника Москвы.' 
                     : ' | Аренда '.mb_strtolower($property->namewhats,'UTF-8').' до арендной ставки в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' в бизнес центре, парке, особняке, банке, административном здании, жилом доме, комлексе,'
                      .' торговом центре по арендную ставку в год, без посредников по стоимости аренды от собственника Москвы.'));
                    //.($property->seo_title ? ', '.$property->seo_title : '')
                    //         ." - ".str_replace('офисов','офиса', Yii::t('all',Yii::app()->name));

if ($offer) $this->pageDescription= trim($offer->seo_desc)<>'' 
                                        ? 'Здесь отобраны предложения по аренде '.mb_strtolower($property->namewhats,'UTF-8')
                                          .' с арендной ставкой в год до '.$offer->final_value.' руб.'.' в Москве. '                                          
                                          .$offer->seo_desc 
                                        : 'Здесь отобраны предложения по аренде '.mb_strtolower($property->namewhats,'UTF-8')
                                          .' с арендной ставкой в год до '.$offer->final_value.' руб.'.' в Москве.';                   
else $this->pageDescription= 'Здесь отобраны предложения по аренде '.mb_strtolower($property->namewhats,'UTF-8').' до различной арендной ставки в Москве. ';
$this->pageDescription=$this->pageDescription.($property->seo_description ? ' '.$property->seo_description : '');

if ( !$property->seo_description && !$offer->seo_desc) {
    if ($offer) {
        $this->pageDescription = ($property->is_ceil 
                                  ? 'Предложения включают аренду '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой в год до '.$offer->final_value.' руб.'.' в Москве. '
                                   .'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' целиком с арендной ставкой до '.$offer->final_value.' руб./год'
                                   .' отличается адресом, назначением, свойствами, удаленностью от метро, классом, стоимостью, валютой.'
                                  : 'Предложения включают аренду '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой в год до '.$offer->final_value.' руб.'
                                   .' в бизнес центре, парке, жилом комплексе, доме, особняке, здании, медцентре, банке Москвы.'
                                   .' Аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой до '.$offer->final_value.' руб./год'
                                   .' отличается объектом размещения, адресом, назначением, свойствами,'
                                   .' удаленностью от метро, классом, стоимостью, валютой.');
    }else{
        $this->pageDescription = ($property->is_ceil 
                                  ? 'Предложения включают аренду '.mb_strtolower($property->namewhats,'UTF-8').' до арендной ставки '
                                   .' в Москве. Аренда '.mb_strtolower($property->namewhats,'UTF-8').' целиком по различную арендную ставку в год '
                                   .' также отличается адресом, назначением, свойствами, удаленностью от метро, классом, стоимостью, валютой.'
                                  : 'Предложения включают аренду '.mb_strtolower($property->namewhats,'UTF-8').' до арендной ставки '
                                   .' в бизнес центре, парке, жилом комплексе, доме, особняке, здании, медцентре, банке Москвы.'
                                   .' Аренда '.mb_strtolower($property->namewhats,'UTF-8').' по различную арендную ставку в год отличается объектом размещения, адресом, назначением,'
                                   .' свойствами, удаленностью от метро, классом, стоимостью, валютой.');
        
    }
}

if ($offer) $this->pageKeywords=trim($offer->seo_keywords)<>'' 
                                ? array_merge( explode(',', 
                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' до '.$offer->final_value.' руб.'
                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' до '.$offer->final_value.' рублей'
                                        
                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' руб.' 
                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' рублей' 
                                        
                                                         /*', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве */' до '.$offer->final_value.' руб.'
                                                         ./*', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве */', до '.$offer->final_value.' рублей'
                                        
                                                         ./*', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве */', арендная ставка меньше '.$offer->init_value.' руб.' 
                                                         ./*', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве */', арендной ставке меньше '.$offer->init_value.' рублей'                                                                                                 
                                        
                                                         .', аренда '.mb_strtolower($property->namewhats,'UTF-8')
                                                         .', аренда '.mb_strtolower($property->namewhat,'UTF-8')
                                                         //+.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве'
                                                         //+.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' москвы'
                                                         //+.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' москва'
                                                         //+.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в москве'
                                                         //+.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' москвы'
                                                         //+.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' москва'
                                                         .', '.mb_strtolower($property->namewhats,'UTF-8')
                                                         .', '.mb_strtolower($property->namewhat,'UTF-8')                                                         
                                        
                                                         .($property->title 
                                                                       ? 
                                                                        //.', аренда '.mb_strtolower($property->title,'UTF-8').' до '.$offer->final_value.' руб.'
                                                                        //.', аренда '.mb_strtolower($property->title,'UTF-8').' до '.$offer->final_value.' рублей'

                                                                        //.', аренда '.mb_strtolower($property->title,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' руб.'
                                                                        //.', аренда '.mb_strtolower($property->title,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' рублей'

                                                                        /*', аренда '.mb_strtolower($property->title,'UTF-8').' в москве */', до '.$offer->final_value.' руб.'
                                                                        ./*', аренда '.mb_strtolower($property->title,'UTF-8').' в москве */', до '.$offer->final_value.' рублей'
                                                                        ./*', аренда '.mb_strtolower($property->title,'UTF-8').' в москве */', с арендной ставкой меньше '.$offer->final_value.' рублей'
                                                                        ./*', аренда '.mb_strtolower($property->title,'UTF-8').' в москве */', с арендной ставкой меньше '.$offer->final_value.' руб.'
                                                                        //+.', аренда '.mb_strtolower($property->title,'UTF-8').' в москве '
                                                                        //+.', аренда '.mb_strtolower($property->title,'UTF-8').' москвы '
                                                                        //+.', аренда '.mb_strtolower($property->title,'UTF-8').' москва '
                                                                        //+.', аренда '.mb_strtolower($property->title,'UTF-8')
                                                                        .', '.mb_strtolower($property->title,'UTF-8') : '')    
                                                                       
                                                          .($property->abbr 
                                                                         ? 
                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' до '.$offer->final_value.' руб.'
                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' до '.$offer->final_value.' рублей'

                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' руб.'
                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' рублей'

                                                                         /*', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве */', до '.$offer->final_value.' руб.'                                                                        
                                                                        ./*', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве */', до '.$offer->final_value.' рублей'
                                                                        ./*', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве */', по арендной ставке меньше '.$offer->final_value.' руб.'
                                                                        ./*', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве */', по арендной ставке меньше '.$offer->final_value.' рублей'
                                                                        //+.', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве '
                                                                        //+.', аренда '.mb_strtolower($property->abbr,'UTF-8').' москвы '
                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' москва '
                                                                        .', аренда '.mb_strtolower($property->abbr,'UTF-8')
                                                                        .', '.mb_strtolower($property->abbr,'UTF-8') : '')  
                                                            .', снять, арендная ставка, ставка, меньше, до, руб., рублей, каталог, недвижимость, аренда, москва, в москве, москвы, класса, коммерческой недвижимости, округ, район, метро, удаленность, вид, свойства, площадь, м2, планировка, парковка, стоимость'),
                                                            // Отсеиваиваем ключевые слова для короткой формы
                                                            $short ? HRu::iskeyintxt(explode(',',$offer->seo_keywords),                                                   
                                                                                 HRu::cutstr($offer->anons,750, false, '.','. ')
                                                                            .' '.HRu::cutstr($offer->detile,1500, false, '.','. ')
                                                                            .' '.HRu::cutstr($offer->description,1000, false, '.','. '))
                                                            : explode(',',$offer->seo_keywords)                                               
                                             )                                                           
                                : explode(',', //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' до '.$offer->final_value.' руб.'
                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' до '.$offer->final_value.' рублей'
                                        
                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' руб.' 
                                                         //.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' рублей' 
                                        
                                                         /*', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве */' до '.$offer->final_value.' руб.'
                                                         ./*', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве */', до '.$offer->final_value.' рублей'
                                        
                                                         ./*', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве */', арендная ставка меньше '.$offer->init_value.' руб.' 
                                                         ./*', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве */', арендной ставке меньше '.$offer->init_value.' рублей'                                                                                                 
                                        
                                                         .', аренда '.mb_strtolower($property->namewhats,'UTF-8')
                                                         .', аренда '.mb_strtolower($property->namewhat,'UTF-8')
                                                         //+.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' в москве'
                                                         //+.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' москвы'
                                                         //+.', аренда '.mb_strtolower($property->namewhats,'UTF-8').' москва'
                                                         //+.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' в москве'
                                                         //+.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' москвы'
                                                         //+.', аренда '.mb_strtolower($property->namewhat,'UTF-8').' москва'
                                                         .', '.mb_strtolower($property->namewhats,'UTF-8')
                                                         .', '.mb_strtolower($property->namewhat,'UTF-8')                                                         
                                        
                                                         .($property->title 
                                                                       ? 
                                                                        //.', аренда '.mb_strtolower($property->title,'UTF-8').' до '.$offer->final_value.' руб.'
                                                                        //.', аренда '.mb_strtolower($property->title,'UTF-8').' до '.$offer->final_value.' рублей'

                                                                        //.', аренда '.mb_strtolower($property->title,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' руб.'
                                                                        //.', аренда '.mb_strtolower($property->title,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' рублей'

                                                                        /*', аренда '.mb_strtolower($property->title,'UTF-8').' в москве */', до '.$offer->final_value.' руб.'
                                                                        ./*', аренда '.mb_strtolower($property->title,'UTF-8').' в москве */', до '.$offer->final_value.' рублей'
                                                                        ./*', аренда '.mb_strtolower($property->title,'UTF-8').' в москве */', с арендной ставкой меньше '.$offer->final_value.' рублей'
                                                                        ./*', аренда '.mb_strtolower($property->title,'UTF-8').' в москве */', с арендной ставкой меньше '.$offer->final_value.' руб.'
                                                                        //+.', аренда '.mb_strtolower($property->title,'UTF-8').' в москве '
                                                                        //+.', аренда '.mb_strtolower($property->title,'UTF-8').' москвы '
                                                                        //+.', аренда '.mb_strtolower($property->title,'UTF-8').' москва '
                                                                        //+.', аренда '.mb_strtolower($property->title,'UTF-8')
                                                                        .', '.mb_strtolower($property->title,'UTF-8') : '')    
                                                                       
                                                          .($property->abbr 
                                                                         ? 
                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' до '.$offer->final_value.' руб.'
                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' до '.$offer->final_value.' рублей'

                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' руб.'
                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' с арендной ставкой меньше '.$offer->final_value.' рублей'

                                                                         /*', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве */', до '.$offer->final_value.' руб.'                                                                        
                                                                        ./*', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве */', до '.$offer->final_value.' рублей'
                                                                        ./*', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве */', по арендной ставке меньше '.$offer->final_value.' руб.'
                                                                        ./*', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве */', по арендной ставке меньше '.$offer->final_value.' рублей'
                                                                        //+.', аренда '.mb_strtolower($property->abbr,'UTF-8').' в москве '
                                                                        //+.', аренда '.mb_strtolower($property->abbr,'UTF-8').' москвы '
                                                                        //.', аренда '.mb_strtolower($property->abbr,'UTF-8').' москва '
                                                                        .', аренда '.mb_strtolower($property->abbr,'UTF-8')
                                                                        .', '.mb_strtolower($property->abbr,'UTF-8') : '')  
                                                            .', снять, арендная ставка, ставка, меньше, до, руб., рублей, каталог, недвижимость, аренда, москва, в москве, москвы, класса, коммерческой недвижимости, округ, район, метро, удаленность, вид, свойства, площадь, м2, планировка, парковка, стоимость');                   
else $this->pageKeywords=explode(',', 'снять, аренда в москве, аренда москвы, аренда по ставке, ставка, ставке, руб., рублей, каталог недвижимости, недвижимость, аренда, москва, в москве, москвы, класса, коммерческой недвижимости, округ, район, улица, метро, удаленность, вид, свойства, площадь, планировка, парковка, стоимость в месяц, налогооблажение');    

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

if ($offer&&$property->namewhats) {
    
        $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'до арендной ставки'=>array('realestates/stavkaTo'),
             'арендная ставка до '.$offer->final_value.' руб./год'=>Yii::app()->createUrl('realestates/stavkaFrom',array('id'=>$offer->id)),
             'по видам'=>array('realestates/vid'),
              mb_strtolower($property->nameov,'UTF-8')=>Yii::app()->createUrl('realestates/vid',array('id'=>$property->id)),
             'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой до '.$offer->final_value.' руб./год'.' в Москве' 
        );

} else if (!$offer && $property->namewhats) {
    
        $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'до арендной ставки'=>array('realestates/stavkaTo'),
             'по видам'=>array('realestates/vid'),
              mb_strtolower($property->nameov,'UTF-8')=>Yii::app()->createUrl('realestates/vid',array('id'=>$property->id)),
             'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' c арендной ставкой до '.$offer->final_value.' руб./год'.' в Москве'
        );
} else if ($offer && !$property->namewhats) {

        $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'до арендной ставки'=>array('realestates/stavkaTo'),
             'арендная ставка до '.$offer->final_value.' руб./год'=>Yii::app()->createUrl('realestates/stavkaTo',array('id'=>$offer->id)),
             'по видам'=>array('realestates/vid'),
             'Аренда коммерческой недвижимости c арендной ставкой до '.$offer->final_value.' руб./год'.' в Москве' 
        );    
} else {
        $this->breadcrumbs=array(	
             Yii::t('menu-adm','List Realestates')=>array('index'),
             'до арендной ставки'=>array('realestates/stavkaFrom'),
             'по видам'=>array('realestates/vid'),
             'Аренда коммерческой недвижимости до различной арендной ставки в Москве'
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
                ($offer
                  ? ($property->is_ceil 
                     ? 'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой до '.$offer->final_value.' руб.'.' в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' целиком по арендной ставке до '.$offer->final_value.' руб./год'.' без посредников по стоимости аренды'
                      .' от собственника Москвы.'
                     : 'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' с арендной ставкой до '.$offer->final_value.' руб.'.' в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' по арендной ставке до '.$offer->final_value.' руб./год'.' в бизнес центре, парке,'
                      .' особняке, банке, здании, жилом доме, комлексе без посредников от собственника Москвы.')
                  : ($property->is_ceil 
                     ? 'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' до арендной ставки в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' целиком по различную арендную ставку, без посредников по стоимости аренды от собственника Москвы.' 
                     : 'Аренда '.mb_strtolower($property->namewhats,'UTF-8').' до арендной ставки в Москве без комиссии.'
                      .' Снять '.mb_strtolower($property->title,'UTF-8').' в бизнес центре, парке, особняке, банке, адм.здании, жилом доме, комлексе'
                      .' по различную арендную ставку, без посредников по стоимости аренды от собственника Москвы.'));?>        
</h1> 
    
<?php if ( $offer->anons || $property->anons) {  ?>    
<div class="desc anons m-b18 fs-11 ff-Arial justify">    
    <?php if ( $offer->anons ) {  ?>      
    <div>
    <?php if ($short) { ?>    
    <?php echo str_replace(",","",HRu::cutstr($offer->anons,750, false, '.','. ')); ?>    
    <?php } else { ?>    
    <?php echo $offer->anons; ?>
    <?php } ?>    
    </div>    
    <?php } ?>
    <?php if ( $property->anons ) {  ?>    
    <div <?php echo ($offer->anons ? 'class="m-t10"' : '') ?>>
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
    //$model->search()->pagination->route = Yii::app()->createUrl('/realestates/stavkaTo', array('id'=>$offer->id)); 
    $model->search()->pagination->route = Yii::app()->createUrl('/ru/realestates/stavkaTo/'.$offer->id.'/vid/'.$property->id); 
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
                        'realestateType'=>array(                                
                                'asc'=>'realestateType.title ASC',
                                'desc'=>'realestateType.title DESC',
                                'default'=>'desc',
                        ),                      
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
            /*'realestateVid'=>'Вид',*/
            'realestateType'=>'В/цел',
            'realestateClass'=>'Класс', 
            'street'=>'Улица',
        ),
        'sorterHeader'=>'Сортировать по:',
        'template'=>"<hr class='m-t5 m-b5' />{sizer}{sorter}\n<div style='float:left;display:inline-block;'>{pager}</div>{summary}\n<br/>{items}\n<div style='clear:both'></div><div style='float:left;display:inline-block;'>{pager}</div>{summary}",                    
        'sizerVariants'=>  HRu::cutarray(array(6, 8, 10, 12, 16, 20, 24, 30),$model->search()->getTotalItemCount()),
        'sizerAttribute'=>'size',
        'sizerHeader'=>'Выводить по: ',
        'short'=>$short,
        'beforeAjaxUpdate'=> $beforeAjaxUpdate,
        'afterAjaxUpdate'=> $afterAjaxUpdate,    
        //'ajaxUrl'=>Yii::app()->createUrl('/ru/realestates/stavkaTo/'.$offer->id.'/vid/'.$property->id),
)); ?>    

   <?php   $this->renderPartial('_send',array('model'=>$model_claim));?>

    </div>
    <hr class="m-t10 m-b8" />
    <?php if ($is_list) { ?>
    <?php   $this->renderPartial('/site/_list_metros', array('model'=>$model)); ?>  
    <?php } ?>
    
    <?php if ( $offer->detile || $property->detile ) {  ?>    
    <div class="desc detile m-t8 m-b14 fs-10 ff-tahoma">    
        <?php if ( $offer->detile ) {  ?>      
            <div>
            <?php if ($short) { ?>    
            <?php echo str_replace(",","",HRu::cutstr($offer->detile,1500, false, '.','. ')); ?>    
            <?php } else { ?>    
            <?php echo $offer->detile; ?>
            <?php } ?>                             
            </div>    
        <?php } ?>
        <?php if ( $property->detile ) {  ?>    
            <div <?php echo ($offer->detile ? 'class="m-t10"' : '') ?>>
            <?php if ($short) { ?>    
            <?php echo str_replace(",","",HRu::cutstr($property->detile,1500, false, '.','. ')); ?>    
            <?php } else { ?>    
            <?php echo $property->detile; ?>
            <?php } ?>                   
            </div>    
        <?php } ?>        
    </div>
    <? } ?> 
    
    <?php if ($is_list) { ?>
    <?php   $this->renderPartial('/site/_list_streets', array('model'=>$model)); ?>  
    <?php } ?>
    
    <?php if ( $offer->description || $property->description ) {  ?>    
    <div class="desc detile m-b18 fs-10 ff-tahoma">    
        <?php if ( $offer->description ) {  ?>      
            <div>
            <?php if ($short) { ?>    
            <?php echo str_replace(",","",HRu::cutstr($offer->description,1000, false, '.','. ')); ?>    
            <?php } else { ?>    
            <?php echo $offer->description; ?>
            <?php } ?>                 
            </div>    
        <?php } ?>
        <?php if ( $property->description ) {  ?>    
            <div <?php echo ($offer->description ? 'class="m-t10"' : '') ?>>
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