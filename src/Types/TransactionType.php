<?php

namespace JoeCase\Types;

enum TransactionType: string
{
    case DEPOSIT = 'DEPOSIT';
    case WITHDRAW = 'WITHDRAW';
}
