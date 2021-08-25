<?php

    namespace App\Contracts;

    interface WorkerContract
    {
        public function programmer() : string;

        public function tester() : string;

        public function designer() : string;

        public function manager() : string;

        public function getFullWorkerList() :array;
    }
