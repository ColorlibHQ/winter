    <!-- free shipping here -->
    <section class="shipping_details section_padding">
        <div class="container">
            <div class="row">
                <?php
                $shipping_content = winter_opt( 'winter_shipping_settings' );
                if ( is_array( $shipping_content ) && count( $shipping_content ) > 0 ) {
                    foreach( $shipping_content as $single_item ) {
                        $image = $single_item['image'];
                        $title = $single_item['title'];
                        $text  = $single_item['text'];
                        ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single_shopping_details">
                                <img src="<?php echo esc_url( $image )?>" alt="<?php echo esc_attr( $title )?>">
                                <h4><?php echo esc_html( $title )?></h4>
                                <p><?php echo esc_html( $text )?></p>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- free shipping end -->

    <!-- subscribe_area part start-->
    <section class="instagram_photo">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php
                        $ins_user   = !empty( winter_opt( 'winter_instagram_username')) ? winter_opt( 'winter_instagram_username' ) : 'hasanfardousrubel';
                        $ins_photos = !empty( winter_opt( 'winter_instagram_photo_limit' )) ? winter_opt( 'winter_instagram_photo_limit' ) : 5;
                    ?>
                    <div class="instagram_photo_iner" data-username="<?php echo esc_attr( $ins_user )?>" data-items="<?php echo esc_attr( $ins_photos )?>"></div>
                </div>
            </div>
        </div>
    </section>
    <!--::subscribe_area part end::-->