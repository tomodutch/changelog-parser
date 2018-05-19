<?php

namespace TFarla\ChangelogParser;

use League\CommonMark\Block\Element\Heading;
use League\CommonMark\Block\Element\ListItem;
use League\CommonMark\Block\Element\Paragraph;
use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\Inline\Element\Link;
use League\CommonMark\Inline\Element\Text;

class MarkdownParser
{
    public function parse(string $content)
    {
        $result = new ParseResult();
        $environment = Environment::createCommonMarkEnvironment();
        $parser = new DocParser($environment);
        $document = $parser->parse($content);

        $walker = $document->walker();
        $release = null;
        $type = null;
        $version = null;
        while ($event = $walker->next()) {
            $node = $event->getNode();
            if ($event->isEntering() && $node instanceof Text && $node->parent() instanceof Heading) {
                $matches = [];

                $content = $node->getContent();
                if ($version) {
                    $content = $version . $content;
                    $version = null;
                }

                preg_match('/^(?<version>\d+.\d+.\d+).+\s(?<date>\d+\-\d+\-\d+)/', $content, $matches);

                if (isset($matches['version']) && isset($matches['date'])) {
                    $date = \DateTime::createFromFormat('Y-m-d', $matches['date']);
                    $date->setTime(0, 0, 0);

                    $release = new Release($matches['version'], $date);
                    $result->addRelease($release);
                }

                if ($release) {
                    $type = $node->getContent();
                }
            }

            if ($event->isEntering() && $node instanceof Link && $node->parent() instanceof Heading) {
                $children = $node->children();
                if ($children && count($children) > 0 && $children[0] instanceof Text) {
                    $matches = [];

                    preg_match('/^(?<version>\d+.\d+.\d+)/', $children[0]->getContent(), $matches);

                    $version = $matches['version'] ?? null;
                }
            }

            if ($release && $type) {
                $parent = $node->parent();
                $grandParent = null;
                if ($parent) {
                    $grandParent = $parent->parent();
                }

                if ($node instanceof Text && $parent instanceof Paragraph && $grandParent instanceof ListItem) {
                    $release->addChange(ucfirst($type), $node->getContent());
                }
            }
        }


        return $result;
    }
}
