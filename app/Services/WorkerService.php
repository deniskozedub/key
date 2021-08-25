<?php

    namespace App\Services;

    use App\Contracts\WorkerContract;

    use App\Traits\FormattedString;


    class WorkerService implements WorkerContract
    {
        use FormattedString;

        protected ActionService $actionService;

        protected const WORKER_PROGRAMMER = 'programmer';
        protected const WORKER_TESTER = 'tester';
        protected const WORKER_DESIGNER = 'designer';
        protected const WORKER_MANAGER = 'manager';

        public function __construct(ActionService $actionService)
        {
            $this->actionService = $actionService;
        }

        public function programmer(): string
        {
            return $this->format($this->actionService->getProgrammerAction());
        }

        public function tester(): string
        {
            return $this->format($this->actionService->getTesterAction());
        }

        public function designer(): string
        {
            return $this->format($this->actionService->getDesignerAction());
        }

        public function manager(): string
        {
            return $this->format($this->actionService->getManagerAction());
        }

        public function getFullWorkerList(): array
        {
            return [
                self::WORKER_DESIGNER,
                self::WORKER_PROGRAMMER,
                self::WORKER_TESTER,
                self::WORKER_MANAGER,
            ];
        }
    }
