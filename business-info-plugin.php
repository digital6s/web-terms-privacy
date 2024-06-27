<?php
/*
Plugin Name: Local Business Information For Terms Privacy Pages
Description: Creates an options page for business information to popular Terms Privacy Pages.
Version: 3.0
Author: Brighter Websites
*/

//*****************************************************************************
// Enqueue your stylesheet for the admin options page
function enqueue_admin_styles() {
    wp_enqueue_style('options-styles', plugin_dir_url(__FILE__) . 'css/options-styles.css');
}

add_action('admin_enqueue_scripts', 'enqueue_admin_styles');



//*****************************************************************************
// Create the options page
function create_business_info_page() {
    add_menu_page(
        'Business Information',    // Page title
        'Business Info',           // Menu title
        'manage_options',          // Capability required to access the page
        'business_info_options',   // Page slug (unique)
        'render_business_info_page' // Callback function to render the page
    );
}
add_action('admin_menu', 'create_business_info_page');




//*****************************************************************************
// Render the options page
function render_business_info_page() {
    ?>
    <div class="business_info_page_style">
        <h2>Business Information</h2>
        <form method="post" action="options.php" class="business_info_style">
            <?php
            settings_fields('business_info_group');
            do_settings_sections('business_info_page');
            submit_button('Save Business Information');
            ?>
        </form>
    </div>
    <?php
}




