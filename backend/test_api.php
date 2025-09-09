<?php

/**
 * Simple API Testing Script
 * This script tests the API endpoints we created
 */

$baseUrl = 'http://127.0.0.1:8000/api';

function makeRequest($url, $method = 'GET', $data = null, $headers = []) {
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    
    if ($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $headers[] = 'Content-Type: application/json';
    }
    
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return [
        'status_code' => $httpCode,
        'body' => json_decode($response, true)
    ];
}

echo "=== API Testing Script ===\n\n";

// Test 1: Login with admin user
echo "1. Testing Login with Admin User (manish@technofra.com)\n";
$loginResponse = makeRequest($baseUrl . '/auth/login', 'POST', [
    'email' => 'manish@technofra.com',
    'password' => 'admin123'
]);

echo "Status Code: " . $loginResponse['status_code'] . "\n";
echo "Response: " . json_encode($loginResponse['body'], JSON_PRETTY_PRINT) . "\n\n";

if ($loginResponse['status_code'] === 200 && isset($loginResponse['body']['data']['access_token'])) {
    $adminToken = $loginResponse['body']['data']['access_token'];
    
    // Test 2: Get user info with token
    echo "2. Testing Get User Info with Admin Token\n";
    $userResponse = makeRequest($baseUrl . '/auth/user', 'GET', null, [
        'Authorization: Bearer ' . $adminToken
    ]);
    
    echo "Status Code: " . $userResponse['status_code'] . "\n";
    echo "Response: " . json_encode($userResponse['body'], JSON_PRETTY_PRINT) . "\n\n";
    
    // Test 3: Access admin-only endpoint
    echo "3. Testing Admin-Only Endpoint\n";
    $adminResponse = makeRequest($baseUrl . '/admin/users', 'GET', null, [
        'Authorization: Bearer ' . $adminToken
    ]);
    
    echo "Status Code: " . $adminResponse['status_code'] . "\n";
    echo "Response: " . json_encode($adminResponse['body'], JSON_PRETTY_PRINT) . "\n\n";
    
    // Test 4: Logout
    echo "4. Testing Logout\n";
    $logoutResponse = makeRequest($baseUrl . '/auth/logout', 'POST', null, [
        'Authorization: Bearer ' . $adminToken
    ]);
    
    echo "Status Code: " . $logoutResponse['status_code'] . "\n";
    echo "Response: " . json_encode($logoutResponse['body'], JSON_PRETTY_PRINT) . "\n\n";
}

// Test 5: Login with regular user
echo "5. Testing Login with Regular User (test@example.com)\n";
$userLoginResponse = makeRequest($baseUrl . '/auth/login', 'POST', [
    'email' => 'test@example.com',
    'password' => 'password123'
]);

echo "Status Code: " . $userLoginResponse['status_code'] . "\n";
echo "Response: " . json_encode($userLoginResponse['body'], JSON_PRETTY_PRINT) . "\n\n";

if ($userLoginResponse['status_code'] === 200 && isset($userLoginResponse['body']['data']['access_token'])) {
    $userToken = $userLoginResponse['body']['data']['access_token'];
    
    // Test 6: Try to access admin-only endpoint with user token (should fail)
    echo "6. Testing Admin-Only Endpoint with User Token (Should Fail)\n";
    $forbiddenResponse = makeRequest($baseUrl . '/admin/users', 'GET', null, [
        'Authorization: Bearer ' . $userToken
    ]);
    
    echo "Status Code: " . $forbiddenResponse['status_code'] . "\n";
    echo "Response: " . json_encode($forbiddenResponse['body'], JSON_PRETTY_PRINT) . "\n\n";
    
    // Test 7: Access user/admin endpoint with user token (should work)
    echo "7. Testing User/Admin Endpoint with User Token (Should Work)\n";
    $userEndpointResponse = makeRequest($baseUrl . '/user/profile', 'GET', null, [
        'Authorization: Bearer ' . $userToken
    ]);
    
    echo "Status Code: " . $userEndpointResponse['status_code'] . "\n";
    echo "Response: " . json_encode($userEndpointResponse['body'], JSON_PRETTY_PRINT) . "\n\n";
}

// Test 8: Invalid login
echo "8. Testing Invalid Login\n";
$invalidLoginResponse = makeRequest($baseUrl . '/auth/login', 'POST', [
    'email' => 'invalid@example.com',
    'password' => 'wrongpassword'
]);

echo "Status Code: " . $invalidLoginResponse['status_code'] . "\n";
echo "Response: " . json_encode($invalidLoginResponse['body'], JSON_PRETTY_PRINT) . "\n\n";

echo "=== Testing Complete ===\n";
