<?php


namespace app\services;


class Request
{
    protected $requestString;
    protected $controllerName = '';
    protected $actionName = '';

    protected $pattern = "#(?P<controller>\w+)[/]?(?P<action>\w+)?[/]?[?]?(?P<params>.*)#ui";

    //controller/action?id = .........

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->requestString = $_SERVER['REQUEST_URI'];
        $this->parseRequest();
    }

    protected function parseRequest()
    {
        if (preg_match_all($this->pattern, $this->requestString, $matches)) {

            $this->controllerName = $matches['controller'][0];
            $this->actionName = $matches['action'][0];
        }
    }

    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    public function getActionName(): string
    {
        return $this->actionName;
    }

    public function get(string $name)
    {
        return $_GET[$name];
    }

    public function post(string $name)
    {
        return $_POST[$name];
    }

    public function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }

    public function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function isAjax(): bool
    {
        if (
            isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == "XMLHttpRequest")
            return true;
        return false;
    }

    public function uploadFile(string $destinationDir, string $attributeName = 'file')
    {
        $originalFilename =  $_FILES[$attributeName]['name'];
        $destination = $destinationDir . $originalFilename;

        if (isset($_FILES[$attributeName])) {
            if (move_uploaded_file($_FILES[$attributeName]['tmp_name'], $destination)){
                return $originalFilename;
            }
        }

        return null;
    }
}