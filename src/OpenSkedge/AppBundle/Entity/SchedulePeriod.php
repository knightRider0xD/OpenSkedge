<?php
// src/OpenSkedge/AppBundle/Entity/SchedulePeriod.php
namespace OpenSkedge\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * OpenSkedge\AppBundle\Entity\SchedulePeriod
 *
 * @ORM\Table(name="os_schedule_period")
 * @ORM\Entity()
 * @UniqueEntity(fields={"startTime", "endTime"})
 */
class SchedulePeriod
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Schedule", mappedBy="schedulePeriod", cascade={"remove"})
     */
    private $schedules;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime(message="Invalid Start Date")
     */
    private $startTime;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\DateTime(message="Invalid End Date")
     */
    private $endTime;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->schedules = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getStartTime()->format('M-d-Y')." - ".$this->getEndTime()->format('M-d-Y');
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set startTime
     *
     * @param \DateTime $startTime
     * @return SchedulePeriod
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * Set endTime
     *
     * @param \DateTime $endTime
     * @return SchedulePeriod
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Add schedules
     *
     * @param \OpenSkedge\AppBundle\Entity\Schedule $schedules
     * @return SchedulePeriod
     */
    public function addSchedule(\OpenSkedge\AppBundle\Entity\Schedule $schedules)
    {
        $this->schedules[] = $schedules;

        return $this;
    }

    /**
     * Remove schedules
     *
     * @param \OpenSkedge\AppBundle\Entity\Schedule $schedules
     */
    public function removeSchedule(\OpenSkedge\AppBundle\Entity\Schedule $schedules)
    {
        $this->schedules->removeElement($schedules);
    }

    /**
     * Get schedules
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchedules()
    {
        return $this->schedules;
    }
}
