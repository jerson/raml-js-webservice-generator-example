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
 * Actor controller
 *
 */
class ActorController implements ControllerProviderInterface {

    /**
     * Route settings
     *
     */
    public function connect(Application $app) {
        $indexController = $app['controllers_factory'];

        $indexController->get("/actor", array($this, 'showActor'))->bind('Actor_showActor');
        $indexController->post("/actor", array($this, 'createActor'))->bind('Actor_createActor');
        
        $indexController->get("/actor/featured", array($this, 'showFeatured'))->bind('Actor_showFeatured');
        
        $indexController->get("/actor/{id}", array($this, 'showId'))->bind('Actor_showId');
        $indexController->put("/actor/{id}", array($this, 'updateId'))->bind('Actor_updateId');
        $indexController->delete("/actor/{id}", array($this, 'deleteId'))->bind('Actor_deleteId');
        
        
        return $indexController;
    }

    
    /**
    * showActor Actor
    *
    */
    public function showActor(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\Actor')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * createActor Actor
    *
    */
    public function createActor(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entity = new Entity\Actor();

            $form = $app['form.factory']->create(new Form\ActorType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em->persist($entity);
                $em->flush();

                return $app->redirect($app['url_generator']->generate('Actor_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
                'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showFeatured Actor
    *
    */
    public function showFeatured(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\Actor')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showId Actor
    *
    */
    public function showId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Actor')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            return new Response($app['serializer']->serialize($entity, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * updateId Actor
    *
    */
    public function updateId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Actor')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            $form = $app['form.factory']->create(new Form\ActorType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();

                return $app->redirect($app['url_generator']->generate('Actor_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * deleteId Actor
    *
    */
    public function deleteId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Actor')->find($id);

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
