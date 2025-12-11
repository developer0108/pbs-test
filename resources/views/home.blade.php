<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-vh">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Orders</h1>

        <div class="mb-6">
            <input
                type="text"
                id="search"
                placeholder="Search by client name "
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                onkeyup="filterOrders()">
        </div>

        <!-- Orders Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Client Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount in Customer Currency</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Amount in EUR</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="orders-table">
                    @foreach($orders as $order)
                    <tr class="order-row">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $order['clientName'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['email'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['customerCurrency'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['euroCurrency'] }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order['date'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const filterOrders = () => {
            const term = document.getElementById('search').value.toLowerCase();
            const rows = document.querySelectorAll('.order-row');

            if (term === "") {
                rows.forEach(x => x.style.display = "")
                return
            }

            rows.forEach(x => {
                const clientName = x.cells[0].textContent.toLowerCase();

                if (clientName.includes(term)) {
                    x.style.display = '';
                } else {
                    x.style.display = 'none';
                }
            });
        }
    </script>
</body>


</html>
