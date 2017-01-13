<?php

function parentProject($group_id) {
	$group = Group::find($group_id);
	$project = $group->parentProject;
	
	if (!is_null($project)){
		return $project;
	}else{
		$parentGroup = $group->parentGroup;
		return parentProject($parentGroup->id);
	}
}

?>