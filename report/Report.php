<?php

namespace frontend\modules\report;

/**
 * report module definition class
 */
class Report extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\report\controllers';

    /**
     * {@inheritdoc}
     */
    public function beforeAction($action)
    {

        if (!parent::beforeAction($action))
            return false;


        if (!Yii::$app->user->isGuest && \Yii::$app->user->can('view_reports'))
            return true;


        Yii::$app->getResponse()->redirect(Yii::$app->getHomeUrl());
        return false;

    }

    public function init()
    {
        parent::init();
        // custom initialization code goes here
        \Yii::configure($this, require __DIR__ . '/config/main.php');
    }

    public function getAllowedEvents()
    {
        return isset($this->params['allowedEvents']) ? $this->params['allowedEvents'] : false;
    }

}
