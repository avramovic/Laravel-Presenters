<?php

namespace Avram\Presenters\Traits;

use Avram\Presenters\BasePresenter;
use Avram\Presenters\Exceptions\PresenterException;

trait PresentableTrait
{
    protected $presenterInstance;

    /**
     * @return BasePresenter
     * @throws PresenterException
     */
    public function present()
    {
        if (!isset($this->presenter)) {
            throw new PresenterException('Please set protected $presenter to your presenter class.');
        }

        if (!is_a($this->presenter, BasePresenter::class, true)) {
            throw new PresenterException('Your presenter class must extend '.BasePresenter::class);
        }

        if (!$this->presenterInstance) {
            $this->presenterInstance = new $this->presenter($this);
        }

        return $this->presenterInstance;
    }
}