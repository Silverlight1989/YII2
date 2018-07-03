<?php
+
+namespace app\controllers;
+
+use Yii;
+use app\models\Order;
+use app\models\OrderSearch;
+use yii\web\Controller;
+use yii\web\NotFoundHttpException;
+use yii\filters\VerbFilter;
+
+/**
+ * OrderController implements the CRUD actions for Order model.
+ */
+class OrderController extends Controller
+{
+    /**
+     * {@inheritdoc}
+     */
+    public function behaviors()
+    {
+        return [
+            'verbs' => [
+                'class' => VerbFilter::className(),
+                'actions' => [
+                    'delete' => ['POST'],
+                ],
+            ],
+        ];
+    }
+
+    /**
+     * Lists all Order models.
+     * @return mixed
+     */
+    public function actionIndex()
+    {
+        $searchModel = new OrderSearch();
+        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
+
+        return $this->render('index', [
+            'searchModel' => $searchModel,
+            'dataProvider' => $dataProvider,
+        ]);
+    }
+
+    /**
+     * Displays a single Order model.
+     * @param integer $id
+     * @return mixed
+     * @throws NotFoundHttpException if the model cannot be found
+     */
+    public function actionView($id)
+    {
+        return $this->render('view', [
+            'model' => $this->findModel($id),
+        ]);
+    }
+
+    /**
+     * Creates a new Order model.
+     * If creation is successful, the browser will be redirected to the 'view' page.
+     * @return mixed
+     */
+    public function actionCreate()
+    {
+        $model = new Order();
+
+        if ($model->load(Yii::$app->request->post()) && $model->save()) {
+            return $this->redirect(['view', 'id' => $model->id]);
+        }
+
+        return $this->render('create', [
+            'model' => $model,
+        ]);
+    }
+
+    /**
+     * Updates an existing Order model.
+     * If update is successful, the browser will be redirected to the 'view' page.
+     * @param integer $id
+     * @return mixed
+     * @throws NotFoundHttpException if the model cannot be found
+     */
+    public function actionUpdate($id)
+    {
+        $model = $this->findModel($id);
+
+        if ($model->load(Yii::$app->request->post()) && $model->save()) {
+            return $this->redirect(['view', 'id' => $model->id]);
+        }
+
+        return $this->render('update', [
+            'model' => $model,
+        ]);
+    }
+
+    /**
+     * Deletes an existing Order model.
+     * If deletion is successful, the browser will be redirected to the 'index' page.
+     * @param integer $id
+     * @return mixed
+     * @throws NotFoundHttpException if the model cannot be found
+     */
+    public function actionDelete($id)
+    {
+        $this->findModel($id)->delete();
+
+        return $this->redirect(['index']);
+    }
+
+    /**
+     * Finds the Order model based on its primary key value.
+     * If the model is not found, a 404 HTTP exception will be thrown.
+     * @param integer $id
+     * @return Order the loaded model
+     * @throws NotFoundHttpException if the model cannot be found
+     */
+    protected function findModel($id)
+    {
+        if (($model = Order::findOne($id)) !== null) {
+            return $model;
+        }
+
+        throw new NotFoundHttpException('The requested page does not exist.');
+    }
+}
  

+
+		$query = new Query();
+		$query->select(['r.id', 'r.product_id', 'r.text'])->from(['r' => '{{%reviews}}'])->where('id < 5')
+			->indexBy(function ($row) {
+				return 'review-' . $row['id'];
+			})
+			->join('inner join', ['p' => 'product'], 'r.product_id = p.id')
+ WHERE id < 5 AND text LIKE '%was%' OR text LIKE '%have%'
andWhere([
				'or',
				['like', 'text', 'was'],
				['like', 'text', 'have'],
			])
		->andFilterWhere(['id' => 5,
+				'text' => $_GET['text'] ?? ''
+			])
+		->groupBy('product_id, id, text')
+	;
+
+		var_dump(\Yii::$app->db->createCommand('SELECT 50')->queryScalar());
+
+		\var_dump($query->createCommand()->getRawSql());
+
+		foreach ($query->each() as $row) {
+			\var_dump($row);
+	}
+		$review = $query->all();
+
+		\var_dump($review);
+
+
+		\Yii::$app->db->createCommand()->update('reviews', [
+			'product_id' => 9999,
+			'text' => 'foo text bar',
+		], ['id' => 101])->execute();
+
+	\Yii::$app->db->transaction(function ($db) {
+			$db->createCommand()->delete('reviews', 'id = 101')->execute();
+});
+
+		$transaction = \Yii::$app->db->beginTransaction();
+
+		try {
+			\Yii::$app->db->createCommand()->delete('reviews', 'id = 101')->execute();
+			$transaction->commit();
+		} catch (\Exception $e) {
+			$transaction->rollBack();
+			$this->addLog($e);
+		}
+
+
+
+	\Yii::$app->db->createCommand()->batchInsert('reviews', [
+			'product_id', 'text',
+		], [
+			[8888, 'foo text'],
+		[9999, 'bar text'],
+		])->execute();
+
+		$review = Reviews::find()->indexBy('id')->one();
+		$review = new Reviews();
+	\var_dump($review->product->name);
+
+		$review->text = 'foo';
+		$review->isAttributeChanged('text');
+
+	$review->product->name = 'fofofofbar';
+		$review->product->save();
+
+
+
+		$review->save();
+
+
+		$product = new Product();
+		$product->setAttributes(
+			[
+				'name' => 'fofofofo',
+				'count' => '100',
+				'email_provider' => '123@foo.com',
+				'provider_id' => '9999',
+				'created' => '2018-06-26',
+			]
+		);
+
+	$product->save();
+		$reviews = new Reviews();
+	$reviews->text = 'foo text';
+
+$reviews->save();
+		$reviews->link('product', $product);
+
+
+		$review = Reviews::find()
+			->andWhere(['id' => 104])
+			->with('product')
+			->one();
+
+		\var_dump($review);
+
+	$review->delete();
+
+		$content = \ob_get_clean();
+
+        return $this->render('index', [
+        	'content' => $content,
+		]);
     }
 
 public function actionLogout()
 
         return $this->goHome();
     }
