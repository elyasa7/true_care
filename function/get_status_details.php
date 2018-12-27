
<?php
function get_item($id)
{
	include('../connection.php');

	$query = "SELECT * FROM agent WHERE id = '$id'";

	$result = mysql_query($query);
	$response = mysql_fetch_assoc($result);

	$status_content = get_status_container($response['agent_status'], $response['id']);

	if ($response['agent_status'] == '5') {
		$row_class = 'canceled-agent';
	} else {
		$row_class = '';
	}

	$row_indentifier = "item_row_".$id;

	return
		'<tr class="' . $row_class . ' ' . $row_indentifier . '">' .
		'<td>' .
		'<p class="hide-for-large text-center">' . $response['id'] . '</p>' .
		'<div class="text-center">' .
		'<img src="images/contracted.png" class="status-icon">' .
		'<img src="images/ic.png" class="status-icon">' .
		'</td>' .
		'<td class="show-for-medium">' .
		$response['agent_first_name'] . ' ' . $response['agent_last_name'] . '<br>' .
		'<span class="hide-for-large">' . $response['agent_email'] . '</span>' .
		'</td>' .
		'<td class="show-for-large">' .
		$response['agent_email'] .
		'</td>' .
		'<td class="show-for-large">' .
		$response['agent_phone'] .
		'</td>' .
		'<td class="show-for-large">' .
		$response['id'] .
		'</td>' .
		'<td class="agent-status-wrapper">' .

		'<span class="hide-for-medium">' .
		$response['agent_first_name'] . ' ' . $response['agent_last_name'] .
		'<br></span>' .

		'<span class="hide-for-medium">' . $response['agent_email'] . '<br></span>' .
		'<span class="hide-for-large">' . $response['agent_phone'] . '<br></span>' .
		$status_content .
		'</td>' .
		'<td>' .
		'<button class="button tiny text-white text-uppercase margin-bottom-0">' .
		'Chat' .
		'</button>' .
		'<br class="hide-for-medium">' .
		'<button class="button tiny success text-white text-uppercase margin-bottom-0 make_call">' .
		'<span class="phone_to_call" style="display: none;">' . $response['agent_phone'] . '</span>'.
		'Call' .
		'</button>' .
		'</td>' .
		'</tr>';
}

?>

<?php
function get_status_container($id, $item_id)
{
	include('../connection.php');

	$query = "SELECT * FROM status WHERE id = '$id'";

	$result = mysql_query($query);
	$response = mysql_fetch_assoc($result);
	$img = '<img src="' . $response['status_image'] . '" class="status-icon">';
	$text = '<span class="status-text" data-toggle="status-dropdown-' . $item_id . '">' . $response['status_title'] . '</span>';

	$rtr = '<div class="dropdown-pane status-dropdown" id="status-dropdown-' . $item_id . '" data-dropdown data-close-on-click="true">' .
		'<ul>' . get_list_of_statuses($id, $item_id) . '</ul> </div>';
	return $img . $text . $rtr;
}

?>

<?php function get_list_of_statuses($active_id, $item_id)
{

	include('../connection.php');

	$query = "SELECT * FROM status";

	$result = mysql_query($query);

	$final_result = "";
	while ($row = mysql_fetch_array($result)) {
		if ($active_id == $row['id']) {
			$active_class = 'active';
		} else {
			$active_class = '';
		}

		$final_result = $final_result .
			'<li class="' . $active_class . '">' .
			'<img src="' . $row['status_image'] . '" class="status-icon">' .
			'<span class="status-text update_status">' .
			'<span class="status_id" style="display: none;">' . $row['id'] . '</span>' .
			'<span class="item_id" style="display: none;">' . $item_id . '</span>' .
			$row['status_title'] .
			'</span>' .
			'</li>';
	}
	return $final_result;
}