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

function teamParentProject($team_id) {
	$team = Team::find($team_id);
	$project = $team->parentProject;

	if (!is_null($project)){
		return $project;
	}else{
		$parentTeam = $team->parentTeam;
		return teamParentProject($parentTeam->id);
	}
}

function itemParentProject($item_id) {
	$item = Item::find($item_id);
	$group = $item->parentGroup;
	$project = parentProject($group->id);

	return $project;
}

function countProjectGroups($project) {
	$groups = $project->groups;
	$count = count($groups);
	foreach($groups as $group){
		$count += countGroups($group);
	}
	return $count;
}

function countGroups($group) {
	$nestedGroups = $group->groups;
	$count = count($nestedGroups);
	foreach($nestedGroups as $nestedGroup){
		$count += countGroups($nestedGroup);
	}
	return $count;
}

function countProjectIssues($project) {
	$groups = $project->groups;
	$count = 0;
	foreach($groups as $group){
		$count += countGroupIssues($group);
	}
	return $count;
}

function countGroupIssues($group) {
	$count = count($group->items);
	$nestedGroups = $group->groups;
	foreach($nestedGroups as $nestedGroup){
		$count += countGroupIssues($nestedGroup);
	}
	return $count;
}

?>
