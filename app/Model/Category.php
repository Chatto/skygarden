<?
class Category extends AppModel {
	public $name = 'Category';
    public $actsAs = array('Tree');
    	public $hasMany = array(
		'ChildCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'parent_id',
			'dependent' => false
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'category_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
    public $belongsTo = array(
		'ParentCategory' => array(
			'className' => 'Category',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>
