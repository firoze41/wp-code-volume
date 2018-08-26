function top_comment_authors($amount = 5){
    global $wpdb;
    $results = $wpdb->get_results('
        SELECT
            COUNT(comment_author_email) AS comments_count, comment_author_email, comment_author, comment_author_url
        FROM
            '.$wpdb->comments.'
        WHERE
            comment_author_email != "" AND comment_type = "" AND comment_approved = 1
        GROUP BY
            comment_author_email
        ORDER BY
            comments_count DESC, comment_author ASC
        LIMIT '.$amount
    );
    $output = "<ul>";
    foreach($results as $result){
        $output .= "<li>".$result->comment_author."</li>";
    }
    $output .= "</ul>";
    echo $output;
}
// Where you want to show
<?
         top_comment_authors();
?>