<?php
/**
 * custom meta-box for upcoming date exhibit and event post type
 */
	add_action( 'add_meta_boxes', 'date_event_add_metabox' );
	function date_event_add_metabox()
	{
		add_meta_box( 'date-picker', 'Event Date', 'date_event_meta_box_view', 'post', 'normal', 'high' );
	}
	function date_event_meta_box_view()
	{
    // $post is already set, and contains an object: the WordPress post
		//global $post;
		// $values = get_post_custom( $post->ID );
		$date_value = get_post_meta( get_the_ID(), 'date_value', true );	

		if( !empty( $date_value)){
			$date_value = get_post_meta( get_the_ID(), 'date_value', true );
		} else{
			$date_values = get_the_date();
			$date_value = strtotime($date_values);
		}
		// $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
		// $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : '';
		// $check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'] ) : '';

    // We'll use this nonce field later on when saving.
		wp_nonce_field( 'date_event_box_nonce', 'date_event_nonce' );

		?>
		<p>
			<label for="slider-url">Set Date</label>
			<input type="text" name="date_value" id="date-value" value="<?php echo date("Y-m-d", $date_value ); ?>" />

		</p>

		
		<?php    
	}

	add_action( 'save_post', 'date_event_slider_save' );
	function date_event_slider_save( $post_id )
	{
	    // Bail if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	     
	    // if our nonce isn't there, or we can't verify it, bail
	    if( !isset( $_POST['date_event_nonce'] ) || !wp_verify_nonce( $_POST['date_event_nonce'], 'date_event_box_nonce' ) ) return;
	     
	    // if our current user can't edit this post, bail
	    if( !current_user_can( 'edit_post' ) ) return;
	     
	    // now we can actually save the data
	    $allowed = array( 
	        'a' => array( // on allow a tags
	            'href' => array() // and those anchors can only have href attribute
	        )
	    );
	     
	    // Make sure your data is set before trying to save it
	    if( isset( $_POST['date_value'] ) )
	        //update_post_meta( $post_id, 'date_value', strtotime( $_POST['date_value'] ) );
	        update_post_meta( $post_id, 'date_value', strtotime( $_POST['date_value'] ) );
	         
	   
	}

	/********************Time Picker***********************************************/

	add_action( 'add_meta_boxes', 'event_time_add_metabox' );
	function event_time_add_metabox()
	{
		add_meta_box( 'time-picker', 'Event Time', 'time_event_meta_box_view', 'post', 'normal', 'high' );
	}

	function time_event_meta_box_view()
	{
    // $post is already set, and contains an object: the WordPress post
		global $post;
		// $values = get_post_custom( $post->ID );
		$time_value = get_post_meta( $post->ID, 'time_value', true );
		// $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
		// $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : '';
		// $check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'] ) : '';

    // We'll use this nonce field later on when saving.
		wp_nonce_field( 'time_event_box_nonce', 'time_event_nonce' );

		?>
		<p>
			<label for="time">Select Time</label>
			<input type="text" name="time_value" id="time-value" value="<?php echo $time_value ; ?>" />
		</p>

		
		<?php    
	}

	add_action( 'save_post', 'event_time_save' );
	function event_time_save( $post_id )
	{
	    // Bail if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	     
	    // if our nonce isn't there, or we can't verify it, bail
	    if( !isset( $_POST['time_event_nonce'] ) || !wp_verify_nonce( $_POST['time_event_nonce'], 'time_event_box_nonce' ) ) return;
	     
	    // if our current user can't edit this post, bail
	    if( !current_user_can( 'edit_post' ) ) return;
	     
	    // now we can actually save the data
	    $allowed = array( 
	        'a' => array( // on allow a tags
	            'href' => array() // and those anchors can only have href attribute
	        )
	    );
	     
	    // Make sure your data is set before trying to save it
	    if( isset( $_POST['time_value'] ) )
	        //update_post_meta( $post_id, 'time_value', strtotime( $_POST['time_value'] ) );
	        update_post_meta( $post_id, 'time_value', $_POST['time_value'] );	         
	   
	}

	/**********************************Event location************************************/

	add_action( 'add_meta_boxes', 'event_location_add_metabox' );
	function event_location_add_metabox()
	{
		add_meta_box( 'location-picker', 'Event Location', 'location_event_meta_box_view', 'post', 'normal', 'high' );
	}

	function location_event_meta_box_view()
	{
    // $post is already set, and contains an object: the WordPress post
		global $post;
		// $values = get_post_custom( $post->ID );
		$location_value = get_post_meta( $post->ID, 'location_value', true );
		// $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
		// $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : '';
		// $check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'] ) : '';

    // We'll use this nonce field later on when saving.
		wp_nonce_field( 'location_event_box_nonce', 'location_event_nonce' );

		?>
		<p>
			<label for="location">Set location</label>
			<input type="text" name="location_value" id="location-value" value="<?php echo $location_value ; ?>" />
		</p>

		
		<?php    
	}

	add_action( 'save_post', 'event_location_save' );
	function event_location_save( $post_id )
	{
	    // Bail if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	     
	    // if our nonce isn't there, or we can't verify it, bail
	    if( !isset( $_POST['location_event_nonce'] ) || !wp_verify_nonce( $_POST['location_event_nonce'], 'location_event_box_nonce' ) ) return;
	     
	    // if our current user can't edit this post, bail
	    if( !current_user_can( 'edit_post' ) ) return;
	     
	    // now we can actually save the data
	    $allowed = array( 
	        'a' => array( // on allow a tags
	            'href' => array() // and those anchors can only have href attribute
	        )
	    );
	     
	    // Make sure your data is set before trying to save it
	    if( isset( $_POST['location_value'] ) )
	        //update_post_meta( $post_id, 'location_value', strtolocation( $_POST['location_value'] ) );
	        update_post_meta( $post_id, 'location_value', $_POST['location_value'] );	         
	   
	}


	/**********************Time Picker for Exhibit post type**********************************/

	add_action( 'add_meta_boxes', 'exhibit_time_add_metabox' );
	function exhibit_time_add_metabox()
	{
		add_meta_box( 'time-picker', 'Exhibit Time', 'time_exhibit_meta_box_view', 'page', 'side', 'high' );
	}

	function time_exhibit_meta_box_view()
	{
    // $post is already set, and contains an object: the WordPress post
		global $post;
		// $values = get_post_custom( $post->ID );
		$exhibit_time_value = get_post_meta( $post->ID, 'time_value', true );
		// $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
		// $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : '';
		// $check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'] ) : '';

    // We'll use this nonce field later on when saving.
		wp_nonce_field( 'time_exhibit_box_nonce', 'time_exhibit_nonce' );

		?>
		<p>
			<label for="time">Select Time</label>
			<input type="text" name="time_value" id="time-value" value="<?php echo $exhibit_time_value ; ?>" />
		</p>

		
		<?php    
	}

	add_action( 'save_post', 'exhibit_time_save' );
	function exhibit_time_save( $post_id )
	{
	    // Bail if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	     
	    // if our nonce isn't there, or we can't verify it, bail
	    if( !isset( $_POST['time_exhibit_nonce'] ) || !wp_verify_nonce( $_POST['time_exhibit_nonce'], 'time_exhibit_box_nonce' ) ) return;
	     
	    // if our current user can't edit this post, bail
	    if( !current_user_can( 'edit_post' ) ) return;
	     
	    // now we can actually save the data
	    $allowed = array( 
	        'a' => array( // on allow a tags
	            'href' => array() // and those anchors can only have href attribute
	        )
	    );
	     
	    // Make sure your data is set before trying to save it
	    if( isset( $_POST['time_value'] ) )
	        //update_post_meta( $post_id, 'time_value', strtotime( $_POST['time_value'] ) );
	        update_post_meta( $post_id, 'time_value', $_POST['time_value'] );	         
	   
	}

	/*************************Exhibit location************************************/

	add_action( 'add_meta_boxes', 'exhibit_location_add_metabox' );
	function exhibit_location_add_metabox()
	{
		add_meta_box( 'location-picker', 'Exhibit Location', 'location_exhibit_meta_box_view', 'page', 'side', 'high' );
	}

	function location_exhibit_meta_box_view()
	{
    // $post is already set, and contains an object: the WordPress post
		global $post;
		// $values = get_post_custom( $post->ID );
		$location_value = get_post_meta( $post->ID, 'location_value', true );
		// $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
		// $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : '';
		// $check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'] ) : '';

    // We'll use this nonce field later on when saving.
		wp_nonce_field( 'location_exhibit_box_nonce', 'location_exhibit_nonce' );

		?>
		<p>
			<label for="location">Set location</label>
			<input type="text" name="location_value" id="location-value" value="<?php echo $location_value ; ?>" />
		</p>

		
		<?php    
	}

	add_action( 'save_post', 'exhibit_location_save' );
	function exhibit_location_save( $post_id )
	{
	    // Bail if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	     
	    // if our nonce isn't there, or we can't verify it, bail
	    if( !isset( $_POST['location_exhibit_nonce'] ) || !wp_verify_nonce( $_POST['location_exhibit_nonce'], 'location_exhibit_box_nonce' ) ) return;
	     
	    // if our current user can't edit this post, bail
	    if( !current_user_can( 'edit_post' ) ) return;
	     
	    // now we can actually save the data
	    $allowed = array( 
	        'a' => array( // on allow a tags
	            'href' => array() // and those anchors can only have href attribute
	        )
	    );
	     
	    // Make sure your data is set before trying to save it
	    if( isset( $_POST['location_value'] ) )
	        //update_post_meta( $post_id, 'location_value', strtolocation( $_POST['location_value'] ) );
	        update_post_meta( $post_id, 'location_value', $_POST['location_value'] );	         
	   
	}

