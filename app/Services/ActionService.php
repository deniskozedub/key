<?php

    namespace App\Services;

    use App\Contracts\ActionContract;

    class ActionService extends GetterActionService implements ActionContract
    {

        public function programmer(string $action): bool
        {
            return in_array($action, $this->getProgrammerAction());
        }

        public function designer(string $action): bool
        {
            return in_array($action, $this->getDesignerAction());
        }

        public function tester(string $action): bool
        {
            return in_array($action, $this->getTesterAction());
        }

        public function manager(string $action): bool
        {
            return in_array($action, $this->getManagerAction());
        }
    }