//*****************************************************************************
// Register settings and add fields
function register_business_info_settings() {
    register_setting('business_info_group', 'business_name');
    register_setting('business_info_group', 'business_type_schema');

    register_setting('business_info_group', 'business_service');
    register_setting('business_info_group', 'delivered_services');
    register_setting('business_info_group', 'customers');
	register_setting('business_info_group', 'business_areas');


    register_setting('business_info_group', 'phone_number');
    register_setting('business_info_group', 'email');
    register_setting('business_info_group', 'address');
    register_setting('business_info_group', 'city');
    register_setting('business_info_group', 'state');
    register_setting('business_info_group', 'postcode');
    register_setting('business_info_group', 'country');

    register_setting('business_info_group', 'lat');
    register_setting('business_info_group', 'long');

    register_setting('business_info_group', 'hours');
    
   // Update the setting names
    register_setting('business_info_group', 'social_link_facebook');
    register_setting('business_info_group', 'social_link_twitter');
    register_setting('business_info_group', 'social_link_instagram');
    register_setting('business_info_group', 'social_link_youtube');
    register_setting('business_info_group', 'social_link_linkedin');
    register_setting('business_info_group', 'social_link_pinterest');
    register_setting('business_info_group', 'social_link_google_my_business');

    
    register_setting('business_info_group', 'site_owner_name');
    register_setting('business_info_group', 'site_owner_abn');
    register_setting('business_info_group', 'site_owner_phone');
    register_setting('business_info_group', 'site_owner_email');
    register_setting('business_info_group', 'site_owner_web');

    register_setting('business_info_group', 'privacy_dpo_contact_email');
    register_setting('business_info_group', 'privacy_dpo_contact_address');

    
//*****************************************************************************
//  Add sections
//
//  sections for Business Information

    add_settings_section(
        'business_info_section',
        'Business Information',
        'business_info_section_callback',
        'business_info_page'
    );
    
//  section for Business Contact info

    add_settings_section(
        'business_contact_section',
        'Business Contact Info',
        'business_contact_section_callback',
        'business_info_page'
    );
    
//  section for Social Media Links

    add_settings_section(
        'social_media_links_section',
        'Social Media Links',
        'social_media_links_section_callback',
        'business_info_page'
    );
    
//  section for Site Owner
    add_settings_section(
        'site_owner_section',
        'Site Owner Section',
        'site_owner_section_callback',
        'business_info_page'
    );

//  section for Privacy and Terms
    add_settings_section(
        'privacy_and_terms_section',
        'Privacy and Terms',
        'privacy_and_terms_section_callback',
        'business_info_page'
    );


//*****************************************************************************
//  Add Fields
//
//  Fields for Business Info 

    add_settings_field(
        'business_name',
        'Business Name',
        'business_name_callback',
        'business_info_page',
        'business_info_section'
    );
	
	     add_settings_field(
        'business_type_schema',
        'Business Type (schema)',
        'businesstypeschema_callback',
        'business_info_page',
        'business_info_section'
    );
    
    add_settings_field(
        'business_service',
        'Service (eg/ website design service or Website Designer)',
        'business_service_callback',
        'business_info_page',
        'business_info_section'
    );
    
    add_settings_field(
        'delivered_services',
        'Service/Product Delivered (eg Websites or Digital Marketing Services)',
        'delivered_services_callback',
        'business_info_page',
        'business_info_section'
    );
	
	 add_settings_field(
        'delivered_services',
        'Service/Product Delivered (eg Websites or Digital Marketing Services)',
        'delivered_services_callback',
        'business_info_page',
        'business_info_section'
    );
	
	 add_settings_field(
        'customers',
        'Target Customers (eg Local Service Businesses)',
        'customers_callback',
        'business_info_page',
        'business_info_section'
    );
    add_settings_field(
        'business_areas',
        'Business Areas (eg Websites, SEO, Photography)',
        'business_areas_callback',
        'business_info_page',
        'business_info_section'
    );

	
    
    
  //  Fields for Contact Info   

  add_settings_field(
        'phone_number',
        'Phone Number',
        'phone_number_callback',
        'business_info_page',
        'business_contact_section'
    );

    add_settings_field(
        'email',
        'Email',
        'email_callback',
        'business_info_page',
        'business_contact_section'
    );

    add_settings_field(
        'address',
        'Street Address',
        'address_callback',
        'business_info_page',
        'business_contact_section'
    );

    add_settings_field(
        'city',
        'City',
        'city_callback',
        'business_info_page',
        'business_contact_section'
    );
    
      add_settings_field(
        'state',
        'State',
        'state_callback',
        'business_info_page',
        'business_contact_section'
    );
    
      add_settings_field(
        'country',
        'Country',
        'country_callback',
        'business_info_page',
        'business_contact_section'
    );
    
      add_settings_field(
        'postcode',
        'Post Code',
        'postcode_callback',
        'business_info_page',
        'business_contact_section'
    );
    
      add_settings_field(
        'lat',
        'Lattitude',
        'lat_callback',
        'business_info_page',
        'business_contact_section'
    );
    
      add_settings_field(
        'long',
        'Longitude',
        'long_callback',
        'business_info_page',
        'business_contact_section'
    );
    
       add_settings_field(
        'hours',
        'Business hours',
        'hours_callback',
        'business_info_page',
        'business_contact_section'
    );
    
 //  Fields for social_media_links 
 
 
add_settings_field(
        'social_link_facebook',
        'Facebook Link',
        'social_link_facebook_callback',
        'business_info_page',
        'social_media_links_section'
    );
    
    // Add settings field for Twitter
add_settings_field(
    'social_link_twitter',
    'Twitter Link',
    'social_twitter_callback',
    'business_info_page',
    'social_media_links_section'
);

// Add settings field for Instagram
add_settings_field(
    'social_link_instagram',
    'Instagram Link',
    'social_instagram_callback',
    'business_info_page',
    'social_media_links_section'
);

// Add settings field for YouTube
add_settings_field(
    'social_link_youtube',
    'YouTube Link',
    'social_youtube_callback',
    'business_info_page',
    'social_media_links_section'
);

// Add settings field for LinkedIn
add_settings_field(
    'social_link_linkedin',
    'LinkedIn Link',
    'social_linkedin_callback',
    'business_info_page',
    'social_media_links_section'
);

// Add settings field for Pinterest
add_settings_field(
    'social_link_pinterest',
    'Pinterest Link',
    'social_pinterest_callback',
    'business_info_page',
    'social_media_links_section'
);

// Add settings field for Google My Business
add_settings_field(
    'social_link_google_my_business',
    'Google My Business Link',
    'social_google_my_business_callback',
    'business_info_page',
    'social_media_links_section'
);



//  Fields for site_owner

    add_settings_field(
        'site_owner_name',
        'Site Owner Name',
        'site_owner_name_callback',
        'business_info_page',
        'site_owner_section'
    );

    add_settings_field(
        'site_owner_abn',
        'Site Owner ABN or ACN',
        'site_owner_abn_callback',
        'business_info_page',
        'site_owner_section'
    );

    add_settings_field(
        'site_owner_phone',
        'Site Owner Phone',
        'site_owner_phone_callback',
        'business_info_page',
        'site_owner_section'
    );

    add_settings_field(
        'site_owner_email',
        'Site Owner Email',
        'site_owner_email_callback',
        'business_info_page',
        'site_owner_section'
    );

    add_settings_field(
        'site_owner_web',
        'Site Owner Website',
        'site_owner_web_callback',
        'business_info_page',
        'site_owner_section'
    );

//  Fields for Privacy/Accessibility contact

    add_settings_field(
        'privacy_dpo_contact_email',
        'Privacy DPO Contact Email',
        'privacy_dpo_contact_email_callback',
        'business_info_page',
        'privacy_and_terms_section' // Use the new section name
    );
    
    add_settings_field(
        'privacy_dpo_contact_address',
        'Privacy DPO Contact Address',
        'privacy_dpo_contact_address_callback',
        'business_info_page',
        'privacy_and_terms_section' // Use the new section name
    );
 
}
add_action('admin_init', 'register_business_info_settings');


