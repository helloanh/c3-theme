<?php

namespace CCC\Traits;

use CCC\Services\Paginate;
use CCC\Services\PostQuery;

trait SearchBar {

	/**
	 * @var string|integer $categoryTerm
	 */
	private $categoryTerm;

	/**
	 * @var string|integer $searchTerms
	 */
	private $searchTerms;

	private $baseUrls = [
		'campaign' => 'campaigns',
		'resource' => 'resources'
	];

	public function search($cptName) {
		$posts = PostQuery::type($cptName);
		if(isset($_POST) && !empty($_POST)) {
			$this->categoryTerm = sanitize_title($_POST['category']);
			$this->searchTerms  = sanitize_title(trim($_POST['search']));
			if(!empty($this->searchTerms)) {
				$posts->where('tax_query', [[
					'taxonomy' => $this->categoryTerm,
					'field'    => 'name',
					'terms'    =>  $this->searchTerms
				]]);
			}
		}
		$currentPage = 1;
		$baseUrl = $this->getBaseUrl($cptName);
		$uri = str_replace($baseUrl, '', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

		if(!empty($uri)) {
			$currentPage = str_replace(['/page', '/'], '', $uri);
		}
		Paginate::getInstance()
		        ->setBaseUrlX($baseUrl)
				->currentPage($currentPage);
		return Paginate::getInstance()->make($posts);
	}

	public function pagination() {
		return Paginate::getInstance()->generate();
	}

	/**
	 * @return mixed
	 */
	public function getCategoryTerm() {
		return $this->categoryTerm;
	}

	/**
	 * @return mixed
	 */
	public function getSearchTerms() {
		return $this->searchTerms;
	}

	/**
	 * @return mixed
	 */
	public function getBaseUrl($cptName) {
		if(array_key_exists($cptName, $this->baseUrls)) {
			return WP_HOME.'/'.$this->baseUrls[$cptName];
		}
		return null;
	}
}
