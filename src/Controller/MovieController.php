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
 * Movie controller
 *
 */
class MovieController implements ControllerProviderInterface {

    /**
     * Route settings
     *
     */
    public function connect(Application $app) {
        $indexController = $app['controllers_factory'];

        $indexController->get("/movie", array($this, 'showMovie'))->bind('Movie_showMovie');
        $indexController->post("/movie", array($this, 'createMovie'))->bind('Movie_createMovie');
        
        $indexController->get("/movie/top", array($this, 'showTop'))->bind('Movie_showTop');
        
        $indexController->get("/movie/{id}", array($this, 'showId'))->bind('Movie_showId');
        $indexController->put("/movie/{id}", array($this, 'updateId'))->bind('Movie_updateId');
        $indexController->delete("/movie/{id}", array($this, 'deleteId'))->bind('Movie_deleteId');
        
        $indexController->get("/movie/{id}/genres", array($this, 'showIdGenres'))->bind('Movie_showIdGenres');
        
        
        return $indexController;
    }

    
    /**
    * showMovie Movie
    *
    */
    public function showMovie(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\Movie')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * createMovie Movie
    *
    */
    public function createMovie(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entity = new Entity\Movie();

            $form = $app['form.factory']->create(new Form\MovieType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em->persist($entity);
                $em->flush();

                return $app->redirect($app['url_generator']->generate('Movie_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
                'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showTop Movie
    *
    */
    public function showTop(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\Movie')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showId Movie
    *
    */
    public function showId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Movie')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            return new Response($app['serializer']->serialize($entity, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * updateId Movie
    *
    */
    public function updateId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Movie')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            $form = $app['form.factory']->create(new Form\MovieType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();

                return $app->redirect($app['url_generator']->generate('Movie_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * deleteId Movie
    *
    */
    public function deleteId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\Movie')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            $em->remove($entity);
            $em->flush();

            return new Response($app['serializer']->serialize(['success'=>true], 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showIdGenres Movie
    *
    */
    public function showIdGenres(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\Genre')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    

}
