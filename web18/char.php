<?php
	include("cd.php");
	
	$out = [];
	$data = [];
	$label = [];
	$background = [];
	$border = [];
	
	$dd = sql_query("SELECT * FROM `process` LEFT JOIN(SELECT process_id, sum(`count`) as s FROM `count` GROUP by message_id) as a on a.process_id = process.id");
	foreach($dd as $val) {
		array_push($data, $val['s']);
		array_push($label, $val['name']);
		array_push($background, 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.5)');
		array_push($border, 'rgba('.rand(0,255).', '.rand(0,255).', '.rand(0,255).', 0.5)');
	}

	$out['labels'] = $label;
	$out['datasets'][] = [
		'label' => '# of Votes',
		'data' => $data,
		'borderWidth' => 2,
		'lineTension' => 0,
		'backgroundColor' => $background,
		'borderColor' => $border,
	];

	print_r(json_encode($out));