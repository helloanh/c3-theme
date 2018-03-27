<?php

namespace CCC\Data\OurWork;

use CCC\Services\PostQuery;

class Model
{
	public $post;
	public $params;

	public function __construct($pagePath) {
		$post = new PostQuery();
		$this->post = $post->first($pagePath, 'Model');
		$this->params = $this->post->get('params');
	}

	public function __toString() {
		$html = '';
		if(!empty($this->params)) {
			$cpf = $this->post->get('metas');
			foreach($this->params as $icon => $content) {
				$title = $cpf->get($content['title']);
				$html .= '<div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="model-title">'.$title.'</h3>
                    <div class="model-image">
                    	<img src="'.asset('images/icons/' . $content['icon']).'" alt="'.$title.'" class="img-responsive">
                    </div>
                    <p class="model-text">'.$cpf->get($content['text']).'</p>
                </div>';
			}
		}
		return $html;
	}
}