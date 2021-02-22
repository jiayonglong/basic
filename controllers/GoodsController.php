<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Text;
use yii\data\Pagination;
class GoodsController extends Controller
{
    public $layout='index';
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionGoods()
    {
        return $this->render('goods');
    }
    public function actionAdd()
    {
        return $this->render('add');
    }
}
