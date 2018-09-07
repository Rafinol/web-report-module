<?php

namespace frontend\modules\report\controllers;

use frontend\modules\report\services\Eventsrepo;
use frontend\modules\report\services\Repo;
use shop\entities\Event;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\HttpException;

/**
 * Default controller for the `report` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionIndex()
    {
        $report_module = \Yii::$app->controller->module;
        $event_repo = new Eventsrepo($report_module->getAllowedEvents());

        $dataProvider = new ActiveDataProvider([
            'query' => $event_repo->getEventsQuery(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEvent($id)
    {
        $report_module = \Yii::$app->controller->module;
        $event_repo = new Eventsrepo($report_module->getAllowedEvents());
        if(!$event_repo->isAllowedEvent($id))
            throw new HttpException(403, 'Недостаточно прав для соверешния данной операции');
        $event = Event::findOne($id);
        $report = new Repo($event);
        return $this->render('event', compact('event','report'));
    }
}
