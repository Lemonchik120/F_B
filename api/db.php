<?php
// Замість mysqli підключення, ми зберігаємо параметри для API-запитів
define('SUPABASE_URL', 'https://hqzwusqtynqraknsowgv.supabase.co');
define('SUPABASE_KEY', 'sb_publishable_doE2EKTGeYjjr3usR7yscw_nFOKdXAK'); // Візьміть у налаштуваннях API вашого проекту

// Функція-замінник mysqli_query, яка працює через API
function api_query($table, $query_params = "") {
    $url = SUPABASE_URL . "/rest/v1/" . $table . "?" . $query_params;
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: " . SUPABASE_KEY,
        "Authorization: Bearer " . SUPABASE_KEY,
        "Content-Type: application/json"
    ]);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    return json_decode($response, true);
}
?>
