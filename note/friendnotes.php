 <?= ListView::widget([
         'dataProvider' => $dataProvider,
         'itemOptions' => ['class' => 'item'],
		   'itemView' => function ($model) {
+            return $this->render('note_template', [
+                'model' => $model,
+            ]);
         },
     ]) ?>