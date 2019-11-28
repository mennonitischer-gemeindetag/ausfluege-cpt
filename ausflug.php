<?php
    $start_date = get_post_meta(get_the_ID(), 'startZeit', true);
    $end_date = get_post_meta(get_the_ID(), 'endZeit', true);
    $leiter = get_post_meta(get_the_ID(), 'leiter', true);
    $beschreibung = get_post_meta(get_the_ID(), 'beschreibung', true);
    $character = get_post_meta(get_the_ID(), 'character', true);
    $nr = get_post_meta(get_the_ID(), 'nr', true);
    $preis = get_post_meta(get_the_ID(), 'preis', true);
    
    $start = new \DateTime($start_date); 
    $end = new \DateTime($end_date); 
?>

<div class="ausflug" id="<?php echo("$character$nr"); ?>">
    <?php the_post_thumbnail(); ?>
    <span class="ausflug-nummer">
        <p><?php echo("$character$nr") ?></p>
    </span>
    <div class="ausflug-content">
        <h2><?php the_title(); ?></h2>
        <div class="description"><?php the_content(); ?> 
        <footer class="ausflug-footer">
            <span class="zeit"><?php echo( $start->format('H:i') ); echo( " - ". $end->format("H:i") ); ?></span>
            <?php if ( $preis ) { ?>
                <span class="preis"><?php echo( "$preis €" ) ?></span>
            <?php } ?>
        </footer>
        </div>
    </div>
</div>