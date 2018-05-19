<?php


namespace TFarla\ChangelogParser;

/**
 * Class Release
 * @package TFarla\ChangelogParser
 */
class Release
{
    /** @var string */
    private $version;

    /** @var \DateTime */
    private $date;

    /** @var array */
    private $changes;

    /**
     * Release constructor.
     * @param string $version
     * @param \DateTime $date
     * @param array $changes
     */
    public function __construct(string $version, \DateTime $date, array $changes = [])
    {
        $this->version = $version;
        $this->date = $date;
        $this->changes = $changes;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): \DateTime
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function getChanges(): array
    {
        return $this->changes;
    }

    /**
     * @param $type
     * @param $change
     */
    public function addChange($type, $change)
    {
        if (isset($this->changes[$type]) === false) {
            $this->changes[$type] = [];
        }

        $this->changes[$type][] = $change;
    }
}
