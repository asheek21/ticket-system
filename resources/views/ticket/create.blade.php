<x-app-layout>
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex items-center justify-between">
                <h1 class="text-3xl font-bold text-gray-900">Create New Ticket</h1>
                <a href="{{ route('home') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    ← Back to Tickets
                </a>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm p-8">
            <form method="POST" action="{{ route('ticket.store') }}" class="space-y-6">
                @csrf

                <!-- Name Field -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Name <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="{{ old('name') }}"
                        required
                        autofocus
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition @error('name') border-danger @enderror"
                    >
                    @error('name')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="{{ old('email') }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition @error('email') border-danger @enderror"
                    >
                    @error('email')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Subject Field -->
                <div>
                    <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                        Subject <span class="text-danger">*</span>
                    </label>
                    <input 
                        type="text" 
                        id="subject" 
                        name="subject" 
                        value="{{ old('subject') }}"
                        required
                        placeholder="Brief description of the issue"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition @error('subject') border-danger @enderror"
                    >
                    @error('subject')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Ticket Type Dropdown -->
                <div>
                    <label for="ticket_type_id" class="block text-sm font-semibold text-gray-700 mb-2">
                        Ticket Type <span class="text-danger">*</span>
                    </label>
                    <select 
                        id="ticket_type_id" 
                        name="ticket_type_id" 
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition @error('ticket_type_id') border-danger @enderror"
                    >
                        <option value="">Select a ticket type</option>
                        @foreach($ticketTypes as $ticketType)
                            <option value="{{ $ticketType->id }}" {{ old('ticket_type_id') == $ticketType->id ? 'selected' : '' }}>
                                {{ $ticketType->type }}
                            </option>
                        @endforeach
                    </select>
                    @error('ticket_type_id')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Field -->
                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                        Description
                    </label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="6"
                        placeholder="Provide detailed information about the issue"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition resize-none @error('description') border-danger @enderror"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <p class="mt-2 text-sm text-danger">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-gray-500">Be as specific as possible to help us resolve your issue faster.</p>
                </div>

                <!-- Divider -->
                <div class="border-t border-gray-200 pt-6"></div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-end space-x-4">
                    <a 
                        href="{{ route('home') }}" 
                        class="px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition duration-200"
                    >
                        Cancel
                    </a>
                    <button 
                        type="submit"
                        class="px-6 py-3 text-sm font-medium text-white bg-success hover:bg-green-600 rounded-lg transition duration-200 shadow-sm hover:shadow-md"
                    >
                        Create Ticket
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>