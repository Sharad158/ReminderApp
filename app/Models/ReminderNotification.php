<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReminderNotification extends Model
{
    use HasFactory;

    protected $table = 'reminder_notifications';
    protected $primaryKey = 'reminder_notification_id';
}
