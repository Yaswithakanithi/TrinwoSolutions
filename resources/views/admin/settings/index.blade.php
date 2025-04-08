@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6">⚙ General Settings</h1>
    <p class="mb-4">Here you can manage system settings.</p>

    <div class="bg-white p-6 rounded-lg shadow-lg">
       
        <label class="block text-lg font-semibold text-gray-700 mb-2">Site Title:</label>
        <input type="text" class="w-full p-2 border rounded-lg" placeholder="Enter Site Title">

        <label class="block text-lg font-semibold text-gray-700 mt-4">Theme Color:</label>
        <input type="color" id="themeColorPicker" class="w-16 h-10 cursor-pointer mt-2" value="#3498db">
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const colorPicker = document.getElementById("themeColorPicker");

      
        const savedColor = localStorage.getItem("themeColor");
        if (savedColor) {
            document.documentElement.style.setProperty("--theme-color", savedColor);
            colorPicker.value = savedColor;
        }

    
        colorPicker.addEventListener("input", function () {
            document.documentElement.style.setProperty("--theme-color", this.value);
            localStorage.setItem("themeColor", this.value); 
        });
    });
</script>

<style>
    :root {
        --theme-color: #3498db; 
    }
    body {
        background-color: var(--theme-color);
    }
</style>
@endsection
