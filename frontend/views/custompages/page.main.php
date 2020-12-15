<?php

use andrewdanilov\custompages\frontend\assets\CustomPagesAsset;
use andrewdanilov\custompages\common\models\Category;

/* @var $this \yii\web\View */
/* @var $page \andrewdanilov\custompages\common\models\Page */

$this->title = $page->meta_title ?: $page->title;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $page->meta_description,
]);

CustomPagesAsset::register($this);

?>

<div class="section">
    <div class="container">

        <div class="sidebar">
            <div class="categoty-list">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            One of three columns
                        </div>
                        <div class="col-sm">
                            One of three columns
                        </div>
                        <div class="col-sm">
                            One of three columns
                        </div>
                    </div>
                </div>
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
