//There used do_shortcode...shortcode like this: [map][gmap lat="" long=""][/map]
function map_content(  $atts, $content = 'null' )
{
    return '<div id="test" class="gmap3"></div>
    <p>drag & drop the marker to see the address</p>' . do_shortcode( $content );
}
add_shortcode( 'map', 'map_content' );
//There is used shortcode for customize js and style
function easy_google_map( $atts, $content = 'null' ) {
	extract( shortcode_atts( array(
		'width' => '600', // default width
		'height' => '500', // default height
		'zoom' => '4',
		'lat' => '22.862256424791948',
		'long' => '90.032958984375',
	), $atts ) );
	?>
	<style type="text/css">
	body{
        text-align:center;
      }
    .gmap3{
        margin: 20px auto;
        border: 1px dashed #C0C0C0;
        width: <?php echo (int) $width; ?>px;
        height: <?php echo (int) $height; ?>px;
      }
	</style>
	<script type="text/javascript">
      jQuery(function(){
      
        jQuery("#test").gmap3({
          marker:{
            latLng: [<?php echo (int) $lat; ?>, <?php echo (int) $long; ?>],
            options:{
              draggable:true
            },
            events:{
              dragend: function(marker){
                jQuery(this).gmap3({
                  getaddress:{
                    latLng:marker.getPosition(),
                    callback:function(results){
                      var map = jQuery(this).gmap3("get"),
                        infowindow = jQuery(this).gmap3({get:"infowindow"}),
                        content = results && results[1] ? results && results[1].formatted_address : "no address";
                      if (infowindow){
                        infowindow.open(map, marker);
                        infowindow.setContent(content);
                      } else {
                        jQuery(this).gmap3({
                          infowindow:{
                            anchor:marker, 
                            options:{content: content}
                          }
                        });
                      }
                    }
                  }
                });
              }
            }
          },
          map:{
            options:{
              zoom: <?php echo (int) $zoom; ?>
            }
          }
        });
        
      });
    </script>
<?php
}
add_shortcode( 'gmap', 'easy_google_map' );