<?php

namespace Test\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction(){
    	/* Zend\DB
    	$categoriaService = $this->getServiceLocator()->get("Livraria\Model\CategoriaService");
    	$categorias = $categoriaService->fetchAll();
    	*/

    	$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        $repo = $em->getRepository('Test\Entity\Cidade');
        
        $cidades = $repo->findAll();

       return new ViewModel(array('cidades' => $cidades));
    }
}
