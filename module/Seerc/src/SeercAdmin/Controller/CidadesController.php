<?php

namespace SeercAdmin\Controller;

use Zend\Mvc\Controller\AbstractActionController,
	zend\View\Model\ViewModel;

use Zend\Paginator\Paginator,
	Zend\Paginator\adapter\ArrayAdapter;	

Class CidadesController extends AbstractActionController {

	/**
	 * @var EntityManager
	 */ 	

	protected $em;

	public function indexAction(){

		$list = $this->getEm()
			    ->getRepository('Seerc\Entity\Cidade')
			    ->findAll();

        $page = $this->params()->fromRoute('page');

        $paginator = new Paginator(new ArrayAdapter($list));
        $paginator->setCurrentPageNumber($page);
        $paginator->setDefaultItemCountPerPage(2);
	
	 return new ViewModel(array('data' => $paginator, 'page' => $page));			    

	}

	/**
	 * @return EntityManager
	 */ 

	protected function getEm(){
		if(null=== $this->em)
			$this->em = $this->getServiceLocator ()->get('Doctrine\ORM\EntityManager');

		return $this->em;
	}
}


?>