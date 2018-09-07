<?php

$this->title = 'Отчет';
use shop\helpers\Hdate;
?>


<div class="container_report wd">
    <div style="padding:10px 0 35px;" >
        <a href="<?=\yii\helpers\Url::to(['index'])?>"> <<< Вернуться к списку мероприятий</a>
    </div>
    <h4><?= $event->name?></h4>
    <p>Дата начала: <?=Hdate::StamptoDate($event->SDate)?></p>
    <p>Дата окончания: <?=Hdate::StamptoDate($event->EDate)?></p>
    <table class="table table-striped" id="result">
        <thead>
        <tr>
            <th>Тип билета</th>
            <th>Кол-во</th>
            <th>Сумма</th>
            <th>Проходы</th>
        </tr>
        </thead>
        <tbody>
        <? $sum_count = 0;$sum_summ = 0;$sum_passes = 0;
        foreach ($report as $value): ?>
            <tr>
                <td><?= $value['name']?></td>
                <td><?= $value['count']?></td>
                <td><?= $value['summ']?></td>
                <td><?= $value['passes']?></td>
            </tr>
            <?php $sum_count+=$value['count'];$sum_summ+=$value['summ'];$sum_passes+=$value['passes']; ?>
        <? endforeach; ?>
        <tr style="font-weight: bold">
            <td>Итого</td>
            <td><?=$sum_count?></td>
            <td><?=$sum_summ?></td>
            <td><?=$sum_passes?></td>
        </tr>
        </tbody>
    </table>
    <br>
</div>
