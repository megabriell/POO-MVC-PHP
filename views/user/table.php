<?php
    include dirname(__file__,3).'./models/users.php';
    $user  = new Users();
    $users = $user->getUsers();
            
    if ($users) {
        $json['data']=[];
        foreach ( $users as $row ){

            $boton = '<button type="button" class="btn btn-primary btn-sm" title="Agregar usuario" onclick="edit('.$row->Id_Empleado.')">
                <i class="fa fa-edit"></i> Editar</button>
                <button type="button" class="btn btn-default btn-sm" title="Agregar usuario" onclick="del('.$row->Id_Empleado.')">
                <i class="fa fa-trash-o"></i> Eliminar</button>';

            $json['data'][] = [
                'IdEmpleado'=>$row->Id_Empleado,
                'nombre'=>$row->Nombre . " " . $row->Apellido,
                'usuario'=>$row->Usuario,
                'correo'=>$row->CorreoP,
                'boton'=>$boton
            ];
        }
        echo json_encode($json);
    }else{
        echo "{}";
    }
?>