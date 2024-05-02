<?php

namespace JetPhp\Core;

class Base
{

    public static array | null $settings = null;

    public static string $version = '1.0.0';

    public static string $name = 'JetPhp';

    public function __construct()
    {
        $this::resolveSettingsFromIni();
    }


    public static function getSettings(): array | null
    {
        return self::$settings;
    }

    public static function getSetting(string $key): mixed
    {
        return self::$settings[$key] ?? null;
    }

    public static function getSettingOrDefault(string $key, mixed $default): mixed
    {
        return self::$settings[$key] ?? $default;
    }

    public static function resolveSettingsFromIni(): mixed
    {
        if (defined('SETTINGS') === false){
            return null;
        }
        if (defined('SETTINGS')){
            $settingsFile = parse_ini_file(SETTINGS, false);
        } else {
            $settingsFile = [];
        }

        if ($settingsFile) {
            self::$settings = array_merge($settingsFile, $_SERVER, $_ENV);
        } else {
            self::$settings = array_merge($_SERVER, $_ENV);
        }

        if (defined('SESSION') === true && session_status() === PHP_SESSION_ACTIVE){
            self::$settings = array_merge(self::$settings, $_SESSION);
        }

        return self::$settings;
    }
}
