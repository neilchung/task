<?php

function TaskCountArray($projects)
{
	$counts = [];
	foreach ($projects as $project) {
		$perCount = $project->tasks->count();
		$counts[] = $perCount;
//		array_push($counts, $perCount);
	}
	return $counts;
}