<?php

//記事の一番最初の画像を取得してサムネイルにする
function catch_that_image() {
    global $post, $posts;
    $first_img = '';

    ob_start();

    ob_end_clean();

    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

    $first_img = $matches [1][0];

    if (empty($first_img)) {
        $first_img = "http://res.cloudinary.com/hiro28/image/upload/v1482243634/IMG_2089_pl0myg.jpg";
    }

    return $first_img;
}

