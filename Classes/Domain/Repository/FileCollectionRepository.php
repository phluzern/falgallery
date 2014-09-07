<?php
namespace PHLU\Falgallery\Domain\Repository;

class FileCollectionRepository extends \TYPO3\CMS\Core\Resource\FileCollectionRepository {

	/**
	 * @param integer $pid
	 * @return NULL|\TYPO3\CMS\Core\Collection\AbstractRecordCollection[]
	 */
	public function findByPid($pid) {
		return $this->queryMultipleRecords(array('pid' => $pid));
	}

	/**
	 * Queries for multiple records for the given conditions.
	 *
	 * @param array $conditions Conditions concatenated with AND for query
	 * @return NULL|\TYPO3\CMS\Core\Collection\AbstractRecordCollection[]
	 */
	protected function queryMultipleRecords(array $conditions = array()) {
		$result = NULL;
		if (count($conditions) > 0) {
			$conditionsWhereClause = implode(' AND ', $conditions);
		} else {
			$conditionsWhereClause = '1=1';
		}
		$data = $this->getDatabaseConnection()->exec_SELECTgetRows('*', $this->table, $conditionsWhereClause . \TYPO3\CMS\Backend\Utility\BackendUtility::deleteClause($this->table), '', 'starttime DESC');
		if ($data !== NULL) {
			$result = $this->createMultipleDomainObjects($data);
		}
		return $result;
	}


}