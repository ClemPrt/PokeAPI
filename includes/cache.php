<?php
// Create cache info
    $cacheKey = md5($url);
    $cachePath = './cache/'.$cacheKey;
    $cacheUsed = false;


    // Cache available
    if(file_exists($cachePath))
    {
        $result = file_get_contents($cachePath);
        $cacheUsed = true;
    }

    // Cache not available
    else
    {
        // Make request to API
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);

        $result = curl_exec($curl);
        curl_close($curl);

        // Save in cache
        file_put_contents($cachePath, $result);
    }
?>