-
-    
-    public function actionContact()
-    {
-        $model = new ContactForm();
-        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
-            Yii::$app->session->setFlash('contactFormSubmitted');
-
-            return $this->refresh();
-        }
-        return $this->render('contact', [
-            'model' => $model,
-        ]);
-    }
-
-  
-    public function actionAbout()
-    {
-        return $this->render('about');
-    }
-
-	
-	public function actionFoo()
-	{
-		$model = new Comment(['scenario' => Comment::SCENARIO_FRONT]);
-		$model->setAttributes($_GET);
-
-		\var_dump($model->getAttributes());
-		\var_dump($model->validate());
-
-		return '';
-    }
 }
  
<?php
+
+use app\models\Reviews;
+use yii\db\Migration;
+
+class m180626_185834_reviews_add_column extends Migration
+{
+    public function safeUp()
+    {
+		$this->addColumn(Reviews::tableName(),'foo_column', $this->string());
+
+		return true;
+    }
+
+    
+    public function safeDown()
+    {
+        $this->dropColumn(Reviews::tableName(), 'foo_column');
+
+        return true;
+    }
+
+     
+    public function up()
+    {
+
+    }
+
+    public function down()
+    {
+        echo "m180626_185834_reviews_add_column cannot be reverted.\n";
+
+        return false;
+    }
+    */
+}
  
+<?php
+
+use app\models\Reviews;
+use yii\db\Migration;
+

+class m180626_190249_review_add_other_column extends Migration
+{
+    public function safeUp()
+    {
+		$this->addColumn(Reviews::tableName(),'bar_column', $this->string());
+
+	}
+
+ 
+    public function safeDown()
+    {
+		$this->dropColumn(Reviews::tableName(), 'bar_column');
+
+		return true;
+    }
+
+ 
+    public function up()
+    {
+
+    }
+
+    public function down()
+    {
+        echo "m180626_190249_review_add_other_column cannot be reverted.\n";
+
+        return false;
+    }
+    */
+}
  

+<?php
+
+namespace app\models;
+
+use Yii;
+
+/**
+ * This is the model class for table "order".
+ *
+ * @property int $id
+ * @property string $name
+ * @property double $price
+ */
+class Order extends \yii\db\ActiveRecord
+{
+    /**
+     * {@inheritdoc}
+     */
+    public static function tableName()
+    {
+        return 'order';
+    }
+
+    /**
+     * {@inheritdoc}
+     */
+    public function rules()
+    {
+        return [
+            [['name', 'price'], 'required'],
+            [['price'], 'number'],
+            [['name'], 'string', 'max' => 255],
+        ];
+    }
+
+    /**
+     * {@inheritdoc}
+     */
+    public function attributeLabels()
+    {
+        return [
+            'id' => 'ID',
+            'name' => 'Name',
+            'price' => 'Price',
+        ];
+    }
+}
  
