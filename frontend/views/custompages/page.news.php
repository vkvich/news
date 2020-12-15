<?php

use andrewdanilov\custompages\frontend\assets\CustomPagesAsset;

/* @var $this \yii\web\View */
/* @var $page \andrewdanilov\custompages\common\models\Page */

$this->title = $page->meta_title ?: $page->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $page->meta_description,
]);

CustomPagesAsset::register($this);
?>
<section class="section-main">
    <div class="container">
        <ul class="breadcrumbs">
            <li class="item">Новости</li>
            <li class="item"></li>
        </ul>
        <div class="content">
            <h1><?= $page->title ?></h1>
            <div class="page-image">
                <img src="<?= $page->image ?>" alt=""/>
            </div>

            <div class="page-text">
                <?= $page->processedText ?>
            </div>

            <div class="page-source">
                Источник: <?= $page->source ?>
            </div>
            <div class="sidebar">
                <div class="categoty-list">
                    <?php foreach ($page -> category->getPages()->andWhere(['not', ['id' => $page->id]])->all() as $page_child) { ?>
                    <a href="<?= \yii\helpers\Url::to(['default/page', 'id' => $page_child->id]) ?>" class="category-list-item">
                        <div class="cover"><img src="<?= $page_child->image ?>" alt=""></div>
                        <div class="title"><?= $page_child->title ?></div>
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

