<?php
// src/FlexSched/SchedBundle/Entity/AvailabilitySchedule.php
namespace FlexSched\SchedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FlexSched\SchedBundle\Entity\AvailabilitySchedule
 *
 * @ORM\Table(name="os_availability")
 * @ORM\Entity()
 */
class AvailabilitySchedule
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="availabilitySchedules")
     * @ORM\JoinColumn(name="uid", referencedColumnName="id")
     **/
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="SchedulePeriod")
     * @ORM\JoinColumn(name="spid", referencedColumnName="id")
     */
    private $schedulePeriod;

    /**
     * @ORM\Column(type="string", length=96)
     */
    private $sun;

    /**
     * @ORM\Column(type="string", length=96)
     */
    private $mon;

    /**
     * @ORM\Column(type="string", length=96)
     */
    private $tue;

    /**
     * @ORM\Column(type="string", length=96)
     */
    private $wed;

    /**
     * @ORM\Column(type="string", length=96)
     */
    private $thu;

    /**
     * @ORM\Column(type="string", length=96)
     */
    private $fri;

    /**
     * @ORM\Column(type="string", length=96)
     */
    private $sat;

    /**
     * @ORM\Column(type="string", length=140, nullable=true)
     */
    private $notes;

    /**
     * @ORM\Column(name="last_updated", type="integer")
     */
    private $lastUpdated;

    public function __construct()
    {
        $this->sun = "000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
        $this->mon = "000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
        $this->tue = "000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
        $this->wed = "000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
        $this->thu = "000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
        $this->fri = "000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
        $this->sat = "000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
        $this->lastUpdated = time();
    }

    public function getWeek()
    {
        return array(str_split($this->getSun()), str_split($this->getMon()), str_split($this->getTue()), str_split($this->getWed()), str_split($this->getThu()), str_split($this->getFri()), str_split($this->getSat()));
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
     * Set sun
     *
     * @param string $sun
     * @return Schedule
     */
    public function setSun($sun)
    {
        $this->sun = $sun;

        return $this;
    }

    /**
     * Get sun
     *
     * @return string
     */
    public function getSun()
    {
        return $this->sun;
    }

    /**
     * Set mon
     *
     * @param string $mon
     * @return Schedule
     */
    public function setMon($mon)
    {
        $this->mon = $mon;

        return $this;
    }

    /**
     * Get mon
     *
     * @return string
     */
    public function getMon()
    {
        return $this->mon;
    }

    /**
     * Set tue
     *
     * @param string $tue
     * @return Schedule
     */
    public function setTue($tue)
    {
        $this->tue = $tue;

        return $this;
    }

    /**
     * Get tue
     *
     * @return string
     */
    public function getTue()
    {
        return $this->tue;
    }

    /**
     * Set wed
     *
     * @param string $wed
     * @return Schedule
     */
    public function setWed($wed)
    {
        $this->wed = $wed;

        return $this;
    }

    /**
     * Get wed
     *
     * @return string
     */
    public function getWed()
    {
        return $this->wed;
    }

    /**
     * Set thu
     *
     * @param string $thu
     * @return Schedule
     */
    public function setThu($thu)
    {
        $this->thu = $thu;

        return $this;
    }

    /**
     * Get thu
     *
     * @return string
     */
    public function getThu()
    {
        return $this->thu;
    }

    /**
     * Set fri
     *
     * @param string $fri
     * @return Schedule
     */
    public function setFri($fri)
    {
        $this->fri = $fri;

        return $this;
    }

    /**
     * Get fri
     *
     * @return string
     */
    public function getFri()
    {
        return $this->fri;
    }

    /**
     * Set sat
     *
     * @param string $sat
     * @return Schedule
     */
    public function setSat($sat)
    {
        $this->sat = $sat;

        return $this;
    }

    /**
     * Get sat
     *
     * @return string
     */
    public function getSat()
    {
        return $this->sat;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return Schedule
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set lastupdated
     *
     * @param integer $lastupdated
     * @return Schedule
     */
    public function setLastUpdated($lastupdated)
    {
        $this->lastUpdated = $lastupdated;

        return $this;
    }

    /**
     * Get lastupdated
     *
     * @return integer
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set user
     *
     * @param \FlexSched\SchedBundle\Entity\User $user
     * @return Schedule
     */
    public function setUser(\FlexSched\SchedBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \FlexSched\SchedBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set schedulePeriod
     *
     * @param \FlexSched\SchedBundle\Entity\SchedulePeriod $schedulePeriod
     * @return Schedule
     */
    public function setSchedulePeriod(\FlexSched\SchedBundle\Entity\SchedulePeriod $schedulePeriod = null)
    {
        $this->schedulePeriod = $schedulePeriod;

        return $this;
    }

    /**
     * Get schedulePeriod
     *
     * @return \FlexSched\SchedBundle\Entity\SchedulePeriod
     */
    public function getSchedulePeriod()
    {
        return $this->schedulePeriod;
    }
}
