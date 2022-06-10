<?php

// Создаём свой класс отправки почты
// php artisan make:notification SendVerifyWithQueueNotification
// в папке app будет создана папка Notifications с файлом
//SendVerifyWithQueueNotification.php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendVerifyWithQueueNotification extends VerifyEmail implements ShouldQueue
{
    use Queueable;
}
