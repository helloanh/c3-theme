<?php

namespace CCC\Data;

class Fellow {

	public function getFellows($number = 50, $isFellow = 1) {
		$args = array(
			'number'     => $number,
			'meta_key'   => 'is_a_fellow',
			'meta_value' => $isFellow,
		);
		return get_users( $args );
	}
	public function __toString() {
		$html = '';
		$users = $this->getFellows();
		$authorEmail = get_the_author_meta( 'user_email' );
		if(!empty($users)) {
			foreach($users as $user) {
				$html .= '<div class="col-xs-12 col-lg-6">
					<div class="fellow"> <img class="img-responsive" src="'.get_avatar_url($user->ID).'">
						<div class="fellow-info">
							<a href="fellow/">'.$user->fellow_type.' fellow</a>
							<h4>'.$user->first_name.' '.$user->last_name.'</h4>
							<small>'.wp_trim_words($user->description, 40, '...').'</small>
						</div>
					</div>
				</div>';
			}
		}
		return $html;
	}
}