// Callback function for the Business Information section
function business_info_section_callback() {
    echo '<p>Enter your business information below:</p>';
}

function business_contact_section_callback() {
    echo '<p>Enter Contact information below:</p>';
}

function social_media_links_section_callback() {
    echo '<p>Enter Social Media Links:</p>';
}

function site_owner_section_callback() {
    echo '<p>Enter Site Owner information:</p>';
}

function privacy_and_terms_section_callback() {
    echo '<p>Enter Privacy and Terms information:</p>';
}



    

//*****************************************************************************
//Define Callback Functions for Custom Fields:
//Define callback functions for each custom field to render the input fields on the options page:

function business_name_callback() {
    $business_name = get_option('business_name');
    echo "<input type='text' name='business_name' value='$business_name' />";
}
function businesstypeschema_callback() {
    $business_type_schema = get_option('business_type_schema');
    echo "<input type='text' name='business_type_schema' value='$business_type_schema' />";
}




function business_service_callback() {
    $business_service = get_option('business_service');
    echo "<input type='text' name='business_service' value='$business_service' />";
}
function delivered_services_callback() {
    $delivered_services = get_option('delivered_services');
    echo "<input type='text' name='delivered_services' value='$delivered_services' />";
}
function customers_callback() {
    $customers = get_option('customers');
    echo "<input type='text' name='customers' value='customers' />";
}
function business_areas_callback() {
    $business_areas = get_option('business_areas');
    echo "<input type='text' name='business_areas' value='$business_areas' />";
}



function phone_number_callback() {
    $phone_number = get_option('phone_number');
    echo "<input type='text' name='phone_number' value='$phone_number' />";
}
function email_callback() {
    $email = get_option('email');
    echo "<input type='text' name='email' value='$email' />";
}
function address_callback() {
    $address = get_option('address');
    echo "<input type='text' name='address' value='$address' />";
}
function city_callback() {
    $city = get_option('city');
    echo "<input type='text' name='city' value='$city' />";
}
function state_callback() {
    $state = get_option('state');
    echo "<input type='text' name='state' value='$state' />";
}
function country_callback() {
    $country = get_option('country');
    echo "<input type='text' name='country' value='$country' />";
}
function postcode_callback() {
    $postcode = get_option('postcode');
    echo "<input type='text' name='postcode' value='$postcode' />";
}

function lat_callback() {
    $lat = get_option('lat');
    echo "<input type='text' name='lat' value='$lat' />";
}
function long_callback() {
    $long = get_option('long');
    echo "<input type='text' name='long' value='$long' />";
}


function hours_callback() {
    $hours = get_option('hours');
    echo "<input type='text' name='hours' value='$hours' />";
}

//social_link Call backs


