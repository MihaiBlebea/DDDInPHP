<?php

require __DIR__ . '/vendor/autoload.php';

use App\Domain\Post\{
    PostRepo,
    Post
};
use App\Domain\Money\{
    Price,
    Currency
};
use App\Domain\User\{
    User,
    AgeRange,
    Password,
    Email
};

// PostRepo::savePost(Post::createWith('Ferrari', 'Michael Schumacher'));
// // var_dump($new_saved_post);


// $post = PostRepo::getPost(2);
//
// var_dump($post);

// $pounds = Currency::createFrom('£', 'GBP');
//
// $post_price = new Price(20, $pounds);
// $category_price = new Price(20, $pounds);
//
// // var_dump($post_price->isEqual($category_price));
//
// $new_price = $post_price->add(new Price(299, $pounds))
//                         ->add(new Price(1, $pounds))
//                         ->sub(new Price(300, $pounds));
// // var_dump($new_price->isGreaterThen($post_price));
// // var_dump($new_price->withMoneySign());
// var_dump($new_price);

$user = new User('Mihai', 'Blebea', new Email('mihaiserban.blebea@gmail.com'), new AgeRange(28), new Password('intrex007'), new Username('Serban', 'Blebea'));
var_dump($user);
