 <?php
 
 namespace app\controllers;
 
 use Yii;
 use app\models\Note;
 use app\models\search\NoteSearch;
 use yii\filters\AccessControl;
 use yii\web\Controller;
 use yii\web\NotFoundHttpException;
 use yii\filters\VerbFilter;
 
 /**
  * NoteController implements the CRUD actions for Note model.
  */
 class NoteController extends Controller
 {
     /**
      * {@inheritdoc}
      */
     public function behaviors()
     {
         return [
             'access' => [
                 'class' => AccessControl::class,
-                'only' => ['my', 'create', 'update', 'delete', 'shared'],
-//				'except' => ['shared'],
+//                'only' => ['my', 'create', 'update', 'delete', 'shared'],
 @Doka-NT
Doka-NT 4 days ago
комментарии лучше удалять из коммита

 @Silverlight1989	Reply…
+				'except' => ['shared'],
                 'rules' => [
                     [
                         'roles' => ['@'],
                         'allow' => true,
                     ],
                 ],
             ],
             'verbs' => [
-                'class' => VerbFilter::className(),
+                'class' => VerbFilter::class,
                 'actions' => [
                     'delete' => ['POST'],
                 ],
             ],
         ];
     }
 
 
     /**
      * @return string
      */
     public function actionMy()
     {
         $searchModel = new NoteSearch();
         $dataProvider = $searchModel->search(
             [
                 'NoteSearch' => [
                     'creator' => \Yii::$app->user->id,
                 ],
             ]
         );
         return $this->render(
             'index',
             [
                 'searchModel' => $searchModel,
                 'dataProvider' => $dataProvider,
             ]
         );
     }
 
 
     /**
      * @return string
      */
     public function actionShared()
     {
         $searchModel = new NoteSearch();
         $dataProvider = $searchModel->search(['user_id' => \Yii::$app->user->id]);
         return $this->render('index', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);
     }
 
     /**
      * Lists all Note models.
      * @return mixed
      */
     public function actionIndex()
     {
         $searchModel = new NoteSearch();
         $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
         return $this->render('index', [
             'searchModel' => $searchModel,
             'dataProvider' => $dataProvider,
         ]);
     }
 
     /**
      * Displays a single Note model.
      * @param integer $id
      * @return mixed
      * @throws NotFoundHttpException if the model cannot be found
      */
     public function actionView($id)
     {
         return $this->render('view', [
             'model' => $this->findModel($id),
         ]);
     }
 
     /**
      * Creates a new Note model.
      * If creation is successful, the browser will be redirected to the 'view' page.
      * @return mixed
      */
     public function actionCreate()
     {
         $model = new Note();
 
+
+        var_dump($model->getErrors(), $model->load(Yii::$app->request->post()), $model->save(false));
 @Doka-NT
Doka-NT 4 days ago
Возможно, пропустил отладочный var_dump при коммите

 @mrNkravchenko
mrNkravchenko 2 days ago  Owner
Да, пропустил, все выискивал почему не заходит в бефорсейф, но на прошлом уроке обьяснил, что сначала бефор валидэйт идет

 @Silverlight1989	Reply…
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
+
             return $this->redirect(['view', 'id' => $model->id]);
         }
 
         return $this->render('create', [
             'model' => $model,
         ]);
     }
 
     /**
      * Updates an existing Note model.
      * If update is successful, the browser will be redirected to the 'view' page.
      * @param integer $id
      * @return mixed
      * @throws NotFoundHttpException if the model cannot be found
      */
     public function actionUpdate($id)
     {
         $model = $this->findModel($id);
 
         if ($model->load(Yii::$app->request->post()) && $model->save()) {
             return $this->redirect(['view', 'id' => $model->id]);
         }
 
         return $this->render('update', [
             'model' => $model,
         ]);
     }
 
     /**
      * Deletes an existing Note model.
      * If deletion is successful, the browser will be redirected to the 'index' page.
      * @param integer $id
      * @return mixed
      * @throws NotFoundHttpException if the model cannot be found
      */
     public function actionDelete($id)
     {
-        $this->findModel($id)->delete();
+        try {
+            $this->findModel($id)->delete();
+        } catch (\Exception $exception) {
+            Yii::warning($exception, Yii::t('app', 'Mistake'));
 @Doka-NT
Doka-NT 4 days ago
Прекрасно! Логгирование ошибок это отличная практика и ужасная боль если его нет)

 @mrNkravchenko
mrNkravchenko 2 days ago  Owner
Ага, хотел не писать, но шторм ругается если не ловить Эксепшины

 @Silverlight1989	Reply…
+        }
 
         return $this->redirect(['index']);
     }
 
     /**
      * Finds the Note model based on its primary key value.
      * If the model is not found, a 404 HTTP exception will be thrown.
      * @param integer $id
      * @return Note the loaded model
      * @throws NotFoundHttpException if the model cannot be found
      */
     protected function findModel($id)
     {
         if (($model = Note::findOne($id)) !== null) {
             return $model;
         }
 
         throw new NotFoundHttpException('The requested page does not exist.');
     }
 }