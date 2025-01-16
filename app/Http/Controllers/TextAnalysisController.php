<?php

namespace App\Http\Controllers;

use App\Http\Requests\TextAnalysisRequest;
use Illuminate\Http\Request;

class TextAnalysisController extends Controller
{
    public function analyze(TextAnalysisRequest $request)
    {
    $data = $request->validated();

        $text = strtolower(preg_replace('/[^a-zA-Z]/', '',  $data['text'])); // Remove special chars, numbers

        if (empty($text)) {
            return response()->json(['error' => 'No valid characters found in input text'], 400);
        }

        $charCounts = count_chars($text, 1); // Count character frequencies
        $mostFrequentChar = array_keys($charCounts, max($charCounts))[0]; // Find most frequent character

        return response()->json([
            'original_text' => $text,
            'most_frequent_character' => chr($mostFrequentChar),
            'frequency' => $charCounts[$mostFrequentChar],
        ]);
    }
}
