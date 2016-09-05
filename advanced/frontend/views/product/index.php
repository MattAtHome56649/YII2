<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\assets\ProductAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

ProductAsset::register($this);
$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
//$this->registerJsFile('@web/js/product.js');
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'description',
            'images',
            'price',
            [
                'attribute' => 'quantity',
                'value' => function ($model) {
                    return Html::textInput($model->product_id, 0, ['class' => 'quantity_field']);
                },
                'format' => 'raw'
            ],
            [   'class' => 'yii\grid\ActionColumn',
                'template'=>'{add}{remove}',
                'buttons'=>[
                  'add' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-plus"></span>', '', [
                            'title' => Yii::t('yii', 'Add'),
                            'onClick' => 'return false;',
                    ]);
                  },
                  'remove' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-minus"></span>', '', [
                            'title' => Yii::t('yii', 'Remove'),
                            'onClick' => 'return false;',
                    ]);
                  }

                ],
            ],

        ],
    ]); ?>
</div>
