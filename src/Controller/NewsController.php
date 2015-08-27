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
 * News controller
 *
 */
class NewsController implements ControllerProviderInterface {

    /**
     * Route settings
     *
     */
    public function connect(Application $app) {
        $indexController = $app['controllers_factory'];

        $indexController->get("/news", array($this, 'showNews'))->bind('News_showNews');
        $indexController->post("/news", array($this, 'createNews'))->bind('News_createNews');
        
        $indexController->get("/news/latest", array($this, 'showLatest'))->bind('News_showLatest');
        
        $indexController->get("/news/{id}", array($this, 'showId'))->bind('News_showId');
        $indexController->put("/news/{id}", array($this, 'updateId'))->bind('News_updateId');
        $indexController->delete("/news/{id}", array($this, 'deleteId'))->bind('News_deleteId');
        
        
        return $indexController;
    }

    
    /**
    * showNews News
    *
    */
    public function showNews(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\News')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * createNews News
    *
    */
    public function createNews(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entity = new Entity\News();

            $form = $app['form.factory']->create(new Form\NewsType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em->persist($entity);
                $em->flush();

                return $app->redirect($app['url_generator']->generate('News_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
                'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showLatest News
    *
    */
    public function showLatest(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entities = $em->getRepository('Entity\News')->findAll();

            return new Response($app['serializer']->serialize($entities, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showId News
    *
    */
    public function showId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\News')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            return new Response($app['serializer']->serialize($entity, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * updateId News
    *
    */
    public function updateId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\News')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            $form = $app['form.factory']->create(new Form\NewsType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();

                return $app->redirect($app['url_generator']->generate('News_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * deleteId News
    *
    */
    public function deleteId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\News')->find($id);

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
