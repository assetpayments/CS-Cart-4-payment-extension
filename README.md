## CS-Cart 4.9 payment extension

### Installation

* Backup your webstore and database
* Copy contents of UPLOAD directory to root directory of your website 
* AssetPayments directory should be copied to app/addons directory
* Open menu Add-ons -> Manage add-ons -> Browse all available add-ons
* Find AssetPayments payments extension and press Install
* Open menu Administration -> Payment methods
* Press blue plus button to add new payment method
* Configure the new module
* General settings:
  * Name - Pay by card Visa/Mastercard (AssetPayments)
  * Processor - AssetPayments
  * Template - none
  * Payment category - Credit card
  * User groups - All
  * Description - Cloud-based online payment processing platform AssetPayments
  * Status - Active
  * Icon - choose local and set path to asset.png
* Configuration:
  * Merchant Id
  * Secret key
  * Template ID (default = 19)
  * Press Create button
  
### Notes
Tested and developed with CS-Cart 4.9.3 Multivendor.

By default the module uses P (processed) status to mark successful payment and O (open) status to mark failure. If you would like to use custom status you should: 
* Add new status in Administration -> Order statuses -> Add status
* Choose status name
* Save status
* Open it again
* Look at the Status filed to find out the status letter (for example A)
* Add this letter to the top of payment script (assetpayments.php)

## Модуль оплаты CS-Cart 4.9

### Установка

* Сделайте резервную копию сайта и базы данных
* Скопируйте содержимое директории UPLOAD в корень сайта по фтп
* Откройте меню Add-ons -> Manage add-ons -> Browse all available add-ons
* Найдите модуль AssetPayments payments и нажмите Install
* Откройте меню Administration -> Payment methods
* Нажмите синий плюс справа и добавьте новый метод оплаты 
* Настройте новый модуль
* Основные настройки:
  * Name - Оплатить картой Visa/Mastercard (AssetPayments)
  * Processor - AssetPayments
  * Template - none
  * Payment category - Credit card
  * User groups - All
  * Description - Облачная платформа обработки онлайн платежей AssetPayments
  * Status - Active
  * Icon - выберить метод local и укажите путь к файлу asset.png
* Конфигурация:
  * Merchant Id
  * Secret key
  * Template ID (default = 19)
  * Нажмите кнопку Создать
  
### Notes
Протестировано с CS-Cart 4.9.3 мультивендор.

По умолчанию модуль использует букву P (processed) для отметки успешной оплаты и О (open) для не успешной. Если Вы хотите использовать свои статусы оплаты, Вам необходимо:
* Добавить новый статус в меню Administration -> Order statuses -> Add status
* Укажите название статуса
* Нажмите кнопку Сохранить
* Снова откройте созданный статус
* Посмотрите какую букву выдала CMS для нового статуса в поле Status
* Измените букву в верней части скрипта оплаты (assetpayments.php)
