<?php
/*
 * Search form in widget
 */

if ( ! function_exists('b4st_search_single') ) {

  function b4st_search_single( $form ) {
    $form = 
    '<form class="form-inline" role="search" method="get" id="searchform" action="' . home_url('/') . '" >
      <div class="input-group">
        <input class="form-control" type="search" value="' . get_search_query() . '" placeholder="' . esc_attr_x('Buscar', 'b4st') . '..." name="s" id="s" aria-label="buscar" aria-describedby="searchsubmit" />
        <div class="input-group-append">  
          <button type="submit" id="searchsubmit" value="'. esc_attr_x('Search', 'b4st') .'" class="btn btn-custom"><i class="fas fa-search"></i></button>
        </div>
      </div>
    </form>';
    return $form;
  }
}
add_filter( 'get_search_form', 'b4st_search_single' );