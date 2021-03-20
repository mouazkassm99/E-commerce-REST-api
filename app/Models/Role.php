<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public static int $ADMIN_ID = 1;
    public static int $USER_ID = 2;
    public static int $MANAGER_ID = 3;

    public function users(){
        return $this->hasMany(User::class);
    }
}
