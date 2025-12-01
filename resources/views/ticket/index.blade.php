<x-app-layout>
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h1 class="text-3xl font-bold text-gray-900">Tickets</h1>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-4">
            <div class="flex flex-col sm:flex-row gap-3">
                <div class="flex-1 flex gap-3">
                    <input 
                        type="text" 
                        id="searchInput"
                        placeholder="Search tickets by title, name or email" 
                        class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                    >
                    <button 
                        id="searchBtn"
                        class="cursor-pointer px-6 py-2 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition duration-200"
                    >
                        Search
                    </button>
                </div>
                <a 
                    href="{{ route('ticket.create') }}" 
                    class="cursor-pointer px-6 py-2 bg-success hover:bg-green-600 text-white font-medium rounded-lg transition duration-200 text-center whitespace-nowrap"
                >
                    + Create Ticket
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                ID
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Name
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Subject
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Ticket Type
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Created
                            </th>
                        </tr>
                    </thead>
                    <tbody id="ticketsTableBody" class="bg-white divide-y divide-gray-200">
                        <!-- Tickets will be loaded here via JavaScript -->
                        <tr id="loadingRow">
                            <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                                <div class="flex items-center justify-center">
                                    <svg class="animate-spin h-8 w-8 text-primary-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span class="ml-3">Loading tickets...</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div id="paginationContainer" class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <!-- Pagination will be loaded here via JavaScript -->
            </div>
        </div>
    </div>

    @push('custom-script')
        @include('ticket.script')
    @endpush
</x-app-layout>


