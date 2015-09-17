<?php
namespace TYPO3\TYPO3CR\Search\Search;

/*                                                                              *
 * This script belongs to the TYPO3 Flow package "TYPO3.TYPO3CR.Search".        *
 *                                                                              *
 * It is free software; you can redistribute it and/or modify it under          *
 * the terms of the GNU General Public License, either version 3                *
 *  of the License, or (at your option) any later version.                      *
 *                                                                              *
 * The TYPO3 project - inspiring people to share!                               *
 *                                                                              */

use TYPO3\Flow\Annotations as Flow;
use TYPO3\TYPO3CR\Domain\Model\NodeInterface;

/**
 * Query Builder Interface for Content Repository searches
 */
interface QueryBuilderInterface {

	/**
	 * Sort descending by $propertyName
	 *
	 * @param string $propertyName the property name to sort by
	 * @return QueryBuilderInterface
	 */
	public function sortDesc($propertyName);

	/**
	 * Sort ascending by $propertyName
	 *
	 * @param string $propertyName the property name to sort by
	 * @return QueryBuilderInterface
	 */
	public function sortAsc($propertyName);

	/**
	 * output only $limit records
	 *
	 * @param integer $limit
	 * @return QueryBuilderInterface
	 */
	public function limit($limit);

	/**
	 * output records starting at $from
	 *
	 *
	 * @param integer $from
	 * @return QueryBuilderInterface
	 */
	public function from($from);

	/**
	 * add an exact-match query for a given property
	 *
	 * @param string $propertyName
	 * @param mixed $propertyValue
	 * @return QueryBuilderInterface
	 */
	public function exactMatch($propertyName, $propertyValue);

	/**
	 * Match the searchword against the fulltext index
	 *
	 * @param string $searchWord
	 * @return QueryBuilderInterface
	 */
	public function fulltext($searchWord);

	/**
	 *
	 * @param string $searchWord
	 * @return QueryBuilderInterface
	 */
	public function suggest($searchWord);

	/**
	 *
	 * @return QueryBuilderInterface
	 */
	public function aggregate();

	/**
	 * Execute the query and return the list of nodes as result
	 *
	 * @return \Traversable<\TYPO3\TYPO3CR\Domain\Model\NodeInterface>
	 */
	public function execute();

	/**
	 * Return the total number of hits for the query.
	 *
	 * @return integer
	 */
	public function count();

	/**
	 * Sets the starting point for this query. Search result should only contain nodes that
	 * match the context of the given node and have it as parent node in their rootline.
	 *
	 * @param NodeInterface $contextNode
	 * @return QueryBuilderInterface
	 */
	public function query(NodeInterface $contextNode);

	/**
	 * Filter by node type, taking inheritance into account.
	 *
	 * @param string $nodeType the node type to filter for
	 * @return QueryBuilderInterface
	 */
	public function nodeType($nodeType);

}