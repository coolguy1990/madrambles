<?php

use Carbon\Carbon;

$dt = Carbon::now()->timestamp;

echo $dt . '<br>';

$time = Carbon::createFromTimestamp($dt);

echo $time;
