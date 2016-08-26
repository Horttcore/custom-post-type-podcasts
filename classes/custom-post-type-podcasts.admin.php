<?php
/**
 *
 *  Custom Post Type Podcast
 *
 */
final class Custom_Post_Type_Podcast_Admin
{



	/**
	 * Plugin constructor
	 *
	 * @access public
	 * @author Ralf Hortt
	 **/
	public function __construct()
	{

		add_filter( 'post_updated_messages', array( $this, 'post_updated_messages' ) );

	} // END __construct



	/**
	 * Update messages
	 *
	 * @access public
	 * @param array $messages Messages
	 * @return array Messages
	 * @author Ralf Hortt
	 **/
	public function post_updated_messages( $messages ) {

		$post             = get_post();
		$post_type        = 'podcast';
		$post_type_object = get_post_type_object( $post_type );

		$messages[$post_type] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => __( 'Podcast updated.', 'custom-post-type-podcasts' ),
			2  => __( 'Custom field updated.', 'custom-post-type-podcasts' ),
			3  => __( 'Custom field deleted.', 'custom-post-type-podcasts' ),
			4  => __( 'Podcast updated.', 'custom-post-type-podcasts' ),
			/* translators: %s: date and time of the revision */
			5  => isset( $_GET['revision'] ) ? sprintf( __( 'Podcast restored to revision from %s', 'custom-post-type-podcasts' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6  => __( 'Podcast published.', 'custom-post-type-podcasts' ),
			7  => __( 'Podcast saved.', 'custom-post-type-podcasts' ),
			8  => __( 'Podcast submitted.', 'custom-post-type-podcasts' ),
			9  => sprintf( __( 'Podcast scheduled for: <strong>%1$s</strong>.', 'custom-post-type-podcasts' ),
				// translators: Publish box date format, see http://php.net/date
				date_i18n( __( 'M j, Y @ G:i', 'custom-post-type-podcasts' ), strtotime( $post->post_date ) )
			),
			10 => __( 'Podcast draft updated.', 'custom-post-type-podcasts' )
		);

		if ( $post_type_object->publicly_queryable ) {
			$permalink = get_permalink( $post->ID );

			$view_link = sprintf( ' <a href="%s">%s</a>', esc_url( $permalink ), __( 'View podcast', 'custom-post-type-podcasts' ) );
			$messages[ $post_type ][1] .= $view_link;
			$messages[ $post_type ][6] .= $view_link;
			$messages[ $post_type ][9] .= $view_link;

			$preview_permalink = add_query_arg( 'preview', 'true', $permalink );
			$preview_link = sprintf( ' <a target="_blank" href="%s">%s</a>', esc_url( $preview_permalink ), __( 'Preview podcast', 'custom-post-type-podcasts' ) );
			$messages[ $post_type ][8]  .= $preview_link;
			$messages[ $post_type ][10] .= $preview_link;
		}

		return $messages;

	} // END post_updated_messages



}

new Custom_Post_Type_Podcast_Admin;
