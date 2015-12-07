<?php
namespace CDavison\Jobs\Queues;

class Number extends \PHPQueue\JobQueue
{
    /**
     * Initialise the jobs list.
     */
    public function __construct()
    {
        $this->jobs = [];
    }

    /**
     * Add a job
     * @param int $newJob Some int to work on
     */
    public function addJob($job)
    {
        array_unshift($this->jobs, $job);
        return true;
    }

    /**
     * Get a job from this queue
     * @param string $id [description]
     * @return [type] [description]
     */
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

    /**
     * Return the amount of jobs left in this queue
     * @return int
     */
    public function getQueueSize()
    {
        return count($this->jobs);
    }
}