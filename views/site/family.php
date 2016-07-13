<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 01.07.2016
 * Time: 11:42
 */
echo "<ul>";
foreach($family as $f)
{
    echo '<li>' . $f->Name . " " .  $f->Surname . '</li>';
}
echo "</ul>";