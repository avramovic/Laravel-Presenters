<?php

namespace Avram\Presenters;

use Avram\Presenters\Exceptions\PresenterException;
use Illuminate\Database\Eloquent\Model;

abstract class BasePresenter
{
    /** @var Model $entity */
    protected $entity;

    /**
     * BasePresenter constructor.
     *
     * @param Model $entity
     */
    public function __construct(Model $entity)
    {
        $this->entity = $entity;
    }

    /**
     * @param string $field
     *
     * @return mixed
     * @throws PresenterException
     */
    public function __get($field)
    {
        if (method_exists($this, $field)) {
            return call_user_func([$this, $field]);
        }

        if (isset($this->entity->getAttributes()[$field])) {
            return $this->entity->{$field};
        }

        throw new PresenterException("No presenter defined for \"{$field}\"");
    }
}