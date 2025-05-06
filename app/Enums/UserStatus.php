<?php

namespace App\EnumS;

enum UserStatus:string{
    case Active ='active';
    case InActive = 'inactive';
    case Banned = 'banned';
}