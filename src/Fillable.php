<?php
namespace mac\fillable;

use ReflectionClass;
use ReflectionProperty;

trait Fillable
{
    /**
     * Instantiates object and fill it with given data
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     * @param array $data to fill object with
     * @return Fillable
     */
    public static function createFrom(array $data)
    {
        $object = new self();
        $object->fill($data);
        return $object;
    }

    /**
     * Fill object with given data
     *
     * @SuppressWarnings(PHPMD.StaticAccess)
     * @param array $data to fill object with
     */
    public function fill(array $data)
    {
        $reflection = new ReflectionClass($this);
        $classShortName = $reflection->getShortName();

        $data = isset($data[$classShortName]) ? $data[$classShortName] : $data;

        $properties = $reflection->getProperties(
            ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED | ReflectionProperty::IS_PRIVATE
        );

        foreach ($properties as $property) {
            $key = $property->getName();

            if (!isset($data[$key])) {
                continue;
            }

            if ($property->isPrivate() || $property->isProtected()) {
                $property->setAccessible(true);
            }

            $property->setValue($this, $data[$key]);
        }
    }
}
