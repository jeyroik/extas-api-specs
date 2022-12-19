<?php
namespace extas\components\exceptions;

use Throwable;

/**
 * Class MissedOrUnknown
 *
 * @package extas\components\exceptions
 * @author jeyroik <jeyroik@gmail.com>
 */
class MissedOrUnknown extends \Exception
{
    /**
     * Missed constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = 'Missed or unknown ' . $message;
        parent::__construct($message, $code, $previous);
    }
}
