<?php

// Creating the widget 
    class social_widget extends WP_Widget {

        function __construct(){
            parent::__construct(
                    // Base ID of your widget
                    'social_widget',
                    // Widget name will appear in UI
                    __('LB Social Widget',DOMAIN),
                    // Widget description
                    array('description'=>__('Social widget',DOMAIN),)
            );
        }

        
        public function widget($args,$instance){
    
            if (!array_key_exists('title',$instance))
                $instance['title']='';
            
            $title=apply_filters('widget_title',$instance['title']);
            
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            
            if (!empty($title))
                echo $args['before_title'].$title.$args['after_title'];

            // This is where you run the code and display the output
            ?>
             <?php
                $social_icons=laboutique_social_icons(array(
                    'class'=>'social_icons'
                ));                        
            ?>
            <?php if ($social_icons):?>
            <!-- Social icons -->
            <div class="social_icons">
                <h6><?php echo theme_option('social_title'); ?></h6>
                <?php echo $social_icons;?>
            </div>
            <?php endif;?>
            <?php
            echo $args['after_widget'];
        }

        // Widget Backend 
        public function form($instance){
            if (isset($instance['title'])){
                $title=$instance['title'];
            } else {
                $title=__('Socialize with us',DOMAIN);
            }
            
            
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title',DOMAIN);?>:</label> 
                <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" />
            </p>
           
            <?php
        }

        // Updating widget replacing old instances with new
        public function update($new_instance,$old_instance){
            $instance=array();
            $instance['title']=(!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
           
            return $instance;
        }

    }

    // Class social_widget ends here
    // Register and load the widget
    function load_social_widget(){
        register_widget('social_widget');
    }

    add_action('widgets_init','load_social_widget');
    