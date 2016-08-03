<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\selectize\SelectizeDropDownList;
use dosamigos\selectize\SelectizeTextInput;
use dosamigos\leaflet\plugins\makimarker\MakiMarker;
use dosamigos\leaflet\types\LatLng;
use dosamigos\leaflet\layers\Marker;
use dosamigos\datetimepicker\DateTimePicker;
use dosamigos\editable\Editable;
use pendalf89\filemanager\widgets\TinyMCE;
use dosamigos\fileupload\FileUploadUI;
use dosamigos\disqus\Comments;
use dosamigos\disqus\CommentsCount;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\modules\customer\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>
<?php

$this->registerJs(
 '$("document").ready(function(){
      $("#new_country").on("pjax:end", function() {
          $.pjax.reload({container:"#countries"});  //Reload GridView
      });
  });'
);
?>

<div class="customer-form">
  <?php yii\widgets\Pjax::begin(['id' => 'new_country']) ?>
    <?php $form = ActiveForm::begin(); ?>
    <?
    // Initialize plugin
    //$makimarkers = new MakiMarker(['name' => 'makimarker']);
    // install
    // $leafLet->installPlugin($makimarkers);
    // // sample location
    // $center = new LatLng(['lat' => 51.508, 'lng' => -0.11]);
    // // generate icon through its icon
    // $marker = new Marker([
    //     'latLng' => $center,
    //     'icon' => $leafLet->plugins->makimarker->make("rocket",['color' => "#b0b", 'size' => "m"]),
    //     'popupContent' => 'Hey! I am a marker' ]);
    ?>
        <p><b>วันที่ </b> </p>
        <?= DateTimePicker::widget([
        'model' => $model,
        'attribute' => 'name',
        'language' => 'en',
        'size' => 'ms',
        'clientOptions' => [ 'autoclose' => true, 'format' => 'dd MM yyyy - HH:ii P',
        'todayBtn' => true ] ]);?>

        <?= Comments::widget([
            'shortname' => '{yourforumshortname}',
            'identifier' => 'article_identifier' ]); ?>

        <?= CommentsCount::widget([
            'shortname' => '{yourforumshortname}',
            'identifier' => 'article_identifier' ]); ?>

        <!-- Editable::widget( [
        'model' => $model,
        'attribute' => 'name',
        'url' => 'site/test',
        'type' => 'datetime',
        'mode' => 'pop',
        'clientOptions' => [ 'placement' => 'right',
        'format' => 'yyyy-mm-dd hh:ii',
        'viewformat' => 'dd/mm/yyyy hh:ii',
        'datetimepicker' => [ 'orientation' => 'top auto' ] ] ]);?> -->

       <!-- $form->field($model, 'content')->widget(TinyMCE::className(), [
        'clientOptions' => [
               'language' => 'ru',
            'menubar' => false,
            'height' => 500,
            'image_dimensions' => false,
            'plugins' => [
                'advlist autolink lists link image charmap print preview anchor searchreplace visualblocks code contextmenu table',
            ],
            'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | code',
        ],
    ]); ?> -->

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

     <!-- //$form->field($model, 'bank_info')->textInput(['maxlength' => true])


     //$form->field($model, 'tax')->textarea(['rows' => 6]) -->


    <?= SelectizeDropDownList::widget(
                  [ 'name' => 'tags',
                    'value' => 'love, this, game',
                    'clientOptions' => [  // [...]
                    ],
                  ]);
     ?>

     <?= FileUploadUI::widget([
        'model' => $model,
        'attribute' => 'name', // ต้องสร้าง attribute เป็นแบบรูปภาพ
        'url' => ['media/upload',
        'id' => $model->id],
        'gallery' => false,
        'fieldOptions' => [ 'accept' => 'image/*' ],
        'clientOptions' => [ 'maxFileSize' => 2000000 ],
        // ...
        'clientEvents' => [ 'fileuploaddone' => 'function(e, data) { console.log(e); console.log(data); }',
        'fileuploadfail' => 'function(e, data) { console.log(e); console.log(data); }', ],
    ]); ?>

    <!--  $form->field($model, 'tagNames')->widget(SelectizeTextInput::className(), [
          // calls an action that returns a JSON object with matched
          // tags
          'loadUrl' => ['tag/list'],
          'options' => ['class' => 'form-control'],
          'clientOptions' => [ 'plugins' => ['remove_button'],
          'valueField' => 'name',
          'labelField' => 'name',
          'searchField' => ['name'],
          'create' => true,
        ],
        ])->hint('Use commas to separate tags') ?> -->


        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>
</div>
