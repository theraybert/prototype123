<?php
// src/AppBundle/Entity/Task.php
namespace AppBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

class Task
{
    #protected $task;
    #protected $dueDate;

    /**
     * @Assert\NotBlank()
     */
    protected $task;

    /**
     * @Assert\NotBlank()
     * @Assert\Type("\DateTime")
     */
    protected $dueDate;

    /**
     * @Assert\Type("\DateTime")
     */
    protected $sbmDate;

    # @Assert\NotBlank()
    # @Assert\Type("\IntegerType")
    
    # protected $level;


    public function getTask()
    {
        return $this->task;
    }

    public function setTask($task)
    {
        $this->task = $task;
    }

    public function getDueDate()
    {
        return $this->dueDate;
    }
    
    public function setDueDate(\DateTime $dueDate = null)
    {
        $this->dueDate = $dueDate;
    }

    public function getSmbDate()
    {
        return $this->sbmDate;
    }
    
    public function setSbmDate(\DateTime $sbmDate = null)
    {
        $this->sbmDate = $sbmDate;
    }



    /*
    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel(\IntegerType $level = null)
    {
        $this->level = $level;
    }
    */

}