<?class Contact extends AppModel {

    public $name = 'Contact';
    

    public $validate = array(
    'required' => array(
        'name' => array(
            'rule' => 'notEmpty',
            'message' => 'You have not entered your name.'
        ),
        'email' => array(
			'rule' => 'email',
			'required' => true,
			'message' => 'Invalid email!'
        ),
        'message' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'message' => 'You did not enter a message.'
        )
    ));
    
}?>
