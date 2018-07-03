<?
 namespace app\controllers;
 
-use app\models\Comment;
+use app\models\LoginForm;
+use app\models\Product;
+use app\models\Reviews;
 use Yii;
+use yii\db\Query;
 use yii\filters\AccessControl;
+use yii\filters\VerbFilter;
 use yii\web\Controller;
 use yii\web\Response;
-use yii\filters\VerbFilter;
-use app\models\LoginForm;
-use app\models\ContactForm;
 
 class SiteController extends Controller
 {
@@ -20,7 +21,7 @@ public function behaviors()
     {
         return [
             'access' => [
-                'class' => AccessControl::className(),
+                'class' => AccessControl::class,
                 'only' => ['logout'],
                 'rules' => [
                     [
@@ -62,7 +63,121 @@ public function actions()
      */
     public function actionIndex()
     {
-        return $this->render('index');
+    	\ob_start();
?>