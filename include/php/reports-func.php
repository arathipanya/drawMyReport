<?php

function addSelectGraph($graphs_array) {
  $str = '<div class="select-parent"><select type="text" class="form-control" name="create_report[graphs][]" placeholder="Select a graph">
          <option value="-">-</option>';
  for ($i = 0; $i < count($graphs_array); $i++) {
    $str .= '<option value="'.$graphs_array[$i]->id.'">'.$graphs_array[$i]->name.'</options>';
  }

  $str .= '</select></div>
	<br>
        <button class="xs-btn btn-default add-graph-report">Add a graph</button>';
  return $str;
}

?>