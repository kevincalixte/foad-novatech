<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class AppExtension extends AbstractExtension implements GlobalsInterface
{
    public function getGlobals(): array
    {
        $logo = "assets/img/logo.jpg";
        return [
            'menus' => ['home', 'about', 'services', 'contact'],
            'copyright' => '© NovaTech',
            'logo' => $logo,
        ];
    }
}
