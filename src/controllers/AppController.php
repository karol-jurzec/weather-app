
<?php

class AppController {

    private $request;

    public function __construct() {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet() : bool {
        return $this->request === 'GET';
    }

    protected function isPost() : bool {
        return $this->request === 'POST';
    }

    protected function render(string $template = null, array $variables = []) {
        $templatePath = 'public/views/'.$template.'.php';
        $outpupt = 'file not found';

        if(file_exists($templatePath)) {
            extract($variables);

            ob_start();
            include $templatePath;
            $outpupt = ob_get_clean();
        }

        print $outpupt;
    }
}