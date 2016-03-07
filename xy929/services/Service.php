<?php
/**
 * Service
 * 工厂方法
 */
class Service {
    /**
     * 实例容器
     */
    private static $_instances = array();

    /**
     * &factory
     * 工厂方法
     *
     * @param  mixed $class
     * @return void
     */
    public static function &factory($class) {
        if (!array_key_exists($class, self::$_instances)) {
            self::$_instances[$class] = new $class();
        }

        return self::$_instances[$class];
    }

    /**
     * convert2Array
     * 对象数组 => 属性数组
     *
     * @param  mixed $objects
     * @return void
     */
    public static function convert2Array($objects) {
        if (!is_array($objects) || !is_object(current($objects))) {
            return $objects;
        }

        $result = array();
        foreach ($objects as $obj) {
            $result[] = $obj->attributes;
        }

        return $result;
    }


}
