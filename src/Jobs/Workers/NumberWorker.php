<?php
namespace CDavison\Jobs\Workers;

class NumberWorker extends \PHPQueue\Worker
{
    public function runJob(\PHPQueue\Worker $queued_job)
    {
        $number = $queued_job->data;

        sleep(10);
        echo $number;
    }
}