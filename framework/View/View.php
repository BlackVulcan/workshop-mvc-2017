<?php

namespace Framework\View;

class View
{
    private $data = array();
    /**
     * @var string
     */
    private $template;

    /**
     * View constructor.
     *
     * @param string $template
     */
    public function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * Includes the path of the view in the index.php file. This static method is
     * just a wrapper and functions as a more elegant way to render views in the
     * controller. It replaces the include 'path/to/view.php';
     *
     * @param string $path
     */
    public static function display($path)
    {
        include $path;
    }

    /**
     * Prepares a view for rendering by the template system.
     *
     * @param string $template
     * @return View
     */
    public static function render($template)
    {
        return new self($template);
    }

    public function with($name, $value)
    {
        $this->data["name"] = $value;

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getTemplate()
    {
        return $this->template;
    }
}
