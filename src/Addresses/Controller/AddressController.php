<?php

namespace App\Addresses\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AddressController
{
    public function listAction(Request $request, Application $app)
    {
        $addresses = $app['repository.address']->getAll();

        return $app['twig']->render('addresses.list.html.twig', array('addresses' => $addresses));
    }

    public function deleteAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $app['repository.address']->delete($parameters['id']);

        return $app->redirect($app['url_generator']->generate('address.list'));
    }

    public function editAction(Request $request, Application $app)
    {
        $parameters = $request->attributes->all();
        $address = $app['repository.address']->getById($parameters['id']);

        return $app['twig']->render('addresses.form.html.twig', array('address' => $address));
    }

    public function saveAction(Request $request, Application $app)
    {
        $parameters = $request->request->all();
        if ($parameters['id']) {
            $address = $app['repository.address']->update($parameters);
        } else {
            $address = $app['repository.address']->insert($parameters);
        }

        return $app->redirect($app['url_generator']->generate('address.list'));
    }

    public function newAction(Request $request, Application $app)
    {
        return $app['twig']->render('addresses.form.html.twig');
    }
}