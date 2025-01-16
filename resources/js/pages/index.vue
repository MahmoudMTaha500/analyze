<template>
    <div class="container">
        <div class="card">
            <!-- Header -->
            <h1 class="title">Character Frequency Analysis</h1>

            <!-- Form -->
            <form @submit.prevent="analyzeText" class="form">
        <textarea
            v-model="textInput"
            class="textarea"
            rows="6"
            placeholder="Enter your text here..."
        ></textarea>
                <button type="submit" class="button">Analyze Text</button>
            </form>

            <!-- Results Section -->
            <div v-if="result" class="results">
                <h2 class="results-title">Results:</h2>
                <p class="result-item">
                    <strong>Original Text:</strong> {{ result.original_text }}
                </p>
                <p class="result-item">
                    <strong>Most Frequent Character:</strong> {{ result.most_frequent_character }}
                </p>
                <p class="result-item">
                    <strong>Frequency:</strong> {{ result.frequency }}
                </p>
            </div>

            <!-- Error Message -->
            <div v-if="error" class="error-message">
                {{ error }}
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            textInput: "",
            result: null,
            error: null,
        };
    },
    methods: {
        async analyzeText() {
            if (!this.textInput.trim()) {
                this.error = "Please enter some text!";
                return;
            }
            try {
                const response = await axios.post("http://127.0.0.1:8000/api/analyze", {
                    text: this.textInput,
                });
                this.result = response.data;
                this.error = null;
            } catch (err) {
                this.error = err.response?.data?.error || "An error occurred.";
            }
        },
    },
};
</script>

<style>
/* Base Styles */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #f0f4ff, #ffffff);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

/* Container */
.container {
    width: 100%;
    max-width: 600px;
    padding: 20px;
    box-sizing: border-box;
}

/* Card */
.card {
    background: white;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    box-sizing: border-box;
}

/* Title */
.title {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

/* Form */
.form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Textarea */
.textarea {
    padding: 10px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    resize: none;
    outline: none;
    transition: border-color 0.2s ease-in-out;
}

.textarea:focus {
    border-color: #007bff;
}

/* Button */
.button {
    padding: 10px 15px;
    font-size: 16px;
    color: white;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

.button:hover {
    background-color: #0056b3;
}

/* Results Section */
.results {
    margin-top: 20px;
}

.results-title {
    font-size: 20px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.result-item {
    font-size: 16px;
    color: #555;
}

/* Error Message */
.error-message {
    margin-top: 20px;
    color: #d9534f;
    font-size: 16px;
    border: 1px solid #f5c6cb;
    background-color: #f8d7da;
    padding: 10px;
    border-radius: 5px;
}
</style>
