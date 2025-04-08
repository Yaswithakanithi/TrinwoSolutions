@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10">
    <h1 class="text-4xl font-bold mb-6 text-gray-800 text-center">Admin Dashboard</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        <div style="background: white; display: flex; align-items: center; gap: 15px; padding: 20px; border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease, box-shadow 0.3s ease;"
             onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0px 8px 20px rgba(0, 0, 0, 0.3)';"
             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0px 4px 15px rgba(0, 0, 0, 0.2)';">
            <div style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: #007BFF; color: white; font-size: 24px;">
                <i class="fas fa-users"></i>
            </div>
            <div>
                <h2 style="font-size: 18px; font-weight: bold; color: #333;">Total Employees</h2>
                <p style="font-size: 24px; font-weight: bold; color: #222;">{{ $totalEmployees }}</p>
            </div>
        </div>

 
        <div style="background: white; display: flex; align-items: center; gap: 15px; padding: 20px; border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease, box-shadow 0.3s ease;"
             onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0px 8px 20px rgba(0, 0, 0, 0.3)';"
             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0px 4px 15px rgba(0, 0, 0, 0.2)';">
            <div style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: #28A745; color: white; font-size: 24px;">
                <i class="fas fa-user-tie"></i>
            </div>
            <div>
                <h2 style="font-size: 18px; font-weight: bold; color: #333;">Total Clients</h2>
                <p style="font-size: 24px; font-weight: bold; color: #222;">{{ $totalClients }}</p>
            </div>
        </div>

        <div style="background: white; display: flex; align-items: center; gap: 15px; padding: 20px; border-radius: 12px; box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); transition: transform 0.3s ease, box-shadow 0.3s ease;"
             onmouseover="this.style.transform='translateY(-5px)'; this.style.boxShadow='0px 8px 20px rgba(0, 0, 0, 0.3)';"
             onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0px 4px 15px rgba(0, 0, 0, 0.2)';">
            <div style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 50%; background: #6F42C1; color: white; font-size: 24px;">
                <i class="fas fa-chart-bar"></i>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-lg font-bold flex items-center"><i class="fas fa-chart-bar mr-2"></i> System Reports</h2>
    <p class="text-2xl mt-2">
        <a href="{{ route('admin.reports') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">View Reports</a>
    </p>
</div>

        </div>
    </div>
</div>
@endsection
