<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Amylian\Doctrine\DBAL;

/**
 *
 * @author andreas
 */
interface ConnectionProviderInterface
{

    /**
     * Creates the actual connection and returns it
     * 
     * @return \Doctrine\DBAL\Connection
     */
    public function getActualConnection(): \Doctrine\DBAL\Connection;

    /**
     * Returns the Configuration object
     * @return \Amylian\Doctrine\DBAL\ConfigurationInterface|Configuration
     */
    public function getConfiguration(): ConfigurationInterface;

    /**
     * Returns the connection parameters array
     * @return Array
     */
    public function getParams(): Array;

    /**
     * Sets the connection parameters
     * @param Array $params
     */
    public function setParams(Array $params);
}
