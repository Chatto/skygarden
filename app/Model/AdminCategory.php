<?
class AdminCategory extends AppModel {
	public $name = 'AdminCategory';
	public $useTable = 'admin_categories';
	    public $HasMany = array(
		'Link' => array(
			'className' => 'AdminLinks',
			'foreignKey' => 'link_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
		)
	);
}
?>
