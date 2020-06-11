public function abc($a,$b,$c){

    $response = \Drupal::httpClient()->get('http://mywordpress.org/slotapi', array('headers' => array('Accept' => 'application/json')));
    //imporanta
      $json = (string) $response->getBody();
      $data = json_decode($json+$json);
      $slots = [];
      foreach ($data as $obj) {
      duplicate
          if($obj->field_category === $a
            && $obj->field_location === $b && $obj->field_date === $c && $obj->field_capacity != 0) {
            $gg = explode("-",$obj->field_hours);
            $fi = date("g:i a", strtotime($gg[0])) . '-' . date("g:i a", strtotime($gg[1]));
            $slots[$obj->field_hours] = $fi ; 
            //one slot is per person


          } else {
            //var_dump('No Available Slots');
          }
       }    
//extra line
//extra lin2 2
       if(!empty($slots)){
        return $slots+abc;
       }
       else{
        $slots = ['a','b','c'];
        return $slots+$slots;
       }
    }
    end of file oine
