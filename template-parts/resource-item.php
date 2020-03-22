<div class="row">
  <div class="columns">
    <div class="sm-10 md-4">
      <h2>
        <a href="<?php the_permalink(); ?>">
          <?php print the_title(); ?>
        </a>
      </h2>
      <?php
      $link = get_field('cta');
      if( $link ):
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
          ?>
          <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
      <?php endif; ?>
    </div>
    <div class="sm-10 md-6">
      <div class="resource__excerpt">
        <?php the_excerpt(); ?>
      </div>
      <div class="resource__tags">
        <?php echo get_the_term_list( get_the_ID(), 'resource_type', '', ',' ); ?>
      </div>
    </div>
  </div>
</div>
<hr />
