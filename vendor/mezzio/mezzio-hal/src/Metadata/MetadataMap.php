<?php

declare(strict_types=1);

namespace Mezzio\Hal\Metadata;

use function class_exists;

class MetadataMap
{
    /**
     * @var array
     * @psalm-var array<string, AbstractMetadata>
     */
    private $map = [];

    /**
     * @throws Exception\DuplicateMetadataException If metadata matching the
     *     class of the provided metadata already exists in the map.
     * @throws Exception\UndefinedClassException If the class in the provided
     *     metadata does not exist.
     */
    public function add(AbstractMetadata $metadata): void
    {
        $class = $metadata->getClass();
        if (isset($this->map[$class])) {
            throw Exception\DuplicateMetadataException::create($class);
        }

        if (! class_exists($class)) {
            throw Exception\UndefinedClassException::create($class);
        }

        $this->map[$class] = $metadata;
    }

    public function has(string $class): bool
    {
        return isset($this->map[$class]);
    }

    /**
     * @throws Exception\UndefinedMetadataException If no metadata matching the
     *     provided class is found in the map.
     */
    public function get(string $class): AbstractMetadata
    {
        if (! isset($this->map[$class])) {
            throw Exception\UndefinedMetadataException::create($class);
        }

        return $this->map[$class];
    }
}
