<?php

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
	$count = count($project->items);
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
