<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\test\EntryForm;
use yii\data\Pagination;
use app\models\test\Test;


class TestController extends Controller
{
    public function actionIndex($msg="Helloworld")
    {
      return $this->render("index",array("msg"=>$msg));
    }
    
     public function actionEntry()
    {
        $model = new EntryForm;
 
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // 验证 $model 收到的数据
 
            // 做些有意义的事 ...
 
            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // 无论是初始化显示还是数据验证错误
            return $this->render('entry', ['model' => $model]);
        }
    }
    
    public function actionT(){

            // 获取 country 表的所有行并以 name 排序
//        $data = Test::find()->orderBy('name')->all();
        $query = Test::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);
 
        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
 
        return $this->render('t', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);

    }
   
   
}
