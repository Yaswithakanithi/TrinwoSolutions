@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-8 text-gray-800">📊 System Reports</h1>

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">
            <i class="fas fa-chart-bar mr-2 text-purple-600"></i> System Overview
        </h2>

        <!-- Chart Canvas -->
        <canvas id="systemChart" width="500" height="350"></canvas>
    </div>
</div>

<!-- Simple JS for Chart -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const employees = {{ $totalEmployees }};
        const clients = {{ $totalClients }};

        const canvas = document.getElementById('systemChart');
        const ctx = canvas.getContext('2d');

        // Chart Data
        const chartData = [employees, clients];
        const labels = ["Employees", "Clients"];
        const colors = ["#3498db", "#2ecc71"];

        // Chart Config
        const barWidth = 100;   // Width of bars
        const barSpacing = 160; // Spacing between bars
        const xStart = 80;      // Starting position on X-axis
        const yStart = 280;     // Y-axis (bottom of bars)
        const chartHeight = 200; // Maximum chart height
        const maxVal = Math.max(...chartData) || 1; // Avoid division by zero

        // Clear Canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);

        // Draw Bars
        chartData.forEach((value, index) => {
            const barHeight = (value / maxVal) * chartHeight;
            
            // Draw Bar
            ctx.fillStyle = colors[index];
            ctx.fillRect(xStart + index * barSpacing, yStart - barHeight, barWidth, barHeight);
            
            // Add Data Value on Top
            ctx.fillStyle = "#333";
            ctx.font = "16px Arial";
            ctx.fillText(value, xStart + index * barSpacing + (barWidth / 3), yStart - barHeight - 10);
        });

        // Draw Labels Below Bars
        labels.forEach((label, index) => {
            ctx.fillStyle = "#333";
            ctx.font = "16px Arial";
            ctx.fillText(label, xStart + index * barSpacing + (barWidth / 4), yStart + 20);
        });

        // Draw X-Axis Line
        ctx.strokeStyle = "#666";
        ctx.beginPath();
        ctx.moveTo(xStart - 40, yStart);
        ctx.lineTo(xStart + chartData.length * barSpacing, yStart);
        ctx.stroke();
    });
</script>
@endsection
