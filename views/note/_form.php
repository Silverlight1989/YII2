3  views/note/_form.php
@@ -1,24 +1,25 @@
 <?php
 
 use yii\helpers\Html;
 use yii\widgets\ActiveForm;
 
 /* @var $this yii\web\View */
 /* @var $model app\models\Note */
 /* @var $form yii\widgets\ActiveForm */
 ?>
 
 <div class="note-form">
 
     <?php $form = ActiveForm::begin(); ?>
 
     <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
 
 
     <div class="form-group">
-        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
+        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
     </div>
 
     <?php ActiveForm::end(); ?>
 
+
 </div>
  
