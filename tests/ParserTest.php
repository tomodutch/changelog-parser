<?php


namespace Tests;


use PHPUnit\Framework\TestCase;
use TFarla\ChangelogParser\MarkdownParser as Parser;

class ParserTest extends TestCase
{
    /**
     * @test
     * @dataProvider fileProvider
     */
    function itShouldParse($file)
    {
        $parser = new Parser();

        $contents = $this->path([__DIR__, 'fixtures', $file]);

        $actual = $parser->parse(file_get_contents($contents));
        $goldenFile = $this->path([__DIR__, 'golden', $file]);

        if ($this->isGolden()) {
            if (file_exists($goldenFile) === false) {
                touch($goldenFile);
            }

            file_put_contents($goldenFile, serialize($actual));
        }

        $expected = unserialize(file_get_contents($goldenFile));

        $this->assertEquals($expected, $actual);


    }

    function fileProvider()
    {
        return [
//            ['empty-file.md'],
//            ['single-release.md'],
//            ['multiple-releases.md'],
            ['multiple-changes.md'],
//            ['keepachangelog.md']
        ];
    }

    private function path(array $pieces)
    {
        return implode(DIRECTORY_SEPARATOR, $pieces);
    }

    private function isGolden()
    {
        return getenv('GOLDEN') == true;
    }
}
