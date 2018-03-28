<?php

/**
 * Maps data array into Model
 * @param Model $model
 * @param Array $data
 * @return Model
 */
function mapModel($model = null, $data = null) {
    if ($model && $data) {
        foreach ($model->getAttributes(false) as $key) {
            if ($key === $model->getKeyName()) {
                continue;
            }
            if (array_has($data, $key)) {
                array_set($model, $key, $data[$key]);
            }
        }
    }
    return $model;
}

/**
 * Return month name from month integer [1-12]
 * @param Int $monthNumber
 * @return String
 */
function monthName($monthNumber) {
    if($monthNumber<= 12){
        return date("F", mktime(0, 0, 0, $monthNumber, 1));
    }
    return humanReadableDate($monthNumber, true);
}

/**
 * Generates human readable dates
 * @param String $date
 * @param Bool $short
 * @return String
 */
function humanReadableDate($date, $short = false){
    return $short ? date("D jS, Y", strtotime($date)) : date("F jS, Y", strtotime($date));
}