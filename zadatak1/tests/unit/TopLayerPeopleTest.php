<?php

class TopLayerPeopleTest extends \PHPUnit\Framework\TestCase 
{
    public function test_can_find_all_top_layer_people()
    {
        $person1 = new \App\Person(2, 3);
        $person2 = new \App\Person(3, 5);
        $person3 = new \App\Person(5, null);
        $person4 = new \App\Person(1, 7);

        $collection[] = $person1;
        $collection[] = $person2;
        $collection[] = $person3;
        $collection[] = $person4;

        $arr2 = \App\topLayerPeople($collection);

        $this->assertNotEqualsCanonicalizing([$person1, $person4], $arr2);

        $this->assertEqualsCanonicalizing([$person3, $person4], $arr2);
    }
}