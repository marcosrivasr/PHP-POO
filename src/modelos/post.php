<?php

namespace Vidamrr\Poo\modelos;

use Vidamrr\Poo\utils\UUID;

class Post{

    private string $id;
    private array $likes;

    public function __construct(private string $mensaje)
    {
        print_r("Se creó un nuevo objeto Post \n");
        $this->id = UUID::generate();
        $this->likes = [];
    }

    protected function saludo(){
        return "Hola desde este post, con id $this->id";
    }

    public function getId():string{
        return $this->id;
    }

    public function setId(string $id){
        $this->id = $id;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function getLikes(){
        return $this->likes;
    }

    protected function checkIfUserLiked(User $user):bool{
        $found = array_filter(
            $this->likes,
            function(Like $like) use ($user){
                return $like->getUser()->getId() === $user->getId();
            }
        );
        return count($found) === 1;
    }

    public function addLike(User $user){
        if($this->checkIfUserLiked($user)){
            $this->removeLike($user);
        }else{
            $like = new Like($user);
            array_push($this->likes, $like); 
        }
    }

    public function removeLike(User $user){
        $this->likes = array_filter(
            $this->likes,
            fn (Like $like) => $like->getUser()->getId() !== $user->getId()
        );
    }
}