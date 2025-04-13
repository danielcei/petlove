<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

use OwenIt\Auditing\Contracts\Auditable;

class Role
{

    CONST int ADMIN = 1;

    CONST int BACKOFFICE = 2;
    CONST int CLIENT_ENRIQUECE = 3;
    CONST int CLIENTE_FTP = 5;


}
