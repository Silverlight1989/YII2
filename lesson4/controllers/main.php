
         'options' => ['class' => 'navbar-nav navbar-right'],
         'items' => [
             ['label' => 'Home', 'url' => ['/site/index']],
-            ['label' => 'About', 'url' => ['/site/about']],
-            ['label' => 'Contact', 'url' => ['/site/contact']],
             Yii::$app->user->isGuest ? (
                 ['label' => 'Login', 'url' => ['/site/login']]
             ) : (