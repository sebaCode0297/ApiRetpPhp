<?php


// Definimos los recursos 
$allowedResourcesTypes = [
    'books',
    'authors',
    'generes',
];

// Validamos que el recurso este disponible
$resourceType = $_GET['resource_type'];

if (!in_array($resourceType, $allowedResourcesTypes)) {
    die;
}

// Definimos los recursos -> Principalemnte estos recursos estarian en una BD.
$books = [
    1 => [
        'titulo' => 'Lo que el viento se llevo',
        'id_autor' => 1,
        'id_genero' => 1,
    ],
    2 => [
        'titulo' => 'Harry Potter',
        'id_autor' => 2,
        'id_genero' => 2,
    ],
    3 => [
        'titulo' => 'Matar a un Rui Señor',
        'id_autor' => 3,
        'id_genero' => 3,
    ]
];

header('Content-Type: application/json');

// Levantamos el ID del RECURSO que se esta buscando.
$resourceId = array_key_exists('resource_id', $_GET) ? $_GET['resource_id']: '';

// Generamos la respuesta asumineod que la peticion HTTP es correcta
switch (strtoupper($_SERVER['REQUEST_METHOD'])) {
    case 'GET':
        if (empty($resourceId)) {
            echo json_encode($books);
        }else {
            if (array_key_exists( $resourceId, $books)) {
                echo json_encode($books[$resourceId]);
            }
        }
        
        break;
    case 'POST':
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
    default:
        echo 'Fin del la ejecution';
        break;
}
