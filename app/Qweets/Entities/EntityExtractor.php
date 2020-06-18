<?php

namespace App\Qweets\Entities;

class EntityExtractor
{
    /**
     * The string property.
     *
     * @var $string
     */
    protected $string;

    const HASHTAG_REGEX = '/(?!\s)#([A-Za-z]\w*)\b/';

    const MENTION_REGEX = '/(?=[^\w!])@(\w+)\b/';
    
    public function __construct($string)
    {
        $this->string = $string;
    }

    public function getAllEntities()
    {
        return array_merge($this->getHashtagEntities(), $this->getMentionEntities());
    }     

    public function getHashtagEntities()
    {
        return $this->buildEntityCollection(
            $this->match(self::HASHTAG_REGEX),
            'hashtag' //TODO: Extract to a class
        );
    }

    public function getMentionEntities()
    {
        return $this->buildEntityCollection(
            $this->match(self::MENTION_REGEX),
            'mention' //TODO: Extract to a class
        );
    }

    protected function match($pattern)
    {
        preg_match_all($pattern, $this->string, $matches, PREG_OFFSET_CAPTURE);

        return $matches;
    }

    protected function buildEntityCollection($entities, $type)
    {
        return array_map(function ($entity, $index) use ($entities, $type) {
            return [
                'body' => $entity[0],
                'body_plain' => $entities[1][$index][0],
                'start' => $start = $entity[1],
                'end' => $start + strlen($entity[0]),
                'type' => $type
            ];
        }, $entities[0], array_keys($entities[0]));
    }
}