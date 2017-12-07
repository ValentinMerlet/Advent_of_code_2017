<?php

$input = "11
11
13
7
0
15
5
5
4
4
1
1
7
1
15
11";

$blocks = explode("\n", $input);
$countBlocks = count($blocks);
$patterns = [];
$patternKnown = false;
$step = 0;

do {

  $step++;
  $maxValue = max($blocks);
  $indexMaxValue = array_search($maxValue, $blocks);
  $blocks[$indexMaxValue] = 0;

  for ($i = $maxValue; $i > 0 ; $i--) {
    $indexMaxValue++;

    if ($indexMaxValue > $countBlocks - 1) {
      $indexMaxValue = 0;
    }

    $blocks[$indexMaxValue]++;
  }

  $implodedBlocks = implode("", $blocks);

  if (in_array($implodedBlocks, $patterns)) {
    $patternKnown = true;
    echo $step - (array_search($implodedBlocks, $patterns) + 1);
  } else {
    $patterns[] = $implodedBlocks;
  }

} while (!$patternKnown);

?>