function social_link_facebook_callback() {
    $social_facebook = get_option('social_link_facebook');
    echo "<input type='url' name='social_link_facebook' value='$social_facebook' />";
}
function social_twitter_callback() {
    $social_twitter = get_option('social_link_twitter');
    echo "<input type='url' name='social_link_twitter' value='$social_twitter' />";
}
function social_instagram_callback() {
    $social_instagram = get_option('social_link_instagram');
   echo "<input type='text' name='social_link_instagram' value='$social_instagram' />";
}
function social_youtube_callback() {
    $social_youtube = get_option('social_link_youtube');
    echo "<input type='text' name='social_link_youtube' value='$social_youtube' />";
}
function social_linkedin_callback() {
    $social_linkedin = get_option('social_link_linkedin');
    echo "<input type='text' name='social_link_linkedin' value='$social_linkedin' />";
}
function social_pinterest_callback() {
    $social_pinterest = get_option('social_link_pinterest');
    echo "<input type='text' name='social_link_pinterest' value='$social_pinterest' />";
}
function social_google_my_business_callback() {
    $social_google_my_business = get_option('social_link_google_my_business');
    echo "<input type='text' name='social_link_google_my_business' value='$social_google_my_business' />";
}

//

function site_owner_name_callback() {
    $site_owner_name = get_option('site_owner_name');
    echo "<input type='text' name='site_owner_name' value='$site_owner_name' />";
}
function site_owner_abn_callback() {
    $site_owner_abn = get_option('site_owner_abn');
    echo "<input type='text' name='site_owner_abn' value='$site_owner_abn' />";
}
function site_owner_phone_callback() {
    $site_owner_phone = get_option('site_owner_phone');
    echo "<input type='text' name='site_owner_phone' value='$site_owner_phone' />";
}
function site_owner_email_callback() {
    $site_owner_email = get_option('site_owner_email');
    echo "<input type='text' name='site_owner_email' value='$site_owner_email' />";
}
function site_owner_web_callback() {
    $site_owner_web = get_option('site_owner_web');
    echo "<input type='text' name='site_owner_web' value='$site_owner_web' />";
}

function privacy_dpo_contact_email_callback() {
    $privacy_dpo_contact_email = get_option('privacy_dpo_contact_email');
    echo "<input type='text' name='privacy_dpo_contact_email' value='$privacy_dpo_contact_email' />";
}
function privacy_dpo_contact_address_callback() {
    $privacy_dpo_contact_address = get_option('privacy_dpo_contact_address');
    echo "<input type='text' name='privacy_dpo_contact_address' value='$privacy_dpo_contact_address' />";
}



//*****************************************************************************
// Create short Codes
//use it in your content like this: [business_info setting="business_name"].
//
//You can replace 'business_info' with your desired shortcode name. You can use this shortcode in posts, pages, or any other content area to display the values of your registered settings.






function business_info_shortcode($atts) {
    $output = '';

    // Define your settings here
    $settings = array(
        'business_name',
        'business_type_schema',
		
        'business_service',
        'delivered_services',
		'customers',
		'business_areas',
	
		
        'phone_number',
        'email',
        'address',
        'city',
        'state',
        'postcode',
        'country',
        'lat',
        'long',
        'hours',
        
        'social_link_facebook',
        'social_link_twitter',
        'social_link_instagram',
        'social_link_youtube',
        'social_link_linkedin',
        'social_link_pinterest',
        'social_link_google_my_business',
        
        
        'site_owner_name',
        'site_owner_abn',
        'site_owner_phone',
        'site_owner_email',
        'site_owner_web',
        'privacy_dpo_contact_email',
        'privacy_dpo_contact_address'
        
        
    );

    // Process the attributes (if any)
    $atts = shortcode_atts(array(
        'setting' => '' // Default setting name
    ), $atts);

    // Check if the 'setting' attribute is valid
    if (in_array($atts['setting'], $settings)) {
        // Get the value of the specified setting
        $setting_value = get_option($atts['setting']);

        // Output the setting value
        $output = $setting_value;
    } else {
        // Invalid or missing 'setting' attribute
        $output = 'Invalid or missing setting attribute.';
    }

    return $output;
}

add_shortcode('business_info', 'business_info_shortcode');


//*****************************************************************************
//*****************************************************************************
//*****************************************************************************





