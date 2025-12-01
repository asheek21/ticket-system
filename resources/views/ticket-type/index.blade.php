<x-app-layout>
    <div class="space-y-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h1 class="text-3xl font-bold text-gray-900">Ticket Types</h1>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm p-4">
        <div class="flex flex-col sm:flex-row gap-3 justify-end">
            <a href="{{ route('ticket-type.create') }}"
                class="cursor-pointer px-6 py-2 bg-success hover:bg-green-600 text-white font-medium rounded-lg transition duration-200 text-center whitespace-nowrap">
                + Create Ticket Type
            </a>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm overflow-hidden mt-5">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Name
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Database Name
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody id="ticketsTypeTableBody" class="bg-white divide-y divide-gray-200">
                    @foreach ($types as $type)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $type->type }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $type->database_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span @class([
                                    'px-3 py-1 text-xs font-semibold rounded-full',
                                    $type->migration_status->color(),
                                ])>
                                    {{ $type->migration_status->value }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
