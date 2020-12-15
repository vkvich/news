<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,400&display=swap" rel="stylesheet">

    <?= $this->head() ?>
    <title><?= $this->title ?></title>
</head>
<body>
<?php $this->beginBody() ?>
<section class="section-header">
    <div class="container">
        <div class="header">
            <div class="sitetitle">Новости</div>
        </div>
    </div>
</section>
<?= $content ?>
<section class="section-footer">
    <div class="container">
        <div class="footer">
            <div class="left-block">
                <div class="site-title">Новости</div>
            </div>
            <div class="copyright">(c) 2020</div>
        </div>
    </div>
</section>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>