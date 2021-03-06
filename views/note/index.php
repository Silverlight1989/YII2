<?php
 
 use yii\helpers\Html;
 use yii\grid\GridView;
 
 /* @var $this yii\web\View */
 /* @var $searchModel app\models\search\NoteSearch */
 /* @var $dataProvider yii\data\ActiveDataProvider */
 
-$this->title = 'Notes';
+$this->title = 'Заметки';
 $this->params['breadcrumbs'][] = $this->title;
 ?>
 <div class="note-index">
 
     <h1><?= Html::encode($this->title) ?></h1>
     <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
 
     <p>
        <?= Html::a('Создать заметку', \yii\helpers\Url::to(['note/create']), ['class' => 'btn btn-success']) ?>
     </p>
 
 
     <?= GridView::widget([
         'dataProvider' => $dataProvider,
         'filterModel' => $searchModel,
         'columns' => [
             [
                 'class' => 'yii\grid\SerialColumn',
             ],
             'id',
             'text:ntext',
             'author.name',
             'date_create',
             [
                 'class' => 'yii\grid\ActionColumn',
                 'buttons' => [
                    'update' => function ($url, \app\models\Note $model) {
                        return (new \app\objects\CheckNoteAccess())->execute($model) === \app\models\Access::LEVEL_EDIT ? Html::a('Обновить', $url) : '';
                   },
                    'delete' => function ($url, \app\models\Note $model) {
                        return (new \app\objects\CheckNoteAccess())->execute($model) === \app\models\Access::LEVEL_EDIT ? Html::a('Удалить', $url) : '';
                     },
                 ],
             ],
         ],
     ]); ?>
 
 </div>