71  models/OrderSearch.php
@@ -0,0 +1,71 @@
+<?php
+
+namespace app\models;
+
+use Yii;
+use yii\base\Model;
+use yii\data\ActiveDataProvider;
+use app\models\Order;
+
+/**
+ * OrderSearch represents the model behind the search form of `app\models\Order`.
+ */

  
56  models/Reviews.php
@@ -0,0 +1,56 @@
+<?php
+
+namespace app\models;
+
+use Yii;
+use yii\db\ActiveQuery;
+
+/**
+ * This is the model class for table "reviews".
+ *
+ * @property int $id
+ * @property int $product_id
+ * @property string $text
+ */
+class Reviews extends \yii\db\ActiveRecord
+{
+    /**
+     * {@inheritdoc}
+     */
+    public static function tableName()
+    {
+        return 'reviews';
+    }
+
+    /**
+     * {@inheritdoc}
+     */
+    public function rules()
+    {
+        return [
+            [['product_id', 'text'], 'required'],
+            [['product_id'], 'integer'],
+            [['text'], 'string'],
+        ];
+    }
+
+    /**
+     * {@inheritdoc}
+     */
+    public function attributeLabels()
+    {
+        return [
+            'id' => 'ID',
+            'product_id' => 'Product ID',
+            'text' => 'Text',
+        ];
+    }
+
+	/**
+	 * @return ActiveQuery
+	 */
+	public function getProduct(): ActiveQuery
+	{
+		return $this->hasOne(Product::class, ['id' => 'product_id']);
+    }
+}
  
