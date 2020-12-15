<?php
/* @var $this \yii\web\View */
/* @var $category \andrewdanilov\custompages\common\models\Category */
/* @var $pages \andrewdanilov\custompages\common\models\Page[] */

use andrewdanilov\custompages\frontend\assets\CustomPagesAsset;

$this->title = $category->meta_title ?: $category->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $category->meta_description,
]);

CustomPagesAsset::register($this);
?>
<section class="section-main">
    <div class="container">
        <ul class="breadcrumbs">
            <li class="item"></li>
            <li class="item"></li>
        </ul>
        <div class="content">
            <h1><?= $category->title ?></h1>
            <div class="page-text">
                <?= $category->processedText ?>
            </div>
            <div class="categoty-list">
                <?php foreach ($pages as $page) { ?>
                <a href="<?= \yii\helpers\Url::to(['default/page', 'id' => $page->id]) ?>" class="category-list-item">
                    <div class="cover"><img src="<?= $page->image ?>" alt=""></div>
                    <div class="title" ><?= $page->title ?></div>
                    <div>
                        <?= $page->shortText ?>
                    </div>
                </a>
                <?php } ?>
            </div>
        </div>
    </div>
</section>