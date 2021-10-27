<?php

require 'vendor/autoload.php';

use Vidamrr\Poo\modelos\ImagePost;
use Vidamrr\Poo\modelos\User;
use Vidamrr\Poo\modelos\VideoPost;

$marcos = new User("Marcos Rivas", "vidamrr", "vidamrr@hotmail.com", "ViDaMRR123");
$lena = new User("Lena Sanchez", "lenis", "lenis@hotmail.com", "lenis123");
$omar = new User("Omar Pozos", "omarpoz", "omarpoz@hotmail.com", "omar123");
$maria = new User("Maria Magdalena", "maria", "maria@hotmail.com", "maria123");

$marcosPost = new ImagePost("De vacaciones en la playa con mi amorcito", "IMG001.jpg");
$lenaPost = new VideoPost("Con mi amorcito en la playirri esta semana", "VID001.mov");
$omarPost = new VideoPost("En junta con mi cliente", "VID009.mov");
$mariaPost = new ImagePost("Jugando con los perritos", "IMG101.jpg");

$marcos->publish($marcosPost);
$lena->publish($lenaPost);
$omar->publish($omarPost);
$maria->publish($mariaPost);
$maria->publish($mariaPost);
$maria->publish($mariaPost);
$maria->publish($mariaPost);

$marcosPost->addLike($lena);
$marcosPost->addLike($omar);

$lenaPost->addLike($marcos);
$lenaPost->addLike($omar);
$lenaPost->addLike($lena);
$lenaPost->addLike($maria);

$omarPost->addLike($lena);
$omarPost->addLike($maria);

$mariaPost->addLike($marcos);
$mariaPost->addLike($lena);
$mariaPost->addLike($omar);

$marcos->addFollower($lena);
$marcos->addFollower($omar);

$lena->addFollower($marcos);

$maria->addFollower($marcos);
$maria->addFollower($omar);
$maria->addFollower($lena);

print_r(User::showProfile($marcos));
print_r(User::showProfile($lena));
print_r(User::showProfile($omar));
print_r(User::showProfile($maria));

print_r($marcosPost->toString());
print_r($lenaPost->toString());
print_r($omarPost->toString());
print_r($mariaPost->toString());