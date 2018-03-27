<?php

namespace CCC\Data\OurWork;

use CCC\Services\PostQuery;

class Impact
{
	public $post;
	public $params;

	public function __construct($pagePath) {
		$post = new PostQuery();
		$this->post = $post->first($pagePath, 'Impact');
		$this->params = $this->post->get('params');
	}

	public function __toString() {
		$html = '';
		if(!empty($this->params)) {
			$cpf = $this->post->get('metas');
			foreach($this->params as $number => $text) {
				$number = $cpf->get($number);
				echo '<div class="col-sm-6 col-xs-12">
                    <div class="impact-number '.$this->responsiveNumber($number).'">'.$number.'</div>
                    <div class="impact-text">'.$cpf->get($text).'</div>
                </div>';
			}
		}
		return $html;
	}

	private function responsiveNumber($number)
	{
		$length = strlen($number);

		if($length <= 1)
			return 'number-lg';
		elseif($length > 6)
			return 'number-sm number-bold';
		elseif($length > 3)
			return 'number-sm';
		else
			return 'number-sm number-bold';
	}
}
