<?php get_header() ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
$attr = array(
	'src'	=> $src,
);
?>

 <article <?php post_class(); ?> id="post-<?php the_ID(); ?>"> 
           <a href="<?php the_permalink(); ?>"><span>
                <h3><?php the_title(); ?></h3>
                <?php the_excerpt() ?>
            </span></a>
            <img src="<?php echo get_site_url()."/wp-content/uploads/";
                            $custom = get_post_custom(); 
                            $custom = get_post_meta($custom["_thumbnail_id"][0], '_wp_attached_file',true); 
                            echo $custom; ?>" width="100%" />
        </article>

<?php endwhile; ?>

<?php else : ?>

	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
		<h1>Not Found</h1>
	</div>

<?php endif; ?>
<script>// ajaxLoop.js
jQuery(function($){
    var page = 1;
    var empty = 0;
    var loading = true;
    var $window = $(window);
    var $content = $("body #content");
    var $contentt = $("body");
    var load_posts = function(){
            $.ajax({
                type       : "GET",
                data       : {numPosts : 1, pageNumber: page},
                dataType   : "html",
                url        : "<?php echo get_bloginfo('wpurl'); ?>/wp-content/themes/xvilo/loopHandler.php",
                beforeSend : function(){
                    if(page != 1){
                        $content.append('<div id="temp_load" style="text-align:center">\
                            <img src="<?php echo get_bloginfo('wpurl'); ?>/wp-content/themes/xvilo/images/ajax-loader.gif" />\
                            </div>');
                    }
                },
                success    : function(data){
                    $data = $(data);
			console.log($data);
                    	if($data == "yes") {
				console.log('no');
				console.log(empty);
				empty++;
				console.log(empty);
			}
			else if($data.length){
                        $data.hide();
                        $content.append($data);
                        $data.fadeIn(500, function(){
                            $("#temp_load").remove();
                            loading = false;
                        });
                    } else {
                        $("#temp_load").remove();
                    }
                },
                error     : function(jqXHR, textStatus, errorThrown) {
                    $("#temp_load").remove();
                    alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }
        });
    }
    $window.scroll(function() {
        var content_offset = $contentt.offset();
	if($(window).scrollTop() + $(window).height() == $(document).height()) {
       		loading = true;
                if(empty == "1"){
			console.log('no more post's to show')
		}else if empty == "0"{
			console.log('Load Posts')
			load_posts();
		}
  	 }

    });
    load_posts();
});</script>

<!-- if(!loading && ($window.scrollTop() +
            $window.height()) > ($content.scrollTop() + $content.height() + content_offset.top)) {
                loading = true;
                page++;
		
        } -->
<?php get_footer() ?>