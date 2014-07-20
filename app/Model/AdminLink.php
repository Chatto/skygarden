<?
class AdminLink extends AppModel {
	public $name = 'AdminLink';
	public $useTable = 'admin_links';
	public $belongsTo = array(
		'AdminCategory' => array(
			'className' => 'AdminCategory',
			'foreignKey' => 'admin_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);
}
?>
