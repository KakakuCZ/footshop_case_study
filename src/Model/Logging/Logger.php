<?php declare(strict_types=1);

namespace App\Model\Logging;

use Monolog\Handler\StreamHandler;
use Monolog\Logger as MonologLogger;

class Logger
{
    private $logger;

    public function __construct(string $loggerName, string $pathToLogFile, int $debugLevel)
    {
        $this->logger = new MonologLogger($loggerName);
        $this->pushHandler($pathToLogFile, $debugLevel);
    }

    public function pushHandler(string $pathToLogFile, int $debugLevel) {
        try {
            $this->logger->pushHandler(
                new StreamHandler($pathToLogFile, $debugLevel)
            );
        } catch (\Exception $e) {
            die('Pushing stream to logger handler has failed');
        }
    }

    public function getLoggerInstance(): MonologLogger {
        return $this->logger;
    }
}
