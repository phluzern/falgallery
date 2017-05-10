<?php

namespace PHLU\Falgallery\Controller;

class GalleryController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \PHLU\Falgallery\Domain\Repository\FileCollectionRepository
	 * @inject
	 */
	protected $fileCollectionRepository;

	public function listAction() {
		$storagePid = (int)$this->settings['storagePid'];
		$fileCollections = $this->fileCollectionRepository->findByPid($storagePid);
		$this->view->assign('galleries', $fileCollections);
	}

	/**
	 * @param integer $gallery
	 */
	public function showAction($gallery) {
		$gallery = $this->fileCollectionRepository->findByUid($gallery);
		$gallery->loadContents();
		$this->view->assign('gallery', $gallery);
	}

}
