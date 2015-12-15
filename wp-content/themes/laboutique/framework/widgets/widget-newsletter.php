<?php

// Creating the widget 
    class newsletter_widget extends WP_Widget {

        function __construct(){
            parent::__construct(
                    // Base ID of your widget
                    'newsletter_widget',
                    // Widget name will appear in UI
                    __('LB Newsletter Widget',DOMAIN),
                    // Widget description
                    array('description'=>__('Newsletter widget',DOMAIN),)
            );
        }

        
        public function widget($args,$instance){
    
            $title=apply_filters('widget_title',$instance['title']);
            
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            
            if (!empty($title))
                echo $args['before_title'].$title.$args['after_title'];

            // This is where you run the code and display the output
            ?>
            <form enctype="multipart/form-data" action="" method="post">                       
                <div class="row-fluid">
                    <div class="span12">
                        <div class="input-append">
                            <input type="text" class="" name="email" />
                            <button class="btn" type="submit"><?php echo $instance['button'];?></button>
                        </div>                       
                    </div>
                </div>

            </form>								

            <p><?php echo $instance['description']?></p>
            <?php
            echo $args['after_widget'];
        }

        // Widget Backend 
        public function form($instance){
            if (isset($instance['title'])){
                $title=$instance['title'];
            } else {
                $title=__('Newsletter subscription',DOMAIN);
            }
            
            if (isset($instance['description'])){
                $description=$instance['description'];
            } else {
                $description=__('Sign up to receive our latest news and updates direct to your inbox.', DOMAIN);
            }
            
            if (isset($instance['button'])){
                $button=$instance['button'];
            } else {
                $button=__('Go!',DOMAIN);
            }
            
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title');?>"><?php _e('Title',DOMAIN);?>:</label> 
                <input class="widefat" id="<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('button');?>"><?php _e('Button text',DOMAIN);?>:</label> 
                <input class="widefat" id="<?php echo $this->get_field_id('button');?>" name="<?php echo $this->get_field_name('button');?>" type="text" value="<?php echo esc_attr($button);?>" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id('description');?>"><?php _e('Description',DOMAIN);?>:</label> 
                <input class="widefat" id="<?php echo $this->get_field_id('description');?>" name="<?php echo $this->get_field_name('description');?>" type="text" value="<?php echo esc_attr($description);?>" />
            </p>
            <?php
        }

        // Updating widget replacing old instances with new
        public function update($new_instance,$old_instance){
            $instance=array();
            $instance['title']=(!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
            $instance['button']=(!empty($new_instance['button']) ) ? strip_tags($new_instance['button']) : '';
            $instance['description']=(!empty($new_instance['description']) ) ? strip_tags($new_instance['description']) : '';
            return $instance;
        }

    }

    // Class newsletter_widget ends here
    // Register and load the widget
    function load_newsletter_widget(){
        register_widget('newsletter_widget');
    }

    add_action('widgets_init','load_newsletter_widget');
    