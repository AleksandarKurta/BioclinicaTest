<?php

namespace App;

class Person {

	public $id;
	public $parent_id;

	public function __construct($id, $parent_id)
	{
		$this->id = $id;
		$this->parent_id = $parent_id;
	}
 
}

function topLayerPeople($collection){
	foreach($collection as $coll){
		$ids[] = $coll->id;
	}

	foreach($collection as $coll){
		if(!in_array($coll->parent_id, $ids) || $coll->parent_id == null){
			$result[] = $coll;
		}
	}

	return $result;
}

?>