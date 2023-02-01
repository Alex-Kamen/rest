<?php

class Route {

    private $class;
    private $action;
    private $arguments;

    public function __construct($class, $action, $arguments = '') {
        $this->class = $class;
        $this->action = $action;
        $this->arguments = $arguments;
    }

    public function getClass() {
        return $this->class;
    }

    public function getAction() {
        return $this->action;
    }

    public function getArguments() {
        return $this->arguments;
    }
}