<?php

namespace Controller;

use Silex\Application;
use Silex\ControllerProviderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Entity;
use Form;

/**
 * Autor controller
 *
 */
class AutorController implements ControllerProviderInterface {

    /**
     * Route settings
     *
     */
    public function connect(Application $app) {
        $indexController = $app['controllers_factory'];

        $indexController->get("/autor", array($this, 'showAutor'))->bind('Autor_showAutor');
        $indexController->post("/autor", array($this, 'createAutor'))->bind('Autor_createAutor');
        
        $indexController->get("/autor/featured", array($this, 'showFeatured'))->bind('Autor_showFeatured');
        
        $indexController->get("/autor/{id}", array($this, 'showId'))->bind('Autor_showId');
        $indexController->put("/autor/{id}", array($this, 'updateId'))->bind('Autor_updateId');
        $indexController->delete("/autor/{id}", array($this, 'deleteId'))->bind('Autor_deleteId');
        
        
        return $indexController;
    }

    
    /**
    * showAutor Autor
    *
    */
    public function showAutor(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\Autor')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * createAutor Autor
    *
    */
    public function createAutor(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entity = new Entity\Autor();

            $form = $app['form.factory']->create(new Form\AutorType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em->persist($entity);
                $em->flush();

                return $app->redirect($app['url_generator']->generate('Autor_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
                'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showFeatured Autor
    *
    */
    public function showFeatured(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\Autor')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showId Autor
    *
    */
    public function showId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Autor')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            return new Response($app['serializer']->serialize($entity, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * updateId Autor
    *
    */
    public function updateId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Autor')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            $form = $app['form.factory']->create(new Form\AutorType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();

                return $app->redirect($app['url_generator']->generate('Autor_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * deleteId Autor
    *
    */
    public function deleteId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Autor')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            $em->remove($entity);
            $em->flush();

            return new Response($app['serializer']->serialize(['success'=>true], 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    

}
