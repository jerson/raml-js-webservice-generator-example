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
 * LinkDownload controller
 *
 */
class LinkDownloadController implements ControllerProviderInterface {

    /**
     * Route settings
     *
     */
    public function connect(Application $app) {
        $indexController = $app['controllers_factory'];

        $indexController->post("/link_download", array($this, 'createLinkDownload'))->bind('LinkDownload_createLinkDownload');
        
        $indexController->get("/link_download/{id}", array($this, 'showId'))->bind('LinkDownload_showId');
        $indexController->put("/link_download/{id}", array($this, 'updateId'))->bind('LinkDownload_updateId');
        $indexController->delete("/link_download/{id}", array($this, 'deleteId'))->bind('LinkDownload_deleteId');
        
        
        return $indexController;
    }

    
    /**
    * createLinkDownload LinkDownload
    *
    */
    public function createLinkDownload(Application $app, Request $request)
    {
        
            $em = $app['db.orm.em'];
            $entity = new Entity\LinkDownload();

            $form = $app['form.factory']->create(new Form\LinkDownloadType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {

                $em->persist($entity);
                $em->flush();

                return $app->redirect($app['url_generator']->generate('LinkDownload_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
                'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    
    /**
    * showId LinkDownload
    *
    */
    public function showId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\LinkDownload')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            return new Response($app['serializer']->serialize($entity, 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * updateId LinkDownload
    *
    */
    public function updateId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\LinkDownload')->find($id);

            if (!$entity) {
                $app->abort(404, 'No entity found for id '.$id);
            }

            $form = $app['form.factory']->create(new Form\LinkDownloadType(), $entity);
            $form->handleRequest($request);

            if ($form->isValid()) {
                $em->flush();

                return $app->redirect($app['url_generator']->generate('LinkDownload_showId', array('id' => $entity->getId())));
            }

            return new Response($app['serializer']->serialize(['error'=>$form->getErrorsAsString(),'data'=>$form->getViewData()], 'json'), 200, array(
            'Content-Type' => $request->getMimeType('json')
            ));
        
    }
    /**
    * deleteId LinkDownload
    *
    */
    public function deleteId(Application $app, Request $request, $id)
    {
        
            $em = $app['db.orm.em'];
            $entity = $em->getRepository('Entity\LinkDownload')->find($id);

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
