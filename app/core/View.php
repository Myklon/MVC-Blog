<?php

namespace app\core;

class View
{
    private string $templatesPath;

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = __DIR__ . '/../views/';
    }

    public function prepareContent(string $templateName, array $vars = [])
    {
          return $this->getBuffer($templateName, $vars);
    }
    public function render(string $templateName = "/articles/article_form.php", array $vars = [])
    {
        $buffer = $this->getBuffer($templateName, $vars);
        echo $buffer;
    }

    /**
     * @throws \Exception
     */
    private function getBuffer(string $templateName, array $vars)
    {
        if(!file_exists($this->templatesPath . '/' . $templateName))
        {
            throw new \Exception();
        }
        extract($vars);
        ob_start();
        include $this->templatesPath . '/' . $templateName;
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }
}