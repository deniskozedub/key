<?php

    namespace App\Console\Commands;

    use App\Services\ActionService;
    use App\Services\WorkerService;
    use Illuminate\Console\Command;

    class WorkerCommand extends Command
    {
        protected const WORKER_ACTION = 'Get worker action';

        protected const WORKER_ALLOW_ACTION_BY_WORKER = 'Get allow action by worker';

        protected $signature = 'employee';

        public function handle(WorkerService $workerService, ActionService $actionService)
        {
            $operation = $this->choice('Please, choice type operation',[self::WORKER_ACTION, self::WORKER_ALLOW_ACTION_BY_WORKER]);
            if ($operation == self::WORKER_ACTION){
                $role =  $this->choice('Change roles',$workerService->getFullWorkerList());
                $this->comment($workerService->{$role}());
            }
            if ($operation == self::WORKER_ALLOW_ACTION_BY_WORKER){
                $role =  $this->choice('Change roles',$workerService->getFullWorkerList());
                $action = $this->choice('Change action',$actionService->getFullActionList());
                dd($actionService->{$role}($action));
            }
        }
    }
