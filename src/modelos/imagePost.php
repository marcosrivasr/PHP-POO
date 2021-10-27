<?php

namespace Vidamrr\Poo\modelos;

class ImagePost extends Post implements IPost{

    public function __construct(
        private string $mensaje, 
        private string $imagen
    )
    {
        print_r("Se creó un nuevo objeto ImagePost \n");
        parent::__construct($mensaje);
    }

    public function getImagen():string{
        return $this->imagen;
    }

    public function toString():string{
        $info = "id: ". $this->getId()." \n";
        $info .= "Mensaje: ".$this->getMensaje()." \n";
        $info .= "Imagen: ".$this->getImagen()." \n\n";
        $info .= "Likes: " . count($this->getLikes()) . "\n\n";

        return $info;
    }

}