7  models/User.php
@@ -4,11 +4,7 @@
 
 class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
 {
-    public $id;
-    public $username;
-    public $password;
-    public $authKey;
-    public $accessToken;
+
 
     private static $users = [
         '100' => [
@@ -33,6 +29,7 @@ class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
      */
     public static function findIdentity($id)
     {
+//    	return User::find()->where(['id' => $id]);
         return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
     }
 
  
2  views/layouts/main.php
@@ -39,8 +39,6 @@
         'options' => ['class' => 'navbar-nav navbar-right'],
         'items' => [
             ['label' => 'Home', 'url' => ['/site/index']],
-            ['label' => 'About', 'url' => ['/site/about']],
-            ['label' => 'Contact', 'url' => ['/site/contact']],
             Yii::$app->user->isGuest ? (
                 ['label' => 'Login', 'url' => ['/site/login']]
             ) : (
  
25  views/order/_form.php
@@ -0,0 +1,25 @@
+<?php
+
+use yii\helpers\Html;
+use yii\widgets\ActiveForm;
+
+/* @var $this yii\web\View */
+/* @var $model app\models\Order */
+/* @var $form yii\widgets\ActiveForm */
+?>
+
+<div class="order-form">
+
+    <?php $form = ActiveForm::begin(); ?>
+
+    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
+
+    <?= $form->field($model, 'price')->textInput() ?>
+
+    <div class="form-group">
+        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
+    </div>
+
+    <?php ActiveForm::end(); ?>
+
+</div>
  
31  views/order/_search.php
@@ -0,0 +1,31 @@
+<?php
+
+use yii\helpers\Html;
+use yii\widgets\ActiveForm;
+
+/* @var $this yii\web\View */
+/* @var $model app\models\OrderSearch */
+/* @var $form yii\widgets\ActiveForm */
+?>
+
+<div class="order-search">
+
+    <?php $form = ActiveForm::begin([
+        'action' => ['index'],
+        'method' => 'get',
+    ]); ?>
+
+    <?= $form->field($model, 'id') ?>
+
+    <?= $form->field($model, 'name') ?>
+
+    <?= $form->field($model, 'price') ?>
+
+    <div class="form-group">
+        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
+        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
+    </div>
+
+    <?php ActiveForm::end(); ?>
+
+</div>
  
21  views/order/create.php
@@ -0,0 +1,21 @@
+<?php
+
+use yii\helpers\Html;
+
+
+/* @var $this yii\web\View */
+/* @var $model app\models\Order */
+
+$this->title = 'Create Order';
+$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
+$this->params['breadcrumbs'][] = $this->title;
+?>
+<div class="order-create">
+
+    <h1><?= Html::encode($this->title) ?></h1>
+
+    <?= $this->render('_form', [
+        'model' => $model,
+    ]) ?>
+
+</div>
  
35  views/order/index.php
@@ -0,0 +1,35 @@
+<?php
+
+use yii\helpers\Html;
+use yii\grid\GridView;
+
+/* @var $this yii\web\View */
+/* @var $searchModel app\models\OrderSearch */
+/* @var $dataProvider yii\data\ActiveDataProvider */
+
+$this->title = 'Orders';
+$this->params['breadcrumbs'][] = $this->title;
+?>
+<div class="order-index">
+
+    <h1><?= Html::encode($this->title) ?></h1>
+    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
+
+    <p>
+        <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
+    </p>
+
+    <?= GridView::widget([
+        'dataProvider' => $dataProvider,
+        'filterModel' => $searchModel,
+        'columns' => [
+            ['class' => 'yii\grid\SerialColumn'],
+
+            'id',
+            'name',
+            'price',
+
+            ['class' => 'yii\grid\ActionColumn'],
+        ],
+    ]); ?>
+</div>
  
21  views/order/update.php
@@ -0,0 +1,21 @@
+<?php
+
+use yii\helpers\Html;
+
+/* @var $this yii\web\View */
+/* @var $model app\models\Order */
+
+$this->title = 'Update Order: ' . $model->name;
+$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
+$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
+$this->params['breadcrumbs'][] = 'Update';
+?>
+<div class="order-update">
+
+    <h1><?= Html::encode($this->title) ?></h1>
+
+    <?= $this->render('_form', [
+        'model' => $model,
+    ]) ?>
+
+</div>
  
37  views/order/view.php
@@ -0,0 +1,37 @@
+<?php
+
+use yii\helpers\Html;
+use yii\widgets\DetailView;
+
+/* @var $this yii\web\View */
+/* @var $model app\models\Order */
+
+$this->title = $model->name;
+$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
+$this->params['breadcrumbs'][] = $this->title;
+?>
+<div class="order-view">
+
+    <h1><?= Html::encode($this->title) ?></h1>
+
+    <p>
+        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
+        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
+            'class' => 'btn btn-danger',
+            'data' => [
+                'confirm' => 'Are you sure you want to delete this item?',
+                'method' => 'post',
+            ],
+        ]) ?>
+    </p>
+
+    <?= DetailView::widget([
+        'model' => $model,
+        'attributes' => [
+            'id',
+            'name',
+            'price',
+        ],
+    ]) ?>
+
+</div>
  
18  views/site/about.php
@@ -1,18 +0,0 @@
-<?php
-
-/* @var $this yii\web\View */
-
-use yii\helpers\Html;
-
-$this->title = 'About';
-$this->params['breadcrumbs'][] = $this->title;
-?>
-<div class="site-about">
-    <h1><?= Html::encode($this->title) ?></h1>
-
-    <p>
-        This is the About page. You may modify the following file to customize its content:
-    </p>
-
-    <code><?= __FILE__ ?></code>
-</div>
  
68  views/site/contact.php
@@ -1,68 +0,0 @@
-<?php
-
-/* @var $this yii\web\View */
-/* @var $form yii\bootstrap\ActiveForm */
-/* @var $model app\models\ContactForm */
-
-use yii\helpers\Html;
-use yii\bootstrap\ActiveForm;
-use yii\captcha\Captcha;
-
-$this->title = 'Contact';
-$this->params['breadcrumbs'][] = $this->title;
-?>
-<div class="site-contact">
-    <h1><?= Html::encode($this->title) ?></h1>
-
-    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
-
-        <div class="alert alert-success">
-            Thank you for contacting us. We will respond to you as soon as possible.
-        </div>
-
-        <p>
-            Note that if you turn on the Yii debugger, you should be able
-            to view the mail message on the mail panel of the debugger.
-            <?php if (Yii::$app->mailer->useFileTransport): ?>
-                Because the application is in development mode, the email is not sent but saved as
-                a file under <code><?= Yii::getAlias(Yii::$app->mailer->fileTransportPath) ?></code>.
-                Please configure the <code>useFileTransport</code> property of the <code>mail</code>
-                application component to be false to enable email sending.
-            <?php endif; ?>
-        </p>
-
-    <?php else: ?>
-
-        <p>
-            If you have business inquiries or other questions, please fill out the following form to contact us.
-            Thank you.
-        </p>
-
-        <div class="row">
-            <div class="col-lg-5">
-
-                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
-
-                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
-
-                    <?= $form->field($model, 'email') ?>
-
-                    <?= $form->field($model, 'subject') ?>
-
-                    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
-
-                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
-                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
-                    ]) ?>
-
-                    <div class="form-group">
-                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
-                    </div>
-
-                <?php ActiveForm::end(); ?>
-
-            </div>
-        </div>
-
-    <?php endif; ?>
-</div>
  
54  views/site/index.php
@@ -1,53 +1 @@
-<?php
-
-/* @var $this yii\web\View */
-
-$this->title = 'My Yii Application';
-?>
-<div class="site-index">
-
-    <div class="jumbotron">
-        <h1>Congratulations!</h1>
-
-        <p class="lead">You have successfully created your Yii-powered application.</p>
-
-        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
-    </div>
-
-    <div class="body-content">
-
-        <div class="row">
-            <div class="col-lg-4">
-                <h2>Heading</h2>
-
-                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
-                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
-                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
-                    fugiat nulla pariatur.</p>
-
-                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
-            </div>
-            <div class="col-lg-4">
-                <h2>Heading</h2>
-
-                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
-                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
-                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
-                    fugiat nulla pariatur.</p>
-
-                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
-            </div>
-            <div class="col-lg-4">
-                <h2>Heading</h2>
-
-                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
-                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
-                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
-                    fugiat nulla pariatur.</p>
-
-                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
-            </div>
-        </div>
-
-    </div>
-</div>
+<?=$content;?> 