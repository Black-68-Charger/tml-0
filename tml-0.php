<?php
    # php7.4 wp-cli.phar eval-file tml-0.php
    global $wpdb;
    $results = $wpdb->get_results( <<<EOD
SELECT p.pid, p.filename, p.post_id, p.meta_data, x.ID, x.post_title, x.post_content, x.post_content_filtered, x.post_type
    FROM $wpdb->nggpictures p LEFT OUTER JOIN $wpdb->posts x ON p.extras_post_id = x.ID
EOD
    );
    foreach ( $results as $result ) {
        $result->meta_data             = C_NextGen_Serializable::unserialize( $result->meta_data );
        $result->post_content          = C_NextGen_Serializable::unserialize( $result->post_content );
        $result->post_content_filtered = C_NextGen_Serializable::unserialize( $result->post_content_filtered );
        print_r( $result );
    }
?>
