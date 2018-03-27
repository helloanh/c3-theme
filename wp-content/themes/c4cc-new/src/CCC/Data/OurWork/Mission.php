<?php

namespace CCC\Data\OurWork;

use CCC\Services\PostQuery;

class Mission
{
	public $post;
	public $params;

	public function __construct($pagePath) {
		$post = new PostQuery();
		$this->post = $post->first($pagePath, 'Mission');
		$this->params = $this->post->get('params');
	}

	public function __toString() {
		$html = '';
		if(!empty($this->params)) {
			$cpf = $this->post->get('metas');
			foreach($this->params as $key) {
				$html .= '<div class="col-md-6 col-sm-3 col-xs-6 bloc-container">
					<div data-id="text-block-'.$key.'" class="bloc showBlockText">
						<div class="bloc-image" style="background-image: url('.$cpf->get('background_block'.$key, true).')"></div>
						<div class="bloc-text">
							<a href="'.$cpf->get('url_block_'.$key).'"><h4>'.$cpf->get('title_block'.$key).'</h4></a>
						</div>
					</div>
				</div>';
			}
		}
		return $html;
	}
}
