<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Amylian\Doctrine\DBAL;

/**
 * Description of ConnectionProvider
 *
 * @author andreas
 */
class ConnectionProvider implements ConnectionProviderInterface
{
    use \Amylian\Utils\ṔropertyTrait;
    
    /**
     * @var ConfigurationInterface 
     */
    protected $configuration = null;
    
    /**
     * @var \Doctrine\DBAL\Connection
     */
    protected $actualConnection = null;
    
    /**
     * @var array connection parameters passed to 
     * {@see \Doctrine\DBAL\DriverManager::getConnection()}
     */
    protected $params = [];
    
    /**
     * @var \Amylian\Doctrine\Common\EventManager|\Amylian\Doctrine\Common\EventManagerInterface Used Event Manager
     */
    protected $eventManager = null;
    
    public function __construct(ConfigurationInterface $configuration, \Amylian\Doctrine\Common\EventManagerInterface $eventManager)
    {
        $this->configuration = $configuration;
        $this->eventManager = $eventManager;
    }
    
    /**
     * Returns the configured connection parameters
     * @return array
     */
    public function getParams(): Array
    {
        return $this->params;
    }
    
    /**
     * Sets the connection parameters
     * @return array
     */
    public function setParams(Array $params)
    {
        $this->params = $params;
    }
    
    /**
     * Creates the actual connection
     * 
     * This function is called by {@seel getActualConnection()} if the
     * connection has not been created yet andreturns the new connection 
     * 
     * @return \Doctrine\DBAL\Connection
     */
    protected function createActualConnection(): \Doctrine\DBAL\Connection
    {
        return \Doctrine\DBAL\DriverManager::getConnection($this->getParams(), 
                $this->getConfiguration(), $this->getEventManager());
    }
    
    public function getActualConnection(): \Doctrine\DBAL\Connection
    {
        if (!$this->actualConnection) {
            $this->actualConnection = $this->createActualConnection();
        }
        return $this->actualConnection;
    }
    
    public function getConfiguration(): ConfigurationInterface
    {
        return $this->configuration;
    }
    
    public function setConfiguration($configuration)
    {
        $this->configuration = $configuration;
    }
    
    /**
     * Returns the EventManager
     * @return \Amylian\Doctrine\Common\EventManagerInterface|EventManager
     */
    public function getEventManager(): \Amylian\Doctrine\Common\EventManagerInterface
    {
        return $this->eventManager;
    }
    
    /**
     * Sets the EventManager instance
     * @param \Amylian\Doctrine\Common\EventManagerInterface $eventManager
     */
    public function setEventManager(\Amylian\Doctrine\Common\EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
    }

}
