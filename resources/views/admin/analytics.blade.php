@extends('admin.layout')

@section('title', 'Analytics')

@section('content')
<div class="space-y-6">
    <!-- Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-full">
                    <i class="fas fa-eye text-blue-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Pengunjung Hari Ini</h3>
                    <p class="text-2xl font-bold">1,234</p>
                    <p class="text-green-600 text-sm">+12% dari kemarin</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-full">
                    <i class="fas fa-mouse-pointer text-green-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Page Views</h3>
                    <p class="text-2xl font-bold">5,678</p>
                    <p class="text-green-600 text-sm">+8% dari kemarin</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-full">
                    <i class="fas fa-clock text-yellow-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Avg. Session</h3>
                    <p class="text-2xl font-bold">3m 24s</p>
                    <p class="text-red-600 text-sm">-5% dari kemarin</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-full">
                    <i class="fas fa-percentage text-purple-600 text-xl"></i>
                </div>
                <div class="ml-4">
                    <h3 class="text-gray-500 text-sm">Bounce Rate</h3>
                    <p class="text-2xl font-bold">42%</p>
                    <p class="text-green-600 text-sm">-3% dari kemarin</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Pengunjung Bulanan</h3>
            <div class="h-64 flex items-end justify-between space-x-2">
                @for($i = 1; $i <= 12; $i++)
                <div class="bg-blue-500 rounded-t" style="height: {{ rand(20, 100) }}%; width: 8%;"></div>
                @endfor
            </div>
            <div class="flex justify-between text-xs text-gray-500 mt-2">
                <span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span>
                <span>May</span><span>Jun</span><span>Jul</span><span>Aug</span>
                <span>Sep</span><span>Oct</span><span>Nov</span><span>Dec</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Top Halaman</h3>
            <div class="space-y-3">
                <div class="flex justify-between items-center">
                    <span class="text-sm">/beranda</span>
                    <div class="flex items-center">
                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: 85%"></div>
                        </div>
                        <span class="text-sm text-gray-600">2,345</span>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm">/layanan</span>
                    <div class="flex items-center">
                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                            <div class="bg-green-500 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                        <span class="text-sm text-gray-600">1,567</span>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm">/tentang</span>
                    <div class="flex items-center">
                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                            <div class="bg-yellow-500 h-2 rounded-full" style="width: 45%"></div>
                        </div>
                        <span class="text-sm text-gray-600">987</span>
                    </div>
                </div>
                <div class="flex justify-between items-center">
                    <span class="text-sm">/kontak</span>
                    <div class="flex items-center">
                        <div class="w-24 bg-gray-200 rounded-full h-2 mr-2">
                            <div class="bg-purple-500 h-2 rounded-full" style="width: 30%"></div>
                        </div>
                        <span class="text-sm text-gray-600">654</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed Analytics -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Sumber Traffic</h3>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-sm">Organic Search</span>
                    <span class="text-sm font-medium">45%</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm">Direct</span>
                    <span class="text-sm font-medium">30%</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm">Social Media</span>
                    <span class="text-sm font-medium">15%</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm">Referral</span>
                    <span class="text-sm font-medium">10%</span>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Device Type</h3>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-sm">Desktop</span>
                    <span class="text-sm font-medium">60%</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm">Mobile</span>
                    <span class="text-sm font-medium">35%</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm">Tablet</span>
                    <span class="text-sm font-medium">5%</span>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">Browser</h3>
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-sm">Chrome</span>
                    <span class="text-sm font-medium">65%</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm">Firefox</span>
                    <span class="text-sm font-medium">20%</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm">Safari</span>
                    <span class="text-sm font-medium">10%</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-sm">Edge</span>
                    <span class="text-sm font-medium">5%</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection