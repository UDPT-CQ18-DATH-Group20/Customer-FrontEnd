<?php

class BaseController
{
    protected $folder;

    public function render($view, $data)
    {
        $view_file = VIEW_PATH . $this->folder . '/' . $view . '.php';

        if (is_file($view_file)) {
            if (!is_null($data))
                extract($data);
            require_once(TEMPLATE_PATH.'index.phtml');
        } else {
            redirect_to(ERROR_URI);
        }
    }
}
