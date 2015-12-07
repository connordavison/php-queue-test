<?php
namespace CDavison\Jobs\Workers;

class Number extends \PHPQueue\Worker
{
    public function runJob(\PHPQueue\Job $queued_job)
    {
        $number = $queued_job->data;

        sleep(10);
        echo $number;

        $this->result_data = array('status' => 'success');
    }
}