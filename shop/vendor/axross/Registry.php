<?php

namespace axross;

class Registry {
    
    use TSingleton;

    protected static array $properties = [];

    public function setProperty($name, $value)
    {
        return self::$properties[$name] = $value;
    }

    public function getProperty($name)
    {
        return self::$properties[$name] ?? null;
    }

    public function getProperties(): array
    {
        return self::$properties;
    }

}