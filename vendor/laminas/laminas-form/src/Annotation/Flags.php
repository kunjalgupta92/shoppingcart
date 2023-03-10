<?php

declare(strict_types=1);

namespace Laminas\Form\Annotation;

use Attribute;
use Doctrine\Common\Annotations\Annotation;
use Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor;

/**
 * Flags annotation
 *
 * Allows passing flags to the form factory. These flags are used to indicate
 * metadata, and typically the priority (order) in which an element will be
 * included.
 *
 * The value should be an associative array.
 *
 * @Annotation
 * @NamedArgumentConstructor
 */
#[Attribute]
final class Flags
{
    /**
     * Receive and process the contents of an annotation
     */
    public function __construct(private array $flags)
    {
    }

    /**
     * Retrieve the flags
     *
     * @return array
     */
    public function getFlags(): array
    {
        return $this->flags;
    }
}
