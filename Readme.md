### Веб-отчеты для просмотра проходов и продаж

**1. Установите пакет**
```
composer require kam2r/report v2.0.9
```
**2. Пропишите в конфиге frontend/main модуль report**
```
'report' => [
            'class' => 'kam2r\report\report\Report',
            'params' => [
                'allowedEvents' => [
                    '3' => [11, 22, 15, 5415,5444]
                ]
            ]
        ],
        
```
Если вы хотите ограничить некоторым пользователям просмотр отчетов, пропишите в `allowedEvents ` user_id и мероприятия, которые разрешены к просмотру.

**3. Выполните миграции**
```
php yii migrate/up --migrationPath=@vendor/kam2r/report/report/migrations

```

**4. Задайте через rbac необходимому юзеру роль Reporter**
```
Зайдите по адресу /rbac будучи админом. найдите необходимого юзера и дайте ему роль Reporter.
```
