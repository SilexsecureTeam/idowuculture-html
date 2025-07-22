<?php

namespace App\Enums;

enum OrderStatus: string 
{
    case PLACED = 'placed';
    case DELIVERED = 'delivered';
}
