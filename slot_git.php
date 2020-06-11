public function buildForm(array $form, FormStateInterface $form_state) {

    $form['home_state'] = array(
        '#type' => 'select',
        '#title' => $this->t('Select Category*'),
        '#options' => array(
            'Cybercenter' => 'Cybercenter',
            'Loan' => 'Loan',
        ),
    );

    $library_list = slot_reservation_library();

    $form['home_library'] = array(
        '#type' => 'select',
        '#title' => $this->t('Select Library Location'),
        '#options' => $library_list,
    );

    $form['fname'] = array(
      '#type' => 'textfield',
      '#size' => 30,
      '#maxlength' => 100,
      '#title' => t('First Name*'),
      //'#required' => TRUE,
    );

    $form['lname'] = array(
      '#type' => 'textfield',
      '#size' => 30,
      '#maxlength' => 100,
      '#title' => t('Last Name*'),
      //'#required' => TRUE,
    );

    $form['phone'] = array(
        //'#type' => 'number',
        '#type' => 'tel',
        '#title' => $this->t('Phone Number'),
        '#maxlength' => 10,
        '#title' => t('Phone*'),
        //'#required' =>  TRUE,
    );


    $form['email'] = array(
        '#type' => 'email',
        '#size' => 30,
        '#maxlength' => 100,
        '#title' => t('Email*'),
        //'#required' =>  TRUE,
    );

    $form['birth_date_new'] = array(
      '#type' => 'date',
      //'#required' => TRUE,
      '#title' => t('Birth Date*'),
    );

    

    $form['start_date'] = [
      '#type' => 'date',
      '#title' => t('Select Date'),
      // '#attributes' => [
      // 'type' => 'date',
      // 'min' =>  \Drupal::service('date.formatter')->format(REQUEST_TIME, 'custom', 'Y-m-d'),
      //   ],
      '#ajax' => array(
        'callback' => array($this, 'checkslots'),
        'event' => 'change',
        'wrapper' => 'person-container',
        'method' => 'replace',
        'effect' => 'fade',
      ),
    ];


    $form['person_container'] = array(
      '#type' => 'container',
      '#attributes' => ['id' => 'person-container'],
    );

    $a = $form_state->getValue('home_state');
    $b = $form_state->getValue('home_library');
    $c = $form_state->getValue('start_date');

    $form['person_container']['person'] = array(
      '#type' => 'select',
      '#title' => $this->t('Choose person'),
      '#options' => $this->abc($a,$b,$c),
    );


    $form['time_info'] = array(
        '#type' => 'textarea',
        '#cols' => 76,
        '#rows' => 10,
        //'#required' =>  TRUE,
        '#title' => t('Available slots'),
        '#prefix' => '<div id="my-wrapper">',
        '#suffix' => '</div>'
    );

    // $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Reserve'),
      '#button_type' => 'primary',
    );

    $form['#attached']['library'][] = 'resume/resume_script';
    return $form;
  }
