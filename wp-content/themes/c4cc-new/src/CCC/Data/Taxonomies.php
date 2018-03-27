<?php

namespace CCC\Data;

use CCC\Services\Taxonomy;

class Taxonomies {

	/**
	 * @param array|string $postType
	 */
	public static function resourceType($postType) {
		// The Taxonomy
		$taxonomy = new Taxonomy('Resource Type');
		$taxonomy->setObjectType($postType);
		$taxonomy->setSingle('Type');
		$taxonomy->setPlural('Types');
		$taxonomy->setRewrite([
			'slug' => 'resource-type'
		]);
		$taxonomy->setHierarchical(true);
		$taxonomy->save();
	}

	/**
	 * @param array|string $postType
	 */
	public static function yearPublished($postType) {
		// The Taxonomy
		$taxonomy = new Taxonomy('Year published');
		$taxonomy->setObjectType($postType);
		$taxonomy->setSingle('Year');
		$taxonomy->setPlural('Years');
		$taxonomy->setRewrite([
			'slug' => 'year-published'
		]);
		$taxonomy->setHierarchical(true);
		$taxonomy->save();
	}

	/**
	 * @param array|string $postType
	 */
	public static function campaignProjectType($postType) {
		// The Taxonomy
		$taxonomy = new Taxonomy('Campaign Project Type');
		$taxonomy->setObjectType($postType);
		$taxonomy->setSingle('Project Type');
		$taxonomy->setPlural('Project Types');
		$taxonomy->setRewrite([
			'slug' => 'campaign-project-type'
		]);
		$taxonomy->setHierarchical(true);
		$taxonomy->save();
	}
}