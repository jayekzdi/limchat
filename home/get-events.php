<?php

//--------------------------------------------------------------------------------------------------
// This script reads event data from a JSON file and outputs those events which are within the range
// supplied by the "start" and "end" GET parameters.
//
// An optional "timezone" GET parameter will force all ISO8601 date stings to a given timezone.
//
// Requires PHP 5.2.0 or higher.
//--------------------------------------------------------------------------------------------------

// Require our Event class and datetime utilities
include '../db.php';
// Short-circuit if the client did not give us a date range.
header("Content-Type: application/json");
// Read and parse our events JSON file into an array of event data arrays.
// $json = file_get_contents(dirname(__FILE__) . '/../json/events.json');
// $input_arrays = json_decode($json, true);

// // Accumulate an output array of event data arrays.
// $output_arrays = array();
// foreach ($input_arrays as $array) {  

//  // Convert the input array into a useful Event object
//  $event = new Event($array, $timezone);

//  // If the event is in-bounds, add it to the output
//  if ($event->isWithinDayRange($range_start, $range_end)) {
//      $output_arrays[] = $event->toArray();
//  }
// }
$sql="select * from event where event_status=1";
                        $result=mysqli_query($connect,$sql);
                        $event=array();
                         while ($row=mysqli_fetch_array($result)){
                          $e = array();
     $e['id'] = $row['event_id'];
     $e['title'] =$row['event_name'];
     $e['start'] = $row['event_date_start']." ".$row['event_time_start'];
     $e['end'] = $row['event_date_end']." ".$row['event_time_end'];
     array_push($event, $e);
                        }
// Send JSON to the client.
echo json_encode($event);
?>