<?php

use Symfony\Component\HttpFoundation\Request;
use Agriwatch\Domain\Cooltainer;


$app->get('/api/cooltainers', function () use ($app) {

    $cooltainers = $app['dao.cooltainer']->findAll();
		
	$response = array();

	foreach ($cooltainers as $cooltainer) {
        $response[] = array(
            'id' => $cooltainer->getId(),
            'reference' => $cooltainer->getReference(),
            'address' => $cooltainer->getAddress(),
            'temperature' => $cooltainer->getTemperature(),
            'humidity' => $cooltainer->getHumidity(),
            'beesBoxOpen' => $cooltainer->isBeesBoxOpen()
        );
    }

    return $app->json($response);

})->bind('cooltainers');


$app->get('/api/cooltainers/{id}', function ($id) use ($app) {

	$cooltainer = $app['dao.cooltainer']->find($id);

	if(!$cooltainer){
		$error = array('message' => 'The cooltainer was not found.');
		return $app->json($error, 404);
	}

    $response = array(
        'id' => $cooltainer->getId(),
        'reference' => $cooltainer->getReference(),
        'address' => $cooltainer->getAddress(),
        'latitude' => $cooltainer->getLatitude(),
        'longitude' => $cooltainer->getLongitude(),
        'temperature' => $cooltainer->getTemperature(),
        'humidity' => $cooltainer->getHumidity(),
        'beesBoxOpen' => $cooltainer->isBeesBoxOpen()
    );

	return $app->json($response);

})->bind('cooltainer');

$app->put('/api/cooltainers/{id}', function (Request $request, $id) use ($app) {

    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {

        $data = json_decode($request->getContent(), true);

        if($data === null){

            $error = array('error' => 'There is an error in the json data.');
            return $app->json($error, 400); 
        }
        $request->request->replace(is_array($data) ? $data : array());
    }else{
        $error = array('error' => 'The header Content-Type must be application-json');
        return $app->json($error, 400); 
    }

    $cooltainer = $app['dao.cooltainer']->find($id);

    if($request->request->get('reference'))
        $cooltainer->setReference($request->request->get('reference'));
    if($request->request->get('address'))
        $cooltainer->setAddress($request->request->get('address'));
    if($request->request->get('latitude'))
        $cooltainer->setLatitude($request->request->get('latitude'));
    if($request->request->get('longitude'))
        $cooltainer->setLongitude($request->request->get('longitude'));
    if($request->request->get('temperature'))
        $cooltainer->setTemperature($request->request->get('temperature'));
    if($request->request->get('humidity'))
        $cooltainer->setHumidity($request->request->get('humidity'));
    if($request->request->get('beesBoxOpen'))
        $cooltainer->setIsBeesBoxOpen($request->request->get('beesBoxOpen'));
    
    $response = $app['dao.cooltainer']->save($cooltainer);

    
    if($response){
        $response = array('message' => 'The cooltainer id = '.$cooltainer->getId().' has been updated.');
        return $app->json($response, 201);
    }else{
        $response = array('error' => 'The cooltainer has not been registered. Missing data ?');
        return $app->json($response, 500);
    }

});

$app->post('/api/cooltainers', function (Request $request) use ($app) {
    
    if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
        $data = json_decode($request->getContent(), true);
        if($data === null){
            $error = array('error' => 'There is an error in the json data.');
            return $app->json($error, 400); 
        }
        $request->request->replace(is_array($data) ? $data : array());
    }else{
        $error = array('error' => 'The header Content-Type must be application-json');
        return $app->json($error, 400); 
    }

    $cooltainer = new cooltainer();
    $cooltainer->setReference($request->request->get('reference'));
    $cooltainer->setAddress($request->request->get('address'));
    $cooltainer->setLatitude($request->request->get('latitude'));
    $cooltainer->setLongitude($request->request->get('longitude'));
    $cooltainer->setTemperature($request->request->get('temperature'));
    $cooltainer->setHumidity($request->request->get('humidity'));
    $cooltainer->setIsBeesBoxOpen($request->request->get('beesBoxOpen'));
    
    $response = $app['dao.cooltainer']->save($cooltainer);
    
    if($response){
        $response = array('message' => 'The cooltainer id = '.$cooltainer->getId().' has been registered.');
        return $app->json($response, 201);
    }else{
        $response = array('error' => 'The cooltainer has not been registered. Missing data ?');
        return $app->json($response, 500);
    }

});