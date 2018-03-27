<?php
namespace CCC\Data;

use CCC\Services\PostQuery;

class FocusAreas
{
	public $post;
	public $params;

	public function __construct($pagePath) {
		$post = new PostQuery();
		$this->post = $post->first($pagePath, 'FocusAreas');
		$this->params = $this->post->get('params');
	}

	public function __toString() {
		$html = '';
		if(!empty($this->params)) {
			$cpf = $this->post->get('metas');
			foreach($this->params as $param) {
				$html .= '<div class="focus-area" style="background-image: url('.$cpf->get($param['background'], true).')">
                    <h3><a href="'.$cpf->get($param['url']).'">'.$cpf->get($param['title']).'</a></h3>
                </div>';
			}
		}
		return $html;
	}
}
