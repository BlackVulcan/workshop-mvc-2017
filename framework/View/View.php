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
     * @param string $template The template that needs to be rendered.
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
     * Prepares a view for rendering by the template system
     *
     * @param string $template The template that needs to be displayed
     * @return View A View that contains the template and that be used to add data to
     */
    public static function render($template)
    {
        return new self($template);
    }

    /**
     * Add data to be used later by the templating engine
     *
     * @param string $name The key of the data
     * @param mixed $value The value of the data
     *
     * @return $this The view for adding more data to
     */
    public function with($name, $value)
    {
        $this->data[$name] = $value;

        return $this;
    }

    /**
     * Get all added data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Get the template to be rendered
     *
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }
}
