<?php

namespace App\Enums;

enum TransactionType: string
{
    case DEPOSIT = 'DEPOSIT';
    case BUYDATA = 'DATA';
    case BUYAIRTIME = 'AIRTIME';
    case EXAMPIN = 'EXAMPIN';
    case CABLE = 'CABLE';
}
