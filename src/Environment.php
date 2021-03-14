<?php


namespace app;

class Environment
{
    const DEV = "dev";
    const PROD = "prod";

    public static function get(): string
    {
        return getenv('ENV') ?: self::DEV;
    }

    public static function isDev(): bool
    {
        return  self::get() === self::DEV;
    }

    public static function isProd(): bool
    {
        return  self::get() === self::PROD;
    }
}