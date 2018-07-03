<?class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
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
 ?>