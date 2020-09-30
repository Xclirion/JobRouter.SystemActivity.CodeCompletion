<?php
namespace JobRouter\Log;
interface LogInfoInterface {
    public const LEVEL_NOTICE = 'NOTICE';
    public const LEVEL_EMERGENCY = 'EMERG';
    public const LEVEL_CRITICAL = 'CRITICAL';
    public const LEVEL_INFO = 'INFO';
    public const LEVEL_WARNING = 'WARNING';
    public const LEVEL_ERROR = 'ERROR';
    public const LEVEL_DEBUG = 'DEBUG';
    public const LEVEL_ALERT = 'ALERT';
    public function setLevel($level);
    public function getLevel();
    public function setMessage($message);
    public function getCode();
    public function __toString();
}

