<?php
namespace CSY2028;
interface Routes {
    public function getRoutes();
    public function getPage($route);
    public function checkLogin($route);
}