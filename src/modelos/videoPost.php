<?php

namespace Vidamrr\Poo\modelos;

class VideoPost extends Post implements IPost{


    public function __construct(
        private string $mensaje,
        private string $video
    )
    {
        parent::__construct($mensaje);
    }

    public function getVideo():string{
        return $this->video;
    }

    public function toString():string{
        $info = "id: ". $this->getId()." \n";
        $info .= "Mensaje: ".$this->getMensaje()." \n";
        $info .= "Video: ".$this->getVideo()." \n\n";
        $info .= "Likes: " . count($this->getLikes()) . "\n\n";

        return $info;
    }
}