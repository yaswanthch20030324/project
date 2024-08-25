<?php

class ResponseHandler {

    public function handlePostRequest($data) {
        // Validate input
        if (!isset($data['data']) || !is_array($data['data'])) {
            return [
                "is_success" => false,
                "message" => "Invalid input data."
            ];
        }

        // Initialize arrays
        $numbers = [];
        $alphabets = [];
        $highestLowercase = null;

        // Separate numbers and alphabets
        foreach ($data['data'] as $item) {
            if (is_numeric($item)) {
                $numbers[] = $item;
            } elseif (is_string($item) && ctype_alpha($item)) {
                $alphabets[] = $item;
                // Check if it's a lowercase alphabet and if it's the highest seen so far
                if (ctype_lower($item) && ($highestLowercase === null || $item > $highestLowercase)) {
                    $highestLowercase = $item;
                }
            }
        }

        // Construct the response
        return [
            "is_success" => true,
            "user_id" => "john_doe_17091999", // Replace with actual logic to generate user_id
            "email" => "john@xyz.com",       // Replace with actual email
            "roll_number" => "ABCD123",      // Replace with actual roll number
            "numbers" => $numbers,
            "alphabets" => $alphabets,
            "highest_lowercase_alphabet" => $highestLowercase ? [$highestLowercase] : []
        ];
    }

    public function handleGetRequest() {
        return [
            "operation_code" => 1
        ];
    }
}

?>

