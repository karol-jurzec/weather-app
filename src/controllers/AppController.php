
<?php

class AppController {

    protected function render(string $template = null) {
        $templatePath = 'public/views/'.$template.'.html';
        $outpupt = 'file not found';

        if(file_exists($templatePath)) {
            ob_start();
            include $templatePath;
            $outpupt = ob_get_clean();
        }

        print $outpupt;
    }
}