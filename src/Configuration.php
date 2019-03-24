<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Amylian\Doctrine\DBAL;

/**
 * Description of Configuration
 *
 * @author andreas
 */
class Configuration extends \Doctrine\DBAL\Configuration implements ConfigurationInterface
{
    use Amylian\Utils\ṔropertyTrait;
    use ConfigurationTrait;
}
