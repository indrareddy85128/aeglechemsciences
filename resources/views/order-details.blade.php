<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Enquiry Details') }} - {{ $order->order_number }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg border border-gray-200 p-6 m-2">
                <h3 class="text-lg font-semibold mb-4">Products</h3>
                <div class="overflow-x-auto border rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #</th>
                                <th class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Image</th>
                                <th class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Name</th>
                                <th class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Catalogue Number</th>
                                <th class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cas Number</th>
                                <th class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Hsn Code</th>
                                <th class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Product Size</th>
                                <th class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Quantity</th>
                                <th class="px-6 py-3  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($order->orderItems as $index => $item)
                                <tr class="hover:bg-gray-50 text-center">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <img class="w-16 h-auto" src="{{ asset(Storage::url($item->product->image)) }}"
                                            alt="{{ $item->product->name }}">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->product->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->product->catalogue_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->product->cas_number }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->product->hsn_code }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->product->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $item->quantity }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap  text-sm text-gray-900">₹
                                        {{ $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('orders.index') }}" class="text-blue-600 hover:text-blue-900 font-medium">
                        &larr; Back to Enquiries
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
