<?php

   class Categoria extends Conectar{


      /* TODO: Mostrar todos los registro de Categoria */
     public function show_categoria(){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="SELECT *FROM tm_categoria WHERE est =1";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }




     /* TODO: Mostrar registro por cat_id recibido desde Frontend */
     public function show_categoria_id($cat_id){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="SELECT *FROM tm_categoria WHERE est =1 AND cat_id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }




     /* TODO: Insertar Nuevo Registro desde Frontend */
     public function create_categoria($cat_nom, $cat_descrip){
        $conectar=parent::Conexion();
        parent::set_names();
        $sql="INSERT INTO tm_categoria (cat_id, cat_nom, cat_descrip, est) 
        VALUES (NULL, ?, ?, '1')";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_nom);
        $sql->bindValue(2, $cat_descrip);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
     }



      /* TODO: Actualizar datos del Registro desde Frontend */
      public function update_categoria($cat_id, $cat_nom, $cat_descrip){
            $conectar=parent::Conexion();
            parent::set_names(); 

            $sql="UPDATE tm_categoria 
                  SET   cat_nom =?,
                        cat_descrip = ? 
                  WHERE cat_id = ?";

            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $cat_nom);
            $sql->bindValue(2, $cat_descrip);
            $sql->bindValue(3, $cat_id);
            $sql->execute();
        
     }



      /* TODO: Actualizar Campo est = 0 del Registro Segun cat_id */
      public function update_estado($cat_id){
        $conectar=parent::Conexion();
        parent::set_names(); 
        
        $sql="UPDATE tm_categoria 
              SET   est = '0'
              WHERE cat_id = ?";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $cat_id);
        $sql->execute();
    
     }


   }



?>