<?php

    namespace App\Contracts;

    interface GetterActionContract
    {
        public function getProgrammerAction(): array;

        public function getDesignerAction(): array;

        public function getTesterAction(): array;

        public function getManagerAction(): array;

        public function getFullActionList() : array;
    }
