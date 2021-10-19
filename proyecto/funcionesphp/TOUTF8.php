
<?php
function toutf8($mixed)
{
    if (is_array($mixed)) {
        foreach ($mixed as $key => $value) {
            $mixed[$key] = toutf8($value);
        }
    } elseif (is_string($mixed)) {
        if (preg_match('!!u', $mixed)) {
            return $mixed;
        } else {
            return utf8_encode($mixed);
        }
    }
    return $mixed;
}