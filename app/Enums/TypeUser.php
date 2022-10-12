<?php

namespace App\Enums;

enum TypeUser: string
{
    case COMPANY  = 'company';
    case BRANCH  = 'branch';
    case EMPLOYEE  = 'employee';
}
