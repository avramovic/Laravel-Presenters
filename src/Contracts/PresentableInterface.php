<?php

namespace Avram\Presenters\Contracts;

use Avram\Presenters\BasePresenter;

interface PresentableInterface
{
    /**
     * @return BasePresenter
     */
    public function present();
}