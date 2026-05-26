<?php

class View
{
    public static function render(string $view, array $data = []): void
    {
        // Sert a rendre les variables accessible au tableau directement depuis la vue 
        // $data[resources] devient $resource dans la vue 
        extract($data);

        $viewPath = __DIR__ . '/../../views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            throw new \RuntimeException("Vue introuvable : {$view}");
        }


        // On stocke le contenu dans le $content de la vue 
        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        //Puis on incle le layout qui affichera le $content
        require __DIR__ . '/../../views/layouts/main.php';
    }
}
