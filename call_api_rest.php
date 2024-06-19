<?php

function resultat_requete ($request_data) {
    $args = array(
        'post_type' => 'album',
        'posts_per_page'=>-1,
        'numberposts'=>-1
    );
    $posts = get_posts($args);
    foreach ($posts as $key => $post) {
        $posts[$key]->acf = get_fields($post->ID);
        $posts[$key]->genres = wp_get_post_terms($post->ID, 'genre');
        $posts[$key]->teintes = wp_get_post_terms($post->ID, 'teinte');
        $posts[$key]->label = wp_get_post_terms($post->ID, 'label');
    }
    return $posts;
}

function resultat_artistes ($request_data) {
    $args = array(
        'post_type' => 'artiste',
        'posts_per_page'=>-1,
        'numberposts'=>-1
    );
    $posts = get_posts($args);
    foreach ($posts as $key => $post) {
        $posts[$key]->acf = get_fields($post->ID);
    }
    return $posts;
}

add_action( 'rest_api_init', function() {
    register_rest_route( 'daubify', '/albums', array(
        'methods' => 'GET',
        'callback' => 'resultat_requete',
        'permission_callback' => '__return_true'
    ));
    register_rest_route( 'daubify', '/artistes', array(
        'methods' => 'GET',
        'callback' => 'resultat_artistes',
        'permission_callback' => '__return_true'
    ));
});
?>