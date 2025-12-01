<x-app-layout>
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold text-gray-900">Create Ticket Type</h1>
                <a href="{{ route('ticket-type.index') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    ← Back to Ticket Types
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm p-8">
            <form method="POST" action="{{ route('ticket-type.store') }}" class="space-y-6">
                @csrf

                <!-- Type Field -->
                <div>
                    <label for="type" class="block text-sm font-semibold text-gray-700 mb-2">
                        Type Name <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="type" 
                        name="type" 
                        value="{{ old('type') }}"
                        required
                        autofocus
                        placeholder="e.g., Bug Report, Feature Request, Support"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition @error('type') border-danger @enderror"
                    >
                    @error('type')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-gray-500">This will be displayed to users when creating tickets.</p>
                </div>

                <!-- Database Name Field -->
                <div>
                    <label for="database_name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Database Name <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="database_name" 
                        name="database_name" 
                        value="{{ old('database_name') }}"
                        required
                        placeholder="e.g., bug_report, feature_request, support"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition @error('database_name') border-danger @enderror"
                    >
                    @error('database_name')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-gray-500">Use lowercase with underscores (snake_case). This is used internally in the database.</p>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-200 pt-6"></div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-4">
                    <a 
                        href="{{ route('ticket-type.index') }}" 
                        class="px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200"
                    >
                        Cancel
                    </a>
                    <button 
                        type="submit"
                        class="cursor-pointer px-6 py-3 text-sm font-medium text-white bg-primary-600 hover:bg-primary-700 rounded-lg transition duration-200 shadow-sm hover:shadow-md"
                    >
                        Create Ticket Type
                    </button>
                </div>
            </form>
        </div> 
    </div>
</x-app-layout>