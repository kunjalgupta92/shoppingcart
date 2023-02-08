<?php

declare(strict_types=1);

namespace Mezzio\Hal\Metadata;

class RouteBasedCollectionMetadata extends AbstractCollectionMetadata
{
    /** @var string */
    private $route;

    /** @var array */
    private $routeParams;

    /** @var array */
    private $queryStringArguments;

    public function __construct(
        string $class,
        string $collectionRelation,
        string $route,
        string $paginationParam = 'page',
        string $paginationParamType = self::TYPE_QUERY,
        array $routeParams = [],
        array $queryStringArguments = []
    ) {
        $this->class                = $class;
        $this->collectionRelation   = $collectionRelation;
        $this->route                = $route;
        $this->paginationParam      = $paginationParam;
        $this->paginationParamType  = $paginationParamType;
        $this->routeParams          = $routeParams;
        $this->queryStringArguments = $queryStringArguments;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getRouteParams(): array
    {
        return $this->routeParams;
    }

    public function getQueryStringArguments(): array
    {
        return $this->queryStringArguments;
    }

    /**
     * Allow run-time overriding/injection of route parameters.
     *
     * In particular, this is useful for setting a parent identifier
     * in the route when dealing with child resources.
     */
    public function setRouteParams(array $routeParams): void
    {
        $this->routeParams = $routeParams;
    }

    /**
     * Allow run-time overriding/injection of query string arguments.
     *
     * In particular, this is useful for setting query string arguments for
     * searches, sorts, limits, etc.
     */
    public function setQueryStringArguments(array $query): void
    {
        $this->queryStringArguments = $query;
    }
}
