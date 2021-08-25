<?php

    namespace App\Contracts;

    interface ActionContract
    {
        public function programmer(string $action) : bool;

        public function designer(string $action) : bool;

        public function tester(string $action) : bool;

        public function manager(string $action) : bool;
    }
