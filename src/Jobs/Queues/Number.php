<?php
namespace CDavison\Jobs\Queues;

class Number extends \PHPQueue\JobQueue
{
    public function __construct()
    {
        $this->jobs = range(1,10);
    }

    public function addJob($newJob = null)
    {
        array_unshift($this->jobs, $newJob);
        return true;
    }

    public function getJob($id = null)
    {
        if (!$this->getQueueSize()) {
            return null;
        }

        $next_job = new \PHPQueue\Job();
        $next_job->data = array_pop($this->jobs);
        $next_job->worker = 'Number';

        return $next_job;
    }

    public function getQueueSize()
    {
        return count($this->jobs);
    }
}