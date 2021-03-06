<?php

namespace Radchasay\Navbar;

class Navbar implements \Anax\Common\ConfigureInterface, \Anax\Common\AppInjectableInterface
{
    use \Anax\Common\ConfigureTrait;
    use \Anax\Common\AppInjectableTrait;

    public function getHTML()
    {
        $nav = "<navbar class='" . $this->config["config"]["navbar-class"] . "'>";
        $nav .= "<ul>";
        foreach ($this->config["items"] as $item) {
            $createUrl = $this->app->url->create($item["route"]);
            $selected = $this->app->request->getRoute() == $item["route"] ? "selected" : "";
            $nav .= "<li class='$selected' ><a href='$createUrl'>$item[text]</a></li>";
        }
        $nav .= "</ul>";
        $nav .= "</navbar>";

        return $nav;
    }
}
