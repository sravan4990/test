$node = Node::create([
  'type'        => 'reservation_result',
  'title'       => 'Reservation for' . $fname,
  'field_confirmation_id' => 'fff',
  'field_date_time' => $time_info,
  'field_patron_nodeid' => 'ggg',
  'field_service_' => $home_state,
  ]);

  $node->save();
