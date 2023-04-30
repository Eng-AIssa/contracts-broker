<?php


function isSelected($old, $current): ?string
{
    return $old == $current ? 'selected' : null;
}
