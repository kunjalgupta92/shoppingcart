<?php

declare(strict_types=1);

namespace Laminas\Hydrator\Iterator;

use Iterator;
use Laminas\Hydrator\HydratorInterface;

/**
 * @template TKey
 * @template TPrototype of object
 * @template-extends Iterator<TKey, TPrototype>
 */
interface HydratingIteratorInterface extends Iterator
{
    /**
     * This sets the prototype to hydrate.
     *
     * This prototype can be the name of the class or the object itself;
     * iteration will clone the object.
     *
     * @param class-string<TPrototype>|TPrototype $prototype
     */
    public function setPrototype($prototype): void;

    /**
     * Sets the hydrator to use during iteration.
     */
    public function setHydrator(HydratorInterface $hydrator): void;
}
