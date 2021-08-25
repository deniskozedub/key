<?php

    namespace App\Services;

    use App\Contracts\GetterActionContract;

    class GetterActionService implements GetterActionContract
    {
        protected const ACTION_WRITE_CODE = 'code writing';
        protected const ACTION_TEST_CODE = 'code testing';
        protected const ACTION_DRAW = 'drawing';
        protected const ACTION_SPEAK_WITH_MANAGER = 'speaking with manager';
        protected const ACTION_ATTACH_TASK = 'task attaching';

        public function getProgrammerAction(): array
        {
            return [
                self::ACTION_WRITE_CODE,
                self::ACTION_TEST_CODE,
                self::ACTION_SPEAK_WITH_MANAGER
            ];
        }

        public function getDesignerAction(): array
        {
            return [
                self::ACTION_SPEAK_WITH_MANAGER,
                self::ACTION_DRAW,
            ];
        }

        public function getTesterAction(): array
        {
            return [
                self::ACTION_SPEAK_WITH_MANAGER,
                self::ACTION_TEST_CODE,
                self::ACTION_ATTACH_TASK
            ];
        }

        public function getManagerAction(): array
        {
            return [
                self::ACTION_ATTACH_TASK,
            ];
        }

        public function getFullActionList(): array
        {
            return [
                self::ACTION_SPEAK_WITH_MANAGER,
                self::ACTION_TEST_CODE,
                self::ACTION_ATTACH_TASK,
                self::ACTION_WRITE_CODE,
                self::ACTION_DRAW,
            ];
        }
    }
