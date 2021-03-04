<?php

declare(strict_types=1);

namespace Tardis\Router;

interface RouterInterface
{
    /**
     * J'ajoute une route a la table des routes.
     *
     * @param string $route
     * @param array $params
     * @return void
     */
    public function add(string $route, array $params) : void;

    /**
     *  dispatcher une tâche définie par certaines données sur 
     * un contrôleur et une action en fonction de la nature des données manipulées
     *
     * @param string $url
     * @return void
     */
    public function dispatch(string $url) : void; 
}