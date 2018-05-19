<?php


namespace TFarla\ChangelogParser;

class ParseResult
{
    /** @var array */
    private $releases;

    /**
     * ParseResult constructor.
     * @param array $releases
     */
    public function __construct(array $releases = [])
    {
        $this->releases = $releases;
    }

    /**
     * @return Release[]
     */
    public function getReleases(): array
    {
        return $this->releases;
    }

    public function addRelease(Release $release)
    {
        $this->releases[] = $release;
    }
}
