<div class="bg-white shadow-md rounded-lg px-8 py-6 w-3/4 mx-auto mt-8">
        <!-- Header Section -->
        <div class="flex justify-between mb-6">
            <div class="w-1/2">
                <!-- Company Logo or Header Information -->
                <!-- Add your logo or company header here -->
            </div>
            <div class="w-1/2 text-right">
                <h1 class="text-3xl font-semibold">Payment Receipt</h1>
                <p>Date: {{ $record->paid_date }}</p>
                <p>Reference : {{ $record->reference_number }}</p>
            </div>
        </div>

        <!-- Payment Details Section -->
        <table class="w-full table-auto mb-6">
            <thead>
                <tr>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">{{ $record->mode_of_payment }}</td>
                    <td class="border px-4 py-2">{{ $record->amount }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Total Amount Section -->
        <div class="text-right">
            <p class="text-lg font-semibold">Total Amount: ${{ $record->amount }}</p>
        </div>
    </div>