/******************* Fame inductee date metabox****************************************/

	add_action( 'add_meta_boxes', 'date_fame_inductee_add_metabox' );
	function date_fame_inductee_add_metabox()
	{
		add_meta_box( 'date-picker', 'Induction Date', 'date_fame_inductee_meta_box_view', 'student', 'normal', 'high' );
	}
	function date_fame_inductee_meta_box_view()
	{
    // $post is already set, and contains an object: the WordPress post
		global $post;
		// $values = get_post_custom( $post->ID );
		$date_value = get_post_meta( $post->ID, 'date_value', true );

		if( ! $date_value ) {
			$date_value = 1945;
		}

		// $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
		// $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : '';
		// $check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'] ) : '';

    // We'll use this nonce field later on when saving.
		wp_nonce_field( 'date_fame_inductee_box_nonce', 'date_fame_inductee_nonce' );



		?>
		<p>
			<label for="slider-url">Year Inducted</label>
			<select name="date_value">

				<option value="">Select Year</option>
				<?php

				for( $i = 1945; $i <= ( date('Y') + 10 ); $i++ ) :
					?>
					<option <?php selected( $date_value, $i, true ); ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php
				endfor;
				?>
			</select>

		</p>

		
		<?php    
	}

	add_action( 'save_post', 'date_fame_inductee_slider_save' );
	function date_fame_inductee_slider_save( $post_id )
	{
	    // Bail if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	     
	    // if our nonce isn't there, or we can't verify it, bail
	    if( !isset( $_POST['date_fame_inductee_nonce'] ) || !wp_verify_nonce( $_POST['date_fame_inductee_nonce'], 'date_fame_inductee_box_nonce' ) ) return;
	     
	    // if our current user can't edit this post, bail
	    if( !current_user_can( 'edit_post' ) ) return;

	    $date = absint( $_POST['date_value'] );
	     
	    // now we can actually save the data
	    $allowed = array( 
	        'a' => array( // on allow a tags
	            'href' => array() // and those anchors can only have href attribute
	        )
	    );
	     
	    // Make sure your data is set before trying to save it
	    if( isset( $_POST['date_value'] ) )
	        //update_post_meta( $post_id, 'date_value', strtotime( $_POST['date_value'] ) );
	        update_post_meta( $post_id, 'date_value', $date );	         
	   
	}
	
	
	
		/******************* Fame inductee month metabox******************************/

	add_action( 'add_meta_boxes', 'month_fame_inductee_add_metabox' );
	function month_fame_inductee_add_metabox()
	{
		add_meta_box( 'month-picker', 'Induction Month', 'month_fame_inductee_meta_box_view', 'student', 'normal', 'high' );
	}
	function month_fame_inductee_meta_box_view()
	{
    // $post is already set, and contains an object: the WordPress post
		global $post;
		// $values = get_post_custom( $post->ID );
		$month_name = get_post_meta( $post->ID, 'month_name', true );

		echo $month_name;

		if( ! $month_name ) {
			$month_name = "January";
		}
		
		$month_names = array("January", "febuary", "March", "April", "June", "July", "August", "Sepetember", "October", "November", "December");

		// $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
		// $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : '';
		// $check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'] ) : '';

    // We'll use this nonce field later on when saving.
		wp_nonce_field( 'month_fame_inductee_box_nonce', 'month_fame_inductee_nonce' );



		?>
		<p>
			<label for="slider-url">Month Inducted</label>
			<select name="month_name">

				<option value="">Select Month</option>
				<?php

				for( $i = 0; $i <= count( $month_names ); $i++ ) :
					?>
					<option <?php selected(  $month_name, $month_names[$i], true ); ?> value="<?php echo  $month_names[$i]; ?>"><?php echo $month_names[$i]; ?></option>
					<?php
				endfor;
				?>
			</select>

		</p>

		
		<?php    
	}

	add_action( 'save_post', 'month_fame_inductee_slider_save' );
	function month_fame_inductee_slider_save( $post_id )
	{
	    // Bail if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	     
	    // if our nonce isn't there, or we can't verify it, bail
	    if( !isset( $_POST['month_fame_inductee_nonce'] ) || !wp_verify_nonce( $_POST['month_fame_inductee_nonce'], 'month_fame_inductee_box_nonce' ) ) return;
	     
	    // if our current user can't edit this post, bail
	    if( !current_user_can( 'edit_post' ) ) return;

	    $month =  $_POST['month_name'];
	     
	    // now we can actually save the data
	    $allowed = array( 
	        'a' => array( // on allow a tags
	            'href' => array() // and those anchors can only have href attribute
	        )
	    );
	     
	    // Make sure your data is set before trying to save it
	    if( isset( $_POST['month_name'] ) )
	        //update_post_meta( $post_id, 'date_value', strtotime( $_POST['date_value'] ) );
	        update_post_meta( $post_id, 'month_name', $month );	         
	   
	}



		/******************* Fame inductee day metabox******************************/

	add_action( 'add_meta_boxes', 'day_fame_inductee_add_metabox' );
	function day_fame_inductee_add_metabox()
	{
		add_meta_box( 'day-picker', 'Induction Day', 'day_fame_inductee_meta_box_view', 'student', 'normal', 'high' );
	}
	function day_fame_inductee_meta_box_view()
	{
    // $post is already set, and contains an object: the WordPress post
		global $post;
		// $values = get_post_custom( $post->ID );
		$day_name = get_post_meta( $post->ID, 'day_name', true );

		echo $day_name;

		if( ! $day_name ) {
			$day_name = 1;
		}
		
		

		// $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
		// $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : '';
		// $check = isset( $values['my_meta_box_check'] ) ? esc_attr( $values['my_meta_box_check'] ) : '';

    // We'll use this nonce field later on when saving.
		wp_nonce_field( 'day_fame_inductee_box_nonce', 'day_fame_inductee_nonce' );



		?>
		<p>
			<label for="slider-url">Day Inducted</label>
			<select name="day_name">

				<option value="">Select Day</option>
				<?php

				for( $i = 1; $i <= 32; $i++ ) :
					?>
					<option <?php selected(  $day_name, $i, true ); ?> value="<?php echo  $i; ?>"><?php echo $i; ?></option>
					<?php
				endfor;
				?>
			</select>

		</p>

		
		<?php    
	}

	add_action( 'save_post', 'day_fame_inductee_slider_save' );
	function day_fame_inductee_slider_save( $post_id )
	{
	    // Bail if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	     
	    // if our nonce isn't there, or we can't verify it, bail
	    if( !isset( $_POST['day_fame_inductee_nonce'] ) || !wp_verify_nonce( $_POST['day_fame_inductee_nonce'], 'day_fame_inductee_box_nonce' ) ) return;
	     
	    // if our current user can't edit this post, bail
	    if( !current_user_can( 'edit_post' ) ) return;

	    $day =  absint($_POST['day_name']);
	     
	    // now we can actually save the data
	    $allowed = array( 
	        'a' => array( // on allow a tags
	            'href' => array() // and those anchors can only have href attribute
	        )
	    );
	     
	    // Make sure your data is set before trying to save it
	    if( isset( $_POST['day_name'] ) )
	        //update_post_meta( $post_id, 'date_value', strtotime( $_POST['date_value'] ) );
	        update_post_meta( $post_id, 'day_name', $day );	         
	   
	}