<?php
// Замість mysqli підключення, ми зберігаємо параметри для API-запитів
define('SUPABASE_URL', 'https://hqzwusqtynqraknsowgv.supabase.co');
define('SUPABASE_KEY', 'sb_publishable_doE2EKTGeYjjr3usR7yscw_nFOKdXAK'); // Візьміть у налаштуваннях API вашого проекту

// Функція-замінник mysqli_query, яка працює через API
function supabase_request($table, $method = 'GET', $data = null, $query_params = "") {
    $url = SUPABASE_URL . "/" . $table . ($query_params ? "?" . $query_params : "");
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $headers = [
        "apikey: " . SUPABASE_KEY,
        "Authorization: Bearer " . SUPABASE_KEY,
        "Content-Type: application/json",
        "Prefer: return=representation"
    ];

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    
    if ($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers[] = "Content-Length: " . strlen(json_encode($data));
    }

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) return false;
    return json_decode($response, true);
}
?>
