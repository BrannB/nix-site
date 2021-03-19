<?php


namespace Niksteklo34\Logger;


class Logger implements LoggerInterface
{
    public $logFile;
    public $storage;

    public function __construct($logFile, $storage)
    {
        $this->logFile = $logFile;
        $this->storage = $_SERVER['DOCUMENT_ROOT'] . '/' . $storage;
    }

    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function log($level, $message, array $context = array())
    {
        $storage = $this->storage;
        $logfile = $this->logFile;
        $handle = fopen($storage . '/' . $logfile . '.log', 'a');
        $context = implode(',', $context);
        $time = date('Y-m-d h:i:s');
        $message = "=====\nLevel: {$level}\nMessage: {$message}\nContext: {$context}\n\n{$time}\n=====\n\n";
        fwrite($handle, $message);
        fclose($handle);
    }
}