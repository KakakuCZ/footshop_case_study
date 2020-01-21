<?php declare(strict_types=1);

namespace App\Model\Logging;

class LoggerFactory
{
    public function createLogger(string $loggerName, string $logFileName, int $debugLevel): Logger {
        return new Logger($loggerName, $this->generatePathToLogFile($logFileName), $debugLevel);
    }

    private function generatePathToLogFile(string $logFileName): string {
        return _PATH_TO_LOGS_ . DIRECTORY_SEPARATOR . $logFileName;
    }
}
