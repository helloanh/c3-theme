<?php

namespace CCC\Services;

class MetaBox extends FormBuilder
{
    private $uid;
	private $title;
	private $postType = 'post';
	private $context  = 'advanced';
	private $priority = 'default';

	public $fields = [];
	protected $namePrefix = "cpf_";

	public function __construct()
    {
    	parent::__construct();
        // If we are not in admin area exit.
	    if( !is_admin())
		    return;
    }

    public function register()
	{
		add_action('add_meta_boxes', [$this, 'add'] );
		add_action('save_post', [$this, 'save'] );
	}

    public function add()
    {
	    add_meta_box($this->uid, $this->title, [$this, 'show'], $this->postType, $this->context, $this->priority);
    }

    public function show($post)
    {
        wp_nonce_field( basename(__FILE__), 'chh_meta_box_nonce' );
        foreach($this->fields as $field) {
            if(isset($field['id'])) {
            	$this->setDatas($field['id'], get_post_meta( $post->ID, $field['id'], true ));
	            $this->addAttr('id', $field['id']);
            }
	        echo call_user_func_array([$this, $field['type']], $field['args']);
        }
    }

    public function addField($type, $id, ...$args)
    {
        $this->fields[$id]['type'] = $type;
        $this->fields[$id]['args'] = $args;
        if($type != 'label') {
	        $this->fields[$id]['id'] = "cpf_".$id;
        }
    }

    public function save($post_id)
    {
        global $post_type;

        if(
            !isset( $_POST['chh_meta_box_nonce'] )
            OR !wp_verify_nonce( $_POST['chh_meta_box_nonce'], basename(__FILE__) )
            OR ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
            OR ( $post_type != $this->postType )
            OR !current_user_can( 'edit_post', $post_id )
        ) {
            return;
        }

        // Save the information into the database
        foreach($this->fields as $field) {
            if(!array_key_exists('id', $field))
                continue;
            $my_data = sanitize_text_field($_POST[$field['id']]);

	        update_post_meta($post_id, $field['id'], $my_data);
        }
    }

	/**
	 * @param mixed $uid
	 */
	public function setUid( $uid ) {
		$this->uid = $uid;
	}

	/**
	 * @param mixed $title
	 */
	public function setTitle( $title ) {
		$this->title = $title;
	}

	/**
	 * @param string $postType
	 */
	public function setPostType( string $postType ) {
		$this->postType = $postType;
	}

	/**
	 * @param string $context
	 */
	public function setContext( string $context ) {
		$this->context = $context;
	}

	/**
	 * @param string $priority
	 */
	public function setPriority( string $priority ) {
		$this->priority = $priority;
	}
}
