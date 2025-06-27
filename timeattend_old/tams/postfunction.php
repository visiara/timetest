<?php
function postToFacebook($job_url, $access_token) {
    $api_url = "https://graph.facebook.com/v12.0/me/feed";

    $post_data = [
        "message" => "New job opening: Apply now - $job_url",
        "link" => $job_url,
        "access_token" => $access_token
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// Replace with your Facebook API Access Token
$facebook_access_token = "YOUR_FACEBOOK_ACCESS_TOKEN";
$response = postToFacebook($job_url, $facebook_access_token);
//echo "Facebook Response: " . $response;

// Replace "YOUR_FACEBOOK_ACCESS_TOKEN" with a valid access token from Facebook's Graph API.


//////////

function postToLinkedIn($job_url, $job_title, $access_token) {
    $api_url = "https://api.linkedin.com/v2/shares";

    $post_data = [
        "content" => [
            "contentEntities" => [
                [
                    "entityLocation" => $job_url
                ]
            ],
            "title" => $job_title
        ],
        "distribution" => [
            "linkedInDistributionTarget" => []
        ],
        "owner" => "urn:li:organization:YOUR_COMPANY_ID",
        "text" => [
            "text" => "New job opening: $job_title. Apply now: $job_url"
        ]
    ];

    $ch = curl_init($api_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $access_token",
        "Content-Type: application/json",
        "X-Restli-Protocol-Version: 2.0.0"
    ]);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// Replace with your LinkedIn API Access Token
$access_token = "YOUR_LINKEDIN_ACCESS_TOKEN";
$response = postToLinkedIn($job_url, $job_title, $access_token);
//echo "LinkedIn Response: " . $response;

//Replace "YOUR_LINKEDIN_ACCESS_TOKEN" with your valid LinkedIn API token.
// "YOUR_COMPANY_ID" should be your LinkedIn company ID.
?>



<?php
// generating the code
// Sample job details
$job_id = 123; // Example Job ID (should be dynamic)
$job_title = "Senior Software Engineer";
$company_name = "TechCorp Ltd.";
$job_description = "We are looking for an experienced software engineer...";
$job_url = "https://companywebsite.com/job.php?id=" . $job_id;

// URL encoding for sharing
$encodedJobTitle = urlencode($job_title);
$encodedJobUrl = urlencode($job_url);

// Generate share links
$facebook_link = "https://www.facebook.com/sharer/sharer.php?u=$encodedJobUrl";
$linkedin_link = "https://www.linkedin.com/shareArticle?mini=true&url=$encodedJobUrl&title=$encodedJobTitle";
$company_site_link = $job_url; // Internal company job board link

echo "Facebook Share Link: $facebook_link <br>";
echo "LinkedIn Share Link: $linkedin_link <br>";
echo "Company Website Job Link: $company_site_link <br>";
?>

