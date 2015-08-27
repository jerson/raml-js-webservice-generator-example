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
 * Genre controller
 *
 */
class GenreController implements ControllerProviderInterface {

    /**
     * Route settings
     *
     */
    public function connect(Application $app) {
        $indexController = $app['controllers_factory'];

        $indexController->get("/genre", array($this, 'showGenre'))->bind('Genre_showGenre');
        $indexController->post("/genre", array($this, 'createGenre'))->bind('Genre_createGenre');
        
        $indexController->get("/genre/featured", array($this, 'showFeatured'))->bind('Genre_showFeatured');
        
        $indexController->get("/genre/{id}", array($this, 'showId'))->bind('Genre_showId');
        $indexController->put("/genre/{id}", array($this, 'updateId'))->bind('Genre_updateId');
        $indexController->delete("/genre/{id}", array($this, 'deleteId'))->bind('Genre_deleteId');
        
        
        return $indexController;
    }

    
    /**
    * showGenre Genre
    *
    */
    public function showGenre(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\Genre')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * createGenre Genre
    *
    */
    public function createGenre(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entity = new Entity\Genre();

            $form = $app['form.factory']->create(new Form\GenreType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em->persist($entity);
                $em->flush();

                return $app->redirect($app['url_generator']->generate('Genre_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
                'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showFeatured Genre
    *
    */
    public function showFeatured(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\Genre')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showId Genre
    *
    */
    public function showId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Genre')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            return new Response($app['serializer']->serialize($entity, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * updateId Genre
    *
    */
    public function updateId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Genre')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            $form = $app['form.factory']->create(new Form\GenreType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();

                return $app->redirect($app['url_generator']->generate('Genre_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * deleteId Genre
    *
    */
    public function deleteId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Genre')->find($id);

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
