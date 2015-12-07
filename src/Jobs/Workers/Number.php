<?php
namespace CDavison\Jobs\Workers;

class Number extends \PHPQueue\Worker
{
    /**
     * Execute the job
     * @param \PHPQueue\Job $queued_job
     * @return void
     */
    public function runJob($queued_job)
    {
        $number = $queued_job->data;

        echo "$number\n";
        sleep(10);

        $this->result_data = array('status' => 'success');
    }
}