<?php

namespace App\Enums;

enum SectionType: string
{
    case HERO = 'hero';
    case ABOUT = 'about';
    case SERVICES = 'services';
    case PORTFOLIO = 'portfolio';
    case TESTIMONIALS = 'testimonials';
}
