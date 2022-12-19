<?php
namespace extas\components\exceptions;

use Throwable;

/**
 * Class AlreadyExist
 *
 * @package extas\components\exceptions
 * @author jeyroik <jeyroik@gmail.com>
 */
class AlreadyExist extends \Exception
{
    /**
     * Missed constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message = ucfirst($message) . ' already exists';
        parent::__construct($message, $code, $previous);
    }
}
