<?php

namespace App\Enums;

enum OrderStatus: string
{
    case Pending = 'pending';
    case OutForDelivery = 'out_for_delivery';
    case Delivering = 'delivering';
    case Delivered = 'delivered';
    case Cancelled = 'cancelled';
}
