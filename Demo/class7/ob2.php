<?php
ob_start();

echo 'First Buffer';

ob_start();

echo 'Second Buffer';

ob_end_flush();


ob_end_flush();