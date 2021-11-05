<?php

    header('Content-Type: application/json');

    require_once("../config/conexion.php");
    require_once("../models/Socio.php");
    $socio = new Socios();

    $body = json_decode(file_get_contents("php://input"), true);

    switch($_GET["op"]){
        case 'GetSocio':
            $datos=$socio->get_socio_all();
            echo json_encode($datos);
        break;
        
        case 'GetUno':
            $datos=$socio->get_socio($body['id']);
            echo json_encode($datos);
        break;

        case 'insertsocio':
            $datos=$socio->insert_socio($body['nombre'],$body['razon_social'],$body['direccion'],$body['tipo_socio'],$body['contacto'],$body['email'],$body['fecha_creado'],$body['estado'],$body['telefono']);
            echo json_encode('Socio Agregado');
        break;

        case 'updatesocio':
            $datos=$socio->update_socio($body['id'],$body['nombre'],$body['razon_social'],$body['direccion'],$body['tipo_socio'],$body['contacto'],$body['email'],$body['fecha_creado'],$body['telefono']);
            echo json_encode('Socio Actualizado');
        break;

        case 'deletesocio':
            $datos=$socio->delete_socio($body['id']);
            echo json_encode('Socio Eliminado');
        break;